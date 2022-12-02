<?php
namespace Bluethink\Faq\Controller\View;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\Controller\Result\Redirect;
use Bluethink\Faq\Model\Category;

class Index extends \Magento\Framework\App\Action\Action
{
    /** @var PageFactory */
    protected $_pageFactory;
    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /** @var Category */
    protected $_categoryFactory;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param Category $categoryFactory
     * @param Redirect $redirect
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        Category $categoryFactory,
        Redirect $redirect
    ) {
        $this->_pageFactory = $pageFactory;
        $this->_categoryFactory = $categoryFactory;
        $this->redirect = $redirect;
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
        $catFactory = $this->_categoryFactory->load($id);
        if ($catFactory->getCategoryName()) {
            $pagefactory = $this->_pageFactory->create();
            $pagefactory->getConfig()->getTitle()->set($catFactory->getCategoryName());

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
                'label' => __($catFactory->getCategoryName()),
                'title' => __($catFactory->getCategoryName())
            ]);
            return $pagefactory;
            
        } else {
            return $this->redirect->setPath('faq');
        }
    }
}
