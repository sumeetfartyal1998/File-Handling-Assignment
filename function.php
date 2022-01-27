<?php
class Project
{
    private $conn;
    function __construct(){
        $this->conn=mysqli_connect("localhost","root","","diwali_task");
    }
    function register($email,$pass,$cpass,$name){
        if(preg_match("/^(([\-\w]+)\.?)+@(([\-\w]+)\.?)+\.[a-zA-Z]{2,4}$/",$email)){
            if(preg_match("/^(?=.*\d)(?=.*[a-zA-Z])[a-zA-Z0-9!@#$%&*]{6,20}$/",$pass)){
                if($pass==$cpass){
                    $pass=sha1($pass);
                    if(mysqli_query($this->conn,"insert into user(email,pass,name) values('$email','$pass','$name')")){
                        
                        return ;
                    }else{
                        $err="Not Registered";
                        return $err;
                    }
                }else{
                    $err="Both paswords doesn't match";
                    return $err;
                }
            }else{
                $err="Enter a valid password";
                return $err;
            }
        }else{
            $err="Enter a valid email id";
            return $err;
        }
    }
    function login($email,$pass){
        if(!empty($email) || !empty($pass)){
            if(mysqli_query($this->conn,"select *from user where email='$email'")){
                $pass=sha1($pass);
                $arr=mysqli_query($this->conn,"select pass from user where email='$email'");
                $password=mysqli_fetch_assoc($arr);
                if($pass==$password['pass']){
                    return ;
                }else{
                    $err="Incorrect Password";
                    return $err;
                }
            }else{
                $err="No such email id exists please register";
                return $err;
            }
        }else{
            $err="Fill all the fields";
            return $err;
        }
    }
    function addpost($title,$desp,$tmp,$fn){
        if(!empty($title) && !empty($desp) && !empty($tmp)){
            $ext=pathinfo($fn,PATHINFO_EXTENSION);
            $exten=$ext;
            if($exten="jpg" || $exten=="jpeg" || $exten=="png"){
                $imgname=rand().".$ext";
                session_start();
                $email=$_SESSION['email'];
                $var=mysqli_query($this->conn,"select id from user where email='$email'");
                $arr=mysqli_fetch_assoc($var);
                $userid=$arr['id'];
                if(mysqli_query($this->conn,"insert into post(title,desp,image,user_id) values('$title','$desp','$imgname',$userid)")){
                    move_uploaded_file($tmp,"post/$imgname");
                    return "success";
                }else{
                    return "Post not uploaded";
                }
            }else{
                $err="Enter an image file";
                return $err;
            }
        }else{
            $err="Fill all the fields";
            return $err;
        }
    }
    function __destruct()
    {
        mysqli_close($this->conn);
    }
}
?>