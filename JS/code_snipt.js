const preTags = document.querySelectorAll(".myPreTag"); // Change to your desired class name

// Loop through all elements with the specified class
preTags.forEach(preTag => {
    // Create a copy button element
    const copyButton = document.createElement("span");
    copyButton.innerText = "Copy";
    copyButton.classList.add("copy-button");

    // Append the copy button to the current <pre> tag
    preTag.appendChild(copyButton);

    // Add click event listener to the copy button
    copyButton.addEventListener("click", () => {
        // Hide the copy button temporarily
        copyButton.style.display = "none";

        // Create a range and select the text inside the current <pre> tag
        const range = document.createRange();
        range.selectNode(preTag);
        window.getSelection().removeAllRanges();
        window.getSelection().addRange(range);

        try {
            // Copy the selected text to the clipboard
            document.execCommand("copy");

            // Alert the user that the text has been copied
            copyButton.innerText = "Copied!";
            setTimeout(function () {
                copyButton.innerText = "Copy";
            }, 2000);
        } catch (err) {
            console.error("Unable to copy text:", err);
        } finally {
            // Show the copy button again
            copyButton.style.display = "inline";

            // Deselect the text
            window.getSelection().removeAllRanges();
        }
    });
});
