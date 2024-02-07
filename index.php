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
                'title' => $_POST['book_title_1'],
                'publisher' => $_POST['book_publisher_1'],
                'edition' => $_POST['book_edition_1'],
                'printing_date' => $_POST['book_printing_date_1']
            ],
            [
                'title' => $_POST['book_title_2'],
                'publisher' => $_POST['book_publisher_2'],
                'edition' => $_POST['book_edition_2'],
                'printing_date' => $_POST['book_printing_date_2']
            ]
        ]
    ];

    // Add student data to the array
    $students[] = $studentData;

    // Check for textbook information validity
    // You can implement your validation logic here

    // Output response
    echo "Student data submitted successfully!";
}
?>
