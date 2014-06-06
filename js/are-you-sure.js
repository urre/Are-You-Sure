/**
 * Are you Sure?
 * Javascript code
 * by Urban Sanden, @urre
 */

(function($) {

    "use strict";

    var AreYouSure = {

        init: function () {

            // Only of if we haven't published yet, don't do anything on Update post/page
            if($('#publish').val() == prefix_object_name.publish) {

                $('#publish').click(function() {
                    if(confirm(prefix_object_name.confirmationtext)) {
                        return true;
                    } else {
                        $('#publishing-action .spinner').hide();
                        $(this).removeClass('button-primary-disabled');
                        return false;
                    }
                });

            }

        },

    };

    $(function() {

        AreYouSure.init();

    });


}(jQuery));