<?php
namespace App\Controllers;

class Actors { 

    function index() {
        global $db, $templates;

        $stmt = $db->prepare("SELECT 
        film_actor.actor_id, 
        concat(actor.first_name,' ',actor.last_name) as fullname,
        GROUP_CONCAT(
            film.title
            ORDER BY film.title ASC
            SEPARATOR ', '
        ) AS films
    
     FROM 
    film_actor, actor, film
    WHERE film_actor.actor_id = actor.actor_id
    AND film_actor.film_id = film.film_id
    GROUP BY film_actor.actor_id
    LIMIT 100");

        $stmt->execute();

        $actors = $stmt->fetchAll();

        echo $templates->render('actors', [ 'actors' => $actors ]);        
    }
}
