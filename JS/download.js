const downloadButton = document.getElementById('downloadButton');
const image = document.getElementById('myImage');

downloadButton.addEventListener('click', () => {
  const a = document.createElement('a');
  a.href = image.src;
  a.download = 'downloaded_image.jpg'; // Specify the download file name
  a.style.display = 'none'; // Hide the anchor element
  document.body.appendChild(a);
  a.click(); // Trigger a click event on the anchor element
  document.body.removeChild(a);
});
