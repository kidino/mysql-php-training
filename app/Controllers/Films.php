<?php
namespace App\Controllers;

class Films { 

    function index() {
        global $db, $templates;

        $stmt = $db->prepare("SELECT 
            film_id, title, description
            FROM film LIMIT 100");

        $stmt->execute();

        $films = $stmt->fetchAll();

        echo $templates->render('films', [ 'films' => $films ]);        
    }
}
