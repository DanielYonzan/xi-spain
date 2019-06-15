$(function() {

    $("input,textarea").jqBootstrapValidation({

        preventSubmit: true,

        submitError: function($form, event, errors) {

            // additional error messages or events

        },

        submitSuccess: function($form, event) {

            event.preventDefault(); // prevent default submit behaviour

            // get values from FORM
            //ternary operator
            var contact = ($($form.context).attr("id") == "contactForm") ? true : false;

            var name = "";
            var email = "";
            var phone = "";
            var message = "";
            var companyname = "";
            var address = "";
            var country = "";

            if(contact){
                name = $("input#name2").val();
                email = $("input#email2").val();
                phone = $("input#phone2").val();
                message = $("textarea#message2").val();
            }else{
                name = $("input#name").val();
                email = $("input#email").val();
                phone = $("input#phone").val();
                message = $("textarea#message").val();
                companyname = $("input#companyname").val();
                address = $("input#address").val();
                country = $("select#country").val();
            }

            var firstName = name; // For Success/Failure Message

            // Check for white space in name for Success/Fail message

            if (firstName.indexOf(' ') >= 0) {

                firstName = name.split(' ').slice(0, -1).join(' ');

            }

            // we need a FormData object for files like the CV!
            var formdata = new FormData();
            formdata.append("name", name);
            formdata.append("phone", phone);
            formdata.append("email", email);
            formdata.append("message", message);
            if(!contact){
                formdata.append("companyname", companyname);
                formdata.append("address", address);
                formdata.append("country", country);
                jQuery.each(jQuery('#cv')[0].files, function(i, file) {
                    formdata.append('cv', file);
                });
            }

            $.ajax({

                url: "/contact_me.php",

                type: "POST",

                // FormData file will get corrupted if not set / jquery will crash!
                contentType: false,
                processData: false,

                data: {'_method':'post','_token':'<?php echo csrf_token() ?>'+formdata},

                cache: false,

                success: function() {

                    // Success message

                    $('#success').html("<div class='alert alert-success'>");

                    $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")

                        .append("</button>");

                    $('#success > .alert-success')

                        .append("<strong>Your message has been sent. </strong>");

                    $('#success > .alert-success')

                        .append('</div>');



                    //clear all fields

                    $('#contactForm, #partnerinfo').trigger("reset");

                },

                error: function() {

                    // Fail message

                    $('#success').html("<div class='alert alert-danger'>");

                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")

                        .append("</button>");

                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that my mail server is not responding. Please try again later!");

                    $('#success > .alert-danger').append('</div>');

                    //clear all fields

                    $('#contactForm, #partnerinfo').trigger("reset");

                },

            })

        },

        filter: function() {

            return $(this).is(":visible");

        },

    });



    $("a[data-toggle=\"tab\"]").click(function(e) {

        e.preventDefault();

        $(this).tab("show");

    });

});





/*When clicking on Full hide fail/success boxes */

$('#name').focus(function() {

    $('#success').html('');

});

