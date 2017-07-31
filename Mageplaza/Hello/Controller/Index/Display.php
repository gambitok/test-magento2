<?php
namespace Mageplaza\Hello\Controller\Index;

class Display extends \Magento\Framework\App\Action\Action
{
    public function __construct(
        \Magento\Framework\App\Action\Context $context)
    {
        return parent::__construct($context);
    }

    public function execute()
    {
        echo 'Hello World2333';
        exit;
    }
}