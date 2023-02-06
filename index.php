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
    <title>My Portfolio</title>
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
            <h1>Hi, I'm Kishan.</h1>
            <br/>
            <h2>Welcome to my portfolio.</h2>
            <br/><br/>
            <?php
                if(isset($_SESSION['login']))
                {
                    if($_SESSION['login'])
                    {
                        $name = mysqli_query($conn, "SELECT `firstName`, `lastName`FROM `users` WHERE email='".$_SESSION["email"]."'");
                        foreach($name as $nameValue)
                        {
                            echo "<h2 id='welcome'><i>Welcome, ".$nameValue['firstName']." ".$nameValue['lastName']."</i></h2>";
                        }
                        echo '<a href="logout.php" id="login-button"><p class="button">Logout</p></a>';
                    }
                }
                else
                {
                    echo '<a href="login.html" id="login-button"><p class="button">Login</p></a>';
                }
                
            ?>
        </section>
    </div>
    <div>
        <div class="box social">
            <a href="https://github.com/Techno504"><img src="img/github.png" alt="GitHub" title="GitHub Image" width="15%" height="15%"></a>
        </div>
        <div class="box social">
            <a href="https://www.linkedin.com/in/kishan-kumaran-thanikasalam-038855201/"><img src="img/linkedin.png" alt="Linkedin" title="Linkedin Image" width="15%" height="15%"></a>
        </div>
    </div>
    <footer>
        <hr />
        <nav>
            <ul>
                <li><a href="#top">Top of Page</a> |</li>
                <li><a href="about.html">About Me</a> |</li>
                <li><a href="projects.html">Projects</a></li>
            </ul>
        </nav>
        <br />
        <p><i>Copyright © 2022 Kishan Kumaran Thanikasalam</i></p>
    </footer>
</body>
</html>