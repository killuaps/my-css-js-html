$(document).ready(function () {
    //setup contact form overlay here
    var overlay = $('<div id="overlay"/>');
    overlay.css('width', '100%');
    overlay.css('height', $('body').height());
    overlay.css('background-color', 'black');
    overlay.css('opacity', '0.5');
    overlay.css('position', 'absolute');
    overlay.css('z-index', '9998');
    overlay.css('top', '0');

    $('body').append(overlay);
    var contactFormWrapper = $('#contact-form-wrapper');
    contactFormWrapper.hide();
    var top = $(window).height() / 2 - contactFormWrapper.outerHeight() / 2;
    var left = $(window).width() / 2 - contactFormWrapper.outerWidth() / 2;
    contactFormWrapper.css('top', top);
    contactFormWrapper.css('left', left);
    contactFormWrapper.hide();
    overlay.hide();

    var sidebarWidth = parseFloat($('#sidebar').outerWidth());
    var contentHeight = parseFloat($('#content').height());
   
    $('#contact').click(function () {
        contactFormWrapper.show();
        overlay.show();
        return false;
    });

    $('#close').click(function () {
        contactFormWrapper.hide();
        overlay.hide();
        return false;
    });
    //setup countdown here
    $('#count-down').county({ endDateTime: new Date('2014/12/27 10:00:00'), reflection: false, animation: 'scroll', theme: 'blue', calculateWidth: false });
    $('.county-label-days').before('<p class="coming-soon-text">Launching soon...</p>');
    $('.county-label-days,.county-label-hours,.county-label-minutes,.county-label-seconds').remove();
    //setup email here
    $('#button-send').click(function (event) {
        $('#button-send').html('Sending E-Mail...');
        event.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'send_form_email.php',
            data: $('#contact_form').serialize(),
            success: function (html) {
                if (html.success == '1') {
                    $('#button-send').html('Send E-Mail');
                    $('#success').show();
                }
                else {
                    $('#button-send').html('Send E-Mail');
                    $('#error').show();
                }
            },
            error: function () {
                $('#button-send').html('Send E-Mail');
                $('#error').show();
            }
        });
    });
});

function valemail(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}