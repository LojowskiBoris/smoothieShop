'use strict';

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
            let mdp = $("#password").val();
            if(mdp)
            {
                $.ajax({
                    url: 'inscription.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {pseudo: pseudo, mail: mail, mdp: mdp},
                    success: function(data){
                        if(!data.result)
                        {
                            $('<div class="alert alert-danger" role="alert">Identifiant ou mot de passe incorrect</div>').insertAfter($("#password"));
                        }
                        else
                        {
                            $(".alert").hide();
                            window.location.href='index.php';
                        }
                    }
                });
            }
            else
            {
                $('<div class="alert alert-danger" role="alert">Veuillez saisir un mdp</div>').insertAfter($("#password"));
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
    $(".alert").remove();

    let mail = $("#mail").val();
    var reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    if(reg.test(String(mail).toLowerCase()) == false){
        $('<div class="alert alert-danger" role="alert">Veuillez saisir un email valide</div>').insertAfter($("#mail"));
    } 
    else 
    {
        let mdp = $("#password").val();
        if(mdp)
        {
            $.ajax({
                url: 'connexion.php',
                method: 'POST',
                dataType: 'json',
                data: {mail: mail, mdp: mdp},
                success: function(data){
                    if(!data.result)
                    {
                        $('<div class="alert alert-danger" role="alert">Identifiant ou mot de passe incorrect</div>').insertAfter($("#password"));
                    }
                    else
                    {
                        window.location.href='index.php';
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
    $("#formSignup").on("submit",sign_up);
    $("#formConnect").on("submit",login);
});


$(function() {
    $(window).scroll(function () {
       if ($(this).scrollTop() > 960) {
          $(".navbar").addClass("changeColor")
       }
       if ($(this).scrollTop() < 960) {
          $(".navbar").removeClass("changeColor")
       }
    });
 });

 
