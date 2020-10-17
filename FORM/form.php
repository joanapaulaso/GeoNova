<?php 

    if (isset($_POST["acao"])){ 

    $name=$_POST["name"]; 
    $email=$_POST["email"]; 
    $msg=$_POST["msg"]; 

    echo "<p>Olá, ".$name."</p>"; echo "<p>Seu email é: ".$email."</p>"; 

    } 

?>