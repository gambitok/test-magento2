<?php
namespace Mageplaza\Hello\Block;

class Hello extends \Magento\Framework\View\Element\Template
{
    public function getHello()
    {
        return 'Welcome to the machine';
    }
}