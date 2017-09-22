<?php
namespace DmDz\TestProject\Helper;

use Magento\Framework\App\Helper\AbstractHelper;

class ContactForm extends AbstractHelper
{

    public function getSubmitUrl()
    {
        return $this->_getUrl('contactform/index/post');
    }
}