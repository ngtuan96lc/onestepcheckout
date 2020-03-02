define(
    [
        'ko',
        'jquery',
        'uiComponent',
        'Magento_Checkout/js/action/place-order',
        'uiRegistry',
        'Magento_Checkout/js/model/quote',
        'mage/translate',
        'Magento_Checkout/js/action/redirect-on-success',
        'Magento_Checkout/js/model/payment/additional-validators'
    ],
    function (
        ko,
        $,
        Component,
        placeOrderAction,
        registry,
        quote,
        $t,
        redirectOnSuccessAction,
        additionalValidators
    ) {
        'use strict';

        return Component.extend({
            initObservable: function () {
                this._super().observe({
                    isPlaceOrderActionAllowed: ko.observable(quote.billingAddress() != null),
                });

              return this;
            },

            placeOrder: function (data, event) {
                var self = this;

                if (event) {
                    event.preventDefault();
                }

                if (this.validate() && additionalValidators.validate()) {
                    this.isPlaceOrderActionAllowed(false);

                    this.getPlaceOrderDeferredObject()
                        .fail(
                            function () {
                                self.isPlaceOrderActionAllowed(true);
                            }
                        ).done(
                        function () {
                            self.afterPlaceOrder();

                            if (self.redirectAfterPlaceOrder) {
                                redirectOnSuccessAction.execute();
                            }
                        }
                    );

                    return true;
                }

                return false;
            },

            getPlaceOrderDeferredObject: function () {
                return $.when(
                    placeOrderAction(this.getData(), this.messageContainer)
                );
            },

            getData: function () {
                return {
                    'method': this.item.method,
                    'po_number': null,
                    'additional_data': null
                };
            },

            validate: function () {
                return true;
            },

            getLabel: function () {
                return $t(this.label);
            }
        });
    }
);