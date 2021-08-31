$(document).ready(function(){
// Reset Form:
	$("#icaimport").validate({
		rules: {
			anio: {
				required: true,
			},
      periodo: {
        required: true,
      },
		},
		messages: {
			anio: "Selecciona un año",
      periodo: "Selecciona un periodo"
		}
	}); // end reset-form
  $("#anio").on("change", function(){
      $("#aniodiv").addClass("has-success");
  });
  $("#periodo").on("change", function(){
      $("#periododiv").addClass("has-success");
  });

	$.validator.addMethod(
    "mydate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    },
    "Please enter a date in the format dd/mm/yyyy."
);

 $("#updateoneica").validate({
 	rules: {
 		nit_tercero: {
 			required: true,
 		},
		nombre_tercero: {
 			required: true,
			lettersonly: true
 		},
 		concepto: {
 			required: true,
 		},
		base_gravable: {
 			required: true,
			number: true
 		},
		valor_retenido: {
 			required: true,
			number: true
 		},
		anio: {
 			required: true,
			number: true
 		},
		periodo: {
 			required: true,
			number: true
 		},
		ciudad_expedido: {
 			required: true,
 		},
		ciudad_pago: {
 			required: true,
 		},
		fecha_expedicion: {
 			required: true,
			mydate: true
 		},
		porcentaje: {
 			required: true,
			number: true
 		},
 	},
 	messages: {
 		nit_tercero: "El campo Nit tercero no puede estar vacío",
		nombre_tercero: {
			required: "El campo Nombre tercero no puede estar vacío",
      lettersonly: "El campo Nombre tercero debe contener solo letras"
		},
 		concepto: "El campo concepto no puede estar vacío",
		base_gravable: "El campo base gravable no puede estar vacío",
 		valor_iva: "El campo valor_iva no puede estar vacío",
		porcentaje: "El campo porcentaje retenido no puede estar vacío",
		valor_retenido: "El campo valor_retenido no puede estar vacío",
 		periodo: "El campo periodo no puede estar vacío",
		anio: {
      required: "El campo Año no puede estar vacío",
      number: "El campo Año debe ser un numérico."
    },
 		periodo: {
			required: "El campo periodo no puede estar vacío",
			number: "El campo Periodo debe ser un numérico."
		},
 		ciudad_expedido: "El campo ciudad expedido no puede estar vacío",
		ciudad_pago: "El campo ciudad pago no puede estar vacío",
		fecha_expedicion: {
			required: "El campo fecha de expedición no puede estar vacío",
			date:"El formato debe ser día/mes/año"
		}
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
        $(document).on('click','#borrarivaitem',function() {
        var sendid = this.name;
        if(confirm("Está seguro de eliminar este elemento?")){
            $.ajax({
                url:'ajaxdelivaitem-'+sendid,
                type : 'GET',
                data: {'id':sendid}
                }).done(function(data){
									alert('Registro eliminado');
            });
        window.location.href = "iva-index";
        }
        return false;
        });

        });
