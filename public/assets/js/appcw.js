$(document).ready(function () {
    
$(function() {
     var pgurl = window.location.href.substr(window.location.href
.lastIndexOf("/")+1);
     $("ul li a").each(function(){
          if($(this).attr("href") === pgurl || $(this).attr("href") === '' )
          $(this).closest('li').addClass("active");
     });
}); 

})