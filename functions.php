<?php

function check_login_session() {
    if(!isset($_SESSION['user'])) {
        header("Location: index.php?result=no_session");
        exit;
    }
}