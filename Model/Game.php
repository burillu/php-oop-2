<?php
include __DIR__ . "/Product.php";
class Game extends Product
{
    private int $appid;
    private string $name;
    private string $playtime;
    private bool $has_stats;
    // private string $base_url = 'https://cdn.cloudflare.steamstatic.com/steam/apps/';
    //private string $end_url = '/header.jpg';
    private string $img_url;
    private array $genre = ['Action', 'Horror', 'Adventure'];

    public function __construct(int $appid, string $name, string $playtime, bool $has_stats, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->appid = $appid;
        $this->name = $name;
        $this->playtime = $playtime;
        $this->has_stats = $has_stats ? $has_stats : false;
        $this->img_url = "https://cdn.cloudflare.steamstatic.com/steam/apps/$this->appid/header.jpg ";

    }
    public function printCard()
    {
        $image = $this->img_url;
        $title = $this->name;
        $content = null;
        $custom = rand(5, 7.5);
        $genre = $this->get_genre();
        $custom2 = null;
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . '/Card.php';

    }
    public function get_genre()
    {
        $genre_str = file_get_contents(__DIR__ . '/genre_db.json');
        $genre_array = json_decode($genre_str, true);
        $genres = [];
        while (count($genres) < 3) {
            $index = rand(0, count($genre_array) - 1);
            if (!in_array($genre_array[$index], $genres)) {
                $genres[] = $genre_array[$index];
            }
        }
        return $genres;

    }
    public static function fetch_all()
    {
        $games_str = file_get_contents(__DIR__ . "/steam_db.json");
        $games_array = json_decode($games_str, true);
        $games = [];
        foreach ($games_array as $game) {
            $price = rand(12, 79);
            $quantity = rand(4, 60);
            $game_stats = isset($game['has_community_visible_stats']) ? $game['has_community_visible_stats'] : false;

            $games[] = new Game($game['appid'], $game['name'], $game['playtime_forever'], $game_stats, $price, $quantity);
        }
        return $games;
    }
}


?>