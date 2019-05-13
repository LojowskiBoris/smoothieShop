$(document).ready(function(){

     $('#coeur').on('click', fav);
    
});

function fav(){
	var url = window.location.href; 
	var myUrl = url.split("=");
	var userName = myUrl[1];
    var productName = $(this).parents('div').attr('id');
   

    $.ajax({
        url : 'favoris.php',
        method : 'post',
        dataType: 'json',
        data : {productName:productName},
        success:function(data){
            
        }
        });


}