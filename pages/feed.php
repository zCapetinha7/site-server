<?php
    include('php/protect.php');
    include('php/connection.php');

    // Verificar se o formulário foi enviado.
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['fileInput']) && $_FILES['fileInput']['error'] === 0) {
            $file = $_FILES['fileInput'];
            $userId = $_SESSION['id'];  // Supondo que você tenha uma chave 'user_id' na sua sessão.

            // Obter informações sobre o arquivo.
            $fileName = $file['name'];
            $fileTmpName = $file['tmp_name'];
            $fileSize = $file['size'];
            $fileError = $file['error'];
            $fileType = $file['type'];

            // Obter a extensão do arquivo.
            $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

            // Permitir apenas algumas extensões de arquivo. Ajuste conforme necessário.
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExt, $allowedExtensions)) {
                // Gerar um nome único para o arquivo.
                $newFileName = uniqid('user_background_', true) . '.' . $fileExt;

                // Caminho onde você deseja salvar a imagem. Ajuste conforme necessário.
                $uploadPath = 'C:\xampp\htdocs\psg\img\backgrounds\\' . $newFileName;

                // Mover o arquivo para o destino final.
                move_uploaded_file($fileTmpName, $uploadPath);

                // Salvar o caminho da imagem no banco de dados.
                $backgroundImage = $uploadPath;
                $sql = "UPDATE usuarios SET background_image = '$backgroundImage' WHERE id = $userId";
                $conn->query($sql);
            } else {
                // Se a extensão do arquivo não for permitida, você pode lidar com isso de acordo com a sua lógica.
                echo "A extensão do arquivo não é permitida.";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/duck icon.png" type="image/x-icon">
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
        <div class="dark-mode-btn">
            <input type="checkbox" class="checkbox" id="chk"/>

            <label class="label" for="chk">
                <i class='bx bxs-moon' style="color: #ffcb00;"></i>
                <i class='bx bxs-sun' style="color: #f39c12;"></i>
                <div class="ball"></div>
            </label>
        </div>
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
        const chk = document.getElementById('chk')

        chk.addEventListener('change', () => {
            document.body.classList.toggle('dark')
        })
    </script>

</body>
</html>