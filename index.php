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
        thead{
            background: black;
            color: white;
        }
    </style>
    <title>Registrations</title>
</head>
<body>
    <?php if (!is_null($success)): ?> 
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            Successfully saved your registration
        </div>
        <?php endif ?>

        <?php if (!is_null($error)): ?>
        <div class="alert alert-warning d-flex align-items-center" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            Error, Try again.
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
    <table class="table table-striped table-hover">
        <thead>
            <tr>
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