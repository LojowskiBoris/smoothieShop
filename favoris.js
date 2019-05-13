
function fav(){

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

$('.coeur').on('click',function(){
    if($(this).attr('src')=='Ressources/assets/icons/fullheart.png')
    {
        $(this).attr('src','Ressources/assets/icons/emptyheart.png');
    }
    else
    {
        $(this).attr('src','Ressources/assets/icons/fullheart.png');
    }
    },
   );