<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';

?>


<h1 class="text-center"> list LAWYERS</h1>



<div class="container mt-5">
    <div class="card">
        <div class="card-body bg-dark">
            <table class="table table-dark">
                <tr>
                    <th> id </th>
                    <th> Name </th>
                    <th> AGE </th>
                    <th> ADDRESS </th>
                    <th> salary </th>
                    <th> YEARS EX </th>
                    <th> PHONE </th>
                    <th> EMAIL </th>
                    <th> PASSWORD </th>

                    <th> picture </th>
                    <th> <a href="/odc/task2/empolyes/create.php" class="btn btn-info">ADD EMPLOYEE</a>  </th>
                    
                </tr>

                
            <?php
            
           
           $show="SELECT * FROM lawyers";
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
                    $name=$row['name'];
    $age=$row['age'];
    $address=$row['address'];
    $salary=$row['salary'];
    $yearsex=$row['yearsEX'];
    $phone=$row['phone'];
    $email=$row['email'];
    $password=$row['password'];
    $location=$row['image'];
                    
                    echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $name . '</td>
        <td>' . $age . '</td>
        <td>' . $address . '</td>
        <td>' . $salary . '</td>
        <td>' . $yearsex . '</td>
        <td>' . $phone . '</td>
        <td>' . $email . '</td>
        <td>' . $password . '</td>
        <td> <img class="emp" src="/odc/exam2/lawyers/'.$location.'"></td>
        <td><a href="/odc/exam2/lawyers/update.php?id='.$id.'" class="btn btn-info">EDIT</td>
        


        
        </tr>';
                }
            }
            

        

           
        ?>
        
        
    </table>
</div>
    </div>
</div>










<?php include '../shared/footer.php'; ?>