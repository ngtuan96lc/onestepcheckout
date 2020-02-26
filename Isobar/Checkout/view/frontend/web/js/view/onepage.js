define(
    [
        'jquery',
        'underscore',
        'uiComponent',
        'ko',
        'uiRegistry',
        'Magento_Checkout/js/model/quote',
        'Magento_Checkout/js/model/payment/additional-validators',
        'Magento_Checkout/js/action/select-billing-address',
        'Magento_Checkout/js/view/billing-address'
    ],
    function (
        $,
        _,
        Component,
        ko,
        registry,
        quote,
        paymentValidatorRegistry,
        selectBillingAddress,
        billingAddress
    ) {
        'use strict';

        return Component.extend({

            initialize: function () {
                this._super();
            }
        });
    }
);