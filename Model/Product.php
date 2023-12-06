<?php
class Product {
    public float $price;
    private int $sconto = 0;
    public int $quantity;

    public function __construct($price, int $quantity) {
        $this->price = $price;

        $this->quantity = $quantity;
    }
    public function set_sconto($discount) {
        if($discount < 10 || $discount > 80) {
            throw new Exception("Discount out of range");

        } else {
            $this->sconto = $discount;
        }
    }
    public function get_sconto() {
        return $this->sconto;
    }
}


//prende id titolo, long description, authors
//name, app id percorso, path immagini cdn bla bla bla/app_id/header.jpg
// preparare una navbar per pagina index;
//product è la classe padre di tutti;
//creare classe books e classe steam
?>