document.getElementById('textbookForm').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'process.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('output').innerHTML = xhr.responseText;
        }
    };
    xhr.send(formData);
});
