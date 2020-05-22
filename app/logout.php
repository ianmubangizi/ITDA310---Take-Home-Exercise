<?php
if ($_COOKIE['is-authenticated']) {
    unset($_COOKIE['is-authenticated']);
    setcookie('is-authenticated', null, -1, '/');
    header('Location: index.php');
} else {
    header('Location: login.php');
}