<?php 
function test($connection, $message){
    if($connection){
       echo "<div class=' alert alert-success  mx-auto w-50'> $message true </div> ";
    }
    else {echo"<div class='alert alert-danger'>$message false</div> ";}
 
}
function path($go)
{
    echo "<script>
    location ('/odc/exam2/$go')
    </script>";
}