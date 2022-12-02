<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Ui\Component\Listing\Column;

class FaqActions extends \Magento\Ui\Component\Listing\Columns\Column
{
    public const URL_PATH_DETAILS = 'bluethink_faq/faq/details';
    public const URL_PATH_EDIT = 'bluethink_faq/faq/edit';
    public const URL_PATH_DELETE = 'bluethink_faq/faq/delete';

    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * Construcct
     *
     * @param \Magento\Framework\View\Element\UiComponent\ContextInterface $context
     * @param \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory
     * @param \Magento\Framework\UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\UiComponent\ContextInterface $context,
        \Magento\Framework\View\Element\UiComponentFactory $uiComponentFactory,
        \Magento\Framework\UrlInterface $urlBuilder,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item['faq_id'])) {
                    $item[$this->getData('name')] = [
                        'edit' => [
                            'href' => $this->urlBuilder->getUrl(
                                static::URL_PATH_EDIT,
                                [
                                    'faq_id' => $item['faq_id']
                                ]
                            ),
                            'label' => __('Edit')
                        ]
                       
                    ];
                }
            }
        }
        
        return $dataSource;
    }
}
