jQuery(document).ready( function ( $ ) {

    var container = $( '#hestia-page-settings' );

    $.metaRadio = {

        /**
         * Init function
         */
        'init': function () {
            this.buttonSet();
            this.resetControl();
            this.handleClick();
        },

        /**
         * If elementor is installed, when clicked on a meta, it took you at the beginning of page.
         * This fixes the issue.
         */
        'handleClick': function () {
            container.find('.ui-button').on( 'click', function () {
                var forLabel = $(this).attr('for');
                var options = forLabel.split( '-' );
                var controlName = options[0];
                var controlValue = options[1];
                if( options.length > 1){
                    for( var i = 2; i < options.length; i++) {
                        controlValue += '-'+options[i];
                    }
                }
                $('input[name="'+controlName+'"][value="'+controlValue+'"]').prop('checked', true);
                $(this).siblings( '.reset-data-wrapper').children('.reset-data').removeClass('disabled');
                return false;
            });
        },

        /**
         * Buttonset init
         */
        'buttonSet': function () {
            container.find('.buttonset').buttonset();
        },

        /**
         * Reset Control to default state
         */
        'resetControl': function () {
            $( '.reset-data' ).on('click', function () {
                var resetButton = $(this);
                var controlId = $( this ).data('id');
                resetButton.addClass('disabled');
                resetButton.parent().parent().find('label').removeClass('ui-state-active');
                $('input[name='+controlId+']').prop('checked', false);
            });
        }
    };

    $.metaRadio.init();

});