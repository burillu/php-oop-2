<?php
class Product
{
    public float $price;
    public int $sconto;
    public int $quantity;

    public function __construct($price, int $quantity)
    {
        $this->price = $price;

        $this->quantity = $quantity;
    }
    // public function set_discount($title)
    // {
    //     if ($title === "Gunfight at Rio Bravo") {
    //         return $this->sconto = 20;

    //     } else {
    //         return $this->sconto;
    //     }

    // }
}


//prende id titolo, long description, authors
//name, app id percorso, path immagini cdn bla bla bla/app_id/header.jpg
// preparare una navbar per pagina index;
//prodact è la classe padre di tutti;
//creare classe books e classe steam
?>