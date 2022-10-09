<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';

$error = "";
$errorColor = "";

if (isset($_POST['login'])) {
    $name = $_POST["name"];
    $password = $_POST["password"];
    //$newPassword = sha1($password);
    $select = "SELECT * FROM adnin where `name` ='$name' and `password` = '$password';";
    
    $s  = mysqli_query($connection, $select);
    $numRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
    if ($numRows == 1) {
        echo "True admin";
        $error =  "access Data";
        $errorColor = "green";
        $_SESSION['admin'] = [
            'adminName' => $name,
            'role'=>$row['role'],
        ];

        header("location:/odc/exam2/admin/listadmin.php");
    }
        elseif($numRows == 0){
            $select = "SELECT * FROM lawyers where `name` ='$name' and `password` = '$password';";
            $s  = mysqli_query($connection, $select);
    $numRows = mysqli_num_rows($s);
    $row = mysqli_fetch_assoc($s);
            if($numRows == 1){
                echo "True admin";
                $error =  "access Data";
                $errorColor = "green";
                $_SESSION['lawyer'] = [
                    'lawyerName' => $name,
                    
                ];
                header("location:/odc/exam2/lawyers/listlawyer.php");
            }
        }
     else {
        $error =  "Wrong Data";
        $errorColor = "red";
    }
}


?>


<h1 class="text-center">Login </h1>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body bg-dark">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for=""> Name : <span class="text-info"><?= $error ?></span></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control text-light bg-dark" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for=""> Password: <span class="text-info"><?= $error ?></label>
                    <input style="border:1px solid <?= $errorColor ?> " class="form-control text-light bg-dark" type="text" name="password">
                </div>

                <button name="login" class="btn btn-info"> login </button>

            </form>
        </div>
    </div>
</div>
<?php

include '../shared/footer.php';
?>