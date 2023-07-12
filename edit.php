<?php
include_once "./function.php";
$crud = new crud();

$student_info = $crud->display_info();

if (isset($_GET['status'])) {
    if ($_GET['status'] = 'edit') {
        $id = $_GET['id'];
        $student_data = $crud->display_info_by_id($id);
    }
}
if (isset($_POST['update_info'])) {
    $update_data = $crud->updateData($_POST);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update Info</title>
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
                <a href="index.php" class="text-decoration-none text-warning fw-semibold text-uppercase">Update Info</a>
            </h2>
            <p class="text-success">
                <?php if (isset($update_data)) {
                    echo $update_data;
                } ?>
            </p>
            <input type="text" class="form-control w-100 my-4" value="<?php echo $student_data['name']; ?>"
                name="u_name">
            <input type="text" class="form-control w-100 my-4" value="<?php echo $student_data['roll']; ?>"
                name="u_roll">
            <input type="text" class="form-control w-100 my-4" value="<?php echo $student_data['reg']; ?>" name="u_reg">
            <input type="file" name="u_img" class="w-100 form-control my-4">

            <input type="hidden" name="u_id" class="form-control w-100 my-4" value="<?php echo $student_data['id']; ?>">
            <button type="submit" name="update_info" class="w-100 btn btn-warning">Update Info</button>


        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>