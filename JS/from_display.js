const upiButton = document.getElementById('upiButton');
const textButton = document.getElementById('textButton');
const pdfButton = document.getElementById('pdfButton');
const urlButton = document.getElementById('urlButton');
const wifiButton = document.getElementById('wifiButton');

const for_upi = document.getElementsByClassName('for_upi');
const for_text = document.getElementsByClassName('for_text');
const for_pdf = document.getElementsByClassName('for_pdf');
const for_url = document.getElementsByClassName('for_url');
const for_wifi = document.getElementsByClassName('for_wifi');

upiButton.addEventListener('click', () => {
  toggleElements(for_upi);
});

textButton.addEventListener('click', () => {
  toggleElements(for_text);
});

pdfButton.addEventListener('click', () => {
  toggleElements(for_pdf);
});

urlButton.addEventListener('click', () => {
  toggleElements(for_url);
});

wifiButton.addEventListener('click', () => {
  toggleElements(for_wifi);
});

function toggleElements(elements) {
  for (const element of elements) {
    if (element.style.display === 'none' || element.style.display === '') {
      element.style.display = 'block';
      console.log(element);

    } else {
      element.style.display = 'none';
    }
  }

  // Automatically hide other elements
  const allElements = [for_upi, for_text, for_pdf, for_url, for_wifi];
  for (const otherElements of allElements) {
    if (otherElements !== elements) {
      for (const otherElement of otherElements) {
        otherElement.style.display = 'none';
      }
    }
  }
}