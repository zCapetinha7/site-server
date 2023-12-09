<?php
    include('php/protect.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/feed.css">
    <title>Feed - PSG</title>
</head>
<body>

    <div class="navbar">
        <h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
        <p>
            <a href="php/logout.php">Sair</a>
        </p>
    </div>

    <div class="container">
        <div class="sidebar" id="sidebar-esquerda">
            <h2>Aba Esquerda</h2>
            <p>Aqui será mostrado o menu de navegação...</p>
        </div>
        <div class="content">
            <div class="title-wrapper">
                <h2>Conteúdo Central</h2>
                <p>Aqui será mostrado o feed...</p>
            </div>
        </div>
        <div class="sidebar" id="sidebar-direita">
            <h2>Aba Direita</h2>
            <p>Aqui será mostrado os amigos...</p>
        </div>
    </div>

</body>
</html>