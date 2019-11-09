
define([
    "jquery",
    "jquery/jquery.cookie"
], function($) {
    "use strict";

    $.widget('mikielis.cookie', {
        _create: function() {
            var params = this.options;
            console.log(params);

            /**
             * Click event on accept cookies button
             */
            $(params.acceptButton).click(function() {
                var now = new Date().getTime(),
                    expiryDate = now + (params.cookieLifetime * 1000);
                $.cookie(params.cookieName, 1, {path: '/', expires: expiryDate});
                $(params.container).hide('slow');
            });

            /**
             * Click event on read more button
             */
            $(params.readMoreButton).click(function() {
                if (params.readMoreButtonBehaviour == 'openPage') {
                    window.document.location.href = params.readMoreButtonPage;
                } else if (params.readMoreButtonBehaviour == 'openPopup') {
                    $.ajax({
                        showLoader: true,
                        url: '/mikielisCookie/block/block',
                        data: {block: params.readMoreButtonBlock},
                        type: 'POST',
                        dataType: 'json'
                    }).done(function (data) {
                        if (data.block) {
                            $('#' + params.blockContent).html(data.block).show();
                        }
                    });
                }
            });

            /**
             * Close button, click event
             */
            $(params.closeButton).click(function() {
               /** Allow cookie and close information - an equals functionality to allow button */
               if (params.closeButtonBehaviour == 'allowAndClose') {
                   $(params.acceptButton).trigger('click');
               /** Only hide div with cookie compliance content */
               } else if (params.closeButtonBehaviour == 'close') {
                   $(params.container).hide('slow');
               }
            });

            /**
             * Approve button, hover event
             */
            $(params.acceptButton).hover(function() {
                $(this).css({'color': '#' + params.acceptButtonHoverColor, 'background': '#' + params.acceptButtonHoverBackground});
            }, function() {
                $(this).css({'color': '#' + params.acceptButtonColor, 'background': '#' + params.acceptButtonBackground});
            });

            /**
             * Read more button, hover event
             */
            $(params.readMoreButton).hover(function() {
                $(this).css({'color': '#' + params.readMoreButtonHoverColor, 'background': '#' + params.readMoreButtonHoverBackground});
            }, function() {
                $(this).css({'color': '#' + params.readMoreButtonColor, 'background': '#' + params.readMoreButtonBackground});
            });

            /**
             * Show container when cookie doesn't exist
             */
            if ($.cookie(params.cookieName) != 1) {
                $(this.options.container).show('slow');
            }
        },
    });

    return $.mikielis.cookie;
});
