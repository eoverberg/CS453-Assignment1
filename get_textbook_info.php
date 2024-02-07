<?php
// Include the file where textbook data is stored
include 'data.php';

// Format textbook information for display
$textbookInfoHTML = '<h3>Textbook Information Display</h3>';
$decodedStudentData = json_decode($studentData, true)
foreach ($decodedStudentData as $student) {
    $textbookInfoHTML .= '<h4>' . $student['studentName'] . ' - ' . $student['courseName'] . '</h4>';
    foreach ($student['textbooks'] as $textbook) {
        $textbookInfoHTML .= '<p>Title: ' . $textbook['title'] . '<br>';
        $textbookInfoHTML .= 'Publisher: ' . $textbook['publisher'] . '<br>';
        $textbookInfoHTML .= 'Edition: ' . $textbook['edition'] . '<br>';
        $textbookInfoHTML .= 'Printing Date: ' . $textbook['printingDate'] . '</p>';
    }
}

// Send formatted textbook information as the response
echo $textbookInfoHTML;
?>