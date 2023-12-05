<?php
include __DIR__ . "/Product.php";
class Game extends Product
{
    private int $appid;
    private string $name;
    private string $playtime;
    private bool $has_stats;

    public function __construct(int $appid, string $name, string $playtime, bool $has_stats, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->appid = $appid;
        $this->name = $name;
        $this->playtime = $playtime;
        $this->has_stats = $has_stats;

    }

}


?>