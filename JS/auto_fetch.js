// Function to update image source with a delay
function updateImageSourceWithDelay(imageId, imagePath, delay) {
    setTimeout(function () {
        var myImage = document.getElementById(imageId);
        if (myImage) {
            myImage.removeAttribute('src');
            myImage.src = imagePath;
            console.log('Image Source updated successfully');
        }
    }, delay);
}

// Get all elements with the class 'CreateQR'
var createQrElements = document.getElementsByClassName('CreateQr');

// Add event listener to each element
for (var i = 0; i < createQrElements.length; i++) {
    createQrElements[i].addEventListener('click', function () {
        // Get the value of the 'data-from-valid' attribute
        var data = this.getAttribute('from-valid');

        // Check the value of 'data' and perform actions accordingly with a 2-second delay
        if (data === "&text_submit=1") {
            updateImageSourceWithDelay('myImage', 'qr_img/Free/FreeQrcodeBySPP_TechnologiesTEXT.png', 2000);
        } else if (data === "&wifi_submit=1") {
            updateImageSourceWithDelay('myImage', 'qr_img/Free/FreeQrcodeBySPP_TechnologiesWIFI.png', 2000);
        } else if (data === "&url_submit=1") {
            updateImageSourceWithDelay('myImage', 'qr_img/Free/FreeQrcodeBySPP_TechnologiesURL.png', 2000);
        } else if (data === "&upi_submit=1") {
            updateImageSourceWithDelay('myImage', 'qr_img/Free/FreeQrcodeBySPP_TechnologiesUPI.png', 2000);
        }
    });
}
