<?php
// Include the file where textbook data is stored

// Format textbook information for display
$studentData = file_get_contents("data.json");
$textbookInfoHTML = '<h3>Textbook Information Display</h3>';
$decodedStudentData = json_decode($studentData, true);
    $textbookInfoHTML .= '<h4>' . $student['studentName'] . ' - ' . $student['courseName'] . '</h4>';
    foreach ($decodedStudentData['textbooks'] as $textbook) {
        $textbookInfoHTML .= '<p>Title: ' . $textbook['title'] . '<br>';
        $textbookInfoHTML .= 'Publisher: ' . $textbook['publisher'] . '<br>';
        $textbookInfoHTML .= 'Edition: ' . $textbook['edition'] . '<br>';
        $textbookInfoHTML .= 'Printing Date: ' . $textbook['printingDate'] . '</p>';
    }

// Send formatted textbook information as the response
echo $textbookInfoHTML;
?>
