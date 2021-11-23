<?php

session_start();
if (isset($_SESSION['userNID'])) {
	session_destroy();
	header("Location: index.php");
}