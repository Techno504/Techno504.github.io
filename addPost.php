<?php
    session_start();
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "ecs417";

    // Creates connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checks connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }
    
    date_default_timezone_set('Europe/London');
    $firstName = mysqli_query($conn, "SELECT `firstName`FROM `users` WHERE email='".$_SESSION["email"]."'");
    $lastName = mysqli_query($conn, "SELECT `lastName`FROM `users` WHERE email='".$_SESSION["email"]."'");

    foreach($firstName as $fName)
    {
        foreach($fName as $fValue)
        {
            $first = $fValue;
        }
    }

    foreach($lastName as $lName)
    {
        foreach($lName as $lValue)
        {
            $last = $lValue;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        mysqli_query($conn, "INSERT INTO `blogs`(`dateTime`, `title`, `content`, `user`) VALUES ('".date('l jS \of F Y h:i:s A')."','".$_POST["title"]."','".$_POST["content"]."','".$first." ".$last."')");
        header("Location: viewBlog.php");
        $conn->close();
    }
?>