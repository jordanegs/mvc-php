<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="./">Aplicaciones Distribuidas</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo $_SESSION['nombres'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right animate slideIn" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="./?c=login&a=salir">Salir</a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>