$(document).ready(function(){
    $('#contactform').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'http://e-shopper.ua/sendmail',
            data: $('#contactform').serialize(),
            success: function(data) {
                if (data.result) {
                    $('#senderror').hide();
                    $('#sendmessage').show();
                } else {
                    $('#senderror').show();
                    $('#sendmessage').hide();
                }
            }
        });
    });
});