<?php
include "upload.php";

$success = $_GET['success'] ?? null;
$error = $_GET['error'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        #add{
            margin-left:40%;
        }
    </style>
    <title>Registrations</title>
</head>
<body>
    <?php if (!is_null($success)): ?>
        <div class="alert alert-success" role="alert">
        Successfully saved your registration
        </div>
        <?php endif ?>

        <?php if (!is_null($error)): ?>
        <div class="alert alert-danger" role="alert">
            Error. Please upload an image file.
        </div>
    <?php endif ?>
    <div class="container">
        <div class="row">
            <div class="col-9"><h1>Registrations</h1></div>
            <div class="col-3">
                <form method="POST" action="register.php">
                    <button id="add" button class="btn btn-primary">Add New Registration</button>
                </form>
            </div> 
        </div>
    </div>
    <div class="container">
    <table class="table table-dark table-hover">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Complete Name</th>
            <th scope="col">Email</th>
            <th scope="col">Picture</th>
            <th scope="col">Registered Date</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $upload = new Upload;
                $uploadData = $upload->uploadData();
                foreach($uploadData as $data){
            ?>
                <tr>
                <th scope="row"><?php echo $data['id']?></th>
                <td><?php echo $data['complete_name']?></td>
                <td><?php echo $data['email']?></td>
                <td><?php echo "<img width=100px;height=100px; src=" . $data['picture_path'] . ">";?></td>
                <td><?php echo $data['registered_at']?></td>
                </tr>
        <?php } ?>
        </tbody>
    </table>
    </div>
</body>
</html>