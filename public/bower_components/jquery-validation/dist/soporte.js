$(document).ready(function(){
// Reset Form:
	$("#contact-form").validate({
		rules: {
			name: {
				required: true,
			},
      subject: {
        required: true,
      },
			email: {
        required: true,
				email: true
      },
			body: {
        required: true,
      },
		},
	    highlight: function(element, errorClass) {
	      var e = $(element);
	      e.closest('.form-group').removeClass('has-success').addClass('has-error');
	    },
	    unhighlight: function(element, errorClass) {
	      var e = $(element);
	      e.closest('.form-group').removeClass('has-error').addClass('has-success');
	    },
	    onfocusout: function(element) {
	      var elementId = element.getAttribute('id');
	      if (elementId === "eventDate") {
	        // datepicker widget - don't do validation on focusout event
	        return false;
	      }
	      return $(element).valid();
	    }
	 });
	});
