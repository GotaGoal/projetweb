<?php
function randomize($name){
    $name = pathinfo($name);
    $extension = $name["extension"];
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring = $characters[rand(0, strlen($characters))];
    }
    $name = $randstring.str_shuffle(str_replace(".","o",$name["basename"]));
    return $name.".".$extension;
}