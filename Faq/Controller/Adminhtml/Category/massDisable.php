<?php
namespace Bluethink\Faq\Controller\Adminhtml\Category;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Ui\Component\MassAction\Filter;
use Bluethink\Faq\Model\ResourceModel\Category\CollectionFactory;

class MassDisable extends Action
{
    /** @var CollectionFactory */
    public $collectionFactory;

    /** @var Filter */
    public $filter;

    /**
     * Construct
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Ui\Component\MassAction\Filter $filter
     * @param \Bluethink\Faq\Model\ResourceModel\Category\CollectionFactory $collectionFactory
     * @param \Bluethink\Faq\Model\CategoryFactory $categoryFactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory,
        \Bluethink\Faq\Model\CategoryFactory $categoryFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        $this->categoryFactory = $categoryFactory;
        parent::__construct($context);
    }

    /**
     * Disable action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $collection = $this->filter->getCollection($this->collectionFactory->create());

            $count = 0;
            foreach ($collection as $model) {
                $model = $this->categoryFactory->create()->load($model->getId());
                $model->setStatus(0);
                $model->save();
                $count++;
            }
            $this->messageManager->addSuccess(
                __('A total of %1 faq category(s) have been change status to Inactive.', $count)
            );
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        return $this->resultFactory->create(ResultFactory::TYPE_REDIRECT)->setPath('*/*/index');
    }
}
