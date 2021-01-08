<?php include('database/db_connection.php') ?>
<?php include('includes/header.php') ?>

<div class="container p-4">
    <div class="row">

        <div class="col-md-4">

            <!-- Comprobamos si existe un mensaje -->
            <?php if (isset($_SESSION['message'])) { ?>
                <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                    <!-- Mostramos el mensaje -->
                    <?= $_SESSION['message'] ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php session_unset();
                /**limpiamos la session */
            } ?>

            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" placeholder="task title" autofocus>
                    </div>
                    <div class="form-group mt-2">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="task description"></textarea>
                    </div>
                    <input type="submit" class="btn btn-success btn-full-width mt-3" name="save_task" value="Save Task">
                </form>
            </div>

        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr class="bg-dark text-center" style="color: white;">
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM task";
                    $result_tasks = mysqli_query($conn, $query);

                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                        <tr>
                            <td><?php echo $row['title'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['created_at'] ?></td>
                            <td class="text-center">
                                <?php /*Adjuntamos un parametro: id*/ ?>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-primary" name="edit_task">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-outline-danger" name="edit_task">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php include('includes/footer.php') ?>