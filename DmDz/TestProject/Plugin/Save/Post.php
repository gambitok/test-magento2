<?php

namespace DmDz\TestProject\Plugin\Save;

use Magento\Framework\App\Request\Http;
use Magento\Framework\ObjectManagerInterface;

class Post
{
    protected $request;

    protected $objectManager;

    public function __construct(
        Http $request,
        ObjectManagerInterface $objectManager
    ) {
        $this->request = $request;
        $this->objectManager = $objectManager;
    }

    public function afterExecute()
    {
        $post = $this->request->getPostValue();
        if (!$post) {
            return;
        }
        $model = $this->objectManager->create('DmDz\TestProject\Model\Question');
        $model->setName($post['name']);
        $model->setEmail($post['email']);
        $model->setTelephone($post['telephone']);
        $model->setComment($post['comment']);
        $model->save();
    }
}
