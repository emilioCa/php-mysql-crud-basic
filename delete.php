<?php 
include('database/db_connection.php');
include('alert.php');

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM task WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if(!$result) {
        showNotification('Error deleting the element', 'danger');
        die("Error deleting the element.");
    }

    showNotification('Element deleted successfully', 'success');
    header("Location: index.php");
}
?>