<?php

class User{
    public $id, $name, $username,$email, $password,
           $status, $role, $last_login;

    public function login(){
        $conn = mysqli_connect('localhost', 'root', '', 'my_news');
        $encryptedPassword = md5($this->password);
        $sql = "select * from users where 
                 username='$this->username' and 
                 password='$encryptedPassword'";
        $var = $conn->query($sql);
        if($var->num_rows > 0){
            $data = $var->fetch_object();
            @session_start();
            $_SESSION['id']=$data->id;
            $_SESSION['name']=$data->name;
            $_SESSION['username']=$data->username;
            $_SESSION['role']=$data->role;
            setcookie('username',$data->username, time() + 60 * 60);
            header('location:myWeb/dashboard.php');
        }else{
            $error = "Invalid Credentials!";
            return $error;

        }
    }


}


?>