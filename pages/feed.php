<?php
    include('php/protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feed - PSG</title>
</head>
<body>
    Welcome, <?php echo $_SESSION['username']; ?>

    <p>
        <a href="php/logout.php">Sair</a>
    </p>
</body>
</html>