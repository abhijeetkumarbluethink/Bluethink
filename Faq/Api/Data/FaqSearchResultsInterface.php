<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Api\Data;

interface FaqSearchResultsInterface extends \Magento\Framework\Api\SearchResultsInterface
{
    /**
     * Get Faq list.
     *
     * @return \Bluethink\Faq\Api\Data\FaqInterface[]
     */
    public function getItems();

    /**
     * Set question list.
     *
     * @param \Bluethink\Faq\Api\Data\FaqInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
