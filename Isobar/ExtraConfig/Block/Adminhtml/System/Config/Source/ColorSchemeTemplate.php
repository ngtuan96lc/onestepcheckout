<?php

namespace Isobar\ExtraConfig\Block\Adminhtml\System\Config\Source;

/**
 * Class ColorSchemeTemplate
 * @package Isobar\ExtraConfig\Block\Adminhtml\System\Config\Source
 */
class ColorSchemeTemplate implements \Magento\Framework\Option\ArrayInterface
{
    const KEY_CUSTOM = 'custom';
    const KEY_LIGHT = 'light';
    const KEY_DARK = 'dark';
    const KEY_BRIGHT_BLUE = 'bright_blue';

    const LABEL_CUSTOM = 'Custom';
    const LABEL_LIGHT = 'Light';
    const LABEL_DARK = 'Dark';
    const LABEL_BRIGHT_BLUE = 'Bright Blue';

    /**
     * @var array
     */
    protected $_options = null;

    /**
     * @inheritDoc
     */
    public function toOptionArray()
    {
        if ($this->_options === null) {
            $this->_options = [
                ['value' => self::KEY_CUSTOM, 'label' => __(self::LABEL_CUSTOM)],
                ['value' => self::KEY_LIGHT, 'label' => __(self::LABEL_LIGHT)],
                ['value' => self::KEY_DARK, 'label' => self::LABEL_DARK],
                ['value' => self::KEY_BRIGHT_BLUE, 'label' => self::LABEL_BRIGHT_BLUE]
            ];
        }
        return $this->_options;
    }
}
