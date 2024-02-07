<?php

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
    // Retrieve existing student data from file
    $students = [];
    if (file_exists('students.json')) {
        $students = json_decode(file_get_contents('students.json'), true);
    }

    // Check if textbook information matches for students in the same course
    foreach ($students as $student) {
        foreach ($student['textbooks'] as $textbook) {
            if ($textbook['title'] != $data['book1Title'] || $textbook['edition'] != $data['book1Edition']) {
                return "Error: Student(s) have the wrong textbook or wrong edition of the text.";
            }
        }
    }

    // Add new student data
    $students[] = [
        'firstname' => $data['firstname'],
        'lastname' => $data['lastname'],
        'textbooks' => [
            [
                'title' => $data['book1Title'],
                'publisher' => $data['book1Publisher'],
                'edition' => $data['book1Edition'],
                'date' => $data['book1Date']
            ],
            [
                'title' => $data['book2Title'],
                'publisher' => $data['book2Publisher'],
                'edition' => $data['book2Edition'],
                'date' => $data['book2Date']
            ]
        ]
    ];

    // Save updated student data to file
    file_put_contents('students.json', json_encode($students));

    return "Student data saved successfully.";
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
