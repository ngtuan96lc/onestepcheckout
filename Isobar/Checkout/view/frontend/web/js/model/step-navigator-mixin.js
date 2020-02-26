define(
    [
        'ko',
        'mage/utils/wrapper'
    ],
    function(ko, wrapper) {
        'use strict';

        var mixin = {

        };

        return function (target) {
            return target.extend(mixin);
        }
    }
);