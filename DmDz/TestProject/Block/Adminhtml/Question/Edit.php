<?php
namespace DmDz\TestProject\Block\Adminhtml\Question;

use Magento\Backend\Block\Widget\Context;
use Magento\Backend\Block\Widget\Form\Container;
use Magento\Framework\Registry;

class Edit extends Container
{

    protected $_coreRegistry = null;

    public function __construct(Context $context, Registry $registry, array $data = []) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    /**
     * Initialize Question-Edit block
     */
    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'DmDz_TestProject';
        $this->_controller = 'adminhtml_question';

        parent::_construct();

        if ($this->_isAllowedAction('DmDz_TestProject::save')) {
            $this->buttonList->update('save', 'label', __('Answer and save status'));
        } else {
            $this->buttonList->remove('save');
        }

        if ($this->_isAllowedAction('DmDz_TestProject::question_delete')) {
            $this->buttonList->update('delete', 'label', __('Delete question'));
        } else {
            $this->buttonList->remove('delete');
        }

        $this->buttonList->remove('reset');
    }

    /**
     * Check permission
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }

    /**
     * Retrieve text for header element depending on loaded contactus
     */
    public function getHeaderText()
    {
        return __('Edit question');
    }
}