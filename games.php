<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Game.php";
$games = Game::fetch_all();
//var_dump($games);
?>

<div class="container">
    <div class="row">
        <?php
        foreach ($games as $game) {
            $game->printCard();
        }

        ?>
    </div>

</div>

<?php
include __DIR__ . "/Views/footer.php";
?>