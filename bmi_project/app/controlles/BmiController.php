<?php
class BmiController {
    private $model;
    public function __construct($model) {
        $this->model = $model;
    }

    public function calculateBmi($userId, $name, $weight, $height) {
        $bmi = $weight / (($height / 100) * ($height / 100));
        $status = $bmi < 18.5 ? "Underweight" : ($bmi < 25 ? "Normal" : ($bmi < 30 ? "Overweight" : "Obese"));
        $this->model->saveBmiRecord($userId, $name, $weight, $height, $bmi, $status);
        return ['bmi' => $bmi, 'status' => $status];
    }
}
?>
