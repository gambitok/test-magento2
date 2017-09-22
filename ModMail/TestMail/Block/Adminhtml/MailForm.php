<?php

namespace ModMail\TestMail\Block\Adminhtml;

use Magento\Backend\Block\Template\Context;
use Magento\Backend\Block\Widget\Form\Generic;
use Magento\Framework\Data\FormFactory;
use Magento\Framework\Registry;
use Magento\Store\Model\System\Store;

class Form extends Generic
{

    protected $_systemStore;

    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Store $systemStore,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    protected function _construct()
    {
        parent::_construct();
        $this->setId('question_form');
        $this->setTitle(__('Question'));
    }

    protected function _prepareForm()
    {
        /** @var \DmDz\TestProject\Model\Question $model */
        $model = $this->_coreRegistry->registry('contact_form_question');

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );

        $form->setHtmlIdPrefix('question_');

        $fieldset = $form->addFieldset(
            'base_fieldset',
            ['legend' => __('Question Information'), 'class' => 'fieldset-wide']
        );

        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'email',
            'text',
            [
                'name' => 'email',
                'label' => __('Email'),
                'title' => __('Email'),
                'required' => true,
                'readonly' => true,
                'class' => 'validate-email'
            ]
        );

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'readonly' => true,
                'required' => true
            ]
        );

        $fieldset->addField(
            'telephone',
            'text',
            [
                'telephone' => 'telephone',
                'label' => __('Phone'),
                'title' => __('Phone'),
                'readonly' => true,
                'required' => true
            ]
        );

        $fieldset->addField(
            'comment',
            'editor',
            [
                'name' => 'comment',
                'label' => __('Question'),
                'title' => __('Question'),
                'style' => 'height:15em',
                'readonly' => true,
                'required' => true
            ]
        );

        $fieldset->addField(
            'is_answered',
            'select',
            [
                'label' => __('Answer'),
                'title' => __('Answer'),
                'name' => 'is_answered',
                'required' => true,
                'options' => ['1' => __('Yes'), '0' => __('No')]
            ]
        );

        $fieldset->addField(
            'a-comment',
            'editor',
            [
                'name' => 'a-comment',
                'label' => __('A-Comment'),
                'title' => __('A-Comment'),
                'style' => 'height:15em',
                'required' => true
            ]
        );

        if (!$model->getId()) {
            $model->setData('is_answered', '1');
        }

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}