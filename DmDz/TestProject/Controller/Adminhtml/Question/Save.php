<?php

namespace DmDz\TestProject\Controller\Adminhtml\Question;

use Magento\Backend\App\Action;
use Magento\Backend\Model\Session;
use Magento\Framework\Exception\LocalizedException;
use DmDz\TestProject\Model\Question;

use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Escaper;
use Magento\Framework\Mail\Template\TransportBuilder;
use Magento\Framework\Translate\Inline\StateInterface;
use Magento\Store\Model\StoreManagerInterface;

class Save extends Action
{

    const XML_PATH_EMAIL_RECIPIENT = 'contactform/email/recipient_email';

    protected $_transportBuilder;

    protected $inlineTranslation;

    protected $scopeConfig;

    protected $storeManager;

    protected $_escaper;

    public function __construct(
        Context $context,
        TransportBuilder $transportBuilder,
        StateInterface $inlineTranslation,
        ScopeConfigInterface $scopeConfig,
        StoreManagerInterface $storeManager,
        Escaper $escaper
    ) {
        parent::__construct($context);
        $this->_transportBuilder = $transportBuilder;
        $this->inlineTranslation = $inlineTranslation;
        $this->scopeConfig = $scopeConfig;
        $this->storeManager = $storeManager;
        $this->_escaper = $escaper;
    }

    /**
     * Save action
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {

            $model = $this->_objectManager->create(Question::class);

            $id = $this->getRequest()->getParam('id');
            if ($id) {
                $model->load($id);
            }

            $model->setData($data);

            $this->_eventManager->dispatch(
                'question_prepare_save',
                ['question' => $model, 'request' => $this->getRequest()]
            );

            try {
                $model->save();

                $this->_sendReplayEmail($data, $model->getData('email'));

                $this->messageManager->addSuccessMessage(__('Saved.'));
                $this->_objectManager->get(Session::class)->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }

                return $resultRedirect->setPath('*/*/');

            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Error while saving.'));
            }

            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);

        }
        return $resultRedirect->setPath('*/*/');
    }

    /**
     * Send email
     */
    protected function _sendReplayEmail($data, $fromEmail)
    {
        $this->inlineTranslation->suspend();
        $replayData = [
            'name' => $data['replay_name'],
            'email' => $data['replay_email'],
            'comment' => $data['replay_comment'],
        ];

        $postObject = new \Magento\Framework\DataObject();
        $postObject->setData($replayData);

        $sender = [
            'name' => $this->_escaper->escapeHtml($replayData['name']),
            'email' => $this->_escaper->escapeHtml($replayData['email']),
        ];

        $storeScope = \Magento\Store\Model\ScopeInterface::SCOPE_STORE;
        $transport = $this->_transportBuilder
            ->setTemplateIdentifier('send_answer_template')
            ->setTemplateOptions(
                [
                    'area' => \Magento\Framework\App\Area::AREA_FRONTEND,
                    'store' => \Magento\Store\Model\Store::DEFAULT_STORE_ID,
                ]
            )
            ->setTemplateVars(['data' => $postObject])
            ->setFrom([
                'email' => $this->scopeConfig->getValue(self::XML_PATH_EMAIL_RECIPIENT, $storeScope),
                'name' => $replayData['name'],
            ])
            ->addTo($fromEmail)
            ->getTransport();

        $transport->sendMessage();
        $this->inlineTranslation->resume();
    }

    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('DmDz_TestProject:save');
    }
}