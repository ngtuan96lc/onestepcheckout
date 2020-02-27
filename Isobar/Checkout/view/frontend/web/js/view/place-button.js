define(
    [
        'jquery',
        'uiComponent',
        'uiRegistry',
        'Magento_Checkout/js/model/quote',
        'mage/translate'
    ],
    function (
        $,
        Component,
        registry,
        quote,
        $t
    ) {
        'use strict';

        return Component.extend({
            initObservable: function () {
                this._super().observe({
                    isPlaceOrderActionAllowed: false
                });

              return this;
            },

            placeOrder: function () {

            },

            getLabel: function () {
                return $t(this.label);
            }
        });
    }
);