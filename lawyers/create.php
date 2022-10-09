<?php 
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';
//select

?>

<h1>ADD NEW LAWYERS</h1>
<small class="form-text text-muted">HELLO SIR , HOW ARE YOU</small>
<div class="container">
<form method="POST" enctype="multipart/form-data">
  <div class="form-group" >


    <label >NAME:</label>
    <input type="text" class="form-control text-light bg-dark" name="name" >
   
  </div>
  <div class="form-group" >
    <label >AGE:</label>
    <input type="date" class="form-control text-light bg-dark" name="age" >
   
  </div>


  <div class="form-group" >
    <label >ADDRESS:</label>
    <input type="text" class="form-control text-light bg-dark" name="address" >
   
  </div>


  <div class="form-group" >
    <label >SALARY:</label>
    <input type="text" class="form-control text-light bg-dark" name="salary" >
   
  </div>


  <div class="form-group" >
    <label >YEARS EXPERIENCE:</label>
    <input type="text" class="form-control text-light bg-dark" name="yearsEX" >
   
  </div>


  <div class="form-group" >
    <label >PHONE::</label>
    <input type="text" class="form-control text-light bg-dark" name="phone" >
   
  </div>
  
    
  
 
  <div class="form-group" >
    <label >EMAIL:</label>
    <input type="text" class="form-control text-light bg-dark" name="email" >
   
  </div>

  <div class="form-group" >
    <label >PSSWORD:</label>
    <input type="text" class="form-control text-light bg-dark" name="password" >
   
  </div>
  

  <div class="form-group">
                    <label for="">LAWYER Profile</label>
                    <input class="form-control-file" type="file" name="image">
                </div>
  <button type="submit" name="insert" class="btn btn-info">INSERT</button>
  
  <div class="form-group">
    <label >REMOVE DEPARTMENT</label>
    <input type="text" class="form-control text-light bg-dark" name="remove">
  </div>
  
  <button type="submit" class="btn btn-danger" name="reset">REMOVE</button>
</form>
</div>

<?php
if(isset($_POST['insert'])){
    $name=$_POST['name'];
    $age=$_POST['age'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $yearsex=$_POST['yearsEX'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    
    //photo
    $image_name = time()  . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);

    //insert
    $insert="INSERT INTO lawyers values(null,'$name','$age','$address','$salary','$yearsex','$phone','$email','$password','$location')";
    
    $check = mysqli_query($connection,$insert);
    if($check){
        echo"<div class='alert alert-primary' role='alert'>INSERT DONE</div>";
        header("location:/odc/exam2/lawyers/listlawyer.php");
        
    }
    else{
        echo"<div class='alert alert-danger' role='alert'>INSERT FALSE</div>";
    } 

}

//remove
if(isset($_POST['reset'])){
  $removed=$_POST['remove'];
$rese="DELETE FROM lawyers WHERE id='$removed'";
$cremoved = mysqli_query($connection, $rese);
if($cremoved){
  echo"<div class='alert alert-danger' role='alert'>REMOVED</div>";
  header("location:/odc/exam2/lawyers/listlawyer.php");
}
else{
  echo"there is no data named by this";
} 
}




include '../shared/footer.php';


?>
