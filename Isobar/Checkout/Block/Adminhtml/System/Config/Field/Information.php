<?php

namespace Isobar\Checkout\Block\Adminhtml\System\Config\Field;

use Magento\Config\Block\System\Config\Form\Fieldset;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class Information
 * @package Isobar\Checkout\Block\Adminhtml\System\Config\Field
 */
class Information extends Fieldset
{
    /**
     * @var string
     */
    private $content;

    /**
     * @param AbstractElement $element
     * @return string
     */
    public function render(AbstractElement $element)
    {
        $html = $this->_getHeaderHtml($element);
        if (!$this->content) {
            $this->content = "One Step Checkout version 1.0.0 by Nguyen Hoang Tuan";
        }
        $html .= $this->content;
        $html .= $this->_getFooterHtml($element);
        return $html;
    }
}
