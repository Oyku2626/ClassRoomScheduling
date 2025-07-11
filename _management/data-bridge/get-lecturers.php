<?php
header('Content-Type: application/json');
include $_SERVER['DOCUMENT_ROOT'] . '/room-scheduler/dbo_test.php';

try {
    $stmt = $pdo->query("SELECT id, name FROM lecturers");
     $lecturers = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($lecturers);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Veritabanı hatası']);
}
