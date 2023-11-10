const myFormElements = document.getElementsByClassName('myForm');
const myImage = document.getElementById('myImage');


for (const form of myFormElements) {
    form.addEventListener('submit', (event) => {
        event.preventDefault(); // Prevent the default form submission behavior

        const clickedButton = document.activeElement; // Get the button that was clicked

        if (clickedButton && clickedButton.classList.contains('CreateQr')) {
            // Do something based on which button was clicked
            // console.log('Button with text:', clickedButton.textContent, 'was clicked.'); // Only if the Product under Testing

            // Add your AJAX fetch request here
            fetch('') // Replace 'your-data-endpoint-url' with the actual URL
                .then(response => response.text())
                .then(data => {
                    // Update the result div with the fetched data
                    myImage.innerHTML = data;
                    // console.log('Source updated from PHP success on generate button click'); //Only if the Product under Testing
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    });
}
