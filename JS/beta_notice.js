window.onload = function() {
    const modal = document.getElementById('tncLayout');
    const acknowledgeButton = document.getElementById('closeTnc');

    acknowledgeButton.onclick = function() {
      modal.style.display = 'none';
    };

    modal.style.display = 'block';
  };