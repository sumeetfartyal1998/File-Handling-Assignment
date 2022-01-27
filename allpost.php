<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    
    <title>Home</title>
  </head>
  <body>
    <div class="d-flex justify-content-center mt-2">
        <div class="container ">
            <?php
                $conn=mysqli_connect("localhost","root","","diwali_task");
                $sel=mysqli_query($conn,"select * from post order by created_at desc");
                if(mysqli_num_rows($sel)>0){
                    
                    while($arr=mysqli_fetch_assoc($sel)){
                        $uid=$arr['user_id'];
                        $sel2=mysqli_query($conn,"select * from user where id='$uid'");
                        $arr2=mysqli_fetch_assoc($sel2)
                        ?>
            <div class="card mb-3">
                <div class="card-header">
                    <div class="row">
                        <h5 class="col-6">Post by - <?php echo $arr2['name']?></h5>
                        <h5 class="col-6 text-right">Last updated :- <?php echo $arr['created_at']?></h5>
                    </div>
                </div>
                <div class="card-body">
                    <img src="post/<?php echo $arr['image']?>" style="width: 35%;" class="card-img-top" alt="...">
                    <h5 class="card-title"><?php echo $arr['title']?></h5>
                    <p class="card-text"><?php echo $arr['desp']?></p>
                    <a href="comments.php?postid=<?php echo $arr['id']?>" class="btn btn-primary">Comments</a>
                </div>
            </div>
            <?php }}?>
        </div>
    </div>

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