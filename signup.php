<?php
    session_start();
    include('connection.php');

    $username = mysqli_real_escape_string($mysqli, trim($_POST['username']));
    $password = mysqli_real_escape_string($mysqli, trim($_POST['password']));
    $confirmpassword = mysqli_real_escape_string($mysqli, $_POST['confirm-password']);

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "select count(*) as total from login where username = '$username'";
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total'] == 1) {
        $_SESSION['user_exists'] = true;
        echo "<script>
                    alert('Username already taken.');
                    window.location.href = 'register.php';
                    </script>";
        exit;
    }

    if($password != $confirmpassword) {
        echo "<script>
            alert('Passwords do not match.');
            window.location.href = 'register.php';
            </script>";
        exit;
    }

    $sql = "INSERT INTO login (username, password, registerDate) VALUES ('$username', '$hashed_password', NOW())";

    if($mysqli->query($sql) === TRUE) {
        $_SESSION['register_status'] = true;
    }

    $mysqli->close();

    echo "<script>
                    alert('Successfully registered!');
                    window.location.href = 'login.php'; //
                    </script>";
    exit;
?>