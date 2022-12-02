<?php
/**
 * Copyright © copyright@bluethink All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Bluethink\Faq\Api\Data;

interface FaqInterface
{
    public const QUESTION = 'question';
    public const STATUS = 'status';
    public const UPDATED_AT = 'updated_at';
    public const ANSWER = 'answer';
    public const CREATED_AT = 'created_at';
    public const FAQ_ID = 'faq_id';
    public const CAT_ID = 'cat_id';
    public const URL_KEY = 'url_key';

    /**
     * Get faq_id
     *
     * @return string|null
     */
    public function getFaqId();

    /**
     * Set faq_id
     *
     * @param string $faqId
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setFaqId($faqId);

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
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setCatId($catId);

    /**
     * Get question
     *
     * @return string|null
     */
    public function getQuestion();

    /**
     * Set question
     *
     * @param string $question
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setQuestion($question);

    /**
     * Get answer
     *
     * @return string|null
     */
    public function getAnswer();

    /**
     * Set answer
     *
     * @param string $answer
     * @return \Bluethink\Faq\Faq\Api\Data\FaqInterface
     */
    public function setAnswer($answer);

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
