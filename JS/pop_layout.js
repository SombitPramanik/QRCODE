// Function to open the  layout
document.getElementById('Help').addEventListener('click', function () {
    document.getElementById('helpLayout').style.display = 'block';
});
document.getElementById('pricing').addEventListener('click', function () {
    document.getElementById('pricingLayout').style.display = 'block';
});
document.getElementById('about').addEventListener('click', function () {
    document.getElementById('aboutLayout').style.display = 'block';
});
document.getElementById('tnc').addEventListener('click', function () {
    document.getElementById('tncLayout').style.display = 'block';
});
document.getElementById('privacy').addEventListener('click', function () {
    document.getElementById('privacyLayout').style.display = 'block';
});

document.getElementById('contact').addEventListener('click', function(){
    document.getElementById('contactLayout').style.display = 'block';
});
// Function to close the layout
document.getElementById('closeHelp').addEventListener('click', function () {
    document.getElementById('helpLayout').style.display = 'none';
});
document.getElementById('closePricing').addEventListener('click', function () {
    document.getElementById('pricingLayout').style.display = 'none';
});
document.getElementById('closeAbout').addEventListener('click', function () {
    document.getElementById('aboutLayout').style.display = 'none';
});
document.getElementById('closePrivacy').addEventListener('click', function () {
    document.getElementById('privacyLayout').style.display = 'none';
});
document.getElementById('closeTnc').addEventListener('click', function(){
    document.getElementById('tncLayout').style.display = 'none';
});

document.getElementById('closeContact').addEventListener('click', function(){
    document.getElementById('contactLayout').style.display = 'none';
});