/*
 * jQuery dataURL Plugin 
 * 
 * Copyright (c) 2015 Kushal Jayswal <kushal@about.me>
 * Dual licensed under the MIT or GPL Version 2 licenses or later.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 */

(function ($) {
    $.fn.dataURL = function () {

        // variables
        var el = $(this);
        var aTag = el.find('a');
        var aHref;
        var aTarget;

        // get & set attributes
        aTag.each(function () {
			var parentTag = $(this).parent().parent().parent();
            var aHref = $(this).attr('href');
            parentTag.attr('data-href', this);

            aTarget = $(this).attr('target');
            parentTag.attr('data-target', aTarget);
        });

        // imitation - default attributes' behavior on "data-" attributes
        $(el).delegate('[data-href]', 'click', function () {
            var loc = window.location.href;
            loc = $(this).attr("data-href");
            aTarget = $(this).attr('data-target');

            if (aTarget == "_blank") {
                window.open(loc);
            } else {
                window.location = loc;
            }

            return false;
        });

        //removing attributes from selector itself
        el.removeAttr('data-href');
        el.removeAttr('data-target');

        // css
        $('[data-href]').css('cursor', 'pointer');
    };
}(jQuery));