// Function to update image source with a delay
function updateImageSourceWithDelay(imageId, imagePath, delay) {
    setTimeout(function () {
        var myImage = document.getElementById(imageId);

        if (myImage) {
            myImage.removeAttribute('src');
            myImage.src = imagePath;
            console.log('Image Source updated successfully');
        } else {
            console.log("auto fetch is loded but the system is not working");
        }
    }, delay);
}

// Function to check if the image has loaded, and if not, request a reload
function checkImageLoaded(imageId, imagePath, retryCount, retryInterval) {
    var image = document.getElementById(imageId);

    // Check if the image has loaded successfully
    if (image && image.complete && image.naturalWidth !== 0) {
        console.log('Image loaded successfully');
    } else {
        // Retry loading the image after a specified interval
        setTimeout(function () {
            // Make an additional request to reload the image
            updateImageSourceWithDelay(imageId, imagePath, 0);
        }, retryInterval);

        // Retry for a specified number of times
        if (retryCount > 0) {
            setTimeout(function () {
                checkImageLoaded(imageId, imagePath, retryCount - 1, retryInterval);
            }, retryInterval);
        } else {
            console.error('Failed to load image after retrying');
        }
    }
}

// Get all elements with the class 'CreateQR'
var createQrElements = document.getElementsByClassName('p_CreateQr');

// Add event listener to each element
for (var i = 0; i < createQrElements.length; i++) {
    createQrElements[i].addEventListener('click', function () {
        console.log("button clicked");
        // Introduce a 1-second delay to retrieve the filename from local storage
        var data = this.getAttribute('from-valid');
        console.log("data is : ",data);
        setTimeout(function () {
            // Get the filename from local storage
            var filename = localStorage.getItem('filename');

            // Get the value of the 'data-from-valid' attribute


            // Check the value of 'data' and perform actions accordingly with a 2-second delay
            if (data === "&p_text_submit=1") {
                updateImageSourceWithDelay('myImage', 'qr_img/Free/' + filename + '.png', 1000);
                // Check if the image has loaded, and retry if necessary
                checkImageLoaded('myImage', 'qr_img/Free/' + filename + '.png', 3, 1000);
            } else if (data === "&p_wifi_submit=1") {
                updateImageSourceWithDelay('myImage', 'qr_img/Free/' + filename + '.png', 1000);
                // Check if the image has loaded, and retry if necessary
                checkImageLoaded('myImage', 'qr_img/Free/' + filename + '.png', 3, 1000);
            } else if (data === "&p_url_submit=1") {
                updateImageSourceWithDelay('myImage', 'qr_img/Free/' + filename + '.png', 1000);
                // Check if the image has loaded, and retry if necessary
                checkImageLoaded('myImage', 'qr_img/Free/' + filename + '.png', 3, 1000);
            } else if (data === "&p_upi_submit=1") {
                updateImageSourceWithDelay('myImage', 'qr_img/Free/' + filename + '.png', 1000);
                // Check if the image has loaded, and retry if necessary
                checkImageLoaded('myImage', 'qr_img/Free/' + filename + '.png', 3, 1000);
            }

            // Remove the unique code from local storage
            localStorage.removeItem('filename');
        }, 500); // 1-second delay
    });
}
