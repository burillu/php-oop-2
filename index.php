<?php
include __DIR__."/Views/header.php";
include __DIR__."/Model/Movie.php";
$movies = Movie::fetch_all();
//phpinfo();
?>

<div class="container">
  <div class="row">
    <?php foreach($movies as $movie) {
      echo $movie->printCard($movie->formatCard());
      //var_dump($movie);
    } ?>
  </div>

</div>

<?php
include __DIR__."/Views/footer.php";
?>