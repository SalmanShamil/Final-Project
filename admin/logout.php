<?php
session_start();
unset($_SESSION['admin']);
unset($_SESSION['type']);
session_destroy();
header("Location: login.php");