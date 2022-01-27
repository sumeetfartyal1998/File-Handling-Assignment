<?php
$conn=mysqli_connect("localhost","root","","diwali_task");
$postid=$_GET['postid'];
if(isset($_POST['sub'])){
    session_start();
    $email=$_SESSION['email'];
    $comment=$_POST['comment'];
    if(!empty($comment)){
        mysqli_query($conn,"insert into comments(email,comment,post_id) values('$email','$comment',$postid)");
    }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <title>Comments</title>
  </head>
  <body>
    <?php include("navbar.php")?>
    <form method="post">
        <div class="d-flex justify-content-center mt-3">
            <div class="w-50">
                <div class="row ">
                    <input type="text" placeholder="Write a comment" class="form-control col-11" name="comment">
                    <button type="submit" class="btn btn-light col-1" name="sub">Post</button>
                </div>
                <div>
                    <?php 
                    $sel=mysqli_query($conn,"select * from comments where post_id='$postid' order by created_at desc");
                    if(mysqli_num_rows($sel)>0){
                        while($arr=mysqli_fetch_assoc($sel)){
                            ?>
                            <div class="">
                                <div class="card-body">
                                    <h5 class="card-title">#<?php echo $arr['email']?></h5>
                                    <p class="card-text"><?php echo $arr['comment']?></p>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </form>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
  </body>
</html>