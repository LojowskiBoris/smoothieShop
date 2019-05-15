
$('.coeur').on('click',addFav);
$('#addFav').on('click',addFav2);

function addFav(){
    var productName =$(this).attr('id');
    if($(this).attr('src')=='Ressources/assets/icons/fullheart.png')
    {
        $.ajax({
            url : 'del_favoris.php',
            method : 'post',
            dataType: 'json',
            data : {productName:productName},
            success:function(data){
                if(!data.result)
                {
                   window.location.href='connexion.php';
                }
            }
        });
        $(this).attr('src','Ressources/assets/icons/emptyheart.png');
    }
    else
    {
        $.ajax({
            url : 'add_favoris.php',
            method : 'post',
            dataType: 'json',
            data : {productName:productName},
            success:function(data){
                if(!data.result)
                {
                   window.location.href='connexion.php';
                }
            }
        });
        $(this).attr('src','Ressources/assets/icons/fullheart.png');
    }
};

function addFav2(){
    var url = window.location.href;
    var myUrl = url.split("=");
    var productId = myUrl[1];

    $.ajax({
        url : 'add2_favoris.php',
        method : 'post',
        dataType: 'json',
        data : {productId:productId},
        success:function(data){
            console.log(data);

            if(!data.result)
            {
               window.location.href='connexion.php';
            }else {
                window.location.href='favoris.php'
            }
        }
    });
}
    