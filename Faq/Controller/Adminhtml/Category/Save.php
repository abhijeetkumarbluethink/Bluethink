<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Controller\Adminhtml\Category;

use Magento\Framework\Exception\LocalizedException;

class Save extends \Magento\Backend\App\Action
{
    /** @var DataPersistorInterface */
    protected $dataPersistor;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor
    ) {
        $this->dataPersistor = $dataPersistor;
        parent::__construct($context);
    }

    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('cat_id');
        
            $model = $this->_objectManager->create(\Bluethink\Faq\Model\Category::class)->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This Faq Category no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            } elseif (!$model->getId() && $id=='') {
                $data['url_key'] = preg_replace('/[^A-Za-z0-9 ]/', '', strtolower(trim($data['category_name'])));
                $data['url_key'] = str_replace(' ', '-', $data['url_key']);
            }
        
            $model->setData($data);
        
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('You saved the Faq Category.'));
                $this->dataPersistor->clear('bluethink_faq_category');
        
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['cat_id' => $model->getId()]);
                }
                return $resultRedirect->setPath('*/*/');
            } catch (LocalizedException $e) {
                $this->messageManager->addErrorMessage($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Faq.'));
            }
        
            $this->dataPersistor->set('bluethink_faq_faq', $data);
            return $resultRedirect->setPath('*/*/edit', ['cat_id' => $this->getRequest()->getParam('cat_id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
