<?php
// Retrieve instructor data from the form
$course = $_POST['course'];
$textbooks = [];

// Extract textbook information dynamically
for ($i = 1; $i <= 2; $i++) {
    $textbook = [
        'title' => $_POST["textbook$i"],
        'publisher' => $_POST["publisher$i"],
        'edition' => $_POST["edition$i"],
        'printingDate' => $_POST["printingDate$i"]
    ];
    $textbooks[] = $textbook;
}

// Prepare instructor data
$instructorData = [
    'course' => $course,
    'textbooks' => $textbooks
];

// Encode instructor data to JSON format
$jsonInstructorData = json_encode($instructorData);

// Determine if the file already exists
$exists = file_exists('instructordata.json');

// Open the file in append mode
$handle = fopen('instructordata.json', 'a');

// If the file exists and is not empty, add a comma separator
if ($exists && filesize('instructordata.json') > 0) {
    fwrite($handle, ',' . PHP_EOL);
}

// Write the instructor data to the file
fwrite($handle, $jsonInstructorData);

// Close the file handle
fclose($handle);

// Respond with a success message or any other relevant response
echo "Instructor data processed successfully.";
?>
