<!DOCTYPE html>
<html>
<head>
    <title>Login-Pembayaran Listrik</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<center>
    <body>
    <div class="container">
        <img src="../images/default.png">
        <h2 style="color: #fff;">Lengkapi Form Untuk Melanjutkan</h2>
        <form action="" method="post">
            <div class="form-input">
                <i class="fa fa-user"></i> <input type="text" name="user" class="form-control" required placeholder="Your Username">
            </div>
            <div class="form-input">
                <i class="fa fa-key"></i> <input type="password" name="pass" class="form-control" required placeholder="Your Password">
            </div>
            <p><a href="" style="text-decoration: none;">Forgot Password ?</a></p>
            <input type="submit" name="btnsimpan" class="btn" value="Sign In">
        </form>
    </div>

    </body>
</center>
</html>

<?php

    include_once "../lib/class-Db.php";
    include_once "../lib/class-Ff.php";

    if (isset($_POST['btnsimpan'])) {
        $ff->post($_POST['user']);
        $ff->post($_POST['pass']);

        session_start();
        $id = $ff->get("id");
        $post = $odb->sant(INPUT_POST);
        extract($post);
        $q = $odb->select("admin where binary user='$user' and binary pass='$pass'");
        $hsl = $odb->nur($q);

        if ($hsl == 1) {
            $ff->alert("Welcome $user");
            $ff->redirect("admin.php");
        } else {
            $ff->alert("Kombinasi Username dan Password Salah!");
            $ff->redirect("index.php");
        }
    }
?>