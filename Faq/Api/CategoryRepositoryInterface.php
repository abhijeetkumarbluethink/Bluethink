<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Api;

use Magento\Framework\Api\SearchCriteriaInterface;

interface CategoryRepositoryInterface
{
    /**
     * Save Faq Category
     *
     * @param \Bluethink\Faq\Api\Data\CategoryInterface $category
     * @return \Bluethink\Faq\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(
        \Bluethink\Faq\Api\Data\CategoryInterface $category
    );

    /**
     * Retrieve Faq Category
     *
     * @param string $catId
     * @return \Bluethink\Faq\Api\Data\CategoryInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function get($catId);

    /**
     * Retrieve Faq Category matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Bluethink\Faq\Api\Data\CategorySearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
    );

    /**
     * Delete Faq Category
     *
     * @param \Bluethink\Faq\Api\Data\CategoryInterface $category
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(
        \Bluethink\Faq\Api\Data\CategoryInterface $category
    );

    /**
     * Delete Category by ID
     *
     * @param string $catId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($catId);
}
