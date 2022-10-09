<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';
if($connection){
    echo"true";
}else{echo"false";}

if (isset($_POST['add'])) {
    $name = $_POST["name"];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password = $_POST["password"];
    //create photo
    $image_name = time()  . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);

    $role = $_POST["role"];
    //$newpassword = sha1($password);
    $insert = "INSERT INTO `adnin`(`id`, `name`, `age`, `address`, `phone`, `email`, `password`, `image`, `role`) VALUES (null,'$name','$age','$address','$phone','$email','$password','$location',$role)";

    $p = mysqli_query($connection, $insert);
    echo $p;
    if($p){
        echo"<div class='alert alert-primary' role='alert'>INSERT DONE</div>";
        header("location:/odc/exam2/admin/listadmin.php");
        
    }
    else{
        echo"<div class='alert alert-danger' role='alert'>INSERT FALSE</div>";
       
    } 
    
}

//remove
if(isset($_POST['reset'])){
    $removed=$_POST['remove'];
  $rese="DELETE FROM adnin WHERE id='$removed'";
  $cremoved = mysqli_query($connection, $rese);
  if($cremoved){
    echo"<div class='alert alert-danger' role='alert'>REMOVED</div>";
    header("location:/odc/exam2/admin/listadmin.php");
  }
  else{
    echo"there is no data named by this";
  } 
  }

//if ($_SESSION['admin']['role'] != 0) {
    //path('404.php');
//}
?>
<!-- 
 -->

<h1 class="text-center">Add admin </h1>
<div class="container col-6">
    <div class="card card-password">
        <div class="card-body bg-dark">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Admin Name </label>
                    <input class="form-control text-light bg-dark" placeholder="admin name" type="text" name="name">
                </div>

                <div class="form-group">
                    <label for="">Admin AGE </label>
                    <input class="form-control text-light bg-dark" type="date" name="age">
                </div>

                <div class="form-group">
                    <label for="">Admin ADDRESS </label>
                    <input class="form-control text-light bg-dark" type="text" name="address">
                </div>

                <div class="form-group">
                    <label for="">Admin PHONE </label>
                    <input class="form-control text-light bg-dark" placeholder="admin phone" type="text" name="phone">
                </div>

                <div class="form-group">
                    <label for="">Admin EMAIL </label>
                    <input class="form-control text-light bg-dark" type="text" placeholder="ex:@gmail.com" name="email">
                </div>


                <div class="form-group">
                    <label for="">Admin Password </label>
                    <input class="form-control text-light bg-dark" type="password" name="password">
                </div>

                <div class="form-group">
                    <label for="">Employee Profile</label>
                    <input class="form-control-file" type="file" name="image">
                </div>


                <div class="form-group">
                    <label for="">Admin Role </label>
                    <select name="role" id="" class="form-control text-light bg-dark">
                        <option value="1">All access</option>
                        <option value="2">semi access</option>

                    </select>
                </div>
                <button name="add" class="btn btn-info"> Add Admin </button>

                <div class="form-group">
    <label >REMOVE DEPARTMENT</label>
    <input type="text" class="form-control text-light bg-dark" name="remove">

  </div>
  <button name="reset" class="btn btn-danger"> REMOVE </button>

            </form>
        </div>
    </div>
</div>

<?php

include '../shared/footer.php';
?>