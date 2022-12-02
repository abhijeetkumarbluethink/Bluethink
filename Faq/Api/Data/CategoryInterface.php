<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Api\Data;

interface CategoryInterface
{
    public const CATEGORY_NAME = 'category_name';
    public const STATUS = 'status';
    public const UPDATED_AT = 'updated_at';
    public const CREATED_AT = 'created_at';
    public const CAT_ID = 'cat_id';
    public const URL_KEY = 'url_key';

    /**
     * Get cat_id
     *
     * @return string|null
     */
    public function getCatId();

    /**
     * Set cat_id
     *
     * @param string $catId
     * @return \Bluethink\Faq\Faq\Api\Data\CategoryInterface
     */
    public function setCatId($catId);

    /**
     * Get category name
     *
     * @return string|null
     */
    public function getCategoryName();

    /**
     * Set category name
     *
     * @param string $categoryName
     * @return \Bluethink\Faq\Faq\Api\Data\CategoryInterface
     */
    public function setCategoryName($categoryName);

    /**
     * Get Url Key
     *
     * @return string|null
     */
    public function getUrlKey();

    /**
     * Set Url Key
     *
     * @param string $urKey
     * @return \Bluethink\Faq\Faq\Api\Data\CategoryInterface
     */
    public function setUrlKey($urKey);

    /**
     * Get status
     *
     * @return string|null
     */
    public function getStatus();

    /**
     * Set status
     *
     * @param string $status
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setStatus($status);

    /**
     * Get created_at
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Set created_at
     *
     * @param string $createdAt
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setCreatedAt($createdAt);

    /**
     * Get updated_at
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set updated_at
     *
     * @param string $updatedAt
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setUpdatedAt($updatedAt);
}
