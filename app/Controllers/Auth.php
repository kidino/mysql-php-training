<?php
namespace App\Controllers;

class Auth { 

    function check_logged_in() {
        if (isset($_SESSION['loggedin']) && ($_SESSION['loggedin'] == true)) {
            header('Location: /app/films');
            exit();
        }
    }

    function register() {
        global $templates;

        // do not need to register because user is logged in.
        // use must logout first
        $this->check_logged_in();

        echo $templates->render('auth::register');
    }

    function process_register() {
        global $db;
        
        // do not need to register because user is logged in.
        // use must logout first
        $this->check_logged_in();

        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare an SQL statement to insert user data into the database
        $stmt = $db->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");

        // Execute the statement
        if ($stmt->execute([$username, $hashedPassword, $email])) {
            $msg = urlencode('Registration was successful. You may proceed to login.');
            header('Location: /auth/login?message='.$msg);
        } else {
            $msg = urlencode($stmt->error);
            header('Location: /auth/register?error='.$msg);
        }
    }


    function login() {
        global $templates;

        // do not need to login because user is logged in.
        // use must logout first
        $this->check_logged_in();

        echo $templates->render('auth::login');

    }

    public function process_login() {
        global $db;

        // do not need to login because user is logged in.
        // use must logout first
        $this->check_logged_in();

        $username = $_POST["username"];
        $password = $_POST["password"];

        if (!empty($username) && !empty($password)) {
            // Prepare an SQL statement to fetch user data from the database
            $stmt = $db->prepare("SELECT id, username, password FROM users WHERE username = ?");
            $stmt->execute([$username]);

            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['loggedin'] = true;
                $msg = urlencode("Login successful. Welcome $user[username].");
                header('Location: /app/films?message='.$msg);
                // You can redirect the user to a dashboard or another page here.
            } else {
                $msg = urlencode("Login failed. Invalid username or password.");
                header('Location: /auth/login?error='.$msg);
            }
        } else {
            $msg = urlencode("Please fill out both username and password fields.");
            header('Location: /auth/login?error='.$msg);
        }
    }

    public function logout() {
        // remove loggedin session status
        unset($_SESSION['loggedin']);

        // redirecting to login page
        $msg = urlencode("You have been logged out. Thank you.");
        header('Location: /auth/login?message='.$msg);
    }

}