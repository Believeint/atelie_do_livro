<?php

include_once 'Core/init.php';

$db = DB::getInstance();

if(Session::exists('home')) {
    echo '<p>' . Session::flash('home') . '</p>';
}


?>



