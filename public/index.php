<?php

$date = trim($_SERVER['REQUEST_URI'], '/');
$data = json_decode(file_get_contents(__DIR__ . '/../106.json'), true);

header('Content-Type: application/json');

if (!$date) {
    echo json_encode($data);
    return;
}

if ($date && !array_key_exists($date, $data)) {
    echo json_encode([
        'error' => "Invalid date: {$date}",
    ]);

    exit(1);
}

echo json_encode([
    'date' => $date,
    'is_holiday' => $data[$date],
]);
