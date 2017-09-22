<?php

namespace DmDz\TestProject\Block\Adminhtml;

class Question extends \Magento\Backend\Block\Widget\Grid\Container
{
      /**
       * Initialize object
       *
       */
    protected function _construct()
    {
        $this->_blockGroup = 'DmDz_TestProject';
        $this->_controller = 'adminhtml_contactform';
        $this->_headerText = __('Items');
        parent::_construct();
    }
}