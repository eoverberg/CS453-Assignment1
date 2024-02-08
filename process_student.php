<?php
// Retrieve student data from the form
$studentName = $_POST['studentName'];
$courseName = $_POST['courseName'];
$textbooks = [];

// Extract textbook information dynamically
for ($i = 1; $i <= 2; $i++) {
    $textbook = [
        'title' => $_POST["studentTextbook$i"],
        'publisher' => $_POST["studentPublisher$i"],
        'edition' => $_POST["studentEdition$i"],
        'printingDate' => $_POST["studentPrintingDate$i"]
    ];
    $textbooks[] = $textbook;
}

// Prepare student data
$studentData = [
    'studentName' => $studentName,
    'courseName' => $courseName,
    'textbooks' => $textbooks
];

// Check if the student's textbooks match the instructor's textbooks
$jsonData = file_get_contents('instructordata.json');
$lines = explode(PHP_EOL, $jsonData);

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
foreach ($decodedData['textbooks'] as $key => $textbook) {
    if ($textbook['title'] !== $studentData['textbooks'][$key]['title'] ||
        $textbook['edition'] !== $studentData['textbooks'][$key]['edition'] ||
        $textbook['printingDate'] !== $studentData['textbooks'][$key]['printingDate']) {
        echo "Warning: Student's textbook information does not match instructor's for Textbook " . ($key + 1) . ".\n";
    }
}

// Check if the student has different editions for the same textbook
if ($studentData['textbooks'][0]['title'] === $studentData['textbooks'][1]['title'] &&
    $studentData['textbooks'][0]['edition'] !== $studentData['textbooks'][1]['edition']) {
    echo "Warning: Student has different editions for the same textbook.\n";
}

// Encode student data to JSON format
$jsonStudentData = json_encode($studentData);

// Determine if the file already exists
$exists = file_exists('studentdata.json');

// Open the file in append mode
$handle = fopen('studentdata.json', 'a');

// If the file exists and is not empty, add a comma separator
if ($exists && filesize('studentdata.json') > 0) {
    fwrite($handle, ',' . PHP_EOL);
}

// Write the student data to the file
fwrite($handle, $jsonStudentData);

// Close the file handle
fclose($handle);

// Respond with a success message or any other relevant response
echo "Student data processed successfully.";
?>
