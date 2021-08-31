$(document).ready(function(){

	$.validator.addMethod(
    "mydate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    },
    "Please enter a date in the format dd/mm/yyyy."
);

 $("#factsimport").validate({
 	rules: {
 		importdate: {
 			required: true,
 		},
		excelfile: {
 			required: true,
 		},
 	},
 	messages: {
		importdate: {
			required: "El campo Fecha no puede estar vacío",
		},
		excelfile: "El campo Archivo Excel no puede estar vacío",
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

 $("#csgfcts").validate({
	 rules: {
		 nit: {
			 required: true,
		 },
	 tipo_documento: {
			 required: true,
		 },
	 numero_documento: {
			 required: true,
		 },
	 fecha_documento: {
			 required: true,
		 },
	 fecha_pago: {
			 required: true,
		 },
	 valor_neto: {
			 required: true,
		 },
	 retenciones: {
			 required: true,
		 },
	 cuotas_fomento: {
			 required: true,
		 },
	 anticipos: {
			 required: true,
		 },
	 valor_a_pagar: {
			 required: true,
		 },
	 banco: {
			 required: true,
		 },
	 fecha_importacion: {
			 required: true,
		 },
	 estado: {
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
});  // end doc ready
$(function() {
        $(document).on('click','#borrarsgfitem',function() {
        var sendid = this.name;
        if(confirm("Está seguro de eliminar la factura número "+sendid )){
            $.ajax({
                url:'delete-id='+sendid,
                type : 'GET',
                data: {'id':sendid}
                }).done(function(data){
									alert('Registro eliminado');
            });
        	location.reload();
        }
        return false;
        });

        });
