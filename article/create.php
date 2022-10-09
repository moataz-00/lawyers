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


    <label >TITLE:</label>
    <input type="text" class="form-control text-light bg-dark" name="title" >
   
  </div>
  <div class="form-group" >
    <label >DESCRIPTION:</label>
    <input type="text" class="form-control text-light bg-dark" name="description" >
   
  </div>


  


  <div class="form-group" >
    <label >AUTHOR:</label>
    <input type="text" class="form-control text-light bg-dark" name="author" >
   
  </div>


  <div class="form-group">
                    <label for="">LAWYER Profile</label>
                    <input class="form-control-file" type="file" name="image">
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
    $title=$_POST['title'];
    $description=$_POST['description'];
    $author=$_POST['author'];
    $location=$_POST['location'];
    
    $location=$_POST['$location'];
    
    //photo
    $image_name = time()  . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);

    //insert
    $insert="INSERT INTO articles values(null,'$title','$description','$author','$location',DEFAULT,default,'$location')";
    
    $check = mysqli_query($connection,$insert);
    if($check){
        echo"<div class='alert alert-primary' role='alert'>INSERT DONE</div>";
        header("location:/odc/exam2/article/listarticle.php");
        
    }
    else{
        echo"<div class='alert alert-danger' role='alert'>INSERT FALSE</div>";
    } 

}

//remove
if(isset($_POST['reset'])){
  $removed=$_POST['remove'];
$rese="DELETE FROM articles WHERE id='$removed'";
$cremoved = mysqli_query($connection, $rese);
if($cremoved){
  echo"<div class='alert alert-danger' role='alert'>REMOVED</div>";
  header("location:/odc/exam2/article/listarticle.php");
}
else{
  echo"there is no data named by this";
} 
}




include '../shared/footer.php';


?>
