<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';

?>


<h1 class="text-center"> ARTICLES</h1>



<div class="container mt-5">
    <div class="card">
        <div class="card-body bg-dark">
            <table class="table table-dark">
                <tr>
                    <th> id </th>
                    <th> TITLE </th>
                    <th> DESCRIPTION </th>
                    <th> AUTHOR </th>
                    <th> picture </th>
                    <th> picture </th>
                    <th> <a href="/odc/exam2/article/create.php" class="btn btn-info">ADD ARTICLE</a>  </th>
                    
                </tr>

                
            <?php
            
           
           $show="SELECT * FROM articles";
            $showcheck = mysqli_query($connection, $show);
            IF($showcheck){
                echo"true";
            }
            else{
                echo"false";
            }
            if ($showcheck) {

                while ($row = mysqli_fetch_assoc($showcheck)) {
                    $id = $row['id'];
                    
    $title=$row['title'];
    $des=$row['description'];
     $author=$row['author'];
    $location=$row['image'];
    $location=$row['image'];
                    
                    echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $title . '</td>
        <td>' . $des . '</td>
        <td>' . $author . '</td>
        <td> <img class="emp" src="/odc/exam2/article/'.$location.'"></td>
        
        <td> <img class="emp" src="/odc/exam2/article/'.$location.'"></td>
        <td><a href="/odc/exam2/article/update.php?id='.$id.'" class="btn btn-info">EDIT</td>
        


        
        </tr>';
                }
            }
            

        

           
        ?>
        
        
    </table>
</div>
    </div>
</div>










<?php include '../shared/footer.php'; ?>