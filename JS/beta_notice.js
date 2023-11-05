window.onload = function() {
    const modal = document.getElementById('modal');
    const acknowledgeButton = document.getElementById('acknowledge');

    acknowledgeButton.onclick = function() {
      modal.style.display = 'none';
    };

    modal.style.display = 'block';
  };