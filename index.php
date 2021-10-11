<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = "login";
}
include_once("view/template.php");
