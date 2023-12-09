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
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Feed - PSG</title>
</head>
<body>

    <div class="navbar">
        <h1>Bem vindo(a), <?php echo $_SESSION['username']; ?></h1>
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
            <div class="img-button">
                <input type="file" id="fileInput" accept="image/*" onchange="changeBackground(this)">
                <label for="fileInput" id="uploadButton"><i class='bx bx-edit'></i></label>
            </div>
        </div>
        <div class="sidebar" id="sidebar-direita">
            <h2>Aba Direita</h2>
            <p>Aqui será mostrado os amigos...</p>
        </div>
    </div>

    <script>
        function changeBackground(input) {
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    const contentDiv = document.getElementsByClassName('content')[0];
                    contentDiv.style.backgroundImage = `url(${e.target.result})`;
                };

                reader.readAsDataURL(file);
            }
        }
    </script>

</body>
</html>