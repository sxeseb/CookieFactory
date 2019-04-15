<?php require 'inc/head.php';

if (isset($_SESSION['username'])) {

?>
    <section class="cookies container-fluid">
        <div class="container py-5">
            <div class="row">
                <?php
                if (empty($_SESSION['cart'])) {
                    echo '<div>Votre panier est vide</div>';
                } else {
                    ?>
                    <h4>Mon panier</h4>
                <div class="row justify-content-center">
                    <ul class="list-group col-sm-4 offset-sm-4">
                    <?php
                    $prods = array_count_values($_SESSION['cart']);
                    foreach ($prods as $article => $number) {
                        echo '<li class="list-group-item"><span>'.$number.' x </span>'.$article.'</li>';
                    }
                    ?>
                    </ul>
                    </div>
                    <?php
                }?>
            </div>
            <div class="row py-5">

                <a href="index.php">retour</a>
            </div>

        </div>

    </section>
    <?php require 'inc/foot.php';

}

else {
    header('location: login.php');
}?>
