// Al clicar el submit (id #enviar) del formulari s'executa la seguent funcio:  

function presionSubmit()
{
    //Agafa el valor dels dos camps del furmulari
    
    var username=$("#username").val(); 
    
    var password=$("#password").val();

    //Envia el username i password a la pagina login.php
    
    $.get("ajax/login.php",{
        username:username,
        password:password
    },Datos); 
    
    return false;
}

//Fa un alert amb els resultats dels $.get anteiors

function Datos(datos)
{
    //alert(datos);
    if(datos == 'OK'){
        location.href="inicio.php";
        //alert("ok");
    }else{
        alert("Usuario y/o contraseña incorrecto. ");
        //location.href="index.php"; 
        //alert("ko");
    }
}
