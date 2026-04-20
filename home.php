<?php
include 'includes/header.php';
?>

<style>
/* GŁÓWNY PANEL - MAKSYMALNY MINIMALIZM */
.main-panel {
    width: 95%;
    max-width: 800px;
    margin: 80px auto;
    padding: 80px 40px;
    background: rgba(255, 255, 255, 0.3); /* Bardzo delikatne szkło */
    backdrop-filter: blur(15px);
    -webkit-backdrop-filter: blur(15px);
    border-radius: var(--radius-lg);
    color: var(--text-main);
    text-align: center;
}

/* TYPOGRAFIA NAGŁÓWKÓW */
.invitation-label {
    font-family: "Playfair Display", serif;
    font-size: 0.9rem;
    letter-spacing: 5px;
    text-transform: uppercase;
    opacity: 0.7;
    margin-bottom: 20px;
    display: block;
}

.main-panel h2 {
    font-family: "Playfair Display", serif;
    font-size: clamp(2rem, 5vw, 3.2rem); /* Elastyczna wielkość czcionki */
    font-weight: 400;
    margin-bottom: 30px;
    line-height: 1.2;
}

.intro-text {
    font-size: 1.15rem;
    line-height: 1.8;
    max-width: 600px;
    margin: 0 auto 60px;
    font-weight: 300;
    letter-spacing: 0.5px;
}

/* SEKCJA SZCZEGÓŁÓW - UKŁAD Z LINIĄ POMIĘDZY */
.details-grid {
    display: grid;
    grid-template-columns: 1fr 1px 1fr;
    gap: 40px;
    margin: 60px 0;
    align-items: start;
}

.detail-box {
    padding: 20px 0;
}

.detail-box h3 {
    font-family: "Playfair Display", serif;
    font-size: 1.6rem;
    margin-bottom: 15px;
    font-weight: 400;
    letter-spacing: 1px;
}

.detail-box p {
    font-size: 1rem;
    line-height: 1.6;
    margin-bottom: 15px;
}

.line-divider {
    background: rgba(74, 63, 53, 0.2);
    height: 100%;
    width: 1px;
}

/* PINEZKA MAPY */
.map-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    text-decoration: none;
    color: var(--accent);
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    transition: 0.3s;
}

.map-link img {
    width: 20px;
    height: 20px;
    filter: brightness(0.8);
}

.map-link:hover {
    opacity: 0.7;
    transform: translateY(-2px);
}

/* RSVP I KONTAKT */
.rsvp-section {
    margin-top: 80px;
    padding-top: 60px;
    border-top: 1px solid rgba(74, 63, 53, 0.1);
}

.rsvp-text {
    font-size: 1.1rem;
    margin-bottom: 30px;
    font-style: italic;
}

.btn-minimal {
    display: inline-block;
    padding: 15px 40px;
    border: 1px solid var(--text-main);
    color: var(--text-main);
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 3px;
    font-size: 0.8rem;
    transition: all 0.4s ease;
    margin-bottom: 50px;
}

.btn-minimal:hover {
    background: var(--text-main);
    color: #fff !important;
}

.contact-info {
    display: flex;
    justify-content: center;
    gap: 40px;
}

.contact-item span {
    display: block;
    font-size: 0.8rem;
    text-transform: uppercase;
    letter-spacing: 2px;
    opacity: 0.6;
    margin-bottom: 5px;
}

.contact-item a {
    color: var(--text-main);
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 400;
}

/* MOBILE */
@media (max-width: 768px) {
    .details-grid {
        grid-template-columns: 1fr;
    }
    .line-divider {
        height: 1px;
        width: 50px;
        margin: 0 auto;
    }
    .main-panel {
        padding: 50px 20px;
    }
    .contact-info {
        flex-direction: column;
        gap: 25px;
    }
}
</style>

<div class="main-panel fade-in-up">
    <span class="invitation-label">Zaproszenie</span>
    
    <h2>18 września 2026</h2>
    
    <p class="intro-text">
        Serdecznie zapraszamy Was na uroczystość zawarcia związku małżeńskiego. 
        Będzie nam niezmiernie miło spędzić ten wyjątkowy dzień razem z Wami!
    </p>

    <div class="details-grid">
        <div class="detail-box">
            <h3>Ślub</h3>
            <p>
                Parafia św. Jana Pawła II<br>
                w Nowym Sączu<br>
                Godzina 13:30
            </p>
            <a href="https://maps.google.com/?q=Parafia+Jana+Pawła+II+Nowy+Sącz" target="_blank" class="map-link">
                <img src="assets/pin.png" alt="pin"> Zobacz na mapie
            </a>
        </div>

        <div class="line-divider"></div>

        <div class="detail-box">
            <h3>Wesele</h3>
            <p>
                Restauracja Stacja Wola<br>
                Wola Kurowska 69
            </p>
            <a href="https://maps.google.com/?q=Stacja+Wola+Wola+Kurowska" target="_blank" class="map-link">
                <img src="assets/pin.png" alt="pin"> Zobacz na mapie
            </a>
        </div>
    </div>

    <div class="rsvp-section">
        <p class="rsvp-text">
            Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026 roku
        </p>
        
        <a href="rsvp.php" class="btn-minimal">Potwierdzam obecność</a>

        <div class="contact-info">
            <div class="contact-item">
                <span>Natalia</span>
                <a href="tel:+48513999738">513 999 738</a>
            </div>
            <div class="contact-item">
                <span>Łukasz</span>
                <a href="tel:+48512899847">512 899 847</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>