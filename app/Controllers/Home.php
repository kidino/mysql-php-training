<?php
namespace App\Controllers;

class Home {
    // homepage
    function index() {
        echo "<h1>Selamat Datang</h1>";
        echo "<p><a href='/login'>Login</a></p>";
    }

    // login page
    function login() {
        echo "<h1>Login Di Sini</h1>";
        echo "<p><a href='/'>Home</a></p>";
    }
}

