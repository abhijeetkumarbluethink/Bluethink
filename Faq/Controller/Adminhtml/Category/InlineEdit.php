<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Controller\Adminhtml\Category;

class InlineEdit extends \Magento\Backend\App\Action
{
    /** @var JsonFactory */
    protected $jsonFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Controller\Result\JsonFactory $jsonFactory
    ) {
        parent::__construct($context);
        $this->jsonFactory = $jsonFactory;
    }

    /**
     * Inline edit action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->jsonFactory->create();
        $error = false;
        $messages = [];
        
        if ($this->getRequest()->getParam('isAjax')) {
            $postItems = $this->getRequest()->getParam('items', []);
            if (!count($postItems)) {
                $messages[] = __('Please correct the data sent.');
                $error = true;
            } else {
                foreach (array_keys($postItems) as $modelid) {
                    /** @var \Bluethink\Faq\Model\Category $model */
                    $model = $this->_objectManager->create(\Bluethink\Faq\Model\Category::class)->load($modelid);
                    try {
                        $this->setPageData($model, $postItems[$modelid]);
                        $model->save();
                    } catch (\Exception $e) {
                        $messages[] = "[Faq Category ID: {$modelid}]  {$e->getMessage()}";
                        $error = true;
                    }
                }
            }
        }

        return $resultJson->setData([
            'messages' => $messages,
            'error' => $error
        ]);
    }

    /**
     * Set Category page data
     *
     * @param \Bluethink\Faq\Model\Category $model
     * @param array $postData
     * @return $this
     */
    public function setPageData(\Bluethink\Faq\Model\Category $model, array $postData)
    {
        $model->setData(array_merge($model->getData(), $postData));
        return $this;
    }
}
