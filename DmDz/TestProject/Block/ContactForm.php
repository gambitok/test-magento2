<?php
namespace DmDz\TestProject\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use DmDz\TestProject\Helper\ContactForm as ContactFormHelper;

class ContactForm extends Template
{

    protected $contactFormHelper;

    public function __construct(Context $context, ContactFormHelper $contactFormHelper, array $data)
    {
        parent::__construct($context, $data);
        $this->contactFormHelper = $contactFormHelper;
    }

    public function getSubmitUrl()
    {
        return $this->contactFormHelper->getSubmitUrl();
    }
}