<?php
session_start();

if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header('location:/odc/exam2/auth/login.php');
}
?>



<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="/odc/exam2/index.php"><img src="/odc/exam2/p1.png" ></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      
      <a class="nav-link" href="/odc/exam2/about.php">ABOUT US <span class="sr-only">(current)</span></a>
    </li>
    <?php if (isset($_SESSION['admin'])) : ?>
      <li class="nav-item active">
      
        <a class="nav-link" href="/odc/exam2/admin/create.php">ADD NEW ADMIN <span class="sr-only">(current)</span></a>
      </li>
      
      
      <li class="nav-item">
        <a class="nav-link" href="/odc/exam2/admin/listadmin.php">show ADMINS</a>
      </li>
      
      

      <li class="nav-item">
        <a class="nav-link" href="/odc/exam2/lawyers/create.php">ADD NEW LAWYER</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/odc/exam2/lawyers/listlawyer.php">SHOW LAWYERS</a>
      </li>
      <?php endif; ?>
      
      <?php if ((ISSET($_SESSION['admin']))||(ISSET($_SESSION['lawyer']))): ?>
      
      <li class="nav-item">
        <a class="nav-link" href="/odc/exam2/article/create.php">ADD ARTICLE</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="/odc/exam2/article/listarticle.php">SHOW ARTICLE</a>
      </li>
      <?php endif; ?>


      
      
    </ul>


   
        <?php if  ((ISSET($_SESSION['admin']))||(ISSET($_SESSION['lawyer']))): ?>
            <form action="">
                <button name="logout" class="btn btn-outline-danger"> Logout </button>
            </form>
        <?php else : ?>
            <a href="/odc/exam2/auth/login.php" class="btn btn-outline-success my-2 my-sm-0" type="submit">login</a>
        <?php endif; ?>

        <a class="nav-link btn btn-outline-info" href="/odc/exam2/admin/create.php">REGISTER <span class="sr-only">(current)</span></a>
  </div>
</nav>