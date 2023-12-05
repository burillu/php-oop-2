<?php
include __DIR__ . "/Genre.php";
include __DIR__ . '/Product.php';
class Movie extends Product
{
    private int $id;
    private string $title;
    private string $overview;
    private float $vote_average;
    private string $release_date;
    private string $poster_path;
    private string $original_language;
    private array $genre;
    //funzione costruttore


    public function __construct($id, $title, $overview, $vote_average, $release_date, $poster_path, $original_language, $genre, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->overview = $overview;
        $this->vote_average = $vote_average;
        $this->release_date = $release_date;
        $this->poster_path = $poster_path;
        $this->original_language = $original_language;
        $this->genre = $genre;
    }

    public function printStars()
    {
        $vote = ceil($this->vote_average / 2);
        include __DIR__ . "/Vote.php";
        return $template;
    }
    public function printFlags()
    {
        $flag_file = $this->original_language . ".svg";
        $flags_list = scandir(__DIR__ . "/../img/flags");
        if (!array_search($flag_file, $flags_list)) {
            $flag_file = 'default-lang.png';
        }
        return $flag_file;
    }
    public function printCard()
    {
        //$sconto = $this->set_discount($this->title);
        $genre = $this->genre;
        $image = $this->poster_path;
        $title = $this->title;
        $flag_file = $this->printFlags();
        $content = substr($this->overview, 0, 100) . '...';
        $custom = $this->printStars();
        //$lang = $this->original_language;
        include __DIR__ . "/Card.php";
    }
}




$movie_string = file_get_contents(__DIR__ . '/movie_db.json');
$movieList = json_decode($movie_string, true);

$movies = [];
foreach ($movieList as $movie) {
    $genre_array=[];
    foreach($movie['genre_ids'] as $genre_id) {
        $index= rand(0,count($genres)-1);
        $genre_array[]=$genres[$index];
    }
    $movies[] = new Movie($movie['id'], $movie['title'], $movie['overview'], $movie['vote_average'], $movie['release_date'], $movie['poster_path'], $movie['original_language'], $genre_array, 25.00, 44);
}
//var_dump($movies);

//echo $movies[0]->printStars();



?>