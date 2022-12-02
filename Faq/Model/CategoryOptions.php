<?php

namespace Bluethink\Faq\Model;

use Magento\Framework\Data\OptionSourceInterface;
use Bluethink\Faq\Model\CategoryFactory;

class CategoryOptions implements OptionSourceInterface
{
    /**
     * Construct
     *
     * @param CategoryFactory $categoryFactory
     */
    public function __construct(
        CategoryFactory $categoryFactory
    ) {
        $this->categoryFactory = $categoryFactory;
    }
    /**
     * Get Grid row status type labels array.
     *
     * @return array
     */
    public function getOptionArray()
    {
        $options[''] = 'Select';
        $model = $this->categoryFactory->create()->getCollection()->addFieldToFilter('status', 1)->getData();
        foreach ($model as $item):
            $options[$item['cat_id']] = $item['category_name'];
        endforeach;
        return $options;
    }

    /**
     * Get Grid row status labels array with empty value for option element.
     *
     * @return array
     */
    public function getAllOptions()
    {
        $res = $this->getOptions();
        array_unshift($res, ['value' => '', 'label' => '']);
        return $res;
    }

    /**
     * Get Grid row type array for option element.
     *
     * @return array
     */
    public function getOptions()
    {
        $res = [];
        foreach ($this->getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * @inheritdoc
     */
    public function toOptionArray()
    {
        return $this->getOptions();
    }
}
