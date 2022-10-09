<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';

$id=$_GET['id'];
$querry="SELECT * FROM adnin;";
$data=mysqli_query($connection,$querry);
$person=mysqli_fetch_assoc($data);
?>

<h1>UPDATE ADMINS</h1>
<small class="form-text text-muted">HELLO SIR,U CAN UPDATE</small>
<div class="container">
<form method="POST" enctype="multipart/form-data">

  <div class="form-group" >
    <label >NAME:</label>
    <input type="text" value="<?= $person['name'] ?>" class="form-control text-light bg-dark" name="name" >
   
  </div>

  <div class="form-group" >
    <label >AGE:</label>
    <input type="text" value="<?= $person['age'] ?>" class="form-control text-light bg-dark" name="age" >
   
  </div>

  <div class="form-group" >
    <label >ADDRESS:</label>
    <input type="text" value="<?= $person['address'] ?>" class="form-control text-light bg-dark" name="address" >
   
  </div>

  <div class="form-group" >
    <label >NUMBER:</label>
    <input type="text"value="<?= $person['phone'] ?>" class="form-control text-light bg-dark" name="phone" >
   
  </div>

  <div class="form-group" >
    <label >EMAIL:</label>
    <input type="text" value="<?= $person['email'] ?>" class="form-control text-light bg-dark" name="email" >
   
  </div>

  
  <div class="form-group" >
    <label >PASSWORD:</label>
    <input type="password" value="<?= $person['password'] ?>" class="form-control text-light bg-dark" name="password" >
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
 
  

  
  <button type="submit" name="upd" class="btn btn-success">UPDATE</button>
  
  
</form>
</div>
<?php
//update

if (isset($_POST['upd'])) {
   
    $name = $_POST["name"];
    $age=$_POST["age"];
    $address=$_POST["address"];
    $phone=$_POST["phone"];
    $email=$_POST['email'];
    $password = $_POST["password"];

    //photo
    $image_name = time()  . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);

    $role = $_POST["role"];

  $update = "UPDATE adnin SET `name` ='$name',`age`= '$age', `address`= '$address', `phone`= '$phone', email=' $email' ,`password`= '$password' ,`image`='$location',`role`= '$role' WHERE `id` = '$id';";
  $updated=mysqli_query($connection, $update);
  if($updated){
    echo "<div class='alert alert-primary' role='alert'>update DONE</div>";
    header("location:/odc/exam2/admin/listadmin.php");
  }
  else{echo "<div class='alert alert-danger' role='alert'>update DONE</div>";}
}


include '../shared/footer.php';
?>



