<?php
    $fileName = "books.json";
    $jsonData = file_get_contents($fileName);
    $bookArray = json_decode($jsonData);
?>