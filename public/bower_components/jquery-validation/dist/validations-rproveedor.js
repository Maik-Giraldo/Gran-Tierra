$(document).ready(function(){

	$.validator.addMethod(
    "mydate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    },
    "Please enter a date in the format dd/mm/yyyy."
);

 $("#registprov").validate({
 	rules: {
 		nombre_razon_social: {
 			required: true
 		},
		rc_contacto1: {
 			required: true
 		},
		nombre_comercial: {
 			required: true,
 		},
 		representante_legal: {
 			required: true
 		},
		documento_representante_legal: {
 			required: true,
 		},
		contacto_pedidos: {
 			required: true
 		},
		departamento: {
 			required: true
 		},
		cp_telefono: {
 			required: true
 		},
		contacto_contabilidad_cartera: {
 			required: true,
 		},
		cp_telefon2: {
 			required: true,
 		},
		email: {
 			required: true,
			email:true
 		},
		numero_nit_cc: {
 			required: true
 		},
		digito_verificacion: {
 			required: true,
 		},
 		matricula_mercantil: {
 			required: true
 		},
		Pass: {
 			required: true,
 		},
		telefono: {
 			required: true
 		},
		celular: {
 			required: true
 		},
		fax: {
 			required: true
 		},
		ciudad: {
 			required: true,
 		},
		departamento: {
 			required: true,
 		},
		direccion: {
 			required: true,
 		},
		nombre_razon_social: {
 			required: true
 		},
		tipo: {
 			required: true,
 		},
		documento_representante_legal: {
 			required: true,
 		},
		regimen_iva: {
 			required: true
 		},
		regimen_renta: {
 			required: true
 		},
		autoretenedor_renta: {
 			required: true
 		},
		actividad_economica: {
 			required: true,
 		},
		codigo_ciiu: {
 			required: true,
 		},
		entidad_financiera: {
 			required: true,
 		},
		ef_direccion: {
 			required: true
 		},
		ef_telefono: {
 			required: true,
 		},
 		ef_tipo_cuenta: {
 			required: true
 		},
		ef_cuenta: {
 			required: true,
 		},
		rc_nombre1: {
 			required: true
 		},
		rc_nombre1: {
 			required: true
 		},
		rc_direccion1: {
 			required: true
 		},
		rc_telefono1: {
 			required: true,
 		},
		ef_titular: {
 			required: true,
 		},
		rc_nombre2: {
 			required: true,
 		},
		rc_direccion2: {
 			required: true
 		},
		rc_contacto2: {
 			required: true,
 		},
		rc_telefono2: {
 			required: true,
 		},
		nc_condiciones_pago: {
 			required: true,
 		},
 		nc_tiempo_pago: {
 			required: true
 		},
		nc_descuento_financiero: {
 			required: true,
 		},
		nc_persona_autorizada_pagos: {
 			required: true,
 		},
		nc_pie_factura: {
 			required: true,
 		},
		nc_seccion: {
 			required: true
 		},
		nc_responsable_negociacion: {
 			required: true
 		},
		doc_rut: {
 			required: true,
 		},
		doc_certificado_existencia_representacion: {
 			required: true,
 		},
		nc_persona_autorizada_pagos_cc: {
 			required: true,
 		},
		doc_certificacion_bancaria: {
 			required: true,
 		},
		doc_cedula_rep_legal: {
 			required: true
 		},
		doc_referencia_comercial_1: {
 			required: true,
 		},
 		doc_referencia_comercial_2: {
 			required: true
 		},
		doc_certificacion_bancaria: {
 			required: true
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

$("#doc_rut-id").fileinput({
		language: "es",
		showCaption: false,
		dropZoneEnabled: false,
		'showUpload':false,
		'previewFileType':'any',
		previewFileIconSettings: {
			'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
	},
});

$("#doc_certificado_existencia_representacion-id").fileinput({
		language: "es",
		showCaption: false,
		dropZoneEnabled: false,
		'showUpload':false,
		'previewFileType':'any',
		previewFileIconSettings: {
			'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
	},
});

$("#doc_certificacion_bancaria-id").fileinput({
		language: "es",
		showCaption: false,
		dropZoneEnabled: false,
		'showUpload':false,
		'previewFileType':'any',
		previewFileIconSettings: {
			'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
	},
});

$("#doc_cedula_rep_legal-id").fileinput({
		language: "es",
		showCaption: false,
		dropZoneEnabled: false,
		'showUpload':false,
		'previewFileType':'any',
		previewFileIconSettings: {
			'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
	},
});

$("#doc_referencia_comercial_1-id").fileinput({
		language: "es",
		showCaption: false,
		dropZoneEnabled: false,
		'showUpload':false,
		'previewFileType':'any',
		previewFileIconSettings: {
			'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
	},
});
$("#doc_referencia_comercial_2-id").fileinput({
		language: "es",
		showCaption: false,
		dropZoneEnabled: false,
		'showUpload':false,
		'previewFileType':'any',
		previewFileIconSettings: {
			'docx': '<i class="fa fa-file-word-o text-primary"></i>',
			'xlsx': '<i class="fa fa-file-excel-o text-success"></i>',
			'pptx': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'doc': '<i class="fa fa-file-word-o text-primary"></i>',
			'xls': '<i class="fa fa-file-excel-o text-success"></i>',
			'ppt': '<i class="fa fa-file-powerpoint-o text-danger"></i>',
			'pdf': '<i class="fa fa-file-pdf-o text-danger"></i>',
	},
});
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
