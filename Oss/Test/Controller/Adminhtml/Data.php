<?php
namespace Oss\Test\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Registry;
use Magento\Framework\View\Result\PageFactory;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Oss\Test\Api\DataRepositoryInterface;

abstract class Data extends Action
{
    const ACTION_RESOURCE = 'Oss_Test::data';
    /**
     * Data repostory
     */
    protected $_dataRepository;

    /**
     * Core registry
     */
    protected $_coreRegistry;

    /**
     * Result Page Factory
     */
    protected $_resultPageFactory;

    /**
     * Result Forward Factory
     */
    protected $_resultForwardFactory;

    /**
     * Data constructor.
     */
    public function __construct(
        Registry $registry,
        DataRepositoryInterface $dataRepository,
        PageFactory $resultPageFactory,
        ForwardFactory $resultForwardFactory,
        Context $context

    ) {
        $this->_coreRegistry         = $registry;
        $this->_dataRepository       = $dataRepository;
        $this->_resultPageFactory    = $resultPageFactory;
        $this->_resultForwardFactory = $resultForwardFactory;
        parent::__construct($context);
    }
}