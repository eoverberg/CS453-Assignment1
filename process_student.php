<?php

include 'data.php'

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

$decodedInstructor = json_decode($instructorData, true);
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
// Format textbook information for display
$textbookInfoHTML = '<h3>Textbook Information</h3>';
foreach ($studentData as $student) {
    $textbookInfoHTML .= '<h4>' . $student['studentName'] . ' - ' . $student['courseName'] . '</h4>';
    foreach ($student['textbooks'] as $textbook) {
        $textbookInfoHTML .= '<p>Title: ' . $textbook['title'] . '<br>';
        $textbookInfoHTML .= 'Publisher: ' . $textbook['publisher'] . '<br>';
        $textbookInfoHTML .= 'Edition: ' . $textbook['edition'] . '<br>';
        $textbookInfoHTML .= 'Printing Date: ' . $textbook['printingDate'] . '</p>';
    }
}

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

// For example, if you want to log the data to a file:
    $logFile = 'data.php';
    $dataString = json_encode($studentData) . PHP_EQL;
    file_put_contents($logFile, $dataString, FILE_APPEND);
// Respond with a success message or any other relevant response
echo "Student data processed successfully.";
?>
