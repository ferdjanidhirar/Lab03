<?php
class BmiModel {
    private $db;
    public function __construct($database) {
        $this->db = $database;
    }

    public function saveBmiRecord($userId, $name, $weight, $height, $bmi, $status) {
        $stmt = $this->db->prepare("INSERT INTO bmi_records (user_id, name, weight, height, bmi, status) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$userId, $name, $weight, $height, $bmi, $status]);
    }

    public function getBmiHistory($userId) {
        $stmt = $this->db->prepare("SELECT * FROM bmi_records WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
