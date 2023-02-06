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
    <title>Login</title>
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
                $emailValid = false;
                $passwordValid = false;
                if ($_SERVER['REQUEST_METHOD'] == 'POST')
                {
                    $emails = mysqli_query($conn, "SELECT `email` FROM `users` WHERE 1");
                    $passwords = mysqli_query($conn, "SELECT `password` FROM `users` WHERE 1");

                    foreach($emails as $emailRow)
                    {
                        foreach($emailRow as $emailValue)
                        {
                            if ($emailValue == $_POST["email"])
                            {
                                $emailValid = true;
                                foreach($passwords as $passRow)
                                {
                                    foreach($passRow as $passValue)
                                    {
                                        if ($passValue == $_POST["password"])
                                        {
                                            $passwordValid = true;
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if ($emailValid && $passwordValid)
                    {
                        $_SESSION['email'] = $_POST["email"];
                        $_SESSION['login']=True;
                        header("Location: viewBlog.php");
                    }
                    else
                    {
                        echo "
                            <h1>Login</h1>
                            <hr/>
                            <br/><br/>
                            <form method='POST' action='login.php'>
                                <fieldset>
                                    <p class='warning'>Incorrect username or password.</p>
                                    <input type='email' name='email' placeholder='Email Address'>
                                    <br/><br/>
                                    <input type='password' name='password' placeholder='Password'>
                                    <br/><br/>
                                    <button type='submit' class='button login-button2'>Login</button>
                                </fieldset>
                            </form>";
                    }
                    $conn->close();
                }
            ?>
        </section>
    </div>
</body>
</html>