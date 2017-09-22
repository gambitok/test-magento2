<?php

namespace DmDz\TestProject\Block\Adminhtml\Question\Edit;

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

    /**
     * Init Form
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('question_form');
        $this->setTitle(__('Question'));
    }

    /**
     * Prepare Form
     */
    protected function _prepareForm()
    {
        $model = $this->_coreRegistry->registry('contact_form_question');

        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form',
                'action' => $this->getData('action'),
                'method' => 'post']
            ]
        );

        $form->setHtmlIdPrefix('question_');


        /**
         * Add new form
         */

        $fieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => __('Question Information'),
                'class' => 'fieldset-wide'
            ]
        );

        $hideField = $form->addFieldset(
            'base_replay',
            [
                'legend' => __('Send Replay'),
                'class' => 'fieldset-wide'
            ]
        );


        /**
         * Add new fields to fieldset-form
         */

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

        $selectField = $fieldset->addField(
            'is_answered',
            'select',
            [
               'label' => __('Answer'),
               'title' => __('Answer'),
               'name' => 'is_answered',
               'required' => true,
                'values' => array(
                    array(
                        'value' => 1,
                        'label' => 'Yes',
                    ),
                    array(
                        'value' => 0,
                        'label' => 'No',
                    ),
                )
            ]
        );

        if (!$model->getId()) {
            $model->setData('is_answered', '1');
        }

        $hideField->addField(
            'replay_name',
            'text',
            [
                'name' => 'replay_name',
                'label' => __('Answer Name'),
                'title' => __('Answer Name'),
                'required' => false
            ]
        );

        $hideField->addField(
            'replay_email',
            'text',
            [
                'name' => 'replay_email',
                'label' => __('Answer Email'),
                'title' => __('Answer Email'),
                'required' => false
            ]
        );

        $hideField->addField(
            'replay_comment',
            'editor',
            [
                'name' => 'replay_comment',
                'label' => __('Answer Comment'),
                'title' => __('Answer Comment'),
                'style' => 'height:18em',
                'required' => false,
            ]
        );

        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}