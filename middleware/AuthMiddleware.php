<?php

function requireAuth(){
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?c=Auth&m=loginForm"); 
        exit;
    }
}