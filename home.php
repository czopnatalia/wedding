<?php
include 'includes/header.php';
?>

<style>
.main-panel {
    width: 95%;
    max-width: 850px;
    margin: 40px auto;
    padding: 60px 40px;
    background: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: var(--text-main);
    box-sizing: border-box;
}

.invitation-header {
    font-family: "Playfair Display", serif;
    font-size: 3rem; 
    text-transform: uppercase;
    letter-spacing: 8px;
    text-align: center;
    margin-bottom: 10px;
}

.wedding-date-hero {
    font-family: "Playfair Display", serif;
    font-size: 2rem;
    text-align: center;
    margin-bottom: 40px;
    display: block;
}

.intro-text {
    font-size: 1.1rem;
    line-height: 1.6;
    text-align: justify;
    max-width: 650px;
    margin: 0 auto 60px;
}

.wedding-details-container {
    display: grid;
    grid-template-columns: 160px 1px 1fr 60px;
    margin-bottom: 60px;
}

.vertical-line { background: rgba(74, 63, 53, 0.2); height: 100%; }
.details-left { padding-right: 40px; text-align: right; }
.details-right { padding-left: 40px; text-align: left; }

.category-label { font-family: "Playfair Display", serif; font-size: 1.4rem; text-transform: uppercase; height: 100px; display: flex; align-items: center; justify-content: flex-end; }
.info-block { height: 100px; display: flex; flex-direction: column; justify-content: center; }
.map-btn-box { height: 100px; display: flex; align-items: center; justify-content: center; }
.map-btn-box img { width: 26px; height: 26px; }

.contact-links { display: flex; justify-content: center; gap: 40px; }
.contact-link { text-decoration: none; color: inherit; text-align: center; }
.contact-link span { display: block; font-size: 0.9rem; text-transform: uppercase; opacity: 0.6; }

@media (max-width: 768px) {
    .main-panel { padding: 40px 20px; }
    .invitation-header { font-size: 2.2rem; }
    .wedding-details-container { grid-template-columns: 1fr; text-align: center; }
    .vertical-line, .details-left { display: none; }
    .details-right { padding-left: 0; text-align: center; }
    .info-block { height: auto; margin-bottom: 20px; }
    .map-col { display: flex; justify-content: center; gap: 20px; margin-top: 10px; }
    .map-btn-box { height: auto; }
    .intro-text { text-align: center; }
    .contact-links { flex-direction: column; gap: 20px; }
}
</style>

<div class="main-panel">
    <div class="invitation-header">Zaproszenie</div>
    <div class="wedding-date-hero">18 WRZEŚNIA 2026</div>

    <p class="intro-text">
        Serdecznie zapraszamy Was na uroczystość zawarcia związku małżeńskiego. 
        Będzie nam niezmiernie miło spędzić ten wyjątkowy dzień razem z Wami!
    </p>

    <div class="wedding-details-container">
        <div class="details-left">
            <div class="category-label">ŚLUB</div>
            <div class="category-label">WESELE</div>
        </div>
        <div class="vertical-line"></div>
        <div class="details-right">
            <div class="info-block">
                <p>Ceremonia zaślubin odbędzie się</p>
                <p>dnia 18 września 2026 o godzinie 13.30</p>
                <p>w Parafii św. Jana Pawła II w Nowym Sączu.</p>
            </div>
            <div class="info-block">
                <p>Przyjęcie weselne odbędzie się</p>
                <p>w Restauracji Stacja Wola</p>
                <p>w miejscowości Wola Kurowska 69.</p>
            </div>
        </div>
        <div class="map-col">
            <div class="map-btn-box">
                <a href="https://maps.google.com/?q=Parafia+Jana+Pawła+II+Nowy+Sącz" target="_blank"><img src="assets/pin.png" alt="mapa"></a>
            </div>
            <div class="map-btn-box">
                <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola" target="_blank"><img src="assets/pin.png" alt="mapa"></a>
            </div>
        </div>
    </div>

    <div class="bottom-section" style="text-align:center;">
        <p style="margin-bottom:20px;">Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026 w poniższym formularzu</p>
        <a href="rsvp.php" class="btn-rsvp" style="display:inline-block; padding: 15px 30px; border:1px solid #333; text-decoration:none; color:#333; text-transform:uppercase; margin-bottom:40px;">Potwierdzam obecność</a>
        <div class="contact-links">
            <a href="tel:+48513999738" class="contact-link"><span>Natalia</span><strong>513 999 738</strong></a>
            <a href="tel:+48512899847" class="contact-link"><span>Łukasz</span><strong>512 899 847</strong></a>
        </div>
    </div>
</div>
<?php include 'includes/footer.php'; ?>