$(document).ready(function() {
    // Add click event listener to elements with the class CreateQr
    $(".CreateQr").on("click", function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Get the data-from-valid attribute value from the clicked button
        var fromValid = $(this).data("from-valid");

        // Serialize form data
        var formData = $(this.form).serialize();

        // Append the value to the serialized form data
        formData += fromValid;

        // Send the data to the server using AJAX
        $.ajax({
            type: "POST",
            url: "create_qr.php",
            data: formData,
            dataType: "json", // Expect JSON response
            success: function(response) {
                // Handle the server response
                console.log(response.status, response.message);
            },
            error: function(error) {
                // Handle errors if the request fails
                console.error("Error:", error);
            }
        });
    });
});
