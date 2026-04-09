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

<?php
$credits = [
    "Toon Network India",
    "ToonWorld4All",
    "AnimeWorldIndia",
    "AnimeToonHindi",
    "HindiAnimes",
    "ATOZCartoonist",
    "Anime Network",
    "Star Toons India",
    "ToonAnimeIndia/TheAnimeChannel",
    "Toon Plex",
    "AnimeDekho",
    "ToonWorldForAll",
    "ToonWorldTamil",
    "TheDNK",
    "Telly",
    "Mr. Maker",
    "XERO",
    "ToonsHub",
    "WeebZoneIndia",
    "Saon",
    "Action Toons",
    "Team Project X",
    "AnimeAcademy",
    "DV Team",
    "ATTKC"
];
?>

<?php include 'header.php'; ?>

<style>
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

<!-- Back to Home Button -->
<div style="text-align:center;">
    <a href="<?php echo home_url(); ?>" class="back-btn">Back to Home</a>    <!-- Home Ka Url Dena Hei -->
</div>

<div class="credits-box">
    <h1>Credits</h1>
    <p>The content on this site is indexed from the following people/sites.<br>
    Mostly recorded / encoded / ripped / subbed by them.</p>

    <ul>
        <?php foreach ($credits as $c): ?>
            <li><?= htmlspecialchars($c, ENT_QUOTES, 'UTF-8'); ?></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php include 'footer.php'; ?>
