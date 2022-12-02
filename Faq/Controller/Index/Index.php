<?php
namespace Bluethink\Faq\Controller\Index;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\App\Request\DataPersistorInterface;
use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Controller\Result\Redirect;

class Index extends \Magento\Framework\App\Action\Action
{
    /** @var PageFactory */
    protected $_pageFactory;

    /** @var ScopeConfigInterface */
    protected $scopeConfig;

    /**
     * @var DataPersistorInterface
     */
    private $dataPersistor;

    /**
     * @param \Magento\Framework\App\Action\Context $context
     * @param \Magento\Framework\View\Result\PageFactory $pageFactory
     * @param \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig
     * @param Redirect $redirect
     */
    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory,
        ScopeConfigInterface $scopeConfig,
        Redirect $redirect
    ) {
        $this->_pageFactory = $pageFactory;
        $this->scopeConfig = $scopeConfig;
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
        $valueFromConfig = $this->scopeConfig->getValue(
            'faqs/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );
        if ($valueFromConfig) {
            return $this->_pageFactory->create();
        } else {
            return $this->redirect->setPath('/');
        }
    }
}
