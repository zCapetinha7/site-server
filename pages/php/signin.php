<?php
    include('connection.php');

    if(isset($_POST['username']) || isset($_POST['password'])) {

        $username = $mysqli->real_escape_string($_POST['username']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM login WHERE username = '$username'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        $results = $sql_query->num_rows;
            
        if($results == 1) {

            $user = $sql_query->fetch_assoc();

            if (password_verify($password, $user['password'])) {

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

    }

?>