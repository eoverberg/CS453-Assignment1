<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Textbook Management System</title>
    <script src="main.js" defer></script>
</head>
<body>
    <h1>Textbook Management System</h1>
    <h2>Instructor Entry</h2>
    <form id="instructorForm">
        <label for="course">Course Name:</label><br>
        <input type="text" id="course" name="course"><br>
        <label for="textbook1">Textbook 1 Title:</label><br>
        <input type="text" id="textbook1" name="textbook1"><br>
        <label for="publisher1">Publisher 1:</label><br>
        <input type="text" id="publisher1" name="publisher1"><br>
        <label for="edition1">Edition 1:</label><br>
        <input type="number" id="edition1" name="edition1"><br>
        <label for="printingDate1">Printing Date 1:</label><br>
        <input type="number" id="printingDate1" name="printingDate1"><br>
        <label for="textbook2">Textbook 2 Title:</label><br>
        <input type="text" id="textbook2" name="textbook2"><br>
        <label for="publisher2">Publisher 2:</label><br>
        <input type="text" id="publisher2" name="publisher2"><br>
        <label for="edition2">Edition 2:</label><br>
        <input type="number" id="edition2" name="edition2"><br>
        <label for="printingDate2">Printing Date 2:</label><br>
        <input type="number" id="printingDate2" name="printingDate2"><br><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h2>Student Entry</h2>
    <form id="studentForm">
        <label for="studentName">Student Name:</label><br>
        <input type="text" id="studentName" name="studentName"><br>
        <label for="courseName">Course Name:</label><br>
        <input type="text" id="courseName" name="courseName"><br>
        <label for="studentTextbook1">Textbook 1 Title:</label><br>
        <input type="text" id="studentTextbook1" name="studentTextbook1"><br>
        <label for="studentPublisher1">Publisher 1:</label><br>
        <input type="text" id="studentPublisher1" name="studentPublisher1"><br>
        <label for="studentEdition1">Edition 1:</label><br>
        <input type="number" id="studentEdition1" name="studentEdition1"><br>
        <label for="studentPrintingDate1">Printing Date 1:</label><br>
        <input type="number" id="studentPrintingDate1" name="studentPrintingDate1"><br>
        <label for="studentTextbook2">Textbook 2 Title:</label><br>
        <input type="text" id="studentTextbook2" name="studentTextbook2"><br>
        <label for="studentPublisher2">Publisher 2:</label><br>
        <input type="text" id="studentPublisher2" name="studentPublisher2"><br>
        <label for="studentEdition2">Edition 2:</label><br>
        <input type="number" id="studentEdition2" name="studentEdition2"><br>
        <label for="studentPrintingDate2">Printing Date 2:</label><br>
        <input type="number" id="studentPrintingDate2" name="studentPrintingDate2"><br><br>
        <input type="submit" value="Submit">
    </form>
    <hr>
    <h2>Textbook Information</h2>
    <div id="textbookInfo"></div>
</body>
</html>
