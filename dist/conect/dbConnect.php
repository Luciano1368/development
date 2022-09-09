<?php
    $servername = "localhost";
    $database = "challenge";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($servername, $username, $password, $database);
    

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        $query= "CREATE TABLE IF NOT EXISTS post(
            userId INT(11)  NULL,
            id INT(11)  NULL,
            title VARCHAR(1000)  NULL,
            body VARCHAR(5000)  NULL
        )";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

        $query= "CREATE TABLE IF NOT EXISTS post_request(
            id INT(11) AUTO_INCREMENT PRIMARY KEY,
            timeReq VARCHAR (10) NULL,
            hourReq VARCHAR (10) NULL,
            contador VARCHAR (10) NULL
        )";
        $result = mysqli_query($conn, $query) or die(mysqli_error($conn));


    }



    date_default_timezone_set("America/Argentina/Mendoza");
    
    $horaHoy=date("H:i");
    $fechaHoy = date("Y-m-d");


    

?>