	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/popper.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="font/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <script type="text/javascript" src="js/java.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <link rel="shortcut icon" type="image/jpg" href="admin/upload/<?php 
    $sql = mysqli_query($connect, "SELECT * FROM links WHERE id = 1");
            while ( $rw = mysqli_fetch_array($sql)) {
                echo $rw['image'];    
                }
            ?>">
     

      <?php
        
        if (!empty($client)) {
            $client = $_SERVER ['http_client_ip'];
           $ip = $client;
        }elseif (!empty($for)) {
            $for = $_SERVER ['HTTP_X_FORWARDED_FOR'];
           $ip = $for;
        }else{
            $remote = $_SERVER['REMOTE_ADDR'];
            $ip = $remote; 
        }
        if (isset($ip)) {
            $date = date('d/M/Y');
             $sql  = "SELECT * FROM visitors WHERE date = '{$date}'";
             $query = mysqli_query($connect, $sql);
             $count = mysqli_num_rows($query);
             if ($count == 0) {
            $ins = "INSERT INTO visitors (times, date) VALUES ('1', '$date')";
            $i_query = mysqli_query($connect, $ins);
            if ($i_query) {
                
            echo $date;
            }
             }
             else{
                $s_sql = "SELECT * FROM visitors WHERE date = '{$date}'";
                $s_query = mysqli_query($connect, $s_sql);
                while ($p = mysqli_fetch_array($s_query)) {
                    $plus = $p['times'] + 1;
                    $ins = "UPDATE visitors SET times = '{$plus}' WHERE date = '{$date}'";
                    $i_query = mysqli_query($connect, $ins);
                }
              
             }

            } 

            

    ?>