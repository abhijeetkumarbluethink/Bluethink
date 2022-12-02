<?php
 
namespace Bluethink\Faq\Block;

use Magento\Framework\View\Element\Template\Context;
use Bluethink\Faq\Helper\Data;
 
class Linkfaq extends \Magento\Framework\View\Element\Html\Link
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
        return parent::_toHtml();
    }
}
