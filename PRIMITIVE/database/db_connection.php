<?php

// Creamos una sesión para guardar los mensajes
session_start();


// Establecemos la conexión con mySql
$conn = mysqli_connect(
    'localhost', // Servidor
    'root', // Usuario
    '', // Pass
    'php_mysql_crud' // DB
);

// if (isset($conn)) {
//     echo 'DB connected';
// }


?>