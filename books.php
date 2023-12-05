<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Book.php";
$books = Book::fetch_all();

?>

<div class="container">
    <div class="row">

    </div>

</div>

<?php
include __DIR__ . "/Views/footer.php";
?>