;'use strict';

(function( $ ){

    function init(options) {debugger;}
    function show() {
        $(this).show(); // Открываем окно
        $('.overlay_popup').show(); // Открываем блок заднего фона
    }
    function hide() {
        $(this).hide();
        $('.overlay_popup').hide();
    }
    function update(contebt) {}

    const methods = {
        init,
        show,
        hide,
        update
    };

    $.fn.popup = function (methodOrOptions) {
        if ( methods[methodOrOptions] ) {

            return methods[ methodOrOptions ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        } else if ( typeof methodOrOptions === 'object' || ! methodOrOptions ) {
            // Default to "init"
            return methods.init.apply( this, arguments );
        } else {
            $.error( 'Method ' +  methodOrOptions + ' does not exist on jQuery.tooltip' );
        }
    };


})( jQuery );
