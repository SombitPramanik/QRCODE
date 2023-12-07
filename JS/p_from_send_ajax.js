$(document).ready(function () {
    // Function to generate a 5-digit unique hex code
    function generateUniqueHexCode() {
        return Math.floor(Math.random() * 0xFFFFF).toString(16).toUpperCase().padStart(5, '0');
    }

    // Add click event listener to elements with the class CreateQr
    $(".p_CreateQr").on("click", function (event) {
        // Prevent the default form submission
        event.preventDefault();
        var file_name = generateUniqueHexCode();

        // Save the unique code to local storage
        localStorage.setItem('filename', file_name);

        // Get the data-from-valid attribute value from the clicked button
        var fromValid = $(this).data("from-valid");

        // Serialize form data
        var formData = $(this.form).serialize();

        // Append the value to the serialized form data along with the unique code
        formData += fromValid + '&filename=' + file_name;
        console.log(formData);

        // Send the data to the server using AJAX
        $.ajax({
            type: "POST",
            url: "p_create_qr.php",
            data: formData,
            dataType: "json", // Expect JSON response
            success: function (response) {
                // Handle the server response
                console.log(response.status, response.message, response.qrCodeFileName);
            },
            error: function (error) {
                // Handle errors if the request fails
                console.error("Error:", error);
            }
        });
    });
});