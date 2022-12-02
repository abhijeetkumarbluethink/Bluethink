<?php

namespace Bluethink\Faq\Block;

use Magento\Framework\View\Element\Template\Context;
use Bluethink\Faq\Model\FaqFactory;
use Bluethink\Faq\Helper\Data;

class Index extends \Magento\Framework\View\Element\Template
{
    /**
     * Construct
     *
     * @param Context $context
     * @param FaqFactory $faqFactory
     * @param Data $helper
     */
    public function __construct(
        Context $context,
        FaqFactory $faqFactory,
        Data $helper
    ) {
        $this->_faqFactory = $faqFactory;
        $this->helper = $helper;
        parent::__construct($context);
    }

    /**
     * Layout
     */
    public function _prepareLayout()
    {
        $this->pageConfig->getTitle()->set(__("FAQ's"));
        return parent::_prepareLayout();
    }

    /**
     * Get Faq
     *
     * @return FaqFactory
     */
    public function getFaq()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $faqFactory = $this->_faqFactory->create();
            $collection = $faqFactory->getCollection()->addFieldToFilter('main_table.status', 1);
            $collection->join(['cat' => 'bluethink_faq_category'], 'cat.cat_id=main_table.cat_id', ['category_name'])
            ->addFieldToFilter('cat.status', ['eq' => 1])
            ->addFieldToFilter('main_table.faq_id', ['eq' => $id]);
            return $collection->getFirstItem();
        }
    }

    /**
     * Get Collection
     *
     * @return FaqFactory
     */
    public function getCatFaqCollection()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $faqFactory = $this->_faqFactory->create();
            $collection = $faqFactory->getCollection()->addFieldToFilter('main_table.status', 1);
            $collection->join(['cat' => 'bluethink_faq_category'], 'cat.cat_id=main_table.cat_id', ['category_name'])
            ->addFieldToFilter('cat.status', ['eq' => 1])
            ->addFieldToFilter('cat.cat_id', ['eq' => $id])
            ->setOrder('cat.cat_id', 'asc');
            return $collection;
        }
    }

    /**
     * Get Collection
     *
     * @return FaqFactory
     */
    public function getFaqCollection()
    {
        $data = [];
        $faqFactory = $this->_faqFactory->create();
        $collection = $faqFactory->getCollection()->addFieldToFilter('main_table.status', 1);
        $collection->join(
            ['cat' => 'bluethink_faq_category'],
            'cat.cat_id=main_table.cat_id',
            ['category_name','url_key as cat_url_key']
        )
        ->addFieldToFilter('cat.status', ['eq' => 1])->setOrder('cat.cat_id', 'asc');
        foreach ($collection as $item):
            $data[$item->getCatId()]['category_name'] = $item->getCategoryName();
            $data[$item->getCatId()]['url'] =
            $this->helper->getSeoUrl('category', $item->getCatId(), $item->getCatUrlKey());
            $data[$item->getCatId()]['question'][$item->getFaqId()]['url'] =
            $this->helper->getSeoUrl('article', $item->getFaqId(), $item->getUrlKey());
            $data[$item->getCatId()]['question'][$item->getFaqId()]['question'] = $item->getQuestion();
        endforeach;
        return $data;
    }
}
