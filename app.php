<?php

echo "post_max: " . ini_get('post_max_size') . "<br>";
echo "upload_max_filesize: " . ini_get('upload_max_filesize')  . "<br>";
echo "Trying to set values<br>";
ini_set('post_max_size','16M');
ini_set('upload_max_filesize','16M');
echo "<br>post_max: " . ini_get('post_max_size');
echo "<br>upload_max_filesize: " . ini_get('upload_max_filesize');

echo "<br><br>";

if ($_FILES['archivo']["error"] > 0)
{
    echo "Error: " . $_FILES['archivo']['error'] . "<br>";
}
else
{
    if ($_FILES["archivo"]["size"] > 40000000) {

        echo "Sorry, your file is too large.";
       
    }else{

        echo "Nombre: " . $_FILES['archivo']['name'] . "<br>";
        echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
        echo "Tamaño: " . ($_FILES["archivo"]["size"] / 1024) . " kB<br>";
        //echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
    
        echo "<br><br>";
    
        foreach($_FILES['archivo'] as $valor){
            echo $valor."<br>";
        }
        
        echo "<br><br>//";
        /*ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos*/
        
        move_uploaded_file($_FILES['archivo']['tmp_name'],'/upload/'.$FILES['archivo']['name']);
    }




  }
?>