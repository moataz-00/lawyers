<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';
//select

$id=$_GET['id'];
$querry="SELECT * FROM articles;";
$data=mysqli_query($connection,$querry);
$person=mysqli_fetch_assoc($data);
?>

<h1>UPDATE ARTICLES</h1>
<small class="form-text text-muted">HELLO SIR,U CAN UPDATE</small>
<div class="container">
<form method="POST" enctype="multipart/form-data">

  <div class="form-group" >
    <label >TITLE:</label>
    <input type="text" value="<?= $person['title'] ?>" class="form-control text-light bg-dark" name="title" >
   
  </div>

  <div class="form-group" >
    <label >DESCRIPTION:</label>
    <input type="text" value="<?= $person['description'] ?>" class="form-control text-light bg-dark" name="description" >
   
  </div>

  <div class="form-group" >
    <label >AUTHOR:</label>
    <input type="text" value="<?= $person['author'] ?>" class="form-control text-light bg-dark" name="author" >
   
  </div>

  
  <div class="form-group">
                    <label for="">IMAGE ARTICLE</label>
                    <input class="form-control-file" type="file" name="image">
                </div>

  
  <button type="submit" name="upd" class="btn btn-success">UPDATE</button>
  
  
</form>
</div>
<?php
//update

if (isset($_POST['upd'])) {
   
    $title = $_POST["title"];
    $des=$_POST["description"];
    $author=$_POST["author"];
    

    //photo
    $image_name = time()  . $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $location = "./upload/$image_name";
    move_uploaded_file($tmp_name, $location);

    

  $update = "UPDATE articles SET `title` ='$title',`description`= '$des', `author`= '$author',`image`='$location',`image`='$location' WHERE `id` = '$id';";
  $updated=mysqli_query($connection, $update);
  if($updated){
    echo "<div class='alert alert-primary' role='alert'>update DONE</div>";
    header("location:/odc/exam2/article/listarticle.php");
  }
  else{echo "<div class='alert alert-danger' role='alert'>update DONE</div>";}
}


include '../shared/footer.php';
?>



