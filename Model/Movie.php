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
        $template='';
        $vote = ceil($this->vote_average / 2);
        include __DIR__ . "/Vote.php";
        return $template;
    }
    public function printFlags()
    {
        $template='';
        $flag_file = $this->original_language . ".svg";
        $flags_list = scandir(__DIR__ . "/../img/flags");
        if (!array_search($flag_file, $flags_list)) {
            $flag_file = 'default-lang.png';
        }
        include __DIR__.'/../Views/flags_template.php';
        return $template;
    }
    public function get_genres_name(){
        $genres_name=[];
        foreach ($this->genre as $genre) {
            $genres_name[] = $genre->name;
        }
        return $genres_name;
    }
    public function printCard()
    {
        //$sconto = $this->set_discount($this->title);
        
        $price= $this->price;
        $quantity=$this->quantity;
        $genre = $this->get_genres_name();
        $image = $this->poster_path;
        $title = substr($this->title, 0, 25) . '...';
        $custom2 = $this->printFlags();
        $content = substr($this->overview, 0, 100) . '...';
        $custom = $this->printStars();
        //$lang = $this->original_language;
        include __DIR__ . "/Card.php";
    }
    public static function fetch_all(){
        $movie_string = file_get_contents(__DIR__ . '/movie_db.json');
        $movieList = json_decode($movie_string, true);
        $genres= Genre::fetch_all();
        $movies = [];
        foreach ($movieList as $movie) {
    $quantity= rand(2,45);
    $price= rand(4.99, 49.99);
    $genre_array=[];
    while (count ($genre_array) < count($movie['genre_ids']) ) {
        $index= rand(0,count($genres)-1);
        if (!in_array($genres[$index],$genre_array)){
             $genre_array[]=$genres[$index];
        }
       
    }
    $movies[] = new Movie($movie['id'], $movie['title'], $movie['overview'], $movie['vote_average'], $movie['release_date'], $movie['poster_path'], $movie['original_language'], $genre_array, $price, $quantity);
}
return $movies;
    }
}





//var_dump($movies);

//echo $movies[0]->printStars();



?>