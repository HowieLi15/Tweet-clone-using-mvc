<?php
    include('functions.php');

    if($_GET['action']=='loginsignup'){

        $error='';
        if(!$_POST['email']){
            $error='email is required';
        }
        elseif (!$_POST['password']){
            $error='password is required';
        }


        elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error= "Email address is considered invalid.";
        }

        if($error!=''){
            echo $error;
            exit();
        }
        if($_POST['loginActive']=='0'){
            $query="select * from users where email='".mysqli_real_escape_string($link,$_POST['email'])."'limit 1";
            $result=mysqli_query($link,$query);
            if(mysqli_num_rows($result)>0){
                $error="this address has been sign up";
            }
            else {
                $query = "insert into users (email,password) values ('" . mysqli_real_escape_string($link, $_POST['email'])."' , '". mysqli_real_escape_string($link, $_POST['password'])."')";

                if (mysqli_query($link, $query)) {
                    echo '1';
                    $_SESSION['id']=mysqli_insert_id($link);
                }
                else {
                    echo 'fail';
                }
            }

        }
        else{
            $query="select * from users where email='".mysqli_real_escape_string($link,$_POST['email'])."'limit 1";
            $result=mysqli_query($link,$query);
            $row= mysqli_fetch_assoc($result);
            if($row['password']==$_POST['password']){
                echo '1';
                $_SESSION['id']=$row['id'];
            }
            else $error= 'fail';
        }
}
if($error!=''){
    echo $error;
    exit();
}
    ?>