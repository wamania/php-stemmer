<?php
require_once "vendor/autoload.php";

$manager = new Wamania\Snowball\StemmerManager();
echo $manager->stem('hankkijalle', 'fi');
