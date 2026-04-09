/*
Theme Name: Anime Flow
Theme Preview:https://youtu.be/CNuUaRmnO_g?si=0ueLd4GXgEMSwSqA
Author: Rahul Panchanan Mandal
Description: A custom WordPress theme designed for anime stream and creative websites.
Version: 1.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Tags: anime, blog, responsive, custom-theme
*/
<?php include 'header.php'; ?>

<style>
.contact-box {
    max-width: 850px;
    margin: 40px auto;
    padding: 25px;
    background: #1b1b1f;
    border-radius: 10px;
    border: 1px solid #2c2c33;
    color: #ddd;
}

.contact-box h1 {
    color: #fff;
    margin-bottom: 10px;
    font-size: 28px;
}

.contact-box p {
    color: #cfcfcf;
    line-height: 1.6;
}

.contact-form {
    margin-top: 25px;
}

.contact-form label {
    display: block;
    margin-bottom: 6px;
    color: #e5e5e5;
    font-weight: 500;
}

.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 18px;
    border-radius: 6px;
    border: 1px solid #2d2d33;
    background: #25252a;
    color: #fff;
    font-size: 15px;
}

.contact-form textarea {
    height: 150px;
    resize: vertical;
}

.contact-btn {
    background: #2c2c33;
    color: #fff;
    padding: 12px 20px;
    border-radius: 6px;
    text-decoration: none;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: 0.2s;
}

.contact-btn:hover {
    background: #3a3a42;
}

/* Back button */
.back-btn {
    display: inline-block;
    margin: 15px 0 0 0;
    padding: 10px 18px;
    background: #2c2c33;
    color: #fff;
    border-radius: 6px;
    text-decoration: none;
    font-weight: 600;
    transition: 0.2s;
}

.back-btn:hover {
    background: #3a3a42;
}

/* MOBILE */
@media (max-width: 600px) {
    .contact-box {
        padding: 18px;
        margin: 15px;
    }
    .contact-box h1 {
        font-size: 24px;
    }
}
</style>

<div class="contact-box">

<a href="<?php echo home_url(); ?>" class="back-btn">Back to Home</a>   <!-- Home Ka Url Dena Hei -->

<h1>Contact Us – AnimeFlow</h1>
<p>
If you have questions, suggestions, DMCA requests, or any issues related to AnimeFlow,  
feel free to contact us using the form below. We will get back to you as soon as possible.
</p>

<form class="contact-form" method="POST" action="send-message.php">
    
    <label>Your Name</label>
    <input type="text" name="name" required placeholder="Enter your name">

    <label>Your Email</label>
    <input type="email" name="email" required placeholder="Enter your email">

    <label>Subject</label>
    <input type="text" name="subject" required placeholder="Enter subject">

    <label>Your Message</label>
    <textarea name="message" required placeholder="Type your message..."></textarea>

    <button type="submit" class="contact-btn">Send Message</button>

</form>

</div>

<?php include 'footer.php'; ?>
