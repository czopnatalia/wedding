<?php include 'includes/header.php'; ?>

<div class="section-card">
    <style>
        .inv-header { font-family: "Playfair Display", serif; font-size: 3.5rem; text-transform: uppercase; letter-spacing: 8px; text-align: center; margin-bottom: 10px; font-weight: 400; }
        .inv-date { font-family: "Playfair Display", serif; font-size: 2.2rem; text-align: center; margin-bottom: 40px; display: block; }
        .intro-text { font-size: 1.2rem; line-height: 1.8; text-align: justify; max-width: 650px; margin: 0 auto 80px; font-weight: 300; hyphens: none; word-break: keep-all; text-justify: inter-word; }
        
        .wedding-details-container { display: grid; grid-template-columns: 160px 1px 1fr 60px; gap: 0; margin-bottom: 80px; }
        .vertical-line { background: rgba(0, 0, 0, 0.1); height: 100%; }
        .details-left { padding-right: 40px; text-align: right; }
        .details-right { padding-left: 40px; text-align: left; }
        .category-label { font-family: "Playfair Display", serif; font-size: 1.6rem; text-transform: uppercase; height: 120px; display: flex; align-items: center; justify-content: flex-end; letter-spacing: 2px; }
        .info-block { height: 120px; display: flex; flex-direction: column; justify-content: center; }
        .info-block p { font-size: 1.15rem; line-height: 1.5; margin: 0; }
        .info-block span { font-size: 1rem; opacity: 0.7; margin-top: 5px; }

        .btn-rsvp { display: inline-block; padding: 16px 45px; border: 1px solid #000; color: #000; text-decoration: none; text-transform: uppercase; letter-spacing: 3px; font-size: 0.85rem; transition: all 0.4s ease; margin-bottom: 50px; }
        .btn-rsvp:hover { background: #000; color: #fff !important; }

        .contact-link { text-decoration: none; color: inherit; transition: all 0.3s ease; text-align: center; }
        .contact-link:hover { transform: scale(1.08); color: #000; opacity: 0.7; }
        
        @media (max-width: 768px) {
            .wedding-details-container { grid-template-columns: 1fr; }
            .vertical-line, .details-left { display: none; }
            .details-right { padding-left: 0; text-align: center; }
        }
    </style>

    <div class="inv-header">Zaproszenie</div>
    <div class="inv-date">18 września 2026</div>

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
                <span>w Parafii św. Jana Pawła II w Nowym Sączu.</span>
            </div>
            <div class="info-block">
                <p>Przyjęcie weselne odbędzie się</p>
                <p>w Restauracji Stacja Wola</p>
                <span>w miejscowości Wola Kurowska 69.</span>
            </div>
        </div>
        <div class="map-col" style="display: flex; flex-direction: column;">
            <div style="height: 120px; display: flex; align-items: center; justify-content: center;">
                <a href="https://maps.google.com/?q=Parafia+Jana+Pawła+II+Nowy+Sącz" target="_blank"><img src="assets/pin.png" width="28" style="filter: grayscale(1);"></a>
            </div>
            <div style="height: 120px; display: flex; align-items: center; justify-content: center;">
                <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola" target="_blank"><img src="assets/pin.png" width="28" style="filter: grayscale(1);"></a>
            </div>
        </div>
    </div>

    <div style="text-align: center;">
        <p style="margin-bottom: 30px; font-size: 1.1rem;">Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026 w poniższym formularzu</p>
        <a href="rsvp.php" class="btn-rsvp">Potwierdzam obecność</a>

        <div style="display: flex; justify-content: center; gap: 50px;">
            <a href="tel:+48513999738" class="contact-link">
                <span style="display: block; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; opacity: 0.5; margin-bottom: 5px;">Natalia</span>
                <strong style="font-size: 1.2rem; font-weight: 400;">513 999 738</strong>
            </a>
            <a href="tel:+48512899847" class="contact-link">
                <span style="display: block; font-size: 0.8rem; text-transform: uppercase; letter-spacing: 2px; opacity: 0.5; margin-bottom: 5px;">Łukasz</span>
                <strong style="font-size: 1.2rem; font-weight: 400;">512 899 847</strong>
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>