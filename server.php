<?php
header('Content-Type: application/json');

// Function to validate textbook data
function validateTextbook($title, $publisher, $edition, $date) {
    // Validate edition (assuming it should be a positive integer)
    if (!is_numeric($edition) || $edition <= 0 || intval($edition) != $edition) {
        return false;
    }

    // Validate date (assuming it should be a valid year)
    if (!is_numeric($date) || strlen($date) !== 4 || intval($date) < 1000 || intval($date) > date('Y')) {
        return false;
    }

    // Additional validations can be added for publisher and title if needed

    return true;
}

// Function to handle student data submission
function handleStudentData($data) {
    // Check if textbook information matches for students in the same course
    // You can add more checks and validations as per your requirement
    // Here, we assume basic validation and just echo the received data
    return "Student data received: " . json_encode($data);
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get JSON data from request body
    $requestData = json_decode(file_get_contents("php://input"), true);

    // Validate textbook data
    $validTextbook1 = validateTextbook($requestData['book1Title'], $requestData['book1Publisher'], $requestData['book1Edition'], $requestData['book1Date']);
    $validTextbook2 = validateTextbook($requestData['book2Title'], $requestData['book2Publisher'], $requestData['book2Edition'], $requestData['book2Date']);

    if (!$validTextbook1 || !$validTextbook2) {
        echo json_encode(["message" => "Error: Invalid textbook information."]);
    } else {
        // Handle student data
        $response = handleStudentData($requestData);
        echo json_encode(["message" => $response]);
    }
}
?>
