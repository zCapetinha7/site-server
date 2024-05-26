<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PSG - Register</title>
    <link rel="icon" href="../img/duck icon.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    
    <div class="wrapper">
        <div class="left-container">
            <form action="php/signup.php" method="POST">
                    <h1>Register</h1>
                <div class="input-box">
                    <input type="text" name="username" placeholder="Username *" required>
                    <i class='bx bxs-user'></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Password *" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <div class="input-box">
                    <input type="password" name="confirm-password" placeholder="Confirm Password *" required>
                    <i class='bx bxs-lock-alt' ></i>
                </div>
                <button type="submit" class="btn">Sign Up</button>
                <div class="register-link">
                    <p>Already have an account? <a href="login.php">Login</a></p>
                </div>
    
            </form>
        </div>
        <div class="right-container">
            <img src="../img/logo-psg-sombra.png" alt="" width="400px">
        </div>
    </div>

</body>

</html>