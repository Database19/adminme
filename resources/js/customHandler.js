import $ from 'jquery';

$(function() {
    $('form').on('submit', function(e) {
        var submitButton = $(this).find('button[type="submit"][data-log-request="true"]');
        if (submitButton.length > 0) {
            $(this).append('<input type="hidden" name="log_request" value="true">');
        }
    });
})
