<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Model\ResourceModel\Category;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{

    /**
     * @var $_idFieldName
     */
    protected $_idFieldName = 'cat_id';

    /**
     * @inheritDoc
     */
    protected function _construct()
    {
        $this->_init(
            \Bluethink\Faq\Model\Category::class,
            \Bluethink\Faq\Model\ResourceModel\Category::class
        );
    }
}
