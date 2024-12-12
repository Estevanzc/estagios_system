
    <header class="main-menu">
        <nav class="nav-bar">
            <img src="uploads/logo.png" onclick="home_redirect()" alt="">

            <ul class="nav-links">
                <li><a href="estudantes.php">Estudantes</a></li>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="empresas.php">Empresas</a></li>
                <li><a href="bancas.php">Bancas</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="documentos.php">Documentos</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>

            <div class="profile-div">
                <a href="#">
                    <img src="uploads/<?php echo($_SESSION["usuario"]->getFoto() ? $_SESSION["usuario"]->getFoto() : "White-Duck.png");?>" alt="Sua imagem de perfil">
                </a>
            </div>
        </nav>
        <nav class="nav-bar-phone">
            <div class="logo-div">
                <img src="uploads/logo-no-txt.png" alt="">
            </div>

            <a class="hamburguer-menu" id="hamburguer-menu" href="#">
                <ion-icon name="menu"></ion-icon>
            </a>

            <ul id="nav-links" class="nav-links">
                <li>
                    <img style="max-width: 100px;" src="uploads/<?php echo($_SESSION["usuario"]->getFoto())?>" alt="Sua imagem de perfil">
                    <h2><?php echo($_SESSION["usuario"]->getLogin())?></h2>
                </li>
                <li><a href="estudantes.php">Estudantes</a></li>
                <li><a href="professores.php">Professores</a></li>
                <li><a href="empresas.php">Empresas</a></li>
                <li><a href="bancas.php">Bancas</a></li>
                <li><a href="contratos.php">Contratos</a></li>
                <li><a href="cursos.php">Cursos</a></li>
                <li><a href="documentos.php">Documentos</a></li>
            </ul>
        </nav>
    </header>