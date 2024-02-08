<?php
// Include the file where textbook data is stored

// Format textbook information for display
$studentData = file_get_contents("data.json");
$decodedStudentData = json_decode($studentData, true);
$textbookInfoHTML = '<h4>' . $decodedStudentData['studentName'] . ' - ' . $decodedStudentData['courseName'] . '</h4>';
foreach ($decodedStudentData['textbooks'] as $textbook) {
    $textbookInfoHTML .= '<p>Title: ' . $textbook['title'] . '<br>';
    $textbookInfoHTML .= 'Publisher: ' . $textbook['publisher'] . '<br>';
    $textbookInfoHTML .= 'Edition: ' . $textbook['edition'] . '<br>';
    $textbookInfoHTML .= 'Printing Date: ' . $textbook['printingDate'] . '</p>';
}

// Send formatted textbook information as the response
echo $textbookInfoHTML;
?>
