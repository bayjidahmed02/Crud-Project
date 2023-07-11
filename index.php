<?php
include_once "./function.php";
$crud = new crud();
if (isset($_POST['add_info'])) {
    $return_msg = $crud->add_info($_POST);
}
$student_info = $crud->display_info();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Student Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
    <style>
        * {
            font-family: roboto;
        }
    </style>
</head>

<body>
    <div class="container ">

        <form action="" class="mt-4 p-4 shadow" method="post" enctype="multipart/form-data">
            <h2 class="text-center ">
                <a href="index.php" class="text-decoration-none text-warning fw-semibold text-uppercase">Student
                    Info</a>
            </h2>
            <p class="text-success">
                <?php if (isset($return_msg)) {
                    echo $return_msg;
                } ?>
            </p>
            <input type="text" class="form-control w-100 my-4" placeholder="Name" name="name">
            <input type="text" class="form-control w-100 my-4" placeholder="Roll" name="roll">
            <input type="text" class="form-control w-100 my-4" placeholder="Reg" name="reg">
            <input type="file" name="img" class="w-100 form-control my-4">
            <button type="submit" name="add_info" class="w-100 btn btn-warning">Add Info</button>
        </form>

        <table class="table table-responsive mt-5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Reg</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($s_info = mysqli_fetch_assoc($student_info)) { ?>
                    <tr>
                        <td><?php echo $s_info['id']; ?></td>
                        <td><?php echo $s_info['name']; ?></td>
                        <td><?php echo $s_info['roll']; ?></td>
                        <td><?php echo $s_info['reg']; ?></td>
                        <td><img src="upload/<?php echo $s_info['img']; ?>" alt="" width="60" height="60" style="object-fit: cover;"></td>
                        <td>
                            <a href="" class="btn btn-sm btn-warning px-4 mx-1">Edit</a>
                            <a href="" class="btn btn-sm btn-danger px-4 mx-1">Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>