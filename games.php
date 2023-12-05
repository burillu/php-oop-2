<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Game.php";
//$books = Book::fetch_all();
$game = new Game(121, 'Assassins creed', 454, true, 22, 44);
var_dump($game);

?>

<div class="container">
    <div class="row">

    </div>

</div>

<?php
include __DIR__ . "/Views/footer.php";
?>