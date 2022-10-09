<?php
include '../general/connection.php';
include '../general/function.php';
include '../shared/header.php';
include '../shared/nav.php';

?>


<h1 class="text-center"> list ADMINS</h1>



<div class="container mt-5">
    <div class="card">
        <div class="card-body bg-dark">
            <table class="table table-dark">
                <tr>
                    <th> id </th>
                    <th> Name </th>
                    <th> AGE </th>
                    <th> ADDRESS </th>
                    <th> EMAIL </th>
                    <th>  PASS</th>
                    <th>  access</th>
                    <th> picture </th>
                    <th> <a href="/odc/exam2/admin/create.php" class="btn btn-info">ADD ADMIN</a>  </th>
                    
                </tr>

                
            <?php
            
        $show="SELECT * FROM adnin;";
           //$show="SELECT roles.description rolname,adnin.id,adnin.name,adnin.age,adnin.address,adnin.phone,adnin.email,adnin.password ,adnin.image FROM adnin INNER JOIN roles ON roles.id= adnin.id;";
            $showcheck = mysqli_query($connection, $show);

            if($showcheck){
                echo "true";
            }else{
                echo"false";
            }
            
           
            
            if ($showcheck) {
                while ($row = mysqli_fetch_assoc($showcheck)) {
                    $id = $row['id'];
                    $name = $row['name'];
                   $age=$row['age'];
                   $address=$row['address'];
                   $phone=$row['phone'];
                   $email=$row['email'];
                   $pass=$row['password'];
                    $location=$row['image'];
                    $role = $row['role'];
                    
                    echo '<tr>
        <th scope="row">' . $id . '</th>
        <td>' . $name . '</td>
        <td>' . $age . '</td>
        <td>' .  $address . '</td>
        <td>' . $email . '</td>
        <td>' . $pass . '</td>
        <td>' . $role . '</td>
        <td> <img class="emp" src="/odc/exam2/admin/'.$location.'"></td>
        <td><a href="/odc/exam2/admin/update.php?id='.$id.'" class="btn btn-info">edit</td>
        
        


        
        </tr>';
                }
            }
            

        

           
        ?>
        
        
    </table>
</div>
    </div>
</div>










<?php include '../shared/footer.php'; ?>