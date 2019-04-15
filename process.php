<?php
session_start();

// gestion du login
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(!empty($_POST['loginname']) && isset($_POST['loginname'])) {

        $_SESSION['username'] = testInput($_POST['loginname']);
        header('location: index.php');
    } else {
        header('location: login.php');
    }
}

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    //gestion de l'ajout au panier
    if (isset($_GET['add_to_cart']) && !empty($_GET['add_to_cart'])) {
        $product = "";
        switch ($_GET['add_to_cart']) {
            case 46 :
                $product = "Pecan nuts";
                break;
            case 36 :
                $product = "Chocolate chips";
                break;
            case 58 :
                $product = "Chocolate cookie";
                break;
            case 32 :
                $product = "M&M's cookie";
        }
        $_SESSION['cart'][] = $product;
        $_SESSION['message'] = "L'article a été ajouté au panier";
        header('location: index.php');
    }

    if (isset($_GET['a']) && !empty($_GET['a'])) {
        if ($_GET['a'] == 'd') {
            unset($_SESSION['username']);
            unset($_SESSION['cart']);
            header('location: index.php');
        }
    }
}


function testInput($data) {
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}
?>


