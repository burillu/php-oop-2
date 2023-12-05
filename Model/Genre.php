<?php
class Genre
{
    public string $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
    public function printGenre()
    {
        $genre = $this->name;
        include __DIR__ . "/../Views/genre_template.php";
        return $template;
    }
    public static function fetch_all()
    {
        $genre_string = file_get_contents(__DIR__ . '/genre_db.json');
        $genre_list = json_decode($genre_string, true);
        $genres = [];
        foreach ($genre_list as $genre) {
            $genres[] = new Genre($genre);
        }
        return $genres;
    }
}


//var_dump($genres);


?>