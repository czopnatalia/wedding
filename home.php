<?php
include 'includes/header.php';
?>

<style>
/* PIERWOTNY UKŁAD (PC) */
.main-panel {
    width: 95%; max-width: 850px; margin: 60px auto; padding: 80px 50px;
    background: rgba(255, 255, 255, 0.4); backdrop-filter: blur(20px); border-radius: 20px;
}
.wedding-details-container { display: grid; grid-template-columns: 160px 1px 1fr 60px; margin-bottom: 60px; }
.details-left { text-align: right; padding-right: 40px; }
.details-right { text-align: left; padding-left: 40px; }
.vertical-line { background: rgba(74, 63, 53, 0.2); }

/* ZMIANY TYLKO NA TELEFONIE */
@media (max-width: 768px) {
    .main-panel { width: 100%; border-radius: 0; margin: 0; padding: 40px 20px; }
    .wedding-details-container { grid-template-columns: 1fr; text-align: center; }
    .details-left, .vertical-line { display: none; }
    .details-right { padding-left: 0; }
    .category-label { display: block; font-weight: bold; margin-top: 20px; }
    .invitation-header { font-size: 2rem; }
}
</style>



<div class="main-panel fade-in-up">
    
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
                <p>dnia 18 września 2026 o godzinie 13.00</p>
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
                <a href="https://maps.google.com/?q=Parafia+Jana+Pawła+II+Nowy+Sącz" target="_blank">
                    <img src="assets/pin.png" alt="mapa">
                </a>
            </div>
            <div class="map-btn-box">
                <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola" target="_blank">
                    <img src="assets/pin.png" alt="mapa">
                </a>
            </div>
        </div>

    </div>

    <div class="bottom-section">
        <p class="rsvp-text">
            Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026 w poniższym formularzu
        </p>

        <a href="rsvp.php" class="btn-rsvp">Potwierdzam obecność</a>

        <div class="contact-links">
            <a href="tel:+48513999738" class="contact-link">
                <span>Natalia</span>
                <strong>513 999 738</strong>
            </a>
            <a href="tel:+48512899847" class="contact-link">
                <span>Łukasz</span>
                <strong>512 899 847</strong>
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>