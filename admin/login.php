<?php  
include 'inc/config.php';
     session_start();

        $msg = $username = $password = "";

        if (isset($_POST['submit'])) {
            $name = mysqli_real_escape_string($connect, $_POST['a_name']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);

            $sql = "SELECT * FROM users WHERE name = '{$name}' && password = '{$password}'";
            $query = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($query);
            while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            
            

                if ($count > 0) {
                    $_SESSION['id'] = $row['id'];
                // header('location:results.php');
                    header('location: update.php');
                }
                else{
                    $msg = "<div class='alert-danger text-center p-2 rounded'>Incorrect  Password</div>";
                }
            }
        }elseif (isset($_POST['login'])) {
            $username = mysqli_real_escape_string($connect, $_POST['username']);
            $password = mysqli_real_escape_string($connect, $_POST['password']);
            
            $sql = "SELECT * FROM users WHERE username = '{$username}' && password = '{$password}'";
            $query = mysqli_query($connect, $sql);
            $count = mysqli_num_rows($query);
            $row = mysqli_fetch_array($query, MYSQLI_ASSOC);
            // while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            if($count < 1){
            $msg = "<div class='text-center p-2 border-danger border-bottom border-top text-light mb-2'>Incorrect Username or Password</div>";
                }
                else {
                    $_SESSION['id'] = $row['id'];
                // header('location:results.php');
                    header('location: complaints.php');
                }
                   }
        // }

?> 

<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <link rel="stylesheet" href="bootstrap/bootstrap-4.6/css/bootstrap.min.css">
    <?php include 'inc/link.php'; ?>
    
     <style type="text/css">
        ::placeholder{
            color: White;
        }
        input{
            background-color: transparent;
            -webkit-background-color: transparent;
            -moz-background-color: transparent;
            -o-background-color: transparent;
            
        }
        input:focus{
            background-color: transparent;
            -webkit-background-color: transparent;
            -moz-background-color: transparent;
            -o-background-color: transparent;
        }
     .cont:hover{
            color: #495057;
  background-color: #fff;
  /*border-color: #80bdff;*/
  outline: 0;
  box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);

        }

     </style>
</head>
<body style="font-family: open sans; font-weight: 400; background: radial-gradient(circle, rgba(0,0,0,0.7) 40%, rgba(0,0,0,.35) 30%), url('../images/rainha.jpg'); background-size: 100% 100%; background-attachment: fixed; background-repeat: repeat-y;">

<div class="p-5 col-md-3 m-auto">
    <center>
        <img src="upload/<?php 
    $sql = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
            while ( $rw = mysqli_fetch_array($sql)) {
                echo $rw['image'];    
                }
            ?>" width="150px" class="mt-5"></center>
    <h3 class="mt-3 text-center text-light" style="cursor: pointer;">Fidelity Portal</h3>
    <?php   echo $msg; ?>
    <form method="post" enctype="multipart/form-data">

    <div class="border px-2 cont" style="background-color: rgba(255,255,255,0.3); border-radius: 20px;">
        <input type="text" required="required" name="username" id="username" placeholder="Username" class="border-0 py-2 pl-1 text-light" value="<?php echo $username; ?>" style="outline: none; background-color: rgba(0,0,0,0);">
        <label for="username" class="fas fa-user text-light float-right pt-2 pr-2"></label>
    </div>

    <div class="border mt-3 px-2 cont" style="background-color: rgba(255,255,255,0.3); border-radius: 20px;">
        <input type="password" name="password" required="required" id="password" placeholder="Password" class="border-0 py-2 pl-1 text-light" style="outline: none; background-color: rgba(0,0,0,0);">
        <label for="password" class="fas fa-lock text-light float-right pt-2 pr-2"></label>
    </div>
    <button class="btn btn-light w-100 mt-3" style="border-radius: 20px" type="submit" name="login">Sign In</button>
    </form>
</div>
</body>
</html>