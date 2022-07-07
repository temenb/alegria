;'use strict';
;'refactor me';

$(document).ready(
    () => $(document).on('click', '.calendar', () => {
        console.log('click')
        const $popup = $('#popup1');
        $popup.popup('show');
    })
);

