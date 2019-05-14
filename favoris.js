
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
    var productName =$(this).attr('id');
    if($(this).attr('src')=='Ressources/assets/icons/fullheart.png')
    {
        $(this).attr('src','Ressources/assets/icons/emptyheart.png');
        $.ajax({
            url : 'del_favoris.php',
            method : 'post',
            dataType: 'json',
            data : {productName:productName}
        });
    }
    else
    {
        $(this).attr('src','Ressources/assets/icons/fullheart.png');
        $.ajax({
            url : 'add_favoris.php',
            method : 'post',
            dataType: 'json',
            data : {productName:productName}
        });
    }
    });