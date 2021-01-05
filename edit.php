<?php
include('database/db_connection.php');
include('alert.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM task WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Verifica cuántos resultados obtuvimos
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $title = $row['title'];
        $description = $row['description'];
    }
}

if(isset($_POST['update'])) {
    $id = $_GET['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $query = "UPDATE task SET title = '$title', description = '$description' WHERE  id = $id";
    mysqli_query($conn, $query);

    showNotification('Element updated', 'info');
    header("Location: index.php");
}

?>

<?php include('includes/header.php'); ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id'] ?>" method="POST">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $title ?>" placeholder="Update title">
                    </div>
                    <div class="form-group mt-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea rows="2" class="form-control" name="description" placeholder="Update description"><?php echo $description ?></textarea>
                    </div>
                    <button type="submit" class="btn btn-success btn-full-width mt-3" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>