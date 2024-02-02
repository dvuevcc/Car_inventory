
document.getElementById('car-form').addEventListener('submit', function(event) {
    event.preventDefault();

    fetch('connect.php', {
        method: 'POST',
        body: new FormData(this)
    })
    .then(response => response.json())
    .then(data => {
    
        if (data.success) {
            // Reset the form if the submission was successful
            this.reset();
            alert(data.message); // Display a success message
        } else {
        
            console.error(data.message);
            alert('An error occurred. Please try again.'); // Display an error message
        }
    })
    .catch(error => {
    
        console.error('Error:', error);
        alert('An error occurred. Please try again.'); // Display an error message
    });
});
