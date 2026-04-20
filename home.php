<?php include 'includes/header.php'; ?>

<style>
    .invitation-header { font-family: "Playfair Display", serif; font-size: 3rem; text-transform: uppercase; letter-spacing: 8px; text-align: center; margin-bottom: 10px; }
    .wedding-date-hero { font-family: "Playfair Display", serif; font-size: 2rem; text-align: center; margin-bottom: 40px; display: block; }
    .intro-text { font-size: 1.15rem; line-height: 1.8; text-align: justify; margin-bottom: 60px; font-weight: 300; }
    
    .wedding-details-container { display: grid; grid-template-columns: 140px 1px 1fr 60px; gap: 0; margin-bottom: 60px; }
    .vertical-line { background: rgba(0, 0, 0, 0.1); height: 100%; }
    .details-left { padding-right: 30px; text-align: right; }
    .details-right { padding-left: 30px; text-align: left; }
    .category-label { font-family: "Playfair Display", serif; font-size: 1.4rem; text-transform: uppercase; height: 120px; display: flex; align-items: center; justify-content: flex-end; }
    .info-block { height: 120px; display: flex; flex-direction: column; justify-content: center; }
    .info-block p { font-size: 1.1rem; margin: 0; line-height: 1.5; }
    
    .contact-link { text-decoration: none; color: inherit; transition: 0.3s; text-align: center; }
    .contact-link:hover { transform: scale(1.05); color: #8c7e6d; }
</style>

<div class="invitation-header">Zaproszenie</div>
<div class="wedding-date-hero">18 września 2026</div>

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
    <div class="map-col" style="display: flex; flex-direction: column;">
        <div style="height: 120px; display: flex; align-items: center; justify-content: center;">
            <a href="https://maps.google.com/?q=Parafia+Jana+Pawła+II+Nowy+Sącz" target="_blank"><img src="assets/pin.png" width="28"></a>
        </div>
        <div style="height: 120px; display: flex; align-items: center; justify-content: center;">
            <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola" target="_blank"><img src="assets/pin.png" width="28"></a>
        </div>
    </div>
</div>

<div style="text-align: center;">
    <p style="margin-bottom: 30px; opacity: 0.7;">Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026</p>
    <a href="rsvp.php" style="display: inline-block; padding: 16px 45px; border: 1px solid #1a1a1a; text-decoration: none; color: #1a1a1a; text-transform: uppercase; letter-spacing: 3px; font-size: 0.85rem; margin-bottom: 50px;">Potwierdzam obecność</a>

    <div style="display: flex; justify-content: center; gap: 50px;">
        <a href="tel:+48513999738" class="contact-link">
            <span style="display: block; font-size: 0.9rem; text-transform: uppercase; opacity: 0.6;">Natalia</span>
            <strong>513 999 738</strong>
        </a>
        <a href="tel:+48512899847" class="contact-link">
            <span style="display: block; font-size: 0.9rem; text-transform: uppercase; opacity: 0.6;">Łukasz</span>
            <strong>512 899 847</strong>
        </a>
    </div>
</div>

<?php include 'includes/footer.php'; ?>