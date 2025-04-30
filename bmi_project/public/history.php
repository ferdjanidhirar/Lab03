<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
require '../config/database.php';
require '../app/models/BmiModel.php';

$model = new BmiModel($db);
$history = $model->getBmiHistory($_SESSION['user_id']);

require '../app/views/history_chart.php';
?>
<html> 
    <head> 
    <link rel="stylesheet" href="style.css">
    </head>
</html>
