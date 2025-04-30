<canvas id="bmiChart" width="400" height="200"></canvas>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('bmiChart').getContext('2d');
    const chart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode(array_column($history, 'timestamp')) ?>,
            datasets: [{
                label: 'BMI History',
                data: <?= json_encode(array_column($history, 'bmi')) ?>,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        }
    });
</script>
