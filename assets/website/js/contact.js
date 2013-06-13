function sendemail(el, SendTo, Subject, NameErr, EmailErr, MessageErr, SuccessErr, UnsuccessErr) {

    //Custom variables
    var sendTo = SendTo; //send the form elements to this email (company email)
    var subject = Subject; //subject of the email
    var nameErr = NameErr; //Error message when Name field is empty
    var emailErr = EmailErr; //Error message when Email field is empty or email is not valid
    var messageErr = MessageErr; //Error message when Message field is empty
    var successErr = SuccessErr; //Message when the email was sent successfully
    var unsuccessErr = UnsuccessErr; //Message when the email was not sent

    el = el.parents('.contact-form');

    //Reset field errors/variables
    el.find('.yourname').removeClass("with_error").removeClass("change_error");
    el.find('.youremail').removeClass("with_error").removeClass("change_error");
    el.find('.yourmessage').removeClass("with_error").removeClass("change_error");
    var templatepath = $("#templatepath").html();
    var err = 0;

    // Check fields
    var name = el.find('.yourname_val').html();
    var email = el.find('.youremail_val').html();
    var emailVer = validate_email(email);
    var message = el.find('.yourmessage_val').html();


    if (!name || name.length == 0 || name == nameErr) {
        el.find('.yourname').addClass("with_error");
        el.find('.yourname').val(nameErr);
        err = 1;
    }
    if (!email || email.length == 0 || emailVer == 0) {
        el.find('.youremail').addClass("with_error");
        el.find('.youremail').val(emailErr);
        err = 1;
    }
    if (!message || message.length == 0 || message == messageErr) {
        el.find('.yourmessage').addClass("with_error");
        el.find('.yourmessage').val(messageErr);
        err = 1;
    }

    //alert(err)

    //If there's no error submit form
    if (err == 0) {
        // Request
        var data = {
            name: name,
            email: email,
            sendTo: sendTo,
            subject: subject,
            message: message,
            success: successErr,
            unsuccess: unsuccessErr
        };

        // Send
        /*$.ajax({
         //url: "js/sendemail.php",
         url: urlSendEmail,
         dataType: 'json',
         type: 'POST',
         data: data,
         success: function(data, textStatus, XMLHttpRequest)
         {
         alert(data.response);
         if (data.response.error)
         {
         if(data.response.error == 1){
         el.find('.message_success').css('background','#64943c');
         el.find('.message_success').css('display','block');
         el.find('.message_success').html(data.response.message);
         }
         else{
         el.find('.message_success').css('background','#C35D5D');
         el.find('.message_success').css('display','block');
         el.find('.message_success').html(data.response.message);
         }
         }
         else
         {
         // Message
         el.find('.message_success').css('background','#C35D5D');
         el.find('.message_success').css('display','block');
         el.find('.message_success').html("An unexpected error occured, please try again.");
         }
         },
         error: function(XMLHttpRequest, textStatus, errorThrown)
         {
         alert("error");
         // Message
         el.find('.message_success').css('background','#C35D5D');
         el.find('.message_success').css('display','block');
         el.find('.message_success').html("Error while contacting server, please try again.");
         }
         });*/
        $.post(urlSendEmail, data,
            function (data) {
                if (data != 'send fail') {
                    el.find('.message_success').css('background', '#64943c');
                    el.find('.message_success').css('display', 'block');
                    el.find('.message_success').html(data);
                    document.getElementById('name').value = "";
                    document.getElementById('email').value = "";
                    document.getElementById('message').value = "";
                }
                else {
                    // Message
                    el.find('.message_success').css('background', '#C35D5D');
                    el.find('.message_success').css('display', 'block');
                    el.find('.message_success').html("An unexpected error occured, please try again.");
                }
            }
        ).fail(function () { // Message
                el.find('.message_success').css('background', '#C35D5D');
                el.find('.message_success').css('display', 'block');
                el.find('.message_success').html("Error while contacting server, please try again.");
            });

        // Message
        el.find('.message_success').css('background', '#64943c');
        el.find('.message_success').css('display', 'block');
        el.find('.message_success').html("Sending...");
    }

}

function checkerror(elem) {
    if ($(elem).hasClass('with_error')) {
        $(elem).removeClass('with_error').addClass('change_error');
        $(elem).val("");
    }
}

function validate_email(email) {
    var reg = /^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i;
    if (reg.test(email) == false) {
        return 0;
    } else {
        return 1;
    }
}
