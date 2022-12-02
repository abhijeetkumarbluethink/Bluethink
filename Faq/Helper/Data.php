<?php

namespace Bluethink\Faq\Helper;

use \Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{
    /**
     * Set seo url
     *
     * @param string $type
     * @param int $id
     * @param string $url
     */
    public function getSeoUrl($type, $id, $url)
    {
        $valueFromConfig = $this->scopeConfig->getValue(
            'faqs/general/seourl',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );
        if ($type=='article') {
            if ($valueFromConfig) {
                return 'faq/article/'.$url;
            }
            return 'faq/index/article/id/'.$id;
        }
        if ($type=='category') {
            if ($valueFromConfig) {
                return 'faq/category/'.$url;
            }
            return 'faq/view/index/id/'.$id;
        }
    }

    /**
     * Check faq module is enabled
     */
    public function getEnabledFaq()
    {
        return $valueFromConfig = $this->scopeConfig->getValue(
            'faqs/general/enable',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE,
        );
    }
}
