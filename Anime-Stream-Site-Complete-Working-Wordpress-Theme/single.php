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

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html, body {
    width: 100%;
    overflow-x: hidden;
}


body {
    background: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
    min-height: 100vh;
    font-family: "Poppins", sans-serif;
}

/* ============ SEARCH BAR ============ */
.search-container {
    width: 100%;
    background: rgba(0, 0, 0, 0.3);
    padding: 12px 10px;
    position: sticky;
    top: 0;
    z-index: 999;
    backdrop-filter: blur(10px);
    border-bottom: 1px solid rgba(255, 223, 0, 0.2);
}

@media (min-width: 768px) {
    .search-container {
        padding: 18px 0;
    }
}

@media (min-width: 1024px) {
    .search-container {
        padding: 25px 0;
    }
}

.search-wrapper {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    display: flex;
    gap: 8px;
    align-items: center;
    padding: 0 10px;
}

@media (min-width: 768px) {
    .search-wrapper {
        gap: 12px;
        padding: 0 15px;
    }
}

@media (min-width: 1024px) {
    .search-wrapper {
        gap: 12px;
        padding: 0;
    }
}

.search-input-wrapper {
    flex: 1;
    position: relative;
    display: flex;
    align-items: center;
}

.search-icon {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #ffdf00;
    font-size: 14px;
    pointer-events: none;
    z-index: 10;
}

@media (min-width: 768px) {
    .search-icon {
        font-size: 16px;
        left: 15px;
    }
}

@media (min-width: 1024px) {
    .search-icon {
        font-size: 18px;
    }
}

.search-input {
    width: 100%;
    padding: 10px 14px 10px 38px;
    background: rgba(255, 223, 0, 0.12);
    border: 2px solid rgba(255, 223, 0, 0.4);
    border-radius: 8px;
    color: #fff;
    font-family: "Poppins", sans-serif;
    font-size: 13px;
    transition: all 0.3s ease;
}

@media (min-width: 768px) {
    .search-input {
        padding: 12px 16px 12px 45px;
        font-size: 14px;
        border-radius: 10px;
    }
}

@media (min-width: 1024px) {
    .search-input {
        padding: 14px 20px 14px 50px;
        font-size: 15px;
    }
}

.search-input::placeholder {
    color: rgba(255, 255, 255, 0.6);
}

.search-input:focus {
    outline: none;
    border-color: #ffdf00;
    background: rgba(255, 223, 0, 0.18);
    box-shadow: 0 0 15px rgba(255, 223, 0, 0.3);
}

@media (min-width: 768px) {
    .search-input:focus {
        box-shadow: 0 0 20px rgba(255, 223, 0, 0.3);
    }
}

.search-btn {
    padding: 10px 14px;
    background: linear-gradient(135deg, #ffdf00 0%, #ffed4e 100%);
    color: #000;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    font-size: 12px;
    cursor: pointer;
    transition: all 0.3s ease;
    letter-spacing: 0.5px;
    font-family: "Poppins", sans-serif;
    white-space: nowrap;
    flex-shrink: 0;
    box-shadow: 0 4px 15px rgba(255, 223, 0, 0.2);
}

@media (min-width: 768px) {
    .search-btn {
        padding: 12px 24px;
        font-size: 13px;
        border-radius: 10px;
        box-shadow: 0 8px 25px rgba(255, 223, 0, 0.2);
    }
}

@media (min-width: 1024px) {
    .search-btn {
        padding: 14px 35px;
        font-size: 15px;
    }
}

.search-btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(255, 223, 0, 0.3);
}

@media (min-width: 768px) {
    .search-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 35px rgba(255, 223, 0, 0.4);
    }
}

.search-results {
    position: absolute;
    top: 100%;
    left: 0;
    right: 0;
    background: rgba(15, 12, 41, 0.98);
    border: 2px solid rgba(255, 223, 0, 0.3);
    border-top: none;
    border-radius: 0 0 8px 8px;
    max-height: 300px;
    overflow-y: auto;
    z-index: 1000;
    display: none;
    backdrop-filter: blur(15px);
    margin-top: -2px;
}

@media (min-width: 768px) {
    .search-results {
        border-radius: 0 0 10px 10px;
        max-height: 400px;
    }
}

@media (min-width: 1024px) {
    .search-results {
        max-height: 450px;
    }
}

