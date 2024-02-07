<?php
// Retrieve student data from the form
$studentName = $_POST['studentName'];
$courseName = $_POST['courseName'];
$studentTextbook1 = $_POST['studentTextbook1'];
$studentPublisher1 = $_POST['studentPublisher1'];
$studentEdition1 = $_POST['studentEdition1'];
$studentPrintingDate1 = $_POST['studentPrintingDate1'];
$studentTextbook2 = $_POST['studentTextbook2'];
$studentPublisher2 = $_POST['studentPublisher2'];
$studentEdition2 = $_POST['studentEdition2'];
$studentPrintingDate2 = $_POST['studentPrintingDate2'];

// Sample "fake" database of instructor data (you can implement this as needed)
$instructorData = [
    'course' => 'Sample Course',
    'textbooks' => [
        [
            'title' => 'Sample Textbook 1',
            'publisher' => 'Sample Publisher',
            'edition' => 1,
            'printingDate' => 2020
        ],
        [
            'title' => 'Sample Textbook 2',
            'publisher' => 'Sample Publisher',
            'edition' => 2,
            'printingDate' => 2022
        ]
    ]
];

// Processing student data
$studentData = [
    'studentName' => $studentName,
    'courseName' => $courseName,
    'textbooks' => [
        [
            'title' => $studentTextbook1,
            'publisher' => $studentPublisher1,
            'edition' => $studentEdition1,
            'printingDate' => $studentPrintingDate1
        ],
        [
            'title' => $studentTextbook2,
            'publisher' => $studentPublisher2,
            'edition' => $studentEdition2,
            'printingDate' => $studentPrintingDate2
        ]
    ]
];

// Check if student's textbooks match the instructor's textbooks
foreach ($instructorData['textbooks'] as $key => $textbook) {
    if ($textbook['title'] !== $studentData['textbooks'][$key]['title'] ||
        $textbook['edition'] !== $studentData['textbooks'][$key]['edition'] ||
        $textbook['printingDate'] !== $studentData['textbooks'][$key]['printingDate']) {
        echo "Warning: Student's textbook information does not match instructor's for Textbook " . ($key + 1) . ".\n";
    }
}

// Check if student has different editions for the same textbook
if ($studentData['textbooks'][0]['title'] === $studentData['textbooks'][1]['title'] &&
    $studentData['textbooks'][0]['edition'] !== $studentData['textbooks'][1]['edition']) {
    echo "Warning: Student has different editions for the same textbook.\n";
}

// Further processing logic can be added here, such as storing the data in a file or database.

// Respond with a success message or any other relevant response
echo "Student data processed successfully.";
?>
