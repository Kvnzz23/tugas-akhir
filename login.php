<?php
session_start();
include 'koneksi.php';
if(!isset($_SESSION['log'])){

}else{
    header('location:index.php');
}

if(isset($_POST['login'])){
    $username  = mysqli_real_escape_string($koneksi, $_POST['username']);
    $passwordd = mysqli_real_escape_string($koneksi, $_POST['passwordd']);
    $queryuser = mysqli_query($koneksi, "SELECT * from admin2 where username='$username'"); 
    $cariuser  = mysqli_fetch_assoc($queryuser);
    if(password_verify ($passwordd, $cariuser['passwordd'])){
        $_SESSION['id_admin'] = $cariuser['id_admin'];
        $_SESSION['username'] = $cariuser['username'];
        $_SESSION['log'] = 'login';
    }
    if($cariuser) {
        echo '<script>alert("Anda Berhasl login sebagai' . $cariuser['username'] . '")</script>';
        header("locatin:index.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Data Kuliah</title>
    <style>
        .mx-auto {
            width: 800px;
        }
    </style>
</head>

<body>
<div class="mx-auto card mt-3">
        <div class="card-header">
            Admin
        </div>
        <div class="card-body">
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="paswordd" class="form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="passwordd" name="passwordd" placeholder="Password" value="">
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="login" value="Login" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>