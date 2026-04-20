<?php
include 'includes/header.php';
?>

<style>
/* PANEL GŁÓWNY */
.main-panel {
    width: 95%;
    max-width: 850px;
    margin: 60px auto 100px;
    padding: 80px 50px;
    background: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: var(--radius-lg);
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: var(--text-main);
}

/* TYPOGRAFIA NAGŁÓWKÓW */
.invitation-header {
    font-family: "Playfair Display", serif;
    font-size: 3.5rem; 
    text-transform: uppercase;
    letter-spacing: 8px;
    text-align: center;
    margin-bottom: 10px;
    font-weight: 400;
}

.wedding-date-hero {
    font-family: "Playfair Display", serif;
    font-size: 2.2rem;
    text-align: center;
    margin-bottom: 40px;
    display: block;
    color: var(--text-main);
}

.intro-text {
    font-size: 1.2rem;
    line-height: 1.8;
    text-align: justify; /* Wyjustowanie tekstu */
    max-width: 650px;
    margin: 0 auto 80px;
    font-weight: 300;
    hyphens: none;               /* Całkowicie wyłącza dzielenie wyrazów */
    word-break: keep-all;        /* Zapobiega łamaniu wyrazów w połowie */
    text-justify: inter-word;    /* Sprawia, że odstępy są regulowane tylko między słowami, a nie literami */
}

/* UKŁAD SZCZEGÓŁÓW */
.wedding-details-container {
    display: grid;
    grid-template-columns: 160px 1px 1fr 60px;
    gap: 0;
    margin-bottom: 80px;
}

.vertical-line {
    background: rgba(74, 63, 53, 0.2);
    height: 100%;
}

.details-left {
    padding-right: 40px;
    text-align: right;
    display: flex;
    flex-direction: column;
}

.details-right {
    padding-left: 40px;
    text-align: left;
    display: flex;
    flex-direction: column;
}

.category-label {
    font-family: "Playfair Display", serif;
    font-size: 1.8rem;
    text-transform: uppercase; /* Drukowane litery dla etykiet ŚLUB / WESELE */
    height: 120px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.info-block {
    height: 120px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.info-block p {
    font-size: 1.1rem;
    line-height: 1.5;
    /* Usunięte uppercase - teraz tekst jest normalny */
    margin: 0;
    letter-spacing: 0.5px;
}

.info-block span {
    display: block;
    font-size: 1.05rem;
    margin-top: 5px;
    opacity: 0.8;
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
    width: 28px;
    height: 28px;
    transition: transform 0.3s ease;
}

.map-btn-box img:hover {
    transform: scale(1.2);
}

/* DOLNA SEKCJA */
.bottom-section {
    text-align: center;
    border-top: 1px solid rgba(74, 63, 53, 0.1);
    padding-top: 60px;
}

.rsvp-text {
    font-size: 1.15rem;
    margin-bottom: 30px;
}

.btn-rsvp {
    display: inline-block;
    padding: 16px 45px;
    border: 1px solid var(--text-main);
    color: var(--text-main);
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 0.85rem;
    transition: all 0.4s ease;
    margin-bottom: 50px;
}

.btn-rsvp:hover {
    background: var(--text-main);
    color: #fff !important;
}

/* KONTAKT Z EFEKTEM HOVER */
.contact-links {
    display: flex;
    justify-content: center;
    gap: 50px;
}

.contact-link {
    text-decoration: none;
    color: inherit;
    text-align: center;
    transition: all 0.3s ease; /* Płynne przejście dla efektu hover */
}

.contact-link span {
    display: block;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 5px;
    opacity: 0.6;
    transition: color 0.3s ease;
}

.contact-link strong {
    font-size: 1.2rem;
    font-weight: 400;
}

/* EFEKT HOVER DLA NUMERÓW TELEFONÓW */
.contact-link:hover {
    transform: scale(1.08); /* Delikatne powiększenie */
    color: var(--accent); /* Zmiana koloru na akcentowy */
}

.contact-link:hover span {
    color: var(--accent);
    opacity: 1;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .wedding-details-container {
        grid-template-columns: 1fr;
    }
    .vertical-line, .details-left { display: none; }
    .details-right { padding-left: 0; text-align: center; }
    .invitation-header { font-size: 2.5rem; }
    .wedding-date-hero { font-size: 1.8rem; }
    .map-col { flex-direction: row; justify-content: center; gap: 30px; margin-top: 20px; }
    .map-btn-box { height: auto; }
    .intro-text { text-align: center; } /* Na mobile lepiej wygląda wyśrodkowane */
}
</style>

<div class="main-panel fade-in-up">
    
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
                <p>Dnia 18 września 2026 o godzinie 13.00</p>
                <p>w Parafi św. Jana Pawła II w Nowym Sączu.</p>
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