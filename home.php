<?php
include 'includes/header.php';
?>

<style>
/* USUNIĘCIE DOMYŚLNYCH MARGINESÓW DLA EFEKTU FULL SCREEN */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
}

.split-container {
    display: flex;
    min-height: 100vh;
    width: 100%;
}

/* LEWA STRONA: ZDJĘCIE (ZACHOWUJEMY CIĄGŁOŚĆ Z INDEX.PHP) */
.split-image {
    flex: 1;
    background-image: url('assets/twoje-zdjecie.jpg'); 
    background-size: cover;
    background-position: center;
    background-attachment: fixed; /* Subtelny efekt paralaksy przy przewijaniu */
    border-right: 1px solid rgba(0,0,0,0.05);
}

/* PRAWA STRONA: TREŚĆ */
.split-content {
    flex: 1.2; /* Nieco szersza prawa strona dla wygody czytania */
    background: #ffffff;
    padding: 80px 60px;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.main-panel {
    width: 100%;
    max-width: 650px;
    color: #1a1a1a;
}

/* TYPOGRAFIA */
.invitation-header {
    font-family: "Playfair Display", serif;
    font-size: 3rem; 
    text-transform: uppercase;
    letter-spacing: 8px;
    text-align: center;
    margin-bottom: 10px;
    font-weight: 400;
}

.wedding-date-hero {
    font-family: "Playfair Display", serif;
    font-size: 1.8rem;
    text-align: center;
    margin-bottom: 40px;
    display: block;
    letter-spacing: 2px;
}

.intro-text {
    font-size: 1.1rem;
    line-height: 1.8;
    text-align: justify;
    margin-bottom: 60px;
    font-weight: 300;
    text-justify: inter-word;
}

/* SZCZEGÓŁY Z LINIĄ */
.wedding-details-container {
    display: grid;
    grid-template-columns: 120px 1px 1fr 50px;
    gap: 0;
    margin-bottom: 60px;
}

.vertical-line {
    background: rgba(0, 0, 0, 0.1);
    height: 100%;
}

.details-left {
    padding-right: 30px;
    text-align: right;
    display: flex;
    flex-direction: column;
}

.details-right {
    padding-left: 30px;
    text-align: left;
    display: flex;
    flex-direction: column;
}

.category-label {
    font-family: "Playfair Display", serif;
    font-size: 1.2rem;
    text-transform: uppercase;
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
    letter-spacing: 2px;
}

.info-block {
    height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.info-block p {
    font-size: 1rem;
    line-height: 1.5;
    margin: 0;
    letter-spacing: 0.5px;
}

/* PINEZKI */
.map-col {
    display: flex;
    flex-direction: column;
}

.map-btn-box {
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.map-btn-box img {
    width: 24px;
    height: 24px;
    transition: transform 0.3s ease;
    opacity: 0.7;
}

.map-btn-box img:hover {
    transform: scale(1.2);
    opacity: 1;
}

/* DOLNA SEKCJA */
.bottom-section {
    text-align: center;
    border-top: 1px solid rgba(0, 0, 0, 0.05);
    padding-top: 40px;
}

.rsvp-text {
    font-size: 0.95rem;
    margin-bottom: 25px;
    letter-spacing: 1px;
}

.btn-rsvp {
    display: inline-block;
    padding: 14px 40px;
    border: 1px solid #1a1a1a;
    color: #1a1a1a;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 0.8rem;
    transition: 0.4s;
    margin-bottom: 40px;
}

.btn-rsvp:hover {
    background: #1a1a1a;
    color: #fff !important;
}

/* KONTAKT */
.contact-links {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.contact-link {
    text-decoration: none;
    color: inherit;
    transition: 0.3s;
}

.contact-link span {
    display: block;
    font-size: 0.75rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 5px;
    opacity: 0.5;
}

.contact-link strong {
    font-size: 1.1rem;
    font-weight: 400;
}

.contact-link:hover {
    transform: translateY(-3px);
    color: #8c7e6d;
}

/* RESPONSYWNOŚĆ */
@media (max-width: 900px) {
    .split-container { flex-direction: column; }
    .split-image { height: 40vh; border-right: none; border-bottom: 1px solid rgba(0,0,0,0.05); }
    .split-content { padding: 40px 20px; }
    .wedding-details-container { grid-template-columns: 1fr; }
    .vertical-line, .details-left { display: none; }
    .details-right { padding-left: 0; text-align: center; }
    .map-col { flex-direction: row; justify-content: center; gap: 20px; margin-top: 10px; }
    .map-btn-box { height: auto; }
}
</style>

<div class="split-container">
    <div class="split-image"></div>

    <div class="split-content">
        <div class="main-panel fade-in-up">
            
            <div class="invitation-header">Zaproszenie</div>
            <div class="wedding-date-hero">18 września 2026</div>

            <p class="intro-text">
                Serdecznie zapraszamy Was na uroczystość zawarcia związku małżeńskiego. 
                Będzie nam niezmiernie miło spędzić ten wyjątkowy dzień razem z Wami!
            </p>

            <div class="wedding-details-container">
                
                <div class="details-left">
                    <div class="category-label">Ślub</div>
                    <div class="category-label">Wesele</div>
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
                        <a href="https://maps.google.com/?q=Stacja+Wola+Wola+Kurowska" target="_blank">
                            <img src="assets/pin.png" alt="mapa">
                        </a>
                    </div>
                </div>

            </div>

            <div class="bottom-section">
                <p class="rsvp-text">
                    Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026 r.
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
    </div>
</div>

<?php include 'includes/footer.php'; ?>