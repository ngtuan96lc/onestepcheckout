<?php

namespace Isobar\Checkout\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Data
 * @package Isobar\Checkout\Helper
 */
class Data
{
    const ISOBAR_GENERAL_ENABLED = "isobar_checkout/general/enabled";
    const ISOBAR_GENERAL_TITLE = "isobar_checkout/general/title";
    const ISOBAR_GENERAL_DESCRIPTION = "isobar_checkout/general/description";

    /**
     * @var ScopeConfigInterface
     */
    protected $scopeConfig;

    /**
     * Data constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return bool
     */
    public function isEnabled()
    {
        return (bool)$this->scopeConfig->getValue(self::ISOBAR_GENERAL_ENABLED);
    }

    /**
     * @return mixed
     */
    public function getCheckoutTitle()
    {
        return $this->scopeConfig->getValue(self::ISOBAR_GENERAL_TITLE);
    }

    /**
     * @return mixed
     */
    public function getCheckoutDescription()
    {
        return $this->scopeConfig->getValue(self::ISOBAR_GENERAL_DESCRIPTION);
    }
}
