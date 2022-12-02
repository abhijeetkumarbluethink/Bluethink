<?php
 
namespace Bluethink\Faq\Block;

use Magento\Framework\View\Element\Template\Context;
use Bluethink\Faq\Helper\Data;
 
class Link extends \Magento\Framework\View\Element\Html\Link
{
    /**
     * Construct
     *
     * @param Context $context
     * @param Data $helper
     */
    public function __construct(
        Context $context,
        Data $helper
    ) {
        $this->helper = $helper;
        parent::__construct($context);
    }
    
    /**
     * Render block HTML.
     *
     * @return string
     */
    protected function _toHtml()
    {
        if (false != $this->getTemplate()) {
            return parent::_toHtml();
        }
        if (!$this->helper->getEnabledFaq()) {
            return '';
        }
        return '<li class="level0 nav-6 category-item last level-top">
        <a ' . $this->getLinkAttributes() . ' >' . $this->escapeHtml($this->getLabel()) . '</a></li>';
    }
}
