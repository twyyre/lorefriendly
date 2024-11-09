<?php

$data = [
    'name' => 'John Doe',
    'age' => 30,
    'city' => 'New York'
];
header('Access-Control-Allow-Origin: *'); // Replace '*' with the specific domain if needed
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
header('Access-Control-Allow-Headers: Content-Type');
header('Content-Type: application/json');
echo json_encode($data);