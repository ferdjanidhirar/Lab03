<?php
require '../config/database.php';
require '../app/models/BmiModel.php';

$model = new BmiModel($db);
$bmiHistory = $model->getBmiHistory();
?>

<!DOCTYPE html>
<html>
<head>
    <title>BMI History</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="bmiChart"></canvas>
    <script>
        const ctx = document.getElementById('bmiChart').getContext('2d');
        const bmiData = <?php echo json_encode($bmiHistory); ?>;

        const labels = bmiData.map(record => record.timestamp);
        const data = bmiData.map(record => record.bmi);

        const myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'BMI History',
                    data: data,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
