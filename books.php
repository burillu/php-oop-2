<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Book.php";
$books = Book::fetch_all();
var_dump($books);
?>

<div class="container">
    <div class="row">

    </div>

</div>

<?php
include __DIR__ . "/Views/footer.php";
?>