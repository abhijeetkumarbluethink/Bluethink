<?php
namespace Bluethink\Faq\Controller;

use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ActionInterface;
use Bluethink\Faq\Model\Category;
use Bluethink\Faq\Model\Faq;

class Router implements \Magento\Framework\App\RouterInterface
{
    /** @var ActionFactory */
    protected $actionFactory;

     /** @var ResponseInterface */
    protected $_response;

    /**
     * @param \Magento\Framework\App\ActionFactory $actionFactory
     * @param \Magento\Framework\App\ResponseInterface $response
     * @param \Bluethink\Faq\Model\Category $category
     * @param \Bluethink\Faq\Model\Faq $faq
     */
    public function __construct(
        ActionFactory $actionFactory,
        ResponseInterface $response,
        Category $category,
        Faq $faq
    ) {
        $this->actionFactory = $actionFactory;
        $this->_response = $response;
        $this->category = $category;
        $this->faq = $faq;
    }

    /**
     * Redirect Seo Friendly Url
     *
     * @param RequestInterface $request
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');
        $id = '';
        if (strpos($identifier, 'category') !== false) {

            $finalKey = explode('/', $identifier);
            $urlKey = end($finalKey);
            $offerModel = $this->category->load($urlKey, 'url_key');
            if ($offerModel->getId()) {
                $id = $offerModel->getId();
            }
            if ($id) {
                $request->setModuleName('faq')-> //module name
                    setControllerName('view')-> //controller name
                    setActionName('index')-> //action name
                    setParams([
                        'id' => $id
                    ]); //custom parameters
            }
        }
        if (strpos($identifier, 'article') !== false) {

            $finalKey = explode('/', $identifier);
            $urlKey = end($finalKey);
            $offerModel = $this->faq->load($urlKey, 'url_key');
            if ($offerModel->getId()) {
                $id = $offerModel->getId();
            }
            if ($id) {
                $request->setModuleName('faq')-> //module name
                    setControllerName('index')-> //controller name
                    setActionName('article')-> //action name
                    setParams([
                        'id' => $id
                    ]); //custom parameters
            }
        }
        return null;
    }
}