.search-results.active {
    display: block;
    animation: slideDown 0.3s ease;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.search-result-item {
    padding: 10px 12px;
    border-bottom: 1px solid rgba(255, 223, 0, 0.08);
    cursor: pointer;
    transition: all 0.2s ease;
}

@media (min-width: 768px) {
    .search-result-item {
        padding: 12px 14px;
    }
}

@media (min-width: 1024px) {
    .search-result-item {
        padding: 14px 16px;
    }
}

.search-result-item:hover {
    background: rgba(255, 223, 0, 0.12);
    padding-left: 16px;
}

@media (min-width: 768px) {
    .search-result-item:hover {
        padding-left: 18px;
    }
}

@media (min-width: 1024px) {
    .search-result-item:hover {
        padding-left: 22px;
    }
}

.search-result-item a {
    text-decoration: none;
    color: #ffdf00;
    display: block;
    font-weight: 600;
    font-size: 12px;
}

@media (min-width: 768px) {
    .search-result-item a {
        font-size: 13px;
    }
}

@media (min-width: 1024px) {
    .search-result-item a {
        font-size: 14px;
    }
}

.search-result-item small {
    color: rgba(255, 255, 255, 0.5);
    display: block;
    margin-top: 3px;
    font-size: 10px;
}

@media (min-width: 768px) {
    .search-result-item small {
        margin-top: 4px;
        font-size: 11px;
    }
}

@media (min-width: 1024px) {
    .search-result-item small {
        margin-top: 5px;
        font-size: 12px;
    }
}

.search-result-item:last-child {
    border-bottom: none;
}

.no-results {
    padding: 15px;
    color: rgba(255, 255, 255, 0.6);
    text-align: center;
    font-size: 12px;
}

@media (min-width: 768px) {
    .no-results {
        padding: 18px;
        font-size: 13px;
    }
}

@media (min-width: 1024px) {
    .no-results {
        padding: 20px;
        font-size: 14px;
    }
}

/* ============ MAIN CONTAINER ============ */
.single-container {
    width: 100%;
    max-width: 1300px;
    margin: 0 auto;
    color: #fff;
    font-family: "Poppins", sans-serif;
    padding: 15px 10px;
}

@media (min-width: 768px) {
    .single-container {
        padding: 30px 15px;
    }
}

@media (min-width: 1024px) {
    .single-container {
        margin: 60px auto;
        padding: 0;
    }
}
/* Mobile-First Responsive Design */

.single-wrapper {
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-bottom: 30px;
}

@media (min-width: 768px) {
    .single-wrapper {
        display: grid;
        grid-template-columns: 250px 1fr;
        gap: 30px;
        margin-bottom: 40px;
    }
}

@media (min-width: 1024px) {
    .single-wrapper {
        grid-template-columns: 360px 1fr;
        gap: 50px;
        margin-bottom: 60px;
        align-items: start;
    }
}

.single-left {
    width: 100%;
    position: relative;
    max-width: 200px;
}

@media (min-width: 768px) {
    .single-left {
        max-width: 200px;
    }
}

@media (min-width: 1024px) {
    .single-left {
        max-width: 280px;
    }
}

.single-thumbnail {
    width: 100%;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 8px 20px rgba(255, 223, 0, 0.1);
    transition: transform 0.3s ease;
    cursor: pointer;
}

.single-thumbnail:hover {
    transform: translateY(-2px);
}

.single-thumbnail img {
    width: 100%;
    height: auto;
    display: block;
    border-radius: inherit;
}

@media (min-width: 768px) {
    .single-thumbnail {
        border-radius: 16px;
        box-shadow: 0 12px 30px rgba(255, 223, 0, 0.15);
    }
}

@media (min-width: 1024px) {
    .single-thumbnail {
        border-radius: 20px;
        box-shadow: 0 16px 40px rgba(255, 223, 0, 0.2);
    }
}

.year-badge,
.rating-badge {
    position: absolute;
    right: 12px;
    padding: 6px 10px;
    border-radius: 8px;
    font-weight: 700;
    font-size: 11px;
    z-index: 20;
}

.year-badge {
    top: 12px;
    background: linear-gradient(135deg, #ffdf00, #ffed4e);
    color: #000;
}

.rating-badge {
    top: 45px;
    background: linear-gradient(135deg, #ff6b6b, #ff8787);
    color: #fff;
}

@media (min-width: 768px) {
    .year-badge,
    .rating-badge {
        padding: 8px 12px;
        font-size: 12px;
        border-radius: 10px;
        right: 16px;
    }

    .year-badge {
        top: 16px;
    }

    .rating-badge {
        top: 56px;
    }
}

@media (min-width: 1024px) {
    .year-badge,
    .rating-badge {
        padding: 10px 16px;
        font-size: 14px;
        border-radius: 12px;
        right: 20px;
    }

    .year-badge {
        top: 20px;
    }

    .rating-badge {
        top: 65px;
    }
}

.single-right {
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.single-title {
    font-size: 24px;
    font-weight: 800;
    margin-bottom: 14px;
    line-height: 1.2;
    background: linear-gradient(135deg, #ffdf00, #fff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

@media (min-width: 768px) {
    .single-title {
        font-size: 32px;
        margin-bottom: 16px;
    }
}

@media (min-width: 1024px) {
    .single-title {
        font-size: 48px;
        margin-bottom: 20px;
    }
}

.genres-section {
    margin-bottom: 16px;
    padding: 12px 14px;
    background: rgba(255, 223, 0, 0.08);
    border: 1px solid rgba(255, 223, 0, 0.15);
    border-radius: 10px;
}

@media (min-width: 768px) {
    .genres-section {
        margin-bottom: 24px;
        padding: 16px 18px;
        border-radius: 14px;
    }
}

@media (min-width: 1024px) {
    .genres-section {
        margin-bottom: 32px;
        padding: 20px 24px;
        border-radius: 16px;
    }
}

.genres-label {
    font-size: 10px;
    font-weight: 800;
    color: #ffdf00;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    margin-bottom: 8px;
    display: block;
}

@media (min-width: 768px) {
    .genres-label {
        font-size: 11px;
        margin-bottom: 12px;
        letter-spacing: 2px;
    }
}

@media (min-width: 1024px) {
    .genres-label {
        font-size: 12px;
        margin-bottom: 14px;
        letter-spacing: 2.5px;
    }
}

.genres-list {
    display: flex;
    flex-wrap: wrap;
    gap: 8px;
}

@media (min-width: 768px) {
    .genres-list {
        gap: 10px;
    }
}

.genre-tag {
    background: linear-gradient(135deg, #ffdf00, #ffed4e);
    color: #000;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    text-decoration: none;
    display: inline-block;
}

@media (min-width: 768px) {
    .genre-tag {
        padding: 8px 16px;
        font-size: 12px;
        border-radius: 24px;
    }
}

@media (min-width: 1024px) {
    .genre-tag {
        padding: 10px 20px;
        font-size: 13px;
        border-radius: 28px;
    }
}

.divider {
    height: 1px;
    background: linear-gradient(90deg, #ffdf00, transparent);
    margin: 12px 0;
}

@media (min-width: 768px) {
    .divider {
        margin: 16px 0;
    }
}

@media (min-width: 1024px) {
    .divider {
        margin: 20px 0;
    }
}

.content-description {
    font-size: 14px;
    line-height: 1.6;
    color: rgba(255, 255, 255, 0.85);
    text-align: left;
}

@media (min-width: 768px) {
    .content-description {
        font-size: 15px;
        line-height: 1.7;
    }
}

@media (min-width: 1024px) {
    .content-description {
        font-size: 16px;
        line-height: 1.8;
    }
}/* ============ VIDEO PLAYER ============ */
.video-player-section {
    display: none;
    margin-bottom: 20px;
    animation: slideDown 0.5s ease;
    background: rgba(10, 7, 20, 0.95);
    border-radius: 10px;
    overflow: hidden;
    border: 2px solid rgba(139, 92, 246, 0.3);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.8);
}

@media (min-width: 768px) {
    .video-player-section {
        margin-bottom: 30px;
        border-radius: 14px;
        box-shadow: 0 15px 45px rgba(0, 0, 0, 0.8);
    }
}

@media (min-width: 1024px) {
    .video-player-section {
        margin-bottom: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.8);
    }
}

.video-player-section.active {
    display: block;
}

.video-player-header {
    background: linear-gradient(135deg, #1a1530 0%, #0d0820 100%);
    padding: 12px 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(139, 92, 246, 0.2);
    gap: 10px;
}

@media (min-width: 768px) {
    .video-player-header {
        padding: 14px 18px;
    }
}

@media (min-width: 1024px) {
    .video-player-header {
        padding: 18px 25px;
    }
}

.video-player-title {
    font-size: 12px;
    font-weight: 700;
    color: #fff;
    margin: 0;
    flex: 1;
    min-width: 0;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
}

@media (min-width: 768px) {
    .video-player-title {
        font-size: 14px;
    }
}

@media (min-width: 1024px) {
    .video-player-title {
        font-size: 16px;
    }
}

.close-player {
    background: rgba(139, 92, 246, 0.2);
    color: #8b5cf6;
    border: none;
    width: 28px;
    height: 28px;
    border-radius: 50%;
    font-size: 16px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
    transition: all 0.3s ease;
    font-weight: bold;
}

@media (min-width: 768px) {
    .close-player {
        width: 32px;
        height: 32px;
        font-size: 19px;
    }
}

@media (min-width: 1024px) {
    .close-player {
        width: 36px;
        height: 36px;
        font-size: 22px;
    }
}

.close-player:hover {
    background: #8b5cf6;
    color: #fff;
    transform: rotate(90deg);
}

.server-info-bar {
    background: rgba(20, 15, 35, 0.95);
    padding: 10px 12px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid rgba(139, 92, 246, 0.15);
    flex-wrap: wrap;
    gap: 8px;
    font-size: 10px;
}

@media (min-width: 768px) {
    .server-info-bar {
        padding: 12px 16px;
        font-size: 11px;
        gap: 10px;
    }
}

@media (min-width: 1024px) {
    .server-info-bar {
        padding: 12px 25px;
        font-size: 12px;
        gap: 10px;
    }
}

.server-info-left {
    display: flex;
    gap: 8px;
    align-items: center;
    flex-wrap: wrap;
    flex: 1;
}

@media (min-width: 768px) {
    .server-info-left {
        gap: 12px;
    }
}

@media (min-width: 1024px) {
    .server-info-left {
        gap: 15px;
    }
}

.info-item {
    display: flex;
    align-items: center;
    gap: 4px;
    font-size: 9px;
    color: rgba(255, 255, 255, 0.7);
}

@media (min-width: 768px) {
    .info-item {
        font-size: 10px;
        gap: 5px;
    }
}

@media (min-width: 1024px) {
    .info-item {
        font-size: 12px;
        gap: 6px;
    }
}

.info-icon {
    color: #8b5cf6;
    font-size: 11px;
}

@media (min-width: 768px) {
    .info-icon {
        font-size: 12px;
    }
}

@media (min-width: 1024px) {
    .info-icon {
        font-size: 14px;
    }
}

.schedule-badge {
    background: rgba(139, 92, 246, 0.2);
    color: #a78bfa;
    padding: 3px 8px;
    border-radius: 6px;
    font-size: 9px;
    font-weight: 600;
    white-space: nowrap;
}

@media (min-width: 768px) {
    .schedule-badge {
        padding: 4px 10px;
        font-size: 10px;
        border-radius: 8px;
    }
}

@media (min-width: 1024px) {
    .schedule-badge {
        padding: 4px 12px;
        font-size: 11px;
        border-radius: 12px;
    }
}

.stream-selector {
    background: #0d0820;
    padding: 12px 12px;
    border-bottom: 1px solid rgba(139, 92, 246, 0.15);
    overflow-x: auto;
}

@media (min-width: 768px) {
    .stream-selector {
        padding: 14px 16px;
    }
}

@media (min-width: 1024px) {
    .stream-selector {
        padding: 15px 25px;
    }
}

.stream-label {
    color: rgba(255, 255, 255, 0.8);
    font-weight: 600;
    font-size: 11px;
    margin-bottom: 8px;
    display: block;
}

@media (min-width: 768px) {
    .stream-label {
        font-size: 12px;
        margin-bottom: 10px;
    }
}

@media (min-width: 1024px) {
    .stream-label {
        font-size: 13px;
        margin-bottom: 12px;
    }
}

.stream-buttons {
    display: flex;
    gap: 6px;
    overflow-x: auto;
    padding-bottom: 4px;
    flex-wrap: wrap;
}

@media (min-width: 768px) {
    .stream-buttons {
        gap: 7px;
    }
}

@media (min-width: 1024px) {
    .stream-buttons {
        gap: 8px;
    }
}

.stream-btn {
    background: rgba(30, 25, 45, 0.8);
    color: rgba(255, 255, 255, 0.7);
    border: 1px solid rgba(139, 92, 246, 0.3);
    padding: 7px 12px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 10px;
    cursor: pointer;
    white-space: nowrap;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .stream-btn {
        padding: 8px 14px;
        font-size: 11px;
        border-radius: 8px;
    }
}

@media (min-width: 1024px) {
    .stream-btn {
        padding: 8px 20px;
        font-size: 12px;
    }
}

.stream-btn:hover {
    background: rgba(139, 92, 246, 0.2);
    border-color: rgba(139, 92, 246, 0.5);
    color: #fff;
}

.stream-btn.active {
    background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
    color: #fff;
    border-color: #6366f1;
    box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
}

@media (min-width: 1024px) {
    .stream-btn.active {
        box-shadow: 0 4px 15px rgba(99, 102, 241, 0.4);
    }
}

.video-container {
    background: #000;
    position: relative;
    width: 100%;
    padding-top: 56.25%;
    overflow: hidden;
}

.video-container iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    border: none;
}

.video-loading {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    color: #8b5cf6;
    font-size: 12px;
    font-weight: 600;
}

@media (min-width: 768px) {
    .video-loading {
        font-size: 14px;
    }
}

@media (min-width: 1024px) {
    .video-loading {
        font-size: 16px;
    }
}

.audio-selector {
    background: #0d0820;
    padding: 12px 12px;
    border-top: 1px solid rgba(139, 92, 246, 0.15);
    display: flex;
    align-items: center;
    justify-content: space-between;
    gap: 10px;
    flex-wrap: wrap;
}

@media (min-width: 768px) {
    .audio-selector {
        padding: 14px 16px;
        gap: 12px;
    }
}

@media (min-width: 1024px) {
    .audio-selector {
        padding: 15px 25px;
        gap: 15px;
    }
}

.audio-label {
    color: rgba(255, 255, 255, 0.8);
    font-weight: 600;
    font-size: 11px;
    display: flex;
    align-items: center;
    gap: 4px;
}

@media (min-width: 768px) {
    .audio-label {
        font-size: 12px;
        gap: 6px;
    }
}

@media (min-width: 1024px) {
    .audio-label {
        font-size: 13px;
        gap: 8px;
    }
}

.audio-dropdown {
    background: rgba(30, 25, 45, 0.8);
    color: #fff;
    border: 1px solid rgba(139, 92, 246, 0.3);
    padding: 7px 10px;
    border-radius: 6px;
    font-weight: 600;
    font-size: 10px;
    cursor: pointer;
    min-width: 100px;
}

@media (min-width: 768px) {
    .audio-dropdown {
        padding: 8px 12px;
        font-size: 11px;
        min-width: 120px;
        border-radius: 8px;
    }
}

@media (min-width: 1024px) {
    .audio-dropdown {
        padding: 8px 16px;
        font-size: 13px;
        min-width: 140px;
    }
}

.download-section {
    background: linear-gradient(135deg, #0f0a1f 0%, #0d0820 100%);
    padding: 14px 12px;
}

@media (min-width: 768px) {
    .download-section {
        padding: 18px 16px;
    }
}

@media (min-width: 1024px) {
    .download-section {
        padding: 25px;
    }
}

.download-section-title {
    font-size: 13px;
    font-weight: 800;
    color: #fff;
    text-align: center;
    margin-bottom: 10px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

@media (min-width: 768px) {
    .download-section-title {
        font-size: 15px;
        margin-bottom: 14px;
        letter-spacing: 1.2px;
    }
}

@media (min-width: 1024px) {
    .download-section-title {
        font-size: 18px;
        margin-bottom: 20px;
        letter-spacing: 1.5px;
    }
}

/* Base Mobile-First Styles */
.download-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 8px;
    padding: 0 8px;
}

.download-link-btn {
    color: #fff;
    padding: 12px 10px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 12px;
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 4px;
    transition: all 0.3s ease;
    cursor: pointer;
    border: none;
    text-align: center;
    min-height: 44px;
    word-break: break-word;
}

.download-link-btn:active {
    transform: scale(0.95);
}

/* Tablet - 600px and up */
@media (min-width: 600px) {
    .download-grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        padding: 0 12px;
    }

    .download-link-btn {
        padding: 14px 12px;
        font-size: 13px;
        min-height: 48px;
    }
}

/* Medium Tablet - 768px and up */
@media (min-width: 768px) {
    .download-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 12px;
        padding: 0 16px;
    }

    .download-link-btn {
        padding: 14px 14px;
        font-size: 14px;
        border-radius: 8px;
        min-height: 50px;
    }

    .download-link-btn:hover {
        transform: translateY(-2px);
    }
}

/* Desktop - 1024px and up */
@media (min-width: 1024px) {
    .download-grid {
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        padding: 0 20px;
    }

    .download-link-btn {
        padding: 16px 18px;
        font-size: 15px;
        border-radius: 8px;
        min-height: 54px;
    }

    .download-link-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
}

/* Large Desktop - 1440px and up */
@media (min-width: 1440px) {
    .download-grid {
        gap: 16px;
        padding: 0 24px;
    }

    .download-link-btn {
        padding: 16px 20px;
        font-size: 16px;
        min-height: 56px;
    }
}

/* Color Gradients */
.download-link-btn.server1 { background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%); }
.download-link-btn.server2 { background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%); }
.download-link-btn.server3 { background: linear-gradient(135deg, #10b981 0%, #34d399 100%); }
.download-link-btn.server4 { background: linear-gradient(135deg, #f59e0b 0%, #fbbf24 100%); }
.download-link-btn.server5 { background: linear-gradient(135deg, #ef4444 0%, #f87171 100%); }
.download-link-btn.server6 { background: linear-gradient(135deg, #ec4899 0%, #f472b6 100%); }
.download-link-btn.server7 { background: linear-gradient(135deg, #06b6d4 0%, #22d3ee 100%); }
.download-link-btn.server8 { background: linear-gradient(135deg, #a855f7 0%, #c084fc 100%); }
.player-episode-nav {
    background: #0d0820;
    padding: 10px 12px;
    border-top: 1px solid rgba(139, 92, 246, 0.15);
    display: flex;
    justify-content: center;
    gap: 8px;
    flex-wrap: wrap;
}

@media (min-width: 768px) {
    .player-episode-nav {
        padding: 12px 16px;
        gap: 10px;
    }
}

@media (min-width: 1024px) {
    .player-episode-nav {
        padding: 15px 25px;
        gap: 12px;
    }
}

.player-nav-btn {
    background: rgba(139, 92, 246, 0.2);
    color: #8b5cf6;
    border: 1px solid rgba(139, 92, 246, 0.4);
    padding: 7px 12px;
    border-radius: 6px;
    font-weight: 700;
    font-size: 10px;
    cursor: pointer;
    transition: all 0.3s ease;
    white-space: nowrap;
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .player-nav-btn {
        padding: 8px 16px;
        font-size: 11px;
        border-radius: 8px;
    }
}

@media (min-width: 1024px) {
    .player-nav-btn {
        padding: 10px 24px;
        font-size: 13px;
    }
}

.player-nav-btn:hover:not(.disabled) {
    background: #8b5cf6;
    color: #fff;
}

.player-nav-btn.disabled {
    opacity: 0.3;
    cursor: not-allowed;
}/* ============ EPISODE SECTION ============ */
.episode-section {
    margin: 30px 0;
}

@media (min-width: 768px) {
    .episode-section {
        margin: 40px 0;
    }
}

@media (min-width: 1024px) {
    .episode-section {
        margin: 60px 0;
    }
}

.episode-header {
    background: linear-gradient(135deg, #ff6b00 0%, #ff8c42 100%);
    padding: 16px 12px;
    border-radius: 10px 10px 0 0;
    text-align: center;
    box-shadow: 0 8px 20px rgba(255, 107, 0, 0.3);
}

@media (min-width: 768px) {
    .episode-header {
        padding: 22px 16px;
        border-radius: 14px 14px 0 0;
        box-shadow: 0 10px 25px rgba(255, 107, 0, 0.3);
    }
}

@media (min-width: 1024px) {
    .episode-header {
        padding: 30px;
        border-radius: 20px 20px 0 0;
        box-shadow: 0 10px 30px rgba(255, 107, 0, 0.3);
    }
}

.episode-header h2 {
    font-size: 16px;
    font-weight: 800;
    color: #fff;
    margin-bottom: 6px;
    text-transform: uppercase;
    letter-spacing: 1px;
}

@media (min-width: 768px) {
    .episode-header h2 {
        font-size: 20px;
        margin-bottom: 8px;
        letter-spacing: 1.5px;
    }
}

@media (min-width: 1024px) {
    .episode-header h2 {
        font-size: 28px;
        margin-bottom: 10px;
        letter-spacing: 2px;
    }
}

.episode-header p {
    color: rgba(255, 255, 255, 0.9);
    font-size: 11px;
    font-weight: 500;
}

@media (min-width: 768px) {
    .episode-header p {
        font-size: 12px;
    }
}

@media (min-width: 1024px) {
    .episode-header p {
        font-size: 14px;
    }
}

.season-nav-container {
    background: rgba(10, 7, 20, 0.95);
    padding: 12px 10px;
    border: 1px solid rgba(255, 223, 0, 0.15);
    display: flex;
    justify-content: center;
    gap: 8px;
    margin: 0;
    flex-wrap: wrap;
    overflow-x: auto;
}

@media (min-width: 768px) {
    .season-nav-container {
        padding: 16px 14px;
        gap: 10px;
    }
}

@media (min-width: 1024px) {
    .season-nav-container {
        padding: 25px 0;
        gap: 15px;
    }
}

.season-btn {
    background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
    color: #fff;
    padding: 8px 14px;
    border: none;
    border-radius: 16px;
    font-weight: 700;
    font-size: 11px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    transition: all 0.3s ease;
    white-space: nowrap;
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .season-btn {
        padding: 10px 20px;
        font-size: 12px;
        border-radius: 20px;
        letter-spacing: 1px;
        box-shadow: 0 6px 15px rgba(139, 92, 246, 0.3);
    }
}

@media (min-width: 1024px) {
    .season-btn {
        padding: 12px 30px;
        font-size: 14px;
        border-radius: 25px;
        letter-spacing: 1px;
        box-shadow: 0 6px 20px rgba(139, 92, 246, 0.3);
    }
}

.season-btn:hover {
    transform: translateY(-1px);
}

@media (min-width: 768px) {
    .season-btn:hover {
        transform: translateY(-2px);
    }
}

.go-to-latest {
    background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 18px;
    font-weight: 700;
    font-size: 11px;
    cursor: pointer;
    box-shadow: 0 6px 18px rgba(139, 92, 246, 0.3);
    text-transform: uppercase;
    letter-spacing: 0.8px;
    display: block;
    margin: 12px auto;
    transition: all 0.3s ease;
}

@media (min-width: 768px) {
    .go-to-latest {
        padding: 12px 32px;
        font-size: 13px;
        border-radius: 24px;
        margin: 16px auto;
        letter-spacing: 1px;
        box-shadow: 0 8px 22px rgba(139, 92, 246, 0.3);
    }
}

@media (min-width: 1024px) {
    .go-to-latest {
        padding: 14px 40px;
        font-size: 15px;
        border-radius: 30px;
        margin: 20px auto;
        letter-spacing: 1.5px;
        box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3);
    }
}

.go-to-latest:hover {
    transform: translateY(-1px);
}

@media (min-width: 768px) {
    .go-to-latest:hover {
        transform: translateY(-2px);
    }
}

.scroll-info {
    text-align: center;
    color: rgba(255, 255, 255, 0.8);
    font-size: 11px;
    margin: 10px 0;
    font-weight: 500;
}

@media (min-width: 768px) {
    .scroll-info {
        font-size: 12px;
        margin: 12px 0;
    }
}

@media (min-width: 1024px) {
    .scroll-info {
        font-size: 14px;
        margin: 20px 0;
    }
}

.rating-warning {
    background: rgba(220, 38, 38, 0.15);
    border: 2px solid rgba(220, 38, 38, 0.4);
    padding: 10px 12px;
    border-radius: 8px;
    color: #fca5a5;
    text-align: center;
    margin: 12px 0;
    font-size: 11px;
    font-weight: 600;
    line-height: 1.5;
}

@media (min-width: 768px) {
    .rating-warning {
        padding: 12px 16px;
        margin: 14px 0;
        font-size: 12px;
        border-radius: 10px;
    }
}

@media (min-width: 1024px) {
    .rating-warning {
        padding: 15px 20px;
        margin: 20px 0;
        font-size: 13px;
        border-radius: 12px;
    }
}

.season-container {
    margin: 18px 0;
    background: rgba(15, 12, 41, 0.5);
    padding: 12px;
    border-radius: 10px;
    border: 1px solid rgba(255, 223, 0, 0.08);
}

@media (min-width: 768px) {
    .season-container {
        margin: 24px 0;
        padding: 16px;
        border-radius: 12px;
    }
}

@media (min-width: 1024px) {
    .season-container {
        margin: 30px 0;
        padding: 20px;
        border-radius: 14px;
    }
}

.season-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 12px;
}

@media (min-width: 768px) {
    .season-header {
        gap: 12px;
        margin-bottom: 16px;
    }
}

@media (min-width: 1024px) {
    .season-header {
        gap: 15px;
        margin-bottom: 20px;
    }
}

.season-header img {
    width: 60px;
    height: 60px;
    border-radius: 8px;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(255, 223, 0, 0.15);
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .season-header img {
        width: 70px;
        height: 70px;
        border-radius: 10px;
        box-shadow: 0 6px 15px rgba(255, 223, 0, 0.15);
    }
}

@media (min-width: 1024px) {
    .season-header img {
        width: 80px;
        height: 80px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(255, 223, 0, 0.2);
    }
}

.season-info h3 {
    font-size: 15px;
    font-weight: 700;
    color: #ffdf00;
    margin-bottom: 3px;
}

@media (min-width: 768px) {
    .season-info h3 {
        font-size: 18px;
        margin-bottom: 4px;
    }
}

@media (min-width: 1024px) {
    .season-info h3 {
        font-size: 24px;
        margin-bottom: 5px;
    }
}

.season-info p {
    color: rgba(255, 255, 255, 0.7);
    font-size: 11px;
}

@media (min-width: 768px) {
    .season-info p {
        font-size: 12px;
    }
}

@media (min-width: 1024px) {
    .season-info p {
        font-size: 13px;
    }
}

.episodes-grid {
    display: grid;
    gap: 10px;
}

@media (min-width: 768px) {
    .episodes-grid {
        gap: 12px;
    }
}

@media (min-width: 1024px) {
    .episodes-grid {
        gap: 15px;
    }
}

.episode-item {
    background: rgba(15, 12, 41, 0.6);
    border: 1px solid rgba(255, 223, 0, 0.2);
    border-radius: 8px;
    padding: 10px;
    display: grid;
    grid-template-columns: 60px 1fr 50px;
    gap: 10px;
    align-items: center;
    transition: all 0.3s ease;
    backdrop-filter: blur(10px);
}

@media (min-width: 768px) {
    .episode-item {
        grid-template-columns: 75px 1fr 70px;
        padding: 12px;
        border-radius: 10px;
        gap: 12px;
    }
}

@media (min-width: 1024px) {
    .episode-item {
        grid-template-columns: 80px 1fr auto;
        padding: 15px 20px;
        border-radius: 12px;
        gap: 15px;
    }
}

.episode-item:hover {
    background: rgba(15, 12, 41, 0.8);
    border-color: rgba(255, 223, 0, 0.3);
}

@media (min-width: 1024px) {
    .episode-item:hover {
        background: rgba(15, 12, 41, 0.8);
        border-color: rgba(255, 223, 0, 0.4);
        transform: translateY(-2px);
    }
}

.episode-thumbnail {
    width: 60px;
    height: 45px;
    border-radius: 6px;
    object-fit: cover;
    box-shadow: 0 3px 10px rgba(0, 0, 0, 0.4);
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .episode-thumbnail {
        width: 75px;
        height: 56px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }
}

@media (min-width: 1024px) {
    .episode-thumbnail {
        width: 80px;
        height: 60px;
        border-radius: 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
    }
}

.episode-info h4 {
    color: #ffdf00;
    font-size: 12px;
    font-weight: 700;
    margin-bottom: 3px;
    line-height: 1.3;
}

@media (min-width: 768px) {
    .episode-info h4 {
        font-size: 13px;
        margin-bottom: 4px;
    }
}

@media (min-width: 1024px) {
    .episode-info h4 {
        font-size: 15px;
        margin-bottom: 5px;
    }
}

.episode-description {
    color: rgba(255, 255, 255, 0.6);
    font-size: 10px;
    line-height: 1.3;
    margin-bottom: 3px;
    display: none;
}

@media (min-width: 1024px) {
    .episode-description {
        font-size: 13px;
        line-height: 1.5;
        margin-bottom: 4px;
        display: block;
    }
}

.episode-meta {
    color: #8b5cf6;
    font-size: 9px;
}

@media (min-width: 768px) {
    .episode-meta {
        font-size: 10px;
    }
}

@media (min-width: 1024px) {
    .episode-meta {
        font-size: 11px;
    }
}

.watch-btn {
    background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
    color: #fff;
    padding: 6px 8px;
    border: none;
    border-radius: 6px;
    font-weight: 700;
    font-size: 10px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(16, 185, 129, 0.25);
    text-decoration: none;
    display: flex;
    align-items: center;
    justify-content: center;
    white-space: nowrap;
    transition: all 0.3s ease;
    flex-shrink: 0;
}

@media (min-width: 768px) {
    .watch-btn {
        padding: 8px 12px;
        font-size: 11px;
        border-radius: 8px;
        box-shadow: 0 6px 15px rgba(16, 185, 129, 0.25);
    }
}

@media (min-width: 1024px) {
    .watch-btn {
        padding: 10px 25px;
        font-size: 13px;
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.25);
    }
}

.watch-btn:hover {
    transform: translateY(-1px);
}

@media (min-width: 768px) {
    .watch-btn:hover {
        transform: translateY(-2px);
    }
}

/* ============ NAVIGATION ============ */
.post-navigation {
    display: flex;
    justify-content: space-between;
    margin: 30px 0 25px;
    gap: 10px;
    flex-wrap: wrap;
}

@media (min-width: 768px) {
    .post-navigation {
        margin: 40px 0 30px;
        gap: 15px;
    }
}

@media (min-width: 1024px) {
    .post-navigation {
        margin: 60px 0 50px;
        gap: 20px;
    }
}

.nav-column {
    flex: 1;
    min-width: 100px;
}

.nav-column:last-child {
    text-align: right;
}

.nav-link {
    color: #ffdf00;
    text-decoration: none;
    font-weight: 700;
    font-size: 12px;
    transition: all 0.3s ease;
    display: inline-block;
    word-break: break-word;
}

@media (min-width: 768px) {
    .nav-link {
        font-size: 13px;
    }
}

@media (min-width: 1024px) {
    .nav-link {
        font-size: 14px;
    }
}

.nav-link:hover {
    color: #fff;
    transform: translateX(3px);
}

.nav-column:last-child .nav-link:hover {
    transform: translateX(-3px);
}

/* ============ RELATED SECTION ============ */
.related-section {
    margin-top: 40px;
}

@media (min-width: 768px) {
    .related-section {
        margin-top: 50px;
    }
}

@media (min-width: 1024px) {
    .related-section {
        margin-top: 80px;
    }
}

.related-title {
    font-size: 18px;
    font-weight: 800;
    margin: 0 0 14px;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    background: linear-gradient(135deg, #ffdf00 0%, #fff 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    position: relative;
    padding-bottom: 10px;
}

@media (min-width: 768px) {
    .related-title {
        font-size: 22px;
        margin: 0 0 18px;
        padding-bottom: 12px;
        letter-spacing: 1.8px;
    }
}

@media (min-width: 1024px) {
    .related-title {
        font-size: 32px;
        margin: 0 0 35px;
        padding-bottom: 15px;
        letter-spacing: 2px;
    }
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(130px, 1fr));
    gap: 12px;
}

@media (min-width: 768px) {
    .related-grid {
        grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
        gap: 16px;
    }
}

@media (min-width: 1024px) {
    .related-grid {
        grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
        gap: 25px;
    }
}

.related-item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    transition: all 0.4s ease;
    background: rgba(255, 223, 0, 0.05);
    border: 1px solid rgba(255, 223, 0, 0.1);
}

@media (min-width: 768px) {
    .related-item {
        border-radius: 14px;
    }
}

@media (min-width: 1024px) {
    .related-item {
        border-radius: 16px;
    }
}

.related-item a {
    text-decoration: none;
    color: inherit;
    display: block;
    height: 100%;
}

.related-item img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 10px;
    display: block;
    transition: transform 0.4s ease;
}

@media (min-width: 768px) {
    .related-item img {
        height: 180px;
        border-radius: 14px;
    }
}

@media (min-width: 1024px) {
    .related-item img {
        height: 240px;
        border-radius: 16px;
    }
}

.related-item a:hover img {
    transform: scale(1.05);
}

.related-title-text {
    font-size: 11px;
    padding: 10px;
    font-weight: 700;
    line-height: 1.3;
    color: #ffdf00;
}

@media (min-width: 768px) {
    .related-title-text {
        font-size: 12px;
        padding: 12px;
        line-height: 1.4;
    }
}

@media (min-width: 1024px) {
    .related-title-text {
        font-size: 14px;
        padding: 15px;
        line-height: 1.5;
    }
}

</style><!-- Search Bar -->
<div class="search-container">
    <div class="search-wrapper">
        <div class="search-input-wrapper">
            <span class="search-icon">🔍</span>
            <input 
                type="text" 
                class="search-input" 
                id="searchInput" 
                placeholder="Search anime, cartoon, movie..."
                autocomplete="off"
            >
            <div class="search-results" id="searchResults"></div>
        </div>
        <button class="search-btn" id="searchBtn">Search</button>
    </div>
</div>

<div class="single-container">
    <?php if(have_posts()): while(have_posts()): the_post(); ?>
    
    <!-- Video Player Section -->
    <div id="videoPlayerSection" class="video-player-section">
        <div class="video-player-header">
            <h3 class="video-player-title" id="playerEpisodeTitle">Now Playing</h3>
            <button class="close-player" onclick="closePlayer()">×</button>
        </div>

        <div class="server-info-bar">
            <div class="server-info-left">
                <div class="info-item">
                    <span class="info-icon">📺</span>
                    <span>Select a server below to watch. Try another if current doesn't work.</span>
                </div>
            </div>
            <div class="schedule-badge">Multi Audio</div>
        </div>

        <div class="stream-selector">
            <span class="stream-label">🎬 Select Streaming Server:</span>
            <div class="stream-buttons" id="streamButtons">
                <!-- Servers will be dynamically loaded here -->
            </div>
        </div>

        <div class="video-container">
            <div class="video-loading" id="videoLoading">Loading player...</div>
            <iframe id="videoPlayer" allowfullscreen></iframe>
        </div>

        <div class="audio-selector">
            <span class="audio-label">🎵 Audio Language:</span>
            <select class="audio-dropdown" id="audioLanguage" onchange="changeAudio()">
                <option value="hindi">Hindi</option>
                <option value="english">English</option>
                <option value="japanese">Japanese</option>
                <option value="tamil">Tamil</option>
                <option value="telugu">Telugu</option>
            </select>
        </div>

        <div class="download-section">
            <h3 class="download-section-title">📥 Download Episode</h3>
            <div class="download-grid" id="downloadGrid">
                <!-- Download links will be dynamically loaded here -->
            </div>
        </div>

        <div class="player-episode-nav">
            <button class="player-nav-btn" id="playerPrevBtn" onclick="navigatePrev()">
                ⬅ Previous Episode
            </button>
            <button class="player-nav-btn" id="playerNextBtn" onclick="navigateNext()">
                Next Episode ➜
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="single-wrapper">
        <div class="single-left">
            <div class="single-thumbnail">
                <?php the_post_thumbnail('full'); ?>
            </div>
            
            <?php 
            $custom_year = get_post_meta(get_the_ID(), 'year', true);
            $display_year = !empty($custom_year) ? $custom_year : get_the_date('Y');
            ?>
            <div class="year-badge"><?php echo $display_year; ?></div>
            
            <?php 
            $rating = get_post_meta(get_the_ID(), 'rating', true);
            if(!empty($rating)): ?>
                <div class="rating-badge">⭐ <?php echo esc_html($rating); ?></div>
            <?php endif; ?>
        </div>

        <div class="single-right">
            <h1 class="single-title">
                <?php the_title(); ?>
            </h1>

            <?php 
            $genres = get_anime_genres(get_the_ID());
            if (!empty($genres)): 
            ?>
                <div class="genres-section">
                    <span class="genres-label">🎬 Genres</span>
                    <div class="genres-list">
                        <?php foreach($genres as $genre_slug): 
                            $genre_name = ucwords(str_replace('-', ' ', $genre_slug));
                        ?>
                            <a class="genre-tag" href="javascript:void(0);">
                                <?php echo esc_html($genre_name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>

            <div class="divider"></div>

            <div class="content-description">
                <?php the_content(); ?>
                <!-- SHARE SECTION - Mobile Friendly Version -->

<style>
.share-section {
    margin: 20px 0;
    padding: 15px;
    background: rgba(255, 223, 0, 0.08);
    border: 2px solid rgba(255, 223, 0, 0.2);
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 12px;
}

@media (min-width: 480px) {
    .share-section {
        margin: 25px 0;
        padding: 18px;
        border-radius: 12px;
        gap: 14px;
    }
}

@media (min-width: 768px) {
    .share-section {
        margin: 30px 0;
        padding: 20px;
        flex-direction: row;
        align-items: center;
        border-radius: 14px;
        gap: 15px;
    }
}

@media (min-width: 1024px) {
    .share-section {
        margin: 40px 0;
        padding: 25px;
        border-radius: 16px;
        gap: 20px;
    }
}

.share-label {
    font-size: 12px;
    font-weight: 800;
    color: #ffdf00;
    text-transform: uppercase;
    letter-spacing: 0.8px;
    white-space: nowrap;
}

@media (min-width: 480px) {
    .share-label {
        font-size: 13px;
        letter-spacing: 1px;
    }
}

@media (min-width: 768px) {
    .share-label {
        font-size: 14px;
        letter-spacing: 1.1px;
    }
}

@media (min-width: 1024px) {
    .share-label {
        font-size: 15px;
        letter-spacing: 1.2px;
    }
}

.share-buttons {
    display: flex;
    gap: 6px;
    flex-wrap: wrap;
    justify-content: center;
    width: 100%;
}

@media (min-width: 480px) {
    .share-buttons {
        gap: 8px;
        justify-content: flex-start;
    }
}

@media (min-width: 768px) {
    .share-buttons {
        gap: 8px;
        flex: 1;
        justify-content: flex-start;
        width: auto;
    }
}

@media (min-width: 1024px) {
    .share-buttons {
        gap: 10px;
    }
}

.share-btn {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 3px;
    padding: 8px 10px;
    border: none;
    border-radius: 6px;
    font-weight: 700;
    font-size: 11px;
    cursor: pointer;
    text-decoration: none;
    transition: all 0.3s ease;
    white-space: nowrap;
    color: #fff;
    flex-shrink: 0;
}

@media (min-width: 480px) {
    .share-btn {
        padding: 8px 12px;
        font-size: 12px;
        border-radius: 7px;
        gap: 4px;
    }
}

@media (min-width: 768px) {
    .share-btn {
        padding: 10px 14px;
        font-size: 12px;
        border-radius: 8px;
        gap: 5px;
    }
}

@media (min-width: 1024px) {
    .share-btn {
        padding: 10px 16px;
        font-size: 13px;
        border-radius: 10px;
        gap: 6px;
    }
}

.share-btn:hover {
    transform: translateY(-1px);
}

@media (min-width: 768px) {
    .share-btn:hover {
        transform: translateY(-2px);
    }
}

.share-btn-facebook {
    background: linear-gradient(135deg, #1877f2 0%, #0a66c2 100%);
    box-shadow: 0 2px 8px rgba(24, 119, 242, 0.25);
}

.share-btn-facebook:hover {
    box-shadow: 0 4px 12px rgba(24, 119, 242, 0.35);
}

.share-btn-twitter {
    background: linear-gradient(135deg, #000000 0%, #1d1d1d 100%);
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.25);
}

.share-btn-twitter:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.35);
}

.share-btn-telegram {
    background: linear-gradient(135deg, #0088cc 0%, #0055aa 100%);
    box-shadow: 0 2px 8px rgba(0, 136, 204, 0.25);
}

.share-btn-telegram:hover {
    box-shadow: 0 4px 12px rgba(0, 136, 204, 0.35);
}

.share-btn-whatsapp {
    background: linear-gradient(135deg, #25d366 0%, #20ba58 100%);
    box-shadow: 0 2px 8px rgba(37, 211, 102, 0.25);
}

.share-btn-whatsapp:hover {
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.35);
}

.share-btn-reddit {
    background: linear-gradient(135deg, #ff4500 0%, #ff5722 100%);
    box-shadow: 0 2px 8px rgba(255, 69, 0, 0.25);
}

.share-btn-reddit:hover {
    box-shadow: 0 4px 12px rgba(255, 69, 0, 0.35);
}

.share-btn-copy {
    background: linear-gradient(135deg, #8b5cf6 0%, #a78bfa 100%);
    box-shadow: 0 2px 8px rgba(139, 92, 246, 0.25);
}

.share-btn-copy:hover {
    box-shadow: 0 4px 12px rgba(139, 92, 246, 0.35);
}

.share-icon {
    font-size: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

@media (min-width: 480px) {
    .share-icon {
        font-size: 13px;
    }
}

@media (min-width: 768px) {
    .share-icon {
        font-size: 14px;
    }
}

@media (min-width: 1024px) {
    .share-icon {
        font-size: 15px;
    }
}

/* Text hide on mobile */
@media (max-width: 479px) {
    .share-btn span:last-child {
        display: none;
    }
    
    .share-btn {
        padding: 8px;
        border-radius: 50%;
        width: 32px;
        height: 32px;
    }
}
</style>

<!-- Share Buttons HTML -->
<div class="share-section">
    <span class="share-label">📤 Share:</span>
    <div class="share-buttons">
        <!-- Facebook Share -->
        <a href="javascript:void(0);" 
           class="share-btn share-btn-facebook" 
           title="Share on Facebook"
           onclick="shareOnFacebook()">
            <span class="share-icon">f</span>
            <span>Facebook</span>
        </a>

        <!-- Twitter Share -->
        <a href="javascript:void(0);" 
           class="share-btn share-btn-twitter" 
           title="Share on Twitter"
           onclick="shareOnTwitter()">
            <span class="share-icon">𝕏</span>
            <span>Twitter</span>
        </a>

        <!-- Telegram Share -->
        <a href="javascript:void(0);" 
           class="share-btn share-btn-telegram" 
           title="Share on Telegram"
           onclick="shareOnTelegram()">
            <span class="share-icon">✈</span>
            <span>Telegram</span>
        </a>

        <!-- WhatsApp Share -->
        <a href="javascript:void(0);" 
           class="share-btn share-btn-whatsapp" 
           title="Share on WhatsApp"
           onclick="shareOnWhatsApp()">
            <span class="share-icon">💬</span>
            <span>WhatsApp</span>
        </a>

        <!-- Reddit Share -->
        <a href="javascript:void(0);" 
           class="share-btn share-btn-reddit" 
           title="Share on Reddit"
           onclick="shareOnReddit()">
            <span class="share-icon">🔥</span>
            <span>Reddit</span>
        </a>

        <!-- Copy Link -->
        <a href="javascript:void(0);" 
           class="share-btn share-btn-copy" 
           title="Copy Link"
           onclick="copyToClipboard()">
            <span class="share-icon">📋</span>
            <span>Copy</span>
        </a>
    </div>
</div>

<!-- Share Functions JavaScript -->
<script>
function getShareData() {
    return {
        title: document.querySelector('.single-title')?.textContent || document.title,
        url: window.location.href,
        description: document.querySelector('.content-description')?.textContent?.substring(0, 160) || document.querySelector('meta[name="description"]')?.getAttribute('content') || 'Check out this amazing content!'
    };
}

function shareOnFacebook() {
    const data = getShareData();
    const url = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(data.url)}`;
    window.open(url, 'facebook-share', 'width=600,height=400');
}

function shareOnTwitter() {
    const data = getShareData();
    const text = `${data.title} - ${data.url}`;
    const url = `https://twitter.com/intent/tweet?text=${encodeURIComponent(text)}`;
    window.open(url, 'twitter-share', 'width=600,height=400');
}

function shareOnTelegram() {
    const data = getShareData();
    const url = `https://t.me/share/url?url=${encodeURIComponent(data.url)}&text=${encodeURIComponent(data.title)}`;
    window.open(url, 'telegram-share', 'width=600,height=400');
}

function shareOnWhatsApp() {
    const data = getShareData();
    const text = `${data.title}\n\n${data.url}`;
    const url = `https://wa.me/?text=${encodeURIComponent(text)}`;
    window.open(url, 'whatsapp-share', 'width=600,height=400');
}

function shareOnReddit() {
    const data = getShareData();
    const url = `https://reddit.com/submit?url=${encodeURIComponent(data.url)}&title=${encodeURIComponent(data.title)}`;
    window.open(url, 'reddit-share', 'width=600,height=400');
}

function copyToClipboard() {
    const data = getShareData();
    const textToCopy = data.url;
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(textToCopy).then(() => {
            showNotification('✅ Link copied to clipboard!');
        }).catch(err => {
            console.error('Failed to copy:', err);
            fallbackCopy(textToCopy);
        });
    } else {
        fallbackCopy(textToCopy);
    }
}

function fallbackCopy(text) {
    const textarea = document.createElement('textarea');
    textarea.value = text;
    document.body.appendChild(textarea);
    textarea.select();
    document.execCommand('copy');
    document.body.removeChild(textarea);
    showNotification('✅ Link copied to clipboard!');
}

function showNotification(message) {
    const notification = document.createElement('div');
    notification.textContent = message;
    notification.style.cssText = `
        position: fixed;
        bottom: 20px;
        right: 20px;
        left: 20px;
        background: linear-gradient(135deg, #10b981 0%, #34d399 100%);
        color: white;
        padding: 12px 20px;
        border-radius: 8px;
        font-weight: 700;
        z-index: 10000;
        animation: slideInUp 0.3s ease;
        box-shadow: 0 6px 20px rgba(16, 185, 129, 0.3);
        text-align: center;
        font-size: 13px;
    `;
    
    document.body.appendChild(notification);
    
    setTimeout(() => {
        notification.style.animation = 'slideOutDown 0.3s ease';
        setTimeout(() => notification.remove(), 300);
    }, 3000);
}

// Animation styles
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInUp {
        from {
            transform: translateY(100px);
            opacity: 0;
        }
        to {
            transform: translateY(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOutDown {
        from {
            transform: translateY(0);
            opacity: 1;
        }
        to {
            transform: translateY(100px);
            opacity: 0;
        }
    }
`;
document.head.appendChild(style);
</script>
                
            </div>
            <?php 
$download_data = get_episode_downloads_data(get_the_ID());
if (!empty($download_data)): 
?>
    <style>
    .telegram-btn-wrapper {
        margin: 20px 0;
        text-align: center;
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .telegram-join-btn {
        background: linear-gradient(135deg, #00a7ff 0%, #007bff 100%);
        color: #fff;
        border: none;
        padding: 14px 32px;
        border-radius: 25px;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        box-shadow: 0 6px 20px rgba(0, 153, 255, 0.3);
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        white-space: nowrap;
    }

    .telegram-join-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 30px rgba(0, 153, 255, 0.5);
    }

    .telegram-icon {
        width: 18px;
        height: 18px;
        flex-shrink: 0;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .telegram-btn-wrapper {
            flex-direction: column;
            gap: 12px;
        }

        .telegram-join-btn {
            width: 100%;
            padding: 14px 25px;
            font-size: 14px;
            justify-content: center;
        }
    }

    @media (max-width: 480px) {
        .telegram-btn-wrapper {
            gap: 10px;
        }

        .telegram-join-btn {
            padding: 12px 20px;
            font-size: 13px;
            border-radius: 20px;
        }

        .telegram-join-btn:active {
            transform: translateY(-1px);
        }
    }
</style>

<!-- Telegram Join Button -->
<div class="telegram-btn-wrapper">
    <a href="https://t.me/YOUR_CHANNEL_NAME" 
       target="_blank" 
       rel="noopener noreferrer"
       class="telegram-join-btn">
        <svg class="telegram-icon" viewBox="0 0 240 240" style="fill: white;">
            <path d="M120 0c66 0 120 54 120 120s-54 120-120 120S0 186 0 120 54 0 120 0z"/>
            <path fill="#0088cc" d="M53 120l136-55c9-3 9 6 3 10L88 141l-8 43c-1 6 8 9 12 4L152 132"/>
        </svg>
        <span>Join Telegram</span>
    </a>
</div>

</div>
    
<?php endif; ?>
        </div>
    </div>

  <!-- Episode Section -->
    <?php 
    $post_id = get_the_ID();
    $episodes = get_post_meta($post_id, 'episodes', true);
    if(!empty($episodes) && is_array($episodes)): 
    ?>
    <div class="episode-section">
        <div class="episode-header">
            <h2><?php the_title(); ?> - All Episodes</h2>
            <p>Stream or Download All Episodes in Multiple Languages</p>
        </div>

        <div class="season-nav-container">
            <?php 
            $seasons = array();
            foreach($episodes as $episode) {
                $season = isset($episode['season']) ? $episode['season'] : '1';
                if(!isset($seasons[$season])) {
                    $seasons[$season] = array();
                }
                $seasons[$season][] = $episode;
            }
            
            $latest_season = max(array_keys($seasons)); // ✅ यह line add करें
            
            foreach($seasons as $season_num => $season_episodes):
            ?>
                <button class="season-btn" onclick="scrollToSeason(<?php echo $season_num; ?>)">
                    Season <?php echo $season_num; ?>
                </button>
            <?php endforeach; ?>
        </div>

        <button class="go-to-latest" onclick="scrollToSeason(<?php echo $latest_season; ?>)">
            Go to Latest Season
        </button>
        

        <p class="scroll-info">
            👆 Scroll Directly To Any Season By 1 Click/Tap
        </p>
    
<?php
     
        $global_index = 0; // ✅ यह line सबसे ऊपर add करें
        foreach($seasons as $season_num => $season_episodes): 
        ?>
            <div class="season-container" id="season-<?php echo $season_num; ?>">
                <div class="season-header">
                    <?php if(has_post_thumbnail()): ?>
                        <img src="<?php echo get_the_post_thumbnail_url($post_id, 'thumbnail'); ?>" 
                             alt="Season <?php echo $season_num; ?>">
                    <?php endif; ?>
                    <div class="season-info">
                        <h3>Season <?php echo $season_num; ?></h3>
                        <p><?php echo count($season_episodes); ?> Episodes</p>
                    </div>
                </div>

                <div class="episodes-grid">
                    <?php 
                    foreach($season_episodes as $index => $episode): 
                        $episode_num = isset($episode['episode_number']) ? $episode['episode_number'] : '';
                        $episode_title = isset($episode['title']) ? $episode['title'] : 'Episode ' . $episode_num;
                        $episode_description = isset($episode['description']) ? $episode['description'] : '';
                        $servers = isset($episode['servers']) ? array_filter($episode['servers']) : array();
                        $downloads = isset($episode['downloads']) ? array_filter($episode['downloads']) : array();
                    ?>
                        <div class="episode-item">
                            <?php if(has_post_thumbnail()): ?>
                                <img src="<?php echo get_the_post_thumbnail_url($post_id, 'thumbnail'); ?>" 
                                     alt="<?php echo esc_attr($episode_title); ?>" 
                                     class="episode-thumbnail">
                            <?php endif; ?>
                            
                            <div class="episode-info">
                                <h4>
                                    S<?php echo $season_num; ?>:E<?php echo $episode_num; ?> - <?php echo esc_html($episode_title); ?>
                                </h4>
                                <?php if(!empty($episode_description)): ?>
                                    <p class="episode-description">
                                        <?php echo esc_html($episode_description); ?>
                                    </p>
                                <?php endif; ?>
                                <small class="episode-meta">
                                    📺 <?php echo count($servers); ?> Servers | 📥 <?php echo count($downloads); ?> Downloads
                                </small>
                            </div>
                            
                            <button class="watch-btn" onclick="openPlayer(<?php echo $global_index; ?>, <?php echo $season_num; ?>)">
                                ▶ Watch
                            </button>
                        </div>
                        <?php $global_index++; // ✅ यह line add करें - endforeach से पहले ?>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php endif; ?>
    <?php
/* Season ZIP Downloads Display */
$post_id = get_the_ID();
$season_zips = get_season_zips($post_id);

if (!empty($season_zips)): ?>

<style>
    .download-section-wrapper {
        margin: 50px 0;
        width: 100%;
    }

    .download-section-title {
        font-size: 32px;
        font-weight: 800;
        background: linear-gradient(135deg, #ffdf00 0%, #ff8c00 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        margin-bottom: 10px;
        text-align: center;
        text-transform: uppercase;
        letter-spacing: 2px;
    }

    .download-subtitle {
        text-align: center;
        color: rgba(255, 255, 255, 0.7);
        font-size: 16px;
        margin-bottom: 30px;
    }

    .seasons-grid-download {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
        margin-bottom: 40px;
    }

    .season-download-card {
        background: linear-gradient(135deg, rgba(102, 126, 234, 0.15) 0%, rgba(118, 75, 162, 0.15) 100%);
        border: 2px solid rgba(102, 126, 234, 0.3);
        border-radius: 15px;
        padding: 25px;
        backdrop-filter: blur(10px);
        transition: all 0.3s ease;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    .season-download-card:hover {
        transform: translateY(-8px);
        border-color: rgba(102, 126, 234, 0.6);
        box-shadow: 0 15px 40px rgba(102, 126, 234, 0.3);
    }

    .season-download-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 15px;
        border-radius: 10px;
        margin-bottom: 20px;
        text-align: center;
    }

    .season-download-number {
        font-size: 28px;
        font-weight: 800;
        margin-bottom: 5px;
    }

    .season-download-name {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.9);
        font-weight: 500;
    }

    .quality-download-buttons {
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .quality-download-btn {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 14px 18px;
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.05) 100%);
        border: 2px solid rgba(255, 255, 255, 0.2);
        border-radius: 8px;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
        font-size: 14px;
        text-decoration: none;
    }

    .quality-download-btn:hover {
        transform: translateX(5px);
        border-color: rgba(255, 255, 255, 0.4);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.08) 100%);
    }

    .quality-download-label {
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
    }

    .quality-download-icon {
        font-size: 16px;
    }

    .arrow-download-icon {
        font-size: 18px;
        transition: transform 0.3s ease;
    }

    .quality-download-btn:hover .arrow-download-icon {
        transform: translateX(3px);
    }

    .no-zip-msg {
        text-align: center;
        padding: 20px;
        background: rgba(220, 38, 38, 0.1);
        border: 1px dashed rgba(220, 38, 38, 0.3);
        border-radius: 8px;
        color: rgba(255, 255, 255, 0.6);
        font-size: 14px;
    }
</style>

<div class="download-section-wrapper">
    <h2 class="download-section-title">📦 Download All Seasons</h2>
    <p class="download-subtitle">Download complete seasons in multiple quality options</p>
    
    <div class="seasons-grid-download">
        <?php foreach ($season_zips as $season): 
            $season_num = isset($season['season_num']) ? $season['season_num'] : '';
            $season_name = isset($season['season_name']) ? $season['season_name'] : '';
            $link_1080p = isset($season['1080p_link']) ? $season['1080p_link'] : '';
            $link_720p = isset($season['720p_link']) ? $season['720p_link'] : '';
            $link_480p = isset($season['480p_link']) ? $season['480p_link'] : '';
            
            $has_links = !empty($link_1080p) || !empty($link_720p) || !empty($link_480p);
        ?>

            <div class="season-download-card">
                <div class="season-download-header">
                    <div class="season-download-number">📦 Season <?php echo esc_html($season_num); ?></div>
                    <?php if (!empty($season_name)): ?>
                        <div class="season-download-name"><?php echo esc_html($season_name); ?></div>
                    <?php endif; ?>
                </div>

                <?php if ($has_links): ?>
                    <div class="quality-download-buttons">
                        <?php if (!empty($link_1080p)): ?>
                            <a href="<?php echo esc_url($link_1080p); ?>" target="_blank" rel="noopener noreferrer" class="quality-download-btn">
                                <span class="quality-download-label">
                                    <span class="quality-download-icon">🎬</span>
                                    1080p HEVC 10bit
                                </span>
                                <span class="arrow-download-icon">↗</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($link_720p)): ?>
                            <a href="<?php echo esc_url($link_720p); ?>" target="_blank" rel="noopener noreferrer" class="quality-download-btn">
                                <span class="quality-download-label">
                                    <span class="quality-download-icon">📺</span>
                                    720p HD
                                </span>
                                <span class="arrow-download-icon">↗</span>
                            </a>
                        <?php endif; ?>

                        <?php if (!empty($link_480p)): ?>
                            <a href="<?php echo esc_url($link_480p); ?>" target="_blank" rel="noopener noreferrer" class="quality-download-btn">
                                <span class="quality-download-label">
                                    <span class="quality-download-icon">📱</span>
                                    480p Mobile
                                </span>
                                <span class="arrow-download-icon">↗</span>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php else: ?>
                    <div class="no-zip-msg">
                        ⚠️ Links coming soon...
                    </div>
                <?php endif; ?>
            </div>

        <?php endforeach; ?>
    </div>
</div>

<?php endif; ?>

    <!-- Navigation Links -->
    <div class="post-navigation">
        <div class="nav-column">
            <?php previous_post_link('%link', '⬅ Previous Post', false); ?>
        </div>
        <div class="nav-column">
            <?php next_post_link('%link', 'Next Post ➜', false); ?>
        </div>
    </div>

    <?php endwhile; endif; ?>

    <!-- Related Anime -->
    <div class="related-section">
        <h2 class="related-title">
            Related Post
        </h2>
        <div class="related-grid">
            <?php
            $categories = wp_get_post_categories(get_the_ID());
            $related = new WP_Query([
                'category__in' => $categories,
                'posts_per_page' => 6,
                'post__not_in' => [get_the_ID()]
            ]);

            if($related->have_posts()):
                while($related->have_posts()): $related->the_post(); ?>
                    <div class="related-item">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                            <div class="related-title-text">
                                <?php the_title(); ?>
                            </div>
                        </a>
                    </div>
            <?php endwhile; endif; wp_reset_postdata(); ?>
        </div>
    </div>
</div>
<!-- Download Modal -->
<div id="downloadModal" style="display: none; 
    position: fixed; 
    top: 0; 
    left: 0; 
    width: 100%; 
    height: 100%; 
    background: rgba(0, 0, 0, 0.95); 
    z-index: 9999; 
    overflow-y: auto;
    backdrop-filter: blur(5px);">
    
    <div style="padding: 20px; padding-top: 40px;">
        <div id="downloadContent" style="max-width: 900px; margin: 0 auto;">
            <!-- Content loads here -->
        </div>
    </div>
</div>
<script>
// Global Variables
let allEpisodesData = [];
let currentEpisodeIndex = 0;
let currentSeasonNumber = 1;
let currentStream = 0;

// Load episodes data from backend
<?php 
$post_id = get_the_ID();
$episodes = get_anime_episodes($post_id);
echo "allEpisodesData = " . json_encode($episodes) . ";\n";
?>

// Open player and load episode data
function openPlayer(episodeIndex, seasonNum) {
    if (!allEpisodesData[episodeIndex]) {
        alert('Episode data not found!');
        return;
    }

    const episode = allEpisodesData[episodeIndex];
    currentEpisodeIndex = episodeIndex;
    currentSeasonNumber = seasonNum;
    currentStream = 0;

    // Update player title
    const title = `S${episode.season}:E${episode.episode_number} - ${episode.title}`;
    document.getElementById('playerEpisodeTitle').textContent = title;

    // Load streaming servers
    loadStreamingServers(episode);

    // Load download links
    loadDownloadLinks(episode);

    // Show player
    document.getElementById('videoPlayerSection').classList.add('active');

    // Update nav buttons
    updateNavButtons();

    // Scroll to player
    setTimeout(() => {
        document.getElementById('videoPlayerSection').scrollIntoView({ 
            behavior: 'smooth', 
            block: 'start' 
        });
    }, 100);
}

// Load streaming servers
function loadStreamingServers(episode) {
    const streamButtons = document.getElementById('streamButtons');
    streamButtons.innerHTML = '';

    const servers = episode.servers || [];
    const serverNames = [
        'Server 1', 'Server 2', 'Server 3', 'Server 4',
        'Server 5', 'Server 6', 'Server 7', 'Server 8'
    ];

    servers.forEach((server, index) => {
        if (server && server.trim() !== '') {
            const btn = document.createElement('button');
            btn.className = 'stream-btn' + (index === 0 ? ' active' : '');
            btn.textContent = serverNames[index] || `Server ${index + 1}`;
            btn.onclick = () => loadStream(server, index);
            streamButtons.appendChild(btn);
        }
    });

    // Load first server
    if (servers[0]) {
        loadStream(servers[0], 0);
    }
}

// Load download links
function loadDownloadLinks(episode) {
    const downloadGrid = document.getElementById('downloadGrid');
    downloadGrid.innerHTML = '';

    const downloads = episode.downloads || [];
    const downloadNames = [
        'Download 1', 'Download 2', 'Download 3', 'Download 4',
        'Download 5', 'Download 6', 'Download 7', 'Download 8'
    ];

    downloads.forEach((download, index) => {
        if (download && download.trim() !== '') {
            // ✅ BUTTON बनाएँ (link नहीं)
            const button = document.createElement('button');
            button.className = `download-link-btn server${index + 1}`;
            button.innerHTML = `<span>↗</span><span>${downloadNames[index]}</span>`;
            button.style.cursor = 'pointer';
            button.onclick = function() {
                window.open(download, '_blank');
            };
            downloadGrid.appendChild(button);
        }
    });
}

// Load stream in iframe
function loadStream(serverUrl, serverIndex) {
    const videoPlayer = document.getElementById('videoPlayer');
    const videoLoading = document.getElementById('videoLoading');
    
    // Update active button
    document.querySelectorAll('.stream-btn').forEach((btn, idx) => {
        if (idx === serverIndex) {
            btn.classList.add('active');
        } else {
            btn.classList.remove('active');
        }
    });

    videoLoading.style.display = 'block';
    videoPlayer.src = '';

    // Set iframe source
    setTimeout(() => {
        videoPlayer.src = serverUrl;
        videoLoading.style.display = 'none';
    }, 500);
}

// Close player
function closePlayer() {
    document.getElementById('videoPlayerSection').classList.remove('active');
    document.getElementById('videoPlayer').src = '';
}

// Update navigation buttons
function updateNavButtons() {
    const prevBtn = document.getElementById('playerPrevBtn');
    const nextBtn = document.getElementById('playerNextBtn');

    prevBtn.disabled = currentEpisodeIndex <= 0;
    nextBtn.disabled = currentEpisodeIndex >= allEpisodesData.length - 1;

    prevBtn.classList.toggle('disabled', currentEpisodeIndex <= 0);
    nextBtn.classList.toggle('disabled', currentEpisodeIndex >= allEpisodesData.length - 1);
}

// Navigate previous episode
function navigatePrev() {
    if (currentEpisodeIndex > 0) {
        openPlayer(currentEpisodeIndex - 1, currentSeasonNumber);
    }
}

// Navigate next episode
function navigateNext() {
    if (currentEpisodeIndex < allEpisodesData.length - 1) {
        openPlayer(currentEpisodeIndex + 1, currentSeasonNumber);
    }
}

// Change audio (reload stream)
function changeAudio() {
    const episode = allEpisodesData[currentEpisodeIndex];
    if (episode && episode.servers && episode.servers[currentStream]) {
        loadStream(episode.servers[currentStream], currentStream);
    }
}

// Scroll to season
function scrollToSeason(seasonNum) {
    const seasonElement = document.getElementById('season-' + seasonNum);
    if (seasonElement) {
        seasonElement.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Scroll to latest episode
function scrollToLatest() {
    const episodeSection = document.querySelector('.episode-section');
    if (episodeSection) {
        const lastSeason = episodeSection.querySelector('.season-container:last-child');
        if (lastSeason) {
            const lastEpisode = lastSeason.querySelector('div[style*="grid"]');
            if (lastEpisode) {
                lastEpisode.parentElement.lastElementChild.scrollIntoView({ 
                    behavior: 'smooth', 
                    block: 'center' 
                });
            }
        }
    }
}
// ===== DOWNLOAD MODAL FUNCTIONS =====
function openDownloadModal(postId) {
    const modal = document.getElementById('downloadModal');
    const content = document.getElementById('downloadContent');
    
    content.innerHTML = '<div style="text-align: center; padding: 40px; color: #fff;"><p>Loading...</p></div>';
    modal.style.display = 'block';
    
    window.scrollTo(0, 0);
    
    const formData = new FormData();
    formData.append('action', 'load_downloads_page');
    formData.append('post_id', postId);
    
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            content.innerHTML = data.data.content;
        } else {
            content.innerHTML = '<div style="text-align: center; padding: 40px; color: #ff6b6b;"><p>❌ Error loading downloads</p></div>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        content.innerHTML = '<div style="text-align: center; padding: 40px; color: #ff6b6b;"><p>❌ Error loading downloads</p></div>';
    });
}

function closeDownloadModal() {
    const modal = document.getElementById('downloadModal');
    modal.style.display = 'none';
}

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('downloadModal');
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeDownloadModal();
        }
    });
    
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeDownloadModal();
        }
    });
});
// Search functionality
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchBtn = document.getElementById('searchBtn');
    const searchResults = document.getElementById('searchResults');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        const query = this.value.trim();

        if (query.length < 2) {
            searchResults.classList.remove('active');
            return;
        }

        searchTimeout = setTimeout(() => performSearch(query), 300);
    });

    searchBtn.addEventListener('click', function() {
        const query = searchInput.value.trim();
        if (query.length > 0) {
            performSearch(query);
        }
    });

    searchInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            performSearch(this.value.trim());
        }
    });

    document.addEventListener('click', function(e) {
        if (!e.target.closest('.search-input-wrapper') && !e.target.closest('.search-results')) {
            searchResults.classList.remove('active');
        }
    });

    function performSearch(query) {
        const formData = new FormData();
        formData.append('action', 'search_posts');
        formData.append('query', query);

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                displayResults(data.data);
            } else {
                displayResults([]);
            }
        })
        .catch(error => {
            console.error('Search error:', error);
            displayResults([]);
        });
    }

    function displayResults(results) {
        searchResults.innerHTML = '';

        if (results.length === 0) {
            searchResults.innerHTML = '<div class="no-results">❌ No results found</div>';
            searchResults.classList.add('active');
            return;
        }

        results.forEach(result => {
            const resultItem = document.createElement('div');
            resultItem.className = 'search-result-item';
            resultItem.innerHTML = `
                <a href="${result.url}">
                    <strong>${result.title}</strong>
                    <small>${result.excerpt}</small>
                </a>
            `;
            searchResults.appendChild(resultItem);
        });

        searchResults.classList.add('active');
    }
});

function openDownloadModal(postId) {
    const modal = document.getElementById('downloadModal');
    const content = document.getElementById('downloadContent');
    
    content.innerHTML = '<div style="text-align: center; padding: 40px; color: #fff;"><p>Loading...</p></div>';
    modal.style.display = 'block';
    
    window.scrollTo(0, 0);
    
    const formData = new FormData();
    formData.append('action', 'load_downloads_page');
    formData.append('post_id', postId);
    
    fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            content.innerHTML = data.data.content;
        } else {
            content.innerHTML = '<div style="text-align: center; padding: 40px; color: #ff6b6b;"><p>❌ Error loading downloads</p></div>';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        content.innerHTML = '<div style="text-align: center; padding: 40px; color: #ff6b6b;"><p>❌ Error loading downloads</p></div>';
    });
}

function closeDownloadModal() {
    const modal = document.getElementById('downloadModal');
    modal.style.display = 'none';
}
</script>

<?php get_footer(); ?>