<?php
namespace DmDz\TestProject\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;

class PostActions extends Column
{
    const BLOG_URL_PATH_EDIT = 'contactform/question/edit';
    const BLOG_URL_PATH_DELETE = 'contactform/question/delete';

    protected $urlBuilder;

   // private $editUrl;

    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
       // $editUrl = self::BLOG_URL_PATH_EDIT
    ) {
        $this->urlBuilder = $urlBuilder;
      //  $this->editUrl = $editUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item['id'])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl(self::BLOG_URL_PATH_EDIT, ['id' => $item['id']]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::BLOG_URL_PATH_DELETE, ['id' => $item['id']]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.id }"'),
                            'message' => __('Are you sure you wan\'t to delete a "${ $.$data.id }" record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}