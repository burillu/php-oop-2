<?php
$template = "<span>Authors: </span>";

foreach ($this->authors as $author) {
    $template .= "<span>$author, </span> ";
}

?>