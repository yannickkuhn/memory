<?php
    require_once('Database.php');
    use App\Database;

    $db = new Database('ecommerce');
    $datas = $db->query("SELECT * FROM product");
    echo '<pre>';
    print_r($datas);
    echo '</pre>';
