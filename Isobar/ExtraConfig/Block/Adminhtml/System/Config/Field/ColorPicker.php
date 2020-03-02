<?php

namespace Isobar\ExtraConfig\Block\Adminhtml\System\Config\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class ColorPicker
 * @package Isobar\ExtraConfig\Block\Adminhtml\System\Config\Field
 */
class ColorPicker extends Field
{
    /**
     * @param AbstractElement $element
     * @return string
     */
    public function _getElementHtml(AbstractElement $element)
    {
        $html = $element->getElementHtml();
        $html .= '
            <script type="text/javascript">
                require(
                    [
                        "jquery",
                        "jquery/colorpicker/js/colorpicker"
                    ],
                    function ($) {
                        $(document).ready(function () {
                            let target = $("#' . $element->getHtmlId() . '");
                            target.css("background-color","' . $element->getValue() . '");
                            target.colpick({
                                layout: "hex",
                                submit: 0,
                                colorScheme: "dark",
                                color: "#' . $element->getValue() . '",
                                onChange: function(hsb, hex, rgb, el, bySetColor) {
                                    $(el).css("background-color", "#" + hex);
                                    if(!bySetColor) {
                                        $(el).val("#" + hex);   
                                    }
                                }
                            }).keyup(function(){
                                $(this).colpickSetColor(this.value);
                            });
                        });
                    });
            </script>
        ';
        return $html;
    }
}
