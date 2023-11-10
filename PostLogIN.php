<?php
session_start();
require 'config.php';
require 'phpqrcode-2010100721_1.1.4/phpqrcode/qrlib.php';

// Check if the session token is not present
if (!isset($_SESSION['SPWSTestSession'])) {
    header("Location: free.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QR Code Generator - SPWS</title>
    <meta name="subtitle" content="Create QR Code for free">
    <meta name="description"
        content="QR Code Generator for URL, vCard, and more. Add logo, colors, frames, and download in high print quality, Free QR code generator by SPWS">
    <meta name="keywords" content="QR code, generator, free, online, contact, website, URL, business card">
    <meta name="author" content="SPWS">

    <!-- Favicon -->
    <link rel="icon" href="logo/spws.png" type="image/x-icon">

    <!-- Open Graph Meta Tags for Social Sharing -->
    <meta property="og:title" content="QR Code Generator | Create Your Free QR Codes">
    <meta name="og:description"
        content="QR Code Generator for URL, vCard, and more. Add logo, colors, frames, and download in high print quality, Free QR code generator by SPWS">
    <meta property="og:type" content="website">
    <meta property="og:image" content="logo/spws.png">
    <meta property="og:url" content="https://qr.sombti-server.online">
    <!-- CSS Stylesheets, JavaScript, and Other Resources -->
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/root.css">
    <link rel="stylesheet" href="CSS/light_home.css">
    <link rel="stylesheet" href="CSS/help.css">
    <link rel="stylesheet" href="CSS/beta_notice.css">
    <link rel="stylesheet" href="CSS/popup_layout.css">

</head>

<body id="theme-switcher" class="light-theme">
    <!-- Hear is something that is not seen by every people -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <p>This version of the website is in beta testing phase.</p>
            <p>It is a developer-only preview.</p>
            <p>Best viewed on: Laptop (medium to large screen)</p>
            <p>We are working on other screen sizes, also.</p>
            <p><br></p>
            <p>ThankYou</p><br>
            <button id="acknowledge" class="acknowledge-button">OK</button>
        </div>
    </div>
    <div id="helpLayout" class="help-layout">
        <div class="help-content">
            <h2>Help and Instructions</h2>
            <div class="bar_layout">
                <div class="basic">
                    <h2>basic help</h2>
                    <p>Q1. How This Site Works </p><br>
                    <p>Answer: we collet your data then encrypted that data inside your browser, that encrypted data
                        will stored into database then we use that data to create your magical QRCode</p><br>
                    <p>Q2. How To Fiend the Help of Each QRCode</p><br>
                    <p>Answer: Select one of the Button shown in the menu then you acn easily find the Related FAQ's in
                        the bottom of that section</p><br>
                    <p>Q3. Trouble to Find the Advance option for QRCode's ??</p><br>
                    <p>Answer: We are Currently Working on the Advance Feathers of the Website, Because of test this
                        website we launched this basic version.</p>
                </div>
                <div class="common">
                    <h2>common help</h2>
                    <p>Q1. WiFi QRCode is not working </p><br>
                    <p>Answer: THe most aureate answer is that the wifi is not working is that you select the wrong
                        Encryption version of password, if your wifi is encrypted and working on WEP then you should
                        select that, if not present in list, select none</p><br>
                    <p>Q2. I don't Understand the Free Text</p><br>
                    <p>Answer: the free text is for the creating QRCode's for Short Notes, Like as a brand you want to
                        create a help instruction like this just past your faq's and create the qrcode, and then it will
                        be used in anywhere</p><br>
                    <p>Q3. Why I use This pice of software</p><br>
                    <p>Answer: because of we have relevant User Experience, Improving Everyday, provide the on point
                        solution</p>
                </div>
                <div class="advance">
                    <h2>advance help</h2>
                    <p>Q1. Did you Find the on call or Whatsapp Support ?</p><br>
                    <!-- <p></p><br> -->
                    <p class="call_wp_btn">
                        <a href="https://wa.me/6297037940" target="_blank">whatsapp</a>
                        <a href="tel:+916297037940" target="_blank">on call</a>
                    </p><br>
                    <p>Q2. Need more Help ??</p><br>
                    <p>Answer: Just Describe your Problem in whatsapp</p><br>
                    <!-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, eligendi.</p> -->
                </div>
            </div>
            <button id="closeHelp" class="help-button">Close Help</button>
        </div>
    </div>
    <section id="aboutLayout" class="about-layout">
        <div class="about-content">
            <h1>About Us</h1>
            <p>We are a team of passionate developers dedicated to providing you with the best QR code generation
                service.
                Our mission is to make it easy for you to create and manage QR codes for various purposes.</p>
            <p>Whether you need QR codes for business, personal, or educational use, we've got you covered. Our
                user-friendly platform ensures that you can generate QR codes quickly and easily.</p>
            <p>Thank you for choosing our service. We look forward to serving your QR code needs.</p>
            <button id="closeAbout" class="about-button">Close About</button>
        </div>
    </section>
    <section id="pricingLayout" class="pricing-layout">
        <div class="pricing-content">
            <h1>Pricing</h1>
            <div class="pricing-plan">
                <h2>Basic Plan</h2>
                <p>Generate up to 10 QR codes</p>
                <p>50 MB storage</p>
                <p>Free</p>
                <a href="signup.html">Sign Up</a>
            </div>
            <div class="pricing-plan">
                <h2>Premium Plan</h2>
                <p>Generate unlimited QR codes</p>
                <p>1 GB storage</p>
                <p>$9.99/month</p>
                <a href="signup.html">Sign Up</a>
            </div>
            <div class="pricing-plan">
                <h2>Business Plan</h2>
                <p>Generate unlimited QR codes</p>
                <p>5 GB storage</p>
                <p>$19.99/month</p>
                <a href="signup.html">Sign Up</a>
            </div>
            <button id="closePricing" class="pricing-button">Close Pricing</button>
        </div>
    </section>
    <!-- From Hear the Actual Website will Start -->
    <!-- This will be converted into the top navigation bar in Mobile Device, and if the display be large enough then this will work like as an detailed navigation bar uses for profile and other navigation links  -->
    <section class="left_menu">
        <nav>
            <div class="profile">
                <div class="logo">
                    <img src="logo/spws.png" width="80" height="80" alt="Profile Logo" srcset="">
                    <!-- This will replace by PHP code for update dynamic Profile Photo for the user -->
                </div>
                <div class="profile_text">
                    <p>
                        Simple QRCode Maker for Static QRCode's & Create Dynamic QRCode for PDF's
                    </p>
                    <ul>
                        <li><a href="#" class="p_links">insights</a></li>
                        <li><a href="#" id="Help" class="p_links">help</a></li>
                    </ul>
                </div>
            </div>
            <hr class="nav_devider">
            <div class="nav_bar">
                <ul>
                    <li><a href="#" class="nav_links">carer</a></li>
                    <li><a href="#" id="pricing" class="nav_links">Pricing</a></li>
                    <li><a href="#" id="about" class="nav_links">about</a></li>
                    <li><a href="#" class="nav_links">logout</a></li>
                </ul>
            </div>
        </nav>
        <p>
            &copy; <i>SPWS</i> 2023 all rights reserved <br><br>
            all Design and Colure Code are Property of Sombit Pramanik Web Services. Use without Permission have
            Copyright issue
        </p>
    </section>
    <hr class="menu_devider">
    <!-- This will work for the main area used for the main contain for the website which will contain the main qrcode generator function. -->
    <section class="right_menu">
        <div class="top_brand">
            <p class="tag">Create Static & Dynamic QRCode's</p>
            <span class="power"> <i>Powered by Sombit Pramanik Web Services</i></span>
        </div>
        <main>
            <div class="input_fields">
                <p>Select a Tag and Create QRCode's For your Need</p>
                <ul>
                    <li><a id="upiButton">UPI</a></li>
                    <li><a id="textButton">Free Text</a></li>
                    <li><a id="pdfButton">PDF</a></li>
                    <li><a id="urlButton">URL</a></li>
                    <li><a id="wifiButton">WIFI</a></li>
                </ul>
                <hr class="button_hr">
                <div class="input_from">
                    <div class="for_upi myForm">
                        <form action="" method="post">
                            <label for="upi_id">Enter Receiver UPI ID</label>
                            <input type="text" name="upi_id" id="upi_id" placeholder="Example : 6297037940@ybl"><br>
                            <label for="upi_first_name">Enter Receiver First Name</label>
                            <input type="text" name="upi_first_name" id="upi_first_name" placeholder="Example : sombit">
                            <br>
                            <label for="upi_lase_name">Enter Receiver Last Name</label>
                            <input type="text" name="upi_lase_name" id="upi_lase_name"
                                placeholder="Example : pramanik"><br>
                            <label for="upi_amount">Enter Amount</label>
                            <input type="text" name="upi_amount" id="upi_amount" placeholder="Example : 101"><br>
                            <button type="submit" class="CreateQr">Create QR</button>
                        </form><br>
                        <p>
                        <ol>
                            <li>
                                <b><span>Q. Where to use ?</span></b><br>
                                <i><span><b>Answer: </b>use for creating custom payment received QRCode.</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. How to share ?</span></b><br>
                                <i><span><b>Answer: </b>Just Download the code and share where ever you want.</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. Can I Customize The Code ?</span></b><br>
                                <i><span><b>Answer: </b>Sorry ! : Now we can't support this, if Your are a PHP
                                        Developer then Visit the carer Page for our Help.</span></i>
                            </li><br>
                        </ol>
                        </p>
                    </div>
                    <div class="for_text myForm">
                        <form action="" method="post">
                            <label for="text">Enter the Text</label>
                            <input type="text" name="text">
                            <button type="submit" class="CreateQr">Create QR</button>
                        </form><br>
                        <p>
                        <ol>
                            <li>
                                <b><span>Q. Where to use ?</span></b><br>
                                <i><span><b>Answer: </b>use For Creating Short Notes & support instruction</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. How to share ?</span></b><br>
                                <i><span><b>Answer: </b>Just Download the code and share where ever you want.</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. Can I Customize The Code ?</span></b><br>
                                <i><span><b>Answer: </b>Sorry ! : Now we can't support this, if Your are a PHP
                                        Developer then Visit the carer Page for our Help.</span></i>
                            </li><br>
                        </ol>
                        </p>
                    </div>
                    <div class="for_pdf myForm">
                        <p>Note : the PDF's are not been share directly in QRCode, we are Currently Upload the file in
                            our secure server and then create a share link to Create the QR Code.</p><br>
                        <form action="" method="post">
                            <label for="file">Chose the PDF File to share</label>
                            <input type="file" name="file" id="fileInput">
                            <button type="submit" class="CreateQr">Create QR</button>
                        </form><br>
                        <p>
                        <ol>
                            <li>
                                <b><span>Q. Where to use ?</span></b><br>
                                <i><span><b>Answer: </b>Share File to Friends, Family or Business Purposes</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. How to share ?</span></b><br>
                                <i><span><b>Answer: </b>Just Download the code and share where ever you want.</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. Can SPWS Team can See the PDF File ?</span></b><br>
                                <i><span><b>Answer: </b>No, it is true that we use data collection for better management
                                        and tracking of user behavior, but we use server side Encryption to protect your
                                        data.</span></i>
                            </li><br>
                        </ol>
                        </p>
                    </div>
                    <div class="for_url myForm">
                        <form action="" method="post">
                            <label for="url">Enter the URL</label>
                            <input type="url" name="url">
                            <button type="submit" class="CreateQr">Create QR</button>
                        </form><br>
                        <p>
                        <ol>
                            <li>
                                <b><span>Q. Where to use ?</span></b><br>
                                <i><span><b>Answer: </b>use For Creating URL instead of Lengthy URl's</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. How to share ?</span></b><br>
                                <i><span><b>Answer: </b>Just Download the code and share where ever you want.</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. Can I Customize The Code ?</span></b><br>
                                <i><span><b>Answer: </b>Sorry ! : Now we can't support this, if Your are a PHP
                                        Developer then Visit the carer Page for our Help.</span></i>
                            </li><br>
                        </ol>
                        </p>
                    </div>
                    <div class="for_wifi myForm">
                        <form action="" method="post">
                            <label for="ssid">WIFI SSID or Name</label>
                            <input type="text" name="ssid"><br>
                            <label for="pass">Password</label>
                            <input type="password"><br>
                            <label for="encryp">Select Encryption TYpe</label>
                            <select name="encryp" id="">
                                <option value="none">none</option>
                                <option value="wep">wep</option>
                                <option value="wep2">wep2</option>
                            </select><br>
                            <button type="submit" class="CreateQr">Create OR</button>
                        </form><br>
                        <p>
                        <ol>
                            <li>
                                <b><span>Q. Where to use ?</span></b><br>
                                <i><span><b>Answer: </b>Share Wifi Network's Securely</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. How to share ?</span></b><br>
                                <i><span><b>Answer: </b>Just Download the code and share where ever you want.</span></i>
                            </li><br>
                            <li>
                                <b><span>Q. Can I Customize The Code ?</span></b><br>
                                <i><span><b>Answer: </b>Sorry ! : Now we can't support this, if Your are a PHP
                                        Developer then Visit the carer Page for our Help.</span></i>
                            </li><br>
                        </ol>
                        </p>
                    </div>
                </div>
            </div>
            <hr class="output_hr">
            <div class="output_fields">
                <p><span style="font-weight: 600;">New QRCode Preview</span><br><br>Note : we use data collection
                    policies under some condition's, if you want to delete your data with us you can just make a simple
                    request in our main website,and then with remove your data and handover a copy to you (Encrypted)
                </p><br>
                <hr class="button_hr"><br>
                <div class="status">
                    <div class="qr_img">
                        <img id="myImage" src="logo/spws.png" alt="QR Image" srcset="">
                        <button id="downloadButton" type="download" class="download">Download The QRCode</button>
                    </div>
                    <div class="stat">
                        <ul>
                            <li>from the php database set limit of max 20MB of alloted space</li><br>
                            <li>the user only upload pdf type files</li><br>
                            <li>show status for how much space left</li><br>
                            <li>show the count fo how many QRCode's are Generated</li><br>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
        <div class="advertisement">
            <!-- place for google bottom banner ad -->
            <p>Wetting for advertisement and sponsor image or Text, if you intrusted clink hear</p>
        </div>
    </section>
</body>
<script src="JS/theme.js"></script>
<script src="JS/from_display.js"></script>
<script src="JS/download.js"></script>
<script src="JS/beta_notice.js"></script>
<script src="JS/pop_layout.js"></script>
<script src="JS/auto_fetch.js"></script>

</html>