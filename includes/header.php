<header>
    <div class="headerBar">
        <!--<img src="https://bit.ly/2RFyqgt" alt="" class="brandLogo"></img>-->
        <img src="assets/img/logo.png" alt="" class="brandLogo"></img>
        <!--<div class="brandLogo">MovTeather</div>-->
            <div class="menuHeader">
                <nav class="navMain" id="navMain">
                    <ul style="margin:unset !important">

                    <!--<li class="navItem"><a href="#" class="navLink">
                            <?php if ($_SESSION['user']['id_permissions']== 1): ?>
                                <?= $_SESSION['user']['id_permissions'] ?>
                            <?php endif; ?></a>
                    </li>-->

                        <?php if (!isset($_SESSION['user'])): ?>
                            <li class="navItem"><a href="#" class="navLink">Packages</a></li>
                            <li class="navItem"><a href="#" class="navLink">Help</a></li>
                            <li class="navItem"><a href="#" class="navLink">Blog</a></li>                            
                        <?php elseif($_SESSION['user']['id_permissions'] == 1): ?>
                            <li class="navItem"><a href="dashAdmin.php" class="navLink">Usuarios</a></li>
                            <li class="navItem"><a href="dashSpecific.php" class="navLink">Productos</a></li>
                            <li class="navItem"><a href="functions/conexionOff.php" class="navLink">Logout</a></li>
                        <?php elseif($_SESSION['user']['id_permissions'] == 2): ?>
                            <li class="navItem"><a href="index.php" class="navLink">Productos</a></li>
                            <!-- <li class="navItem"><a href="#" class="navLink">Perfil</a></li> -->
                            <li class="navItem"><a href="functions/conexionOff.php" class="navLink">Logout</a></li>
                        <?php endif; ?>

                        <!-- <li class="navItem"><a href="#" class="navLink">
                            <?php if (isset($_SESSION['user']) == 1): ?>
                                <?= $_SESSION['user']['id_permissions'] ?>
                            <?php endif; ?></a></li>
                        <li class="navItem"><a href="#" class="navLink">Packages</a></li>
                        <li class="navItem"><a href="#" class="navLink">Help</a></li>
                        <li class="navItem"><a href="#" class="navLink">Blog</a></li>-->
                        <!-- <li class="navItem"><a href="#" class="navLink__Log">Login</a></li>-->
                    </ul>
                </nav>
                
                <div class="iconLog">
                    <?php if (isset($_SESSION['user'])){ ?>
                        <a href="editPerfil.php" class="navLink__Log"> Perfil<!--<?= $_SESSION['user']['name'] ?>--></a>
                    <?php }else{ ?>
                        <a href="pages/signC.php" class="navLink__Log">Login</a>
                    <?php } ?>
                </div> 
            <div class="iconMenu" id="iconMenu"></div>
        </div>
    </div>
</header>