<?php

namespace Isobar\ExtraConfig\Block\Adminhtml\System\Config\Field;

use Magento\Config\Block\System\Config\Form\Field;
use Magento\Framework\Data\Form\Element\AbstractElement;

/**
 * Class ColorSchemeTemplate
 * @package Isobar\ExtraConfig\Block\Adminhtml\System\Config\Field
 */
class ColorSchemeTemplate extends Field
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
                require(["jquery"], function ($) {
                    $(document).ready(function () {
                        let input = $("#isobar_extraconfig_color_setting_color_scheme_template"),
                            ColorTemplateConfig = {
                                                       "custom": {
                                                         "color_text": "#ffffff",
                                                         "color_background": "#ffffff",
                                                         "color_hover": "#ffffff"
                                                       },
                                                       "light":{
                                                          "color_background":"#F4F4F4",
                                                          "color_text":"#363636",
                                                          "color_hover":"#1787E0"
                                                       },
                                                       "dark":{
                                                          "color_background":"#666666",
                                                          "color_text":"#FCFCFC",
                                                          "color_hover":"#1787E0"
                                                       },
                                                       "bright_blue":{
                                                          "color_background":"#232d6a",
                                                          "color_text":"#EAE8F5",
                                                          "color_hover":"#74CBED"
                                                       }
                                                    };
                        input.change(function () {
                            let value = $(this).val();
                            if (ColorTemplateConfig[value]) {
                                $.each(ColorTemplateConfig[value], function(key, val) {
                                    let target = $("#isobar_extraconfig_color_setting_" + key);
                                    if (target.length > 0) {
                                        target.val(val).css({"background-color": val});   
                                    }
                                });
                            }
                        })
                    });
                });
                </script>
        ';
        return $html;
    }
}
