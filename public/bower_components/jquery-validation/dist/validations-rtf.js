$(document).ready(function(){
// Reset Form:
	$("#ivaimport").validate({
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

 $("#updateonertf").validate({
 	rules: {
 		nit_tercero: {
 			required: true,
			number: true
 		},
		nombre_tercero: {
 			required: true,
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
		nit_tercero: {
			required: "El campo Nit de tercero retenido no puede estar vacío",
			number: "El campo Nit de tercero debe ser númerico"
		},
		nombre_tercero: "El campo Nombre tercero no puede estar vacío",
 		concepto: "El campo concepto no puede estar vacío",
		base_gravable: {
			required: "El campo base gravable no puede estar vacío",
			number: "El campo Base debe ser númerico"
		},
		porcentaje: {
			required: "El campo porcentaje retenido no puede estar vacío",
			number: "El campo porcentaje debe ser númerico"
		},
		valor_retenido: {
			required: "El campo valor retenido no puede estar vacío",
			number: "El campo valor retenido debe ser númerico"
		},
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
        $(document).on('click','#borrarrtfitem',function() {
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
