<?php
    include('connection.php');

    if(isset($_POST['username']) || isset($_POST['password'])) {

            $username = $mysqli->real_escape_string($_POST['username']);
            $password = $mysqli->real_escape_string($_POST['password']);

            $sql_code = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

            $results = $sql_query->num_rows;
            
            if($results == 1) {

                $user = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                header("Location: feed.php");

            } else {
                echo "<script>
                    alert('Incorrect username or password.');
                    window.location.href = 'login.php'; //
                    </script>";
            }

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSG - Login</title>
    <link rel="icon" href="../img/duck icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <div class="wrapper">
        <div class="left-container">
            <form action="" method="POST">
                    <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
    
                <div class="remember-forgot">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#">Forgot password?</a>
                </div>
    
                <button type="submit" class="btn">Sign in</button>
    
                <div class="register-link">
                    <p>Don't have an account? <a href="register.php">Register</a></p>
                </div>
    
            </form>
        </div>
        <div class="right-container">
            <img src="../img/logo-psg-sombra.png" alt="" width="400px">
        </div>
    </div>

</body>

</html>