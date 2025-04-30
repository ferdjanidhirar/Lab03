<?php if (isset($result)): ?>
<p>Your BMI is: <?= number_format($result['bmi'], 2) ?></p>
<p>Status: <?= $result['status'] ?></p>
<?php endif; ?>
