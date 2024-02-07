<?php
// Array to simulate database
$students = [];

// Process form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $studentData = [
        'firstname' => $_POST['firstname'],
        'lastname' => $_POST['lastname'],
        'books' => [
            [
                'title' => $_POST['book1Title'],
                'publisher' => $_POST['book1Publisher'],
                'edition' => $_POST['book1Edition'],
                'printing_date' => $_POST['book1Date']
            ],
            [
                'title' => $_POST['book2Title'],
                'publisher' => $_POST['book2Publisher'],
                'edition' => $_POST['book2Edition'],
                'printing_date' => $_POST['book2Date']
            ]
        ]
    ];

    // Add student data to the array
    $students[] = $studentData;

    // Check for textbook information validity
    // You can implement your validation logic here

    // Return JSON response
    header('Content-Type: application/json');
    echo json_encode(['message' => 'Student data submitted successfully!']);
    exit;
}
?>
