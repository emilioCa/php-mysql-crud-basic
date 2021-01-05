<?php

include('database/db_connection.php');
include('alert.php');

// Si existe a través del método post un valor llamado save_task
if (isset($_POST['save_task'])) {

    // Recuperamos los valores y los asignamos a una variable
    $title = $_POST['title'];
    $description = $_POST['description'];

    // Definimos la consulta mysql
    $query = "INSERT INTO task(title, description) VALUES ('$title', '$description')";
    // Ejecutamos la consulta en mysql
    $result = mysqli_query($conn, $query);

    // Verificamos
    if (!$result) {
        showNotification('An error occurred while saving', 'danger');
        // Mostramos un resultado porque falló la operación
        die('Query Failed');
    }

    // echo 'Saved!';

    // Almacenamos en la session y mostramos los resultados
    showNotification('Task saved successfully', 'success');

    // Redireccionamos a index.php
    header("Location: index.php");
}
