<?php
include __DIR__ . '/Product.php';
class Book extends Product
{
    private int $id;
    private string $title;
    private int $pageCount;
    private string $thumbnailUrl = 'https://media.wired.com/photos/5a0201b14834c514857a7ed7/master/pass/1217-WI-APHIST-01.jpg';
    private array $authors;
    private string $longDescription;
    private array $categories;

    public function __construct(int $id, string $title, int $pageCount, string $thumbnailUrl, array $authors, string $longDescription, array $categories, $price, $quantity)
    {
        parent::__construct($price, $quantity);
        $this->id = $id;
        $this->title = $title;
        $this->pageCount = $pageCount;
        $this->thumbnailUrl = (filter_var($thumbnailUrl, FILTER_VALIDATE_URL)) ? $thumbnailUrl : 'https://media.wired.com/photos/5a0201b14834c514857a7ed7/master/pass/1217-WI-APHIST-01.jpg';
        $this->authors = $authors;
        $this->longDescription = $longDescription;
        $this->categories = $categories;
    }
    public function get_authors()
    {
        $template = '';
        include __DIR__ . '/../Views/author_template.php';
        return $template;
    }
    public function printCard()
    {
        $image = $this->thumbnailUrl;
        $title = $this->title;
        $content = substr($this->longDescription, 0, 50) . '...';
        $custom = 'Pages: ' . $this->pageCount;
        $genre = $this->categories;
        $custom2 = $this->get_authors();
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . '/Card.php';
    }

    public static function fetch_all()
    {
        $books_str = file_get_contents(__DIR__ . '/books_db.json');
        $books = json_decode($books_str, true);
        $books_list = [];
        foreach ($books as $book) {
            $price = rand(0, 25);
            $quantity = rand(15, 49);
            $books_list[] = new Book($book['_id'], $book['title'], $book['pageCount'], $book['thumbnailUrl'], $book['authors'], $book['longDescription'], $book['categories'], $price, $quantity);
        }
        return $books_list;
    }



}


?>