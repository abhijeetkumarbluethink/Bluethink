<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Api\Data;

interface CategorySearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get Category list.
     *
     * @return \Bluethink\Faq\Api\Data\CategoryInterface[]
     */
    public function getItems();

    /**
     * Set question list.
     *
     * @param \Bluethink\Faq\Api\Data\CategoryInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
