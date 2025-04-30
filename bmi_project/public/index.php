<?php
session_start();
require '../config/database.php';
require '../app/models/BmiModel.php';
require '../app/controllers/BmiController.php';

$model = new BmiModel($db);
$controller = new BmiController($model);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $result = $controller->calculateBmi($_SESSION['user_id'], $_POST['name'], $_POST['weight'], $_POST['height']);
}
require '../app/views/bmi_form.php';
require '../app/views/bmi_result.php';

?>
<html>
     <head> 
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
    <a href="history.php" style="padding: 10px 15px; background-color: #0d6efd; color: white; text-decoration: none; border-radius: 5px;">History_chart</a>
    <a href="logout.php" style="padding: 10px 15px; background-color: #dc3545; color: white; text-decoration: none; border-radius: 5px;">Logout</a>

</body>
</html>
