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
<?php get_header(); ?>
<?php
// AnimeFlow DMCA Page
?>
<div class="credits-box">
    <h1>AnimeFlow DMCA & Disclaimer</h1>

    <h2>Disclaimer / Terms of Conditions</h2>
    <p>We index content that is already available on other websites. AnimeFlow does not host or store any files on its server. All contents are provided by non-affiliated third parties. AnimeFlow does not accept responsibility for content hosted on third-party websites and has no involvement in the same.</p>
    
    <p>We only index content much like how Google works. We are not on any social media websites. All social media links on our site are fan-managed.</p>
    
    <p>We do not store any copyright-protected content on our servers. All posts are indexed for educational and promotional purposes only. The hosting server or administrator cannot be held responsible for contents on linked sites or changes to them.</p>
    
    <p>We highly encourage users to purchase CDs or DVDs of the content. By remaining on this site, you affirm your understanding and compliance with this disclaimer.</p>

    <h2>DMCA – Digital Millennium Copyright Act</h2>
    <p>AnimeFlow is in compliance with 17 U.S.C. § 512 and the Digital Millennium Copyright Act (“DMCA”). It is our policy to respond to infringement notices and take appropriate actions under the DMCA and other intellectual property laws.</p>

    <p>If your copyrighted material appears on AnimeFlow, please send a written communication including:</p>
    <ul>
        <li>Proof that you are authorized to act on behalf of the copyright owner.</li>
        <li>Valid contact information, including email.</li>
        <li>Identification of the copyrighted work, including at least one search term where it appears on AnimeFlow.</li>
        <li>A statement of good faith belief that the use is unauthorized.</li>
        <li>A statement under penalty of perjury that the information is accurate.</li>
        <li>Signature of the authorized person.</li>
    </ul>

    <p>Send notices to: <a href="mailto:yourgmail@gmail.com" style="color:#1abc9c;">yourgmail@gmail.com</a></p>

    <p>Please allow 4-5 business days for removal. Emails to other parties will not expedite your request.</p>

    <a href="<?php echo home_url(); ?>" class="back-btn">Back to Home</a>
</div>

<style>
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    margin: 0;
    background: #121212;
    color: #ccc;
}

.credits-box {
    max-width: 850px;
    margin: 40px auto;
    padding: 25px;
    background: #1b1b1f;
    border-radius: 10px;
    border: 1px solid #2c2c33;
}

.back-btn {
    display: inline-block;
    margin: 20px auto 0 auto;
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

.credits-box h1 {
    margin-bottom: 10px;
    color: #fff;
    font-size: 26px;
}

.credits-box h2 {
    color: #fff;
    margin-top: 25px;
}

.credits-box p {
    color: #bbb;
    line-height: 1.5;
}

.credits-box ul {
    list-style: none;
    padding: 0;
    margin-top: 20px;
}

.credits-box li {
    padding: 10px 5px;
    border-bottom: 1px solid #333;
    color: #e5e5e5;
    font-size: 15px;
}

.credits-box li:last-child {
    border-bottom: none;
}

/* MOBILE */
@media (max-width: 600px) {
    .credits-box {
        padding: 18px;
        margin: 15px;
    }
    .credits-box h1 {
        font-size: 22px;
    }
    .credits-box li {
        font-size: 14px;
    }
    .back-btn {
        width: 100%;
        text-align: center;
    }
}
</style>

<?php get_footer(); ?>
