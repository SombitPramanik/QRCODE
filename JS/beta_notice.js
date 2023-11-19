window.onload = function () {
  const modal = document.getElementById('tncLayout');
  const acknowledgeButton = document.getElementById('closeTnc');

  modal.style.display = 'block';
  acknowledgeButton.onclick = function () {
    modal.style.display = 'none';
  };
};