$(function(){
  $('.input-group input').focusout(function(){
    var text_val = $(this).val();
    if(text_val === "") {
      $(this).removeClass('has-value');
    } else {
      $(this).addClass('has-value');
    }
  });
});

 $("#ajax-contact").validate({
  //rules
  rules: {
        firstname: "required",
        lastname: "required",
        email: {
          required: true,
          email: true
        },
        mobile: {
                minlength: 10,
                maxlength: 10,
                required: true,
                digits: true
            },
         resume: {
      		required: true
    		}
      },
       messages: {
            firstname: "Please enter your firstname",
            lastname: "Please enter your lastname",
            email: {
                required: "We need your email address to contact you",
                email: "Your email address must be in the format of name@domain.com"
            },
            mobile: {
                required: "Please enter your mobile",
                minlength: "Please enter 10 digit phone number",
                maxlength: "Please enter 10 digit phone number"
            },
            resume: "Please attach messages"
        },
        errorLabelContainer: "#messageBox",
        wrapper: "li",

      // specifying a submitHandler prevents the default submit, good for the demo
      submitHandler: function(form) {
        $.ajax({
            url: form.action,
            type: form.method,
            data: $(form).serialize(),
            success: function(response) {
                $('#answers').html(response);
                $("#ajax-contact").remove();
            }            
        });
      },
      // set this class to error-labels to indicate valid fields
      success: function(label) {
        $('#messageBox li').addClass("checked");
      },
      highlight: function(element, errorClass) {
        $(element).parent().next().find("." + errorClass).removeClass("checked");
      }
 });

 /* click animation flow */
jQuery(function() {
  $('a[href*="#"]:not([href="#"])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
  $('article').matchHeight();
   $('.apply-share').hide();
   /* Burger menu active */
$(".burger-icon").click(function(){
    $(".burger-icon .burger-menu").toggleClass("active");
    $(".menu-container").toggleClass("active");
    $("body").toggleClass("active");
    $(".navbar.navbar-default").toggleClass("active");
  });

});

$('.apply-share').hover(function(e){ 
  e.preventDefault()
  $(this).toggleClass('active');
});

$('#scene').parallax();
