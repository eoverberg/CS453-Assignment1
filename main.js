document.addEventListener('DOMContentLoaded', () => {
    const instructorForm = document.getElementById('instructorForm');
    const studentForm = document.getElementById('studentForm');
    const textbookInfoDiv = document.getElementById('textbookInfo');

    // Function to fetch and display textbook information
    function displayTextbookInfo() {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    textbookInfoDiv.innerHTML = xhr.responseText;
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.open('GET', 'get_textbook_info.php', true);
        xhr.send();
    }

    // Function to handle form submissions
    function submitForm(event, url, form) {
        event.preventDefault();
        const formData = new FormData(form);
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    console.log(xhr.responseText);
                    // Update textbook information after successful form submission
                    displayTextbookInfo();
                } else {
                    console.error('Error:', xhr.status);
                }
            }
        };
        xhr.open('POST', url, true);
        xhr.send(formData);
    }

    // Handle instructor form submission
    instructorForm.addEventListener('submit', (event) => {
        submitForm(event, 'process_instructor.php', instructorForm);
    });

    // Handle student form submission
    studentForm.addEventListener('submit', (event) => {
        submitForm(event, 'process_student.php', studentForm);
    });

    // Initial display of textbook information
    displayTextbookInfo();
});
