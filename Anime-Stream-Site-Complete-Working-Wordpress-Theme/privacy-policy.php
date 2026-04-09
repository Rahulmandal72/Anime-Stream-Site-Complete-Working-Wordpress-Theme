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
.policy-box {
    max-width: 900px;
    margin: 40px auto;
    padding: 25px;
    background: #1b1b1f;
    border-radius: 10px;
    border: 1px solid #2c2c33;
    color: #ddd;
    line-height: 1.7;
}

.policy-box h1 {
    color: #fff;
    font-size: 28px;
    margin-bottom: 15px;
}

.policy-box h2 {
    margin-top: 25px;
    color: #fff;
    font-size: 20px;
}

.policy-box p {
    margin-top: 10px;
    color: #cfcfcf;
}

.policy-box ul {
    margin-left: 20px;
    margin-top: 10px;
}

.back-btn {
    display: inline-block;
    margin-bottom: 20px;
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
    .policy-box {
        padding: 18px;
        margin: 15px;
    }
    .policy-box h1 {
        font-size: 24px;
    }
    .policy-box h2 {
        font-size: 18px;
    }
}
</style>

<div class="policy-box">

    <!-- HOME BUTTON -->
    <a href="<?php echo home_url(); ?>" class="back-btn">Back to Home</a>

    <h1>Privacy Policy – AnimeFlow</h1>
    <p>Last Updated: <?php echo date("F d, Y"); ?></p>

    <p>Welcome to <strong>AnimeFlow</strong>. Your privacy is extremely important to us.  
    This Privacy Policy explains how we collect, use, and protect your information when you visit or use our website <strong>AnimeFlow</strong>.</p>

    <h2>1. Information We Collect</h2>
    <p>AnimeFlow itself does NOT collect any personal data unless you voluntarily provide it.  
    However, some automatic non-personal information may be collected:</p>
    <ul>
        <li>IP Address (for security & analytics)</li>
        <li>Browser Type & Version</li>
        <li>Pages Visited on AnimeFlow</li>
        <li>Device Type (Mobile/Desktop)</li>
        <li>Referring URLs</li>
    </ul>

    <h2>2. Cookies & Tracking</h2>
    <p>AnimeFlow may use Cookies for:</p>
    <ul>
        <li>Improving website performance</li>
        <li>Analytics (Google Analytics or equivalents)</li>
        <li>Saving user preferences</li>
    </ul>
    <p>You can disable cookies anytime from your browser settings.</p>

    <h2>3. Third-Party Content</h2>
    <p>AnimeFlow indexes, embeds, or redirects to third-party content providers.  
    We are not responsible for privacy practices of third-party websites.  
    We strongly recommend reviewing their policies as well.</p>

    <h2>4. External Links</h2>
    <p>AnimeFlow may contain links to external platforms (like streaming sites, video hosts, etc.).  
    We are not responsible for their data handling or security.</p>

    <h2>5. Data Security</h2>
    <p>We use reasonable security practices to protect any collected data.  
    However, no method of transmission over the internet is 100% secure.</p>

    <h2>6. Children's Privacy</h2>
    <p>AnimeFlow does NOT knowingly collect any information from children under 13.  
    If you believe your child has provided personal data, contact us and we will remove it.</p>

    <h2>7. Changes to This Policy</h2>
    <p>We may update this Privacy Policy occasionally.  
    The updated version will always be posted on this page.</p>

    <h2>8. Contact Us</h2>
    <p>If you have questions about this Privacy Policy, you can contact us:</p>
    <p>Email: <strong>support@animeflow.com</strong></p>

</div>

<?php include 'footer.php'; ?>
