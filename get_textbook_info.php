<?php
// Read the contents of the file
$fileContents = file_get_contents("studentdata.json");

// Split the file contents by lines
$lines = explode(PHP_EOL, $fileContents);

// Initialize an array to store decoded data
$decodedData = [];

// Iterate over each line
foreach ($lines as $line) {
    // Trim the line to remove any extra whitespace
    $line = trim($line);

    // Decode the JSON data from the line and store it in the array
    if (!empty($line)) {
        $decodedLine = json_decode($line, true);
        if ($decodedLine !== null) {
            $decodedData[] = $decodedLine;
        }
    }
}

// Format textbook information for display
$textbookInfoHTML = '';
foreach ($decodedData as $studentData) {
    $textbookInfoHTML .= '<h4>' . $studentData['studentName'] . ' - ' . $studentData['courseName'] . '</h4>';
    foreach ($studentData['textbooks'] as $textbook) {
        $textbookInfoHTML .= '<p>Title: ' . $textbook['title'] . '<br>';
        $textbookInfoHTML .= 'Publisher: ' . $textbook['publisher'] . '<br>';
        $textbookInfoHTML .= 'Edition: ' . $textbook['edition'] . '<br>';
        $textbookInfoHTML .= 'Printing Date: ' . $textbook['printingDate'] . '</p>';
    }
}

// Send formatted textbook information as the response
echo $textbookInfoHTML;
?>
