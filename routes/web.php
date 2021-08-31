<?php

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/iva-export', 'HomeController@ivaexport')->name('ivaexport');
Route::post('/iva', 'IvaController@downiva')->name('downiva');
Route::get('/iva-find', 'IvaController@find')->name('find');
Route::get('/ica-find', 'IcaController@findf')->name('findf');
Route::get('/rtf-find', 'RtfController@findf')->name('findf');
Route::get('/accionista-find', 'AccionistaController@findf')->name('findfac');
Route::get('/ivareport-nit={nit}-y={ano}-p={periodo}-e={empresa}', 'IvaController@ivareport')->name('ivareport');
Route::get('/ica', 'HomeController@ica')->name('ica');
Route::post('/ica', 'IcaController@downica')->name('downica');
Route::get('/rtf', 'HomeController@rtf')->name('rtf');
Route::get('/documento-soporte', 'HomeController@documentosoporte')->name('docusoporte');
Route::post('/soldocusoporte', 'ProveedorController@soldocusoporte')->name('soldocusoporte');
Route::get('/accionista', 'HomeController@accionista')->name('accionista');
Route::post('/rtf', 'RtfController@downrtf')->name('downrtf');
Route::post('/accionista', 'AccionistaController@downaccionista')->name('downaccionista');
Route::get('/seguimiento-facturas', 'FacturaController@sgfindex')->name('sgfindex');
Route::get('/historico-facturas', 'FacturaController@sgfhist')->name('sgfhist');
Route::get('/vender-facturas', 'FacturaController@venderfacts')->name('venderfacts');
Route::get('/facturas-en-tramite', 'FacturaController@entramite')->name('entramite');
Route::get('/vender-facturas/factura-id={id}', 'FacturaController@sale')->name('salefact');
Route::get('/seguimiento-facturas/search', 'FacturaController@buscar')->name('buscar');
Route::get('/seguimiento-facturas/ver-id={id}', 'FacturaController@verdetalle')->name('verdetalle');
Route::get('/noticias/list', 'NoticiaController@listar')->name('listarnw');
Route::get('/noticias/view-id={id}', 'NoticiaController@veruno')->name('verunonw');
Route::get('/politicas-de-uso', 'HomeController@politicas')->name('politicas');
Route::get('/normatividad', 'HomeController@Normatividad')->name('normatividad');
Route::get('/manual-de-uso', 'HomeController@manual')->name('manual');
Route::post('/ventafacturas', 'FacturaController@vender')->name('ventafacturas');
Route::get('/icareport-nit={nit}-y={ano}-p={periodo}-ciudad={ciudad}-e={empresa}', 'IcaController@icareport')->name('icareport');
Route::get('/rtfreport-nit={nit}-y={ano}-e={empresa}', 'RtfController@rtfreport')->name('rtfreport');
Route::get('/accionistareport-nit={nit}-y={ano}-e={empresa}', 'AccionistaController@accionistareport')->name('accionistareport');
Route::get('/notificaciones/ver', 'NotificacionController@ver')->name('verntf');
Route::post('consulta-facturas-x-fechas', 'FacturaController@qryporfechas')->name('qryporfechas');
Route::get('/facturas-soporte', 'HomeController@soportesf')->name('soportesf');
Route::post('/soportesf', 'HomeController@mailsoporte')->name('mailsoporte');
//Middleware Admincw
Route::group(['middleware' => 'Admincw'], function () {
//Empresa
Route::get('/empresa/view-id={id}', 'EmpresaController@ver')->name('ver');
Route::get('/empresa/editar-id-{id}', 'EmpresaController@editar')->name('editar');
Route::post('empresa/update-empresa', 'EmpresaController@actualizar')->name('actualizar');
Route::get('/empresa/create/form', 'EmpresaController@createe')->name('createe');
Route::post('/empresa/create/empresa', 'EmpresaController@crearempresa')->name('crearempresa');
Route::get('/empresas', 'EmpresaController@listaremp')->name('listaremp');
// Proveedores
Route::get('/proveedores', 'ProveedorController@listar')->name('listar');
Route::get('/proveedor-create', 'ProveedorController@crear')->name('crear');
Route::post('/proveedor-create', 'ProveedorController@registrar')->name('registrar');
Route::get('/proveedores/view-id={id}', 'ProveedorController@veruno')->name('veruno');
Route::get('/proveedores/update-id={id}', 'ProveedorController@editar')->name('editar');
Route::post('/updateprvdr', 'ProveedorController@actualizar')->name('actualizar');
Route::get('/ajaxdelrprvdr-{id}', 'ProveedorController@deleteoneprv')->name('deleteoneprv');
Route::get('/proveedores/sin-revisar', 'ProveedorController@sinrevisar')->name('sinrevisar');
Route::get('/proveedores/search', 'ProveedorController@buscar')->name('buscar');
//Ica
Route::get('/ica-import', 'IcaController@icaimport')->name('icaimport');
Route::post('/upload-ica', 'IcaController@uploadica')->name('uploadica');
Route::post('/icadeunr', 'IcaController@icadeunr')->name('icadeunr');
Route::get('/delinfoica-{ano}-{periodo}', 'IcaController@deleteica')->name('deleteica');
Route::get('/ica-index', 'IcaController@icaindex')->name('icaindex');
Route::get('/search-ica', 'IcaController@buscarica')->name('buscarica');
Route::get('/find-ica', 'IcaController@findadm')->name('findadmica');
Route::get('/ica-create', 'IcaController@icacreate')->name('icacreate');
Route::post('/ica-create', 'IcaController@icacreateone')->name('icacreateone');
Route::get('/ica-view-{id}', 'IcaController@icaview')->name('icaview');
Route::get('/ica-edit-{id}', 'IcaController@icaedit')->name('icaedit');
Route::post('/updateoneica', 'IcaController@updateoneica')->name('updateoneica');
Route::get('/ajaxdelicaitem-{id}', 'IcaController@deleteoneica')->name('deleteoneica');
//Iva
Route::get('/iva-import', 'IvaController@ivaimport')->name('ivaimport');
Route::post('/upload-iva', 'IvaController@uploadiva')->name('uploadiva');
Route::post('/deunr', 'IvaController@deunr')->name('deunr');
Route::get('/delinfoiva-{ano}-{periodo}', 'IvaController@deleteiva')->name('deleteiva');
Route::get('/iva-index', 'IvaController@ivaindex')->name('ivaindex');
Route::get('/search-iva', 'IvaController@buscar')->name('buscar');
Route::get('/find-iva', 'IvaController@findadm')->name('findadm');
Route::get('/iva-create', 'IvaController@ivacreate')->name('ivacreate');
Route::post('/iva-create', 'IvaController@ivacreateone')->name('ivacreateone');
Route::get('/iva-view-{id}', 'IvaController@ivaview')->name('ivaview');
Route::get('/iva-edit-{id}', 'IvaController@ivaedit')->name('ivaedit');
Route::post('/updateoneiva', 'IvaController@updateoneiva')->name('updateoneiva');
Route::get('/ajaxdelivaitem-{id}', 'IvaController@deleteoneiva')->name('deleteoneiva');
//Rtf
Route::get('/rtf-import', 'RtfController@rtfimport')->name('rtfimport');
Route::post('/upload-rtf', 'RtfController@uploadrtf')->name('uploadrtf');
Route::post('/rtfdeunr', 'RtfController@rtfdeunr')->name('rtfdeunr');
Route::get('/delinfortf-{ano}', 'RtfController@deletertf')->name('deletertf');
Route::get('/rtf-index', 'RtfController@rtfindex')->name('rtfindex');
Route::get('/rtf-create', 'RtfController@rtfcreate')->name('rtfcreate');
Route::post('/rtf-create', 'RtfController@rtfcreateone')->name('rtfcreateone');
Route::get('/search-rtf', 'RtfController@buscar')->name('buscartf');
Route::get('/find-rtf', 'RtfController@find')->name('findrtf');
Route::get('/rtf-view-{id}', 'RtfController@rtfview')->name('rtfview');
Route::get('/rtf-edit-{id}', 'RtfController@rtfedit')->name('rtfedit');
Route::post('/updateonertf', 'RtfController@updateonertf')->name('updateonertf');
Route::get('/ajaxdelrtfitem-{id}', 'RtfController@deleteonertf')->name('deleteonertf');
//Accionista
Route::get('/accionista-import', 'AccionistaController@accionistaimport')->name('accionistaimport');
Route::post('/upload-accionista', 'AccionistaController@uploadaccionista')->name('uploadaccionista');
Route::post('/accionistadeunr', 'AccionistaController@accionistadeunr')->name('accionistadeunr');
Route::get('/delinfoaccionista-{ano}', 'AccionistaController@deleteaccionista')->name('deleteaccionista');
Route::get('/accionista-index', 'AccionistaController@accionistaindex')->name('accionistaindex');
Route::get('/accionista-create', 'AccionistaController@accionistacreate')->name('accionistacreate');
Route::post('/accionista-create', 'AccionistaController@accionistacreateone')->name('accionistacreateone');
Route::get('/search-accionista', 'AccionistaController@buscar')->name('buscaaccionista');
Route::get('/find-accionista', 'AccionistaController@find')->name('findaccionista');
Route::get('/accionista-view-{id}', 'AccionistaController@accionistaview')->name('accionistaview');
Route::get('/accionista-edit-{id}', 'AccionistaController@accionistaedit')->name('accionistaedit');
Route::post('/updateoneaccionista', 'AccionistaController@updateoneaccionista')->name('updateoneaccionista');
Route::get('/ajaxdelaccionistaitem-{id}', 'AccionistaController@deleteoneaccionista')->name('deleteoneaccionista');
// Seguimiento Facturas
Route::get('/seguimiento-facturas/importar', 'FacturaController@sgf')->name('seguimiento-facturas');
Route::post('/seguimiento-facturas/upload-facturas', 'FacturaController@uploadsgf')->name('uploadsgf');
Route::get('/seguimiento-facturas/delinfosgf-{ano}', 'FacturaController@delinfosgf')->name('delinfosgf');
Route::get('/seguimiento-facturas/create', 'FacturaController@crear')->name('crear');
Route::post('/seguimiento-facturas/create', 'FacturaController@save')->name('save');
Route::get('/seguimiento-facturas/view-id={id}', 'FacturaController@veruno')->name('veruno');
Route::get('/seguimiento-facturas/edit-id={id}', 'FacturaController@editar')->name('editar');
Route::post('/seguimiento-facturas/updatesfacts', 'FacturaController@actualizar')->name('actualizar');
Route::get('/seguimiento-facturas/delete-id={id}', 'FacturaController@deleteone')->name('deletesfct');
Route::get('/seguimiento-facturas/deletef-id={id}', 'FacturaController@deleteonef')->name('deleteonef');
Route::post('/consulta-facturas-por-fechas', 'FacturaController@qryporfechas')->name('qryporfechas');
Route::post('/facturas/update/vender', 'FacturaController@vender')->name('vender');
// Noticias
Route::get('/noticias', 'NoticiaController@indexn')->name('indexn');
Route::get('/noticias/create', 'NoticiaController@create')->name('createn');
Route::post('/noticias/create', 'NoticiaController@save')->name('createnw');
Route::get('/noticias/edit-id={id}', 'NoticiaController@editar')->name('editarnw');
Route::post('/noticias/update', 'NoticiaController@actualizar')->name('actualizarnw');
Route::get('/ajaxdelitem={id}table={table}', 'NoticiaController@deleteone')->name('deletenw');
Route::get('/soporte', 'HomeController@soporte')->name('soporte');
Route::post('/soporte', 'HomeController@mailsoporte')->name('mailsoporte');
//Usuarios
Route::get('/usuarios', 'UsuarioController@list')->name('userslist');
Route::get('/usuarios/{items}', 'UsuarioController@listitems')->name('listitems');
Route::get('/usuarios/administradores-list/{items}', 'UsuarioController@listfiladm')->name('listfiladm');
Route::get('/usuarios/proveedores-list/{items}', 'UsuarioController@listfilpro')->name('listfilpro');
Route::get('/usuarios/email-confirmado/{q}/{items}', 'UsuarioController@emailc')->name('emailc');
Route::get('/usuarios/estado/{estado}/{items}', 'UsuarioController@estado')->name('estado');
Route::get('/usuarios/search/list', 'UsuarioController@searchu')->name('searchu');
Route::get('/usuarios/create/form', 'UsuarioController@createu')->name('createu');
Route::get('/usuarios/view/id={id}', 'UsuarioController@viewone')->name('viewoneu');
Route::get('/usuarios/edit/id={id}', 'UsuarioController@edit')->name('edit');
Route::post('/createuseravon', 'UsuarioController@crtavonu')->name('crtavonu');
Route::post('/updateuseravon', 'UsuarioController@uptavonu')->name('uptavonu');
Route::get('/usuarios/permisos/id={id}', 'UsuarioController@permisos')->name('permisos');
Route::post('/usuarios/update/permissions', 'UsuarioController@uptpermisos')->name('uptpermisos');
Route::get('/usuarios/import/excel', 'UsuarioController@importusr')->name('importusr');
Route::post('/usuarios/import/uploadusers', 'UsuarioController@uploadusers')->name('uploadusers');
Route::get('/usuarios/export/excel', 'UsuarioController@export')->name('export');
Route::post('/usuarios/update/selectionsdel', 'UsuarioController@selections')->name('selectionsu');
Route::post('/usuarios/update/activate', 'UsuarioController@activate')->name('activateu');
Route::post('/usuarios/update/desactivate', 'UsuarioController@desactivate')->name('desactivateu');
// Route::get('/usuarios/update/passwords', 'UsuarioController@setpass')->name('setpass');
// Route::get('/usuarios/create/providers', 'UsuarioController@setprovider')->name('setprovider');
//Notificaciones
Route::get('/notificaciones', 'NotificacionController@list')->name('listntf');
Route::get('/notificaciones/create', 'NotificacionController@createntf')->name('createntf');
Route::post('/notificaciones/create', 'NotificacionController@save')->name('saventf');
Route::get('/notificaciones/search', 'NotificacionController@search')->name('searchntf');
Route::get('/notificaciones/view-id={id}', 'NotificacionController@viewone')->name('vonentf');
Route::get('/notificaciones/edit-id={id}', 'NotificacionController@editar')->name('editarntf');
Route::post('/notificaciones/update', 'NotificacionController@actualizar')->name('actualizarntf');
//Estadísticas
Route::get('/estadisticas', 'EstadisticaController@list')->name('liststats');
Route::get('/estadisticas/search', 'EstadisticaController@search')->name('searchsts');
Route::get('/estadisticas/view-id={id}', 'EstadisticaController@viewone')->name('vonestat');
Route::get('/estadisticas-certificados', 'EstadisticaController@others')->name('otherstats');
Route::get('/estadisticas/search-certs', 'EstadisticaController@sothers')->name('sothers');
Route::get('/estadisticas-certificados/view-id={id}', 'EstadisticaController@viewonect')->name('viewonect');
Route::get('/proveedor/update-id-{id}-status-{status}', 'ProveedorController@updtstatus')->name('updtstatus');

});
//Profile
Route::get('/editar-perfil', 'HomeController@editprofile')->name('editar-perfil');
Route::get('/perfil-user-facts', 'HomeController@edusrprof')->name('edusrprof');
Route::get('/editar-perfil-proveedor', 'HomeController@editprofile')->name('editar-perfil-prov');
Route::post('/editprofile', 'HomeController@savedata')->name('editprofile');
Route::get('/cambiarclave','HomeController@showChangePasswordForm');
Route::post('/cambiarclave','HomeController@cambiaclave')->name('cambiarclave');
// Isncripción Proveedor
Route::get('/actualizar-mis-datos', 'HomeController@infoproveedor')->name('inscripcion-proveedor');
Route::get('/actualizar-mis-datos/info', 'ProveedorController@editiproveedor')->name('editiproveedor');
Route::post('/actualizarmisdatos', 'ProveedorController@actualizar')->name('actualizar');
