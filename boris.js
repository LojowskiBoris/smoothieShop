let connected = false;

function sign_up(e)
{
    e.preventDefault();

    let mail = $("#mail").val();
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(reg.test(String(mail).toLowerCase()) == false){
        $('<div class="alert alert-danger" role="alert">Veuillez saisir un email valide</div>').insertAfter($("#mail"));
    } 
    else 
    {
        let pseudo = $("#pseudo").val();
        if (pseudo){
            let mdp = $("#mdp").val();
            if(mdp)
            {
                $.ajax({
                    url: 'boris.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {pseudo: pseudo, mail: mail, mdp: mdp},
                    success: function(data){
                        console.log(data);
                    }
                });
            }
            else
            {
                $('<div class="alert alert-danger" role="alert">Veuillez saisir un mdp</div>').insertAfter($("#mdp"));
            }
        }
        else{
            $('<div class="alert alert-danger" role="alert">Veuillez saisir un pseudo</div>').insertAfter($("#pseudo"));
        }

    }
}

function login(e)
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
        if(mdp)
        {
            $.ajax({
                url: 'boris.php',
                method: 'POST',
                dataType: 'json',
                data: {mail: mail, mdp: mdp},
                success: function(data){
                    console.log(data);
                    if(!data.result)
                    {
                        $('<div class="alert alert-danger" role="alert">Identifiant ou mot de passe incorrect</div>').insertAfter($("#mdp"));
                    }
                    else
                    {
                        $(".alert").hide();
                        console.log("redirection");
                    }
                }
            });
        }
        else
        {
            $('<div class="alert alert-danger" role="alert">Veuillez saisir un mdp</div>').insertAfter($("#mdp"));
        }
    }
}

$(document).ready(function()
{
    //$("#form-sign").on("submit",sign_up);
    $("#form-login").on("submit",login);
});