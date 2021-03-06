<?php
ob_start();
if (isset($_GET['page']) && $_GET['page'] != "") {
    $page = $_GET['page'];
    if (isset($_GET['pasta']) && $_GET['pasta'] != "") {
        $pasta = $_GET['pasta'];
        require_once "./src/view/user/$pasta/$page.php";
    }
} else {
    require_once "./src/view/user/menuHome/home.php";
}
$output = ob_get_clean();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="<?= _URLBASE_ ?>public/icon/favIconSebook.png">
    <!--<link rel="stylesheet" href="". _URLBASE_ ."public/css/slick.css">-->
    <link rel="stylesheet" href="<?= _URLBASE_ ?>public/css/user.css">
    <?= $mapa ?? "" ?>
    <?php
        if(isset($styleSobrescrito) && $styleSobrescrito != ""){
            ?>
            <style>
                <?=$styleSobrescrito?>
            </style>
        <?php
        } 
    ?>
    <?= $cssCaminho ?? "" ?>

    <title><?= isset($title) ? 'Sebook | ' . $title : 'Sebook' ?></title>
    <script src='<?= _URLBASE_ ?>public/js/funcoes.js'></script>

    <!-- https://code.jquery.com/jquery-2.1.1.js -->
    <script type="text/javascript" src="<?= _URLBASE_ ?>public/js/jquery-2.1.0.js"></script>

    <script src='<?= _URLBASE_ ?>public/js/validacoes.js'></script>
    <!--<Máscara para o CNPJ>-->
    <script src='https://www.geradorcnpj.com/assets/js/jquery-1.2.6.pack.js'></script>
    <!--<Máscara para o CNPJ>-->
    <script src='https://www.geradorcnpj.com/assets/js/jquery.maskedinput-1.1.4.pack.js'></script>
    <!--<Máscara para o CPF>-->
    <script src='https://www.geradorcpf.com/assets/js/jquery-1.2.6.pack.js'></script>
    <!--<Máscara para o CPF>-->
    <script src='https://www.geradorcpf.com/assets/js/jquery.maskedinput-1.1.4.pack.js'></script>
</head>

<body>
    <div class="containerScroll">
        <?php
        $menuHide ?? require_once 'menu/header.php';
        if (isset($title) && $title == "Melhor agregador de acervos"){
            //BANNER
            //require_once  'src/view/user/util/banner.php';
            require_once  'src/view/user/util/bannerChamadaCad.php';
        }
        ?>
        <div id="containerTemplate">
            <?php
            if (isset($menuHide) != true) {
                require_once 'menu/social.php';
                ?>
                <main>
                    <?= $output ?>
                </main>
            <?php
            } else {
                echo $output;
            }
            ?>
        </div>
        <?php $menuHide ?? require_once 'menu/footer.php'; ?>
    </div>
</body>

</html>