$(document).ready(function(){

	$.validator.addMethod(
    "mydate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    },
    "Please enter a date in the format dd/mm/yyyy."
);

 $("#updatempresa").validate({
 	rules: {
 		nombre_empresa: {
 			required: true
 		},
		nit_empresa: {
 			required: true,
 		},
 		email_empresa: {
 			required: true,
			email:true
 		},
		direccion_empresa: {
 			required: true,
 		},
		ciudad: {
 			required: true
 		},
		departamento: {
 			required: true
 		},
		pais: {
 			required: true,
			lettersonly: true
 		},
		anios: {
 			required: true,
 		},
 	},
 	messages: {
		nombre_empresa: {
			required: "El campo Nombre Empresa no puede estar vacío",
		},
		nit_empresa: "El campo Nit Empresa no puede estar vacío",
		email_empresa: {
			required: "El campo Email no puede estar vacío",
			email: "Por favor ingrese una dirección de correo valida"
		},
		direccion_empresa: {
			required: "El campo dirección no puede estar vacío",
		},
		ciudad: {
			required: "El campo Ciudad no puede estar vacío",
		},
 		departamento: "El campo Departamento no puede estar vacío",
 		pais: {
			required: "El campo País no puede estar vacío",
			lettersonly: "El campo Pais solo debe tener letras."
		},
 		anios: "El campo Años no puede estar vacío"
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

$("#logotipo-id").fileinput({
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

$("#logotipo-id").fileinput({
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

$("#logotipo_color-id").fileinput({
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

$("#imagen_firma-id").fileinput({
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
