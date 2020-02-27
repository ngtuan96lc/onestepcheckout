define(
    [
        'ko',
        'mage/utils/wrapper'
    ],
    function(ko, wrapper) {
        'use strict';

        return function (stepNavigator) {
            /**
             * Override fn setHash, dont add #shipping or #payment into url
             */
            stepNavigator.setHash = wrapper.wrapSuper(stepNavigator.setHash, function (hash) {
                hash = '';
                this._super(hash);
            });

            /**
             * Override fn registerStep, set isVisible = isActive = true,
             * because In Onestepcheckout all steps should be visible
             * @type {Function|(function(...[*]=))}
             */
            stepNavigator.registerStep = wrapper.wrapSuper(stepNavigator.registerStep,
                function (code, alias, title, isVisible, navigate, sortOrder) {
                let isActive = ko.observable(isVisible());
                this._super(code, alias, title, isActive, navigate, sortOrder);
            });

            return stepNavigator;
        }

    }
);