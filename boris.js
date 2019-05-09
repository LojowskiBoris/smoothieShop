let connected = false;



function login()
{
    e.preventDefault();

    let mail = $("#mail").val();
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(reg.test(String(mail).toLowerCase()) == false){
        $('<div class="alert alert-danger" role="alert">Veuillez saisir un email valide</div>').insertAfter($("#mail"));
    } 
    else 
    {
        let mdp = $("#mdp").val();

        $.ajax({
            url: 'php/sign.php',
            method: 'POST',
            dataType: 'json',
            data: {mail: mail, mdp: mdp},
            success: function(data){
                
            }
        });
    }
}

function sign_up()
{
    e.preventDefault();

    let mail = $("#mail").val();
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(reg.test(String(mail).toLowerCase()) == false){
        $('<div class="alert alert-danger" role="alert">Veuillez saisir un email valide</div>').insertAfter($("#mail"));
    } 
    else 
    {
        let mdp = $("#mdp").val();

        $.ajax({
            url: 'php/sign.php',
            method: 'POST',
            dataType: 'json',
            data: {mail: mail, mdp: mdp},
            success: function(data){
                
            }
        });
    }
}

$(document).ready(function()
{
    $("#form-login").on("submit",login);
    $("#form-join").on("submit",sign_up);
});