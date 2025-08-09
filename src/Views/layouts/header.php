<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Site</title>
</head>
<body>
    <header>
        <ul class="list-header">

            <li>
                <a href="https://verdanatech.com/" target="_blank" ><img width="120" src="https://verdanatech.com/wp-content/webp-express/webp-images/uploads/2024/04/Group-47399.png.webp" alt="VerdanaTech"></a>
            </li>

         

            <li>
                <a href="/sistema-de-chamados/src/Views/others-pages/projec-information.php"> Informações do Projeto(só opós login)</a>
            </li>

            <li>
                <a href="https://github.com/Felipe-Rafael-Barros/sistema-de-chamados" target="_blank">Repositório Do Projeto</a>
            </li>
             <!-- Para so aparecar nas abas quando eu estiver logado  -->
            <?php if (isset($_SESSION['userLogged'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="/sistema-de-chamados/src/Views/auth/logout.php">
                        <i class="bi bi-box-arrow-right"></i> Sair (<?= $_SESSION['userLogged']['username'] ?>)
                    </a>
                </li>
            <?php endif; ?>
            
        </ul>
    </header>
</body>
</html>