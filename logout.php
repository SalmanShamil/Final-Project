<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['utype']);
session_destroy();
header("Location: login.php");