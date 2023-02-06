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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/dateSearch.js" defer></script>
    <title>Blog</title>
</head>
<body>
    <header>
        <hgroup>
            <nav>
                <ul>
                    <li id="logo"><a href="index.php"><img src="img/logo.png" alt="Logo" title="Logo Image" width="30%" height="30%"></a></li>
                    <li><a href="index.php"><b>Kishan Kumaran Thanikasalam</b></a></li>
                    <li><a href="about.html">About Me</a></li>
                    <li><a href="experience.html">Experience</a></li>
                    <li><a href="skills.html">Skills</a></li>
                    <li><a href="education.html">Education</a></li>
                    <li><a href="projects.html">Projects</a></li>
                    <li><a href="extra-curricular.html">Extra-Curricular</a></li>
                    <li><a href="viewBlog.php">Blog</a></li>
                </ul>
            </nav>
        </hgroup>
    </header>
    <div>
        <section>
            <?php
                $blogs = mysqli_query($conn, "SELECT * FROM `blogs` WHERE 1");
                $_SESSION['blogDates'] = mysqli_query($conn, "SELECT `dateTime`FROM `blogs` WHERE 1");
                if (isset($_SESSION['login']))
                {
                    if($_SESSION['login'])
                    {
                        echo "<div>";
                        $name = mysqli_query($conn, "SELECT `firstName`, `lastName`FROM `users` WHERE email='".$_SESSION["email"]."'");
                        foreach($name as $nameValue)
                        {
                            echo "<div class='box'><h2 id='welcome'><i>Welcome, ".$nameValue['firstName']." ".$nameValue['lastName']."</i></h2></div>";
                        }
                        echo '<div class="box"><a href="logout.php" id="login-button"><p class="button">Logout</p></a></div>';
                    }
                }
                echo "<h1>Blog</h1>
                <hr/>";

                echo "<div>";
                if(isset($_SESSION['login']))
                {
                    if ($_SESSION['login'])
                    {
                        echo "<div class='box'><a href='addPost.html'><button type='submit' class='button login-button'>Add Post</button></a></div>";
                    }
                }
                else
                {
                    echo "<div class='box'><a href='login.html'><button type='submit' class='button login-button'>Add Post</button></a></div>";
                }

                echo "<div class='box'>Sort by month: <select name='month'>
                        <option>Choose Month</option>
                        <option>January</option>
                        <option>February</option>
                        <option>March</option>
                        <option>April</option>
                        <option>May</option>
                        <option>June</option>
                        <option>July</option>
                        <option>August</option>
                        <option>September</option>
                        <option>October</option>
                        <option>November</option>
                        <option>December</option>
                    </select>
                    <button type='submit' class='button' name='searchButton' onclick='printDates()'>Go</button>
                    </div>";

                
                function printDates()
                {
                    foreach($_SESSION['blogDates'] as $blogRow)
                    {
                        $date = $blogRow['dateTime'];
                        $arrayString = explode(" ", $date);
                        $selectedDate = "<p name='dateStore'></p>";
                        foreach($blogRow as $blogValue)
                        {
                            if ($arrayString[3]===$selectedDate)
                            {
                                print_r($arrayString);
                                print_r($selectedDate);
                                print_r("q");
                            }
                            else
                            {
                                print_r($arrayString[3]);
                                print_r($selectedDate);
                            }
                        }
                    }
                }

                echo "</div>";

                foreach($blogs as $blogRow)
                {
                    echo "<div class='blog'>";
                    echo "<p id='blogDate'><i>".$blogRow['dateTime']."</i></p><br>";
                    echo "<h2 id='blogTitle'><b>".$blogRow["title"]."</b></h2><br><br><br><br>";
                    echo "<p id='blogContent'>".$blogRow["content"]."</p><br><br>";
                    echo "<p id='blogBy'><i>By: ".$blogRow["user"]."</i></p><br><br>";
                    echo "<hr></div>";
                }
                $conn->close();
            ?>
        </section>
    </div>
</body>
</html>