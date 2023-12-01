// Function to open the  layout
document.getElementById('mobile_Help').addEventListener('click', function () {
    document.getElementById('helpLayout').style.display = 'block';
    document.getElementById('closeHelp').style.display = 'none';
    document.getElementById('mobile_closeHelp').style.display = 'block';

});
document.getElementById('mobile_about').addEventListener('click', function () {
    document.getElementById('aboutLayout').style.display = 'block';
    document.getElementById('closeAbout').style.display = 'none';
    document.getElementById('mobile_closeAbout').style.display = 'block';

});
document.getElementById('mobile_tnc').addEventListener('click', function () {
    document.getElementById('tncLayout').style.display = 'block';


});
document.getElementById('mobile_pricing').addEventListener('click', function () {
    document.getElementById('pricingLayout').style.display = 'block';
    document.getElementById('closePricing').style.display = 'none';
    document.getElementById('mobile_closePricing').style.display = 'block';
});
document.getElementById('mobile_privacy').addEventListener('click', function () {
    document.getElementById('privacyLayout').style.display = 'block';
    document.getElementById('closePrivacy').style.display = 'none';
    document.getElementById('mobile_closePrivacy').style.display = 'block';
});
document.getElementById('mobile_contact').addEventListener('click', function () {
    document.getElementById('contactLayout').style.display = 'block';
    document.getElementById('closeContact').style.display = 'none';
    document.getElementById('mobile_closeContact').style.display = 'block';

});
// Function to close the layout
document.getElementById('mobile_closeHelp').addEventListener('click', function () {
    document.getElementById('helpLayout').style.display = 'none';
});
document.getElementById('mobile_closePricing').addEventListener('click', function () {
    document.getElementById('pricingLayout').style.display = 'none';
});
document.getElementById('mobile_closeAbout').addEventListener('click', function () {
    document.getElementById('aboutLayout').style.display = 'none';
});
document.getElementById('mobile_closePrivacy').addEventListener('click', function () {
    document.getElementById('privacyLayout').style.display = 'none';
});
document.getElementById('mobile_closeTnc').addEventListener('click', function () {
    document.getElementById('tncLayout').style.display = 'none';
});
document.getElementById('mobile_closeContact').addEventListener('click', function () {
    document.getElementById('contactLayout').style.display = 'none';
});