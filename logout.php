<?php
// Begin the session
session_start();
                                                                                                                       
// Unset all of the session variables.
session_unset();

// Destroy the session.
session_destroy();
header('location:index.php');

$cookie_id = 0;

if(isset($_COOKIE['ybaCart'])){
        $cookie_id = count($_COOKIE['ybaCart']);
    }


$ybaCart = isset($_COOKIE['ybaCart'])?$_COOKIE['ybaCart']:[];	

    foreach ($ybaCart as $key => $val) {
    	for ($i=0; $i <= $key; $i++) {
        setcookie("ybaCart[" . ($i) . "][products_id]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][customers_basket_quantity]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][title]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][background]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][customs]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][footer]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][upload]", "", time() + (60 * 5), "/"); //5 Minutes
        setcookie("ybaCart[" . ($i) . "][cookie_id]", "", time() + (60 * 5), "/"); //5 Minutes
        }
    }

if(isset($_COOKIE['check'])){
    	setcookie('check',"", time() + (60 * 5), "/");    
    }

?>