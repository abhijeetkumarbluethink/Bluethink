<?php
namespace Bluethink\Faq\Controller\Index;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Bluethink\Faq\Model\Faq;
use Bluethink\Faq\Model\Category;
use Bluethink\Faq\Helper\Data;

class Article extends \Magento\Framework\App\Action\Action
{
    /** @var PageFactory */
    protected $_pageFactory;
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /** @var Faq */
    protected $_faq;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param Faq $faq
     * @param Redirect $redirect
     * @param Category $category
     * @param Data $helper
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        Faq $faq,
        Redirect $redirect,
        Category $category,
        Data $helper
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_faq = $faq;
        $this->redirect = $redirect;
        $this->category = $category;
        $this->helper = $helper;
        return parent::__construct($context);
    }

    /**
     * Page
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $data = $this->_faq->load($id);
        if ($data->getFaqId()) {
            $catData = $this->category->load($data->getCatId());
            $pagefactory = $this->_pageFactory->create();
            $pagefactory->getConfig()->getTitle()->set('');
            // Add breadcrumb
            /** @var \Magento\Theme\Block\Html\Breadcrumbs */
            $breadcrumbs = $pagefactory->getLayout()->getBlock('breadcrumbs');
            $breadcrumbs->addCrumb('home', [
                'label' => __('Home'),
                'title' => __('Home'),
                'link' => $this->_url->getUrl('')
            ]);
            $breadcrumbs->addCrumb('faq', [
                'label' => __('Faq'),
                'title' => __('Faq'),
                'link' => $this->_url->getUrl('faq')
            ]);
            $breadcrumbs->addCrumb('faq_cat', [
                'label' => __($catData->getCategoryName()),
                'title' => __($catData->getCategoryName()),
                'link' => $this->_url->getUrl(
                    $this->helper->getSeoUrl('category', $catData->getCatId(), $catData->getUrlKey())
                )
            ]);
            $breadcrumbs->addCrumb('article', [
                'label' => __($data->getQuestion()),
                'title' => __($data->getQuestion())
            ]);
            return $pagefactory;
        } else {
            return $this->redirect->setPath('faq');
        }
    }
}
