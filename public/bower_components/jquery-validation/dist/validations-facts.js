$(document).ready(function(){

	$.validator.addMethod(
    "mydate",
    function(value, element) {
        // put your own logic here, this is just a (crappy) example
        return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
    },
    "Please enter a date in the format yyyy/mm/dd."
);
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
