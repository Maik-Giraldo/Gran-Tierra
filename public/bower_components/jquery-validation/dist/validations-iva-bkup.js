$(document).ready(function(){
	// $('#iva-table thead th').each( function () {
  //       var title = $(this).text();
  //        $(this).html( '<input type="text" placeholder="'+title+'" />' );
  //   } );

	// oTable = $('#iva-table').DataTable({
	//           "processing": true,
	//           "serverSide": true,
	//           "responsive": true,
	//           // "ajax": "{{ route('adminServicesdata') }}",
	//           "ajax": "ivajaxindex",
	//           "columns": [
	// 							{data: 'id', name: 'id', orderable: false, searchable: false},
	//               {data: 'Nit', name: 'Nit'},
	//               {data: 'Concepto', name: 'Concepto'},
	//               {data: 'Base', name: 'Base'},
	//               {data: 'Porcentaje', name: 'Porcentaje'},
	//               {data: 'Iva', name: 'Iva'},
	//               {data: 'Retenido', name: 'Retenido'},
	//               {data: 'Ano', name: 'Ano'},
	//               {data: 'Periodo', name: 'Periodo'},
	//               {data: 'action', name: 'action', orderable: false, searchable: false}
	//           ]
	//         });
					// Filter event handler
					// oTable.columns().every( function () {
					// 		var that = this;
					//
					// 		$( 'input', this.header() ).on( 'keyup change', function () {
					// 				if ( that.search() !== this.value ) {
					// 						that
					// 								.search( this.value )
					// 								.draw();
					// 				}
					// 		} );
					// } );
// Reset Form:
$(function(){
      // bind change event to select
      $('#grid-page-size').on('change', function () {
          var url = $(this).val(); // get selected value
          if (url) { // require a URL
              window.location = url; // redirect
          }
          return false;
      });
    });

		$(function(){
		      // bind change event to select
		      $('#gridRoleSearch').on('change', function () {
		          var url = $(this).val(); // get selected value
		          if (url) { // require a URL
		              window.location = url; // redirect
		          }
		          return false;
		      });
		    });

				$(function(){
							// bind change event to select
							$('#email_confirmed').on('change', function () {
									var url = $(this).val(); // get selected value
									if (url) { // require a URL
											window.location = url; // redirect
									}
									return false;
							});
						});
						$(function(){
									// bind change event to select
									$('#status').on('change', function () {
											var url = $(this).val(); // get selected value
											if (url) { // require a URL
													window.location = url; // redirect
											}
											return false;
									});
								});

		var usedNames = {};
    $("select > option").each(function () {
        if (usedNames[this.value]) {
            $(this).remove();
        } else {
            usedNames[this.value] = this.text;
        }
    });

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

 $("#updateoneiva").validate({
 	rules: {
 		nit_tercero: {
 			required: true,
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
		valor_iva: {
 			required: true,
 		},
		valor_retenido: {
 			required: true,
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
 			required: true
 		},
 	},
 	messages: {
 		nit_tercero: "El campo Nit tercero no puede estar vacío",
		nombre_tercero: "El campo Nombre tercero no puede estar vacío",
 		concepto: "El campo concepto no puede estar vacío",
		base_gravable: {
			required: "El campo base gravable no puede estar vacío",
			number: "El campo Base debe ser númerico"
		},
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
 $("#updateonertf").validate({
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
		nc_persona_autorizada_pagos_cc: {
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

 $("#crear-noticia").validate({
	 rules: {
		 titulo: {
			 required: true,
		 },
	 contenido: {
			 required: true,
		 },
	 fecha: {
			 required: true,
		 },
	 excelfile: {
			 required: true,
		 },
	 status: {
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
        window.location.replace("iva-index");
        }
        return false;
        });

        });
				$(function() {
				        $(document).on('click','#borraricaitem',function() {
				        var sendid = this.name;
				        if(confirm("Está seguro de eliminar este elemento?")){
				            $.ajax({
				                url:'ajaxdelicaitem-'+sendid,
				                type : 'GET',
				                data: {'id':sendid}
				                }).done(function(data){
													alert('Registro eliminado');
				            });
				        window.location.replace("ica-index");
				        }
				        return false;
				        });

				        });
				$(function() {
				        $(document).on('click','#borrarrtfitem',function() {
				        var sendid = this.name;
				        if(confirm("Está seguro de eliminar este elemento?")){
				            $.ajax({
				                url:'ajaxdelrtfitem-'+sendid,
				                type : 'GET',
				                data: {'id':sendid}
				                }).done(function(data){
													alert('Registro eliminado');
				            });
				        	window.location.replace("rtf-index");
				        }
				        return false;
				        });

				        });
				$(function() {
				        $(document).on('click','#deleteprvdr',function() {
				        var sendid = this.name;
								var proveedor = this.title;
				        if(confirm("Está seguro de eliminar el proveedor "+proveedor+"?")){
				            $.ajax({
				                url:'ajaxdelrprvdr-'+sendid,
				                type : 'GET',
				                data: {'id':sendid}
				                }).done(function(data){
													alert('Proveedor eliminado');
				            });
				        	window.location.replace("proveedores");
				        }
				        return false;
				        });

				        });
								$(function() {
								        $(document).on('click','#borraritem',function() {
								        var sendid = this.name;
												var tabla = this.title;
								        if(confirm("Está seguro de eliminar el item "+sendid+"?")){
								            $.ajax({
								                url:'ajaxdelitem='+sendid+'table='+tabla,
								                type : 'GET',
								                data: {}
								                }).done(function(data){
																	console.log('registro eliminado');
								            });
													alert('Registro eliminado');
								        	location.reload();
								        }
								        return false;
								        });

								        });

                        $(function() {
        								        $(document).on('click','#borrariteminside',function() {
        								        var sendid = this.name;
        												var tabla = this.title;
        								        if(confirm("Está seguro de eliminar el item "+sendid+"?")){
        								            $.ajax({
        								                url:'../../ajaxdelitem='+sendid+'table='+tabla,
        								                type : 'GET',
        								                data: {}
        								                }).done(function(data){
        																	console.log('registro eliminado');
        								            });
        													alert('Registro eliminado');
        								        	window.location.replace("../../usuarios");
        								        }
        								        return false;
        								        });
        								        });
                      //Para validar los checkbox
                      var selected = [];
                      var countChecked = function() {
                      var n = $( "input:checked" ).length;
                      };
                    countChecked();
                    $('#selection_all').click(function() {
                        var c = this.checked;
                        $(':checkbox').prop('checked',c);
                        selected = $("input:checkbox:checked").map(function(){
                        if($(this).val() > 1 && $(this).val() != 'selection_all' ){
                          return $(this).val();
                        }
                        }).get();
                    });
                    var addChecked = function() {
                      $( ".checksavon" ).on( "click", countChecked, function(){
                          if (this.checked && $(this).attr('name') !== 'selection_all'){
                            selected.push($(this).attr('name'));
                          } else {
                            selected.splice($.inArray($(this).attr('name'), selected),1);
                          }
                      } );
                    };
                    addChecked();
                    $(function() {
                      $(document).on('click','#user-grid-ok-button',addChecked, function(){
                          var _token = $('#_token').val();
                          var seleccion = $('#user-grid-5bdc3c6444915-bulk-actions').val();
                          if(seleccion === 'activar') {
          					            $.ajax({
          					                url: '/certiwebavon/public/usuarios/update/activate',
          					                type : 'POST',
                                    headers: {'X-CSRF-Token': _token},
          					                data: {selected}
          					                }).done(function(data){
          														console.log(data);
          					            });
          										alert('Usuarios activados!');
          					        	location.reload();
                              return false;
                          } else if (seleccion === 'desactivar') {
          					            $.ajax({
          					                url:'/certiwebavon/public/usuarios/update/desactivate',
          					                type : 'POST',
                                    headers: {'X-CSRF-Token': _token},
          					                data: {selected}
          					                }).done(function(data){
          														console.log(data);
          					            });
          										alert('Usuarios desactivados exitosamente.');
          					        	location.reload();
                              return false;
                          } else if (seleccion === 'eliminar') {
                            if(confirm("Está seguro de eliminar los usuarios seleccionados?")){
          					            $.ajax({
          					                url:'/certiwebavon/public/usuarios/update/selectionsdel',
          					                type : 'POST',
                                    headers: {'X-CSRF-Token': _token},
          					                data: {selected}
          					                }).done(function(data){
          														console.log(data);
          					            });
          										alert('Registros eliminados.');
          					        	location.reload();
                              }
                              return false;
                          } else{
                            return false;
                          }
                      });
                    });
                    //Fin de validar los checkbox
