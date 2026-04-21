<?php
include 'includes/header.php';
?>

<style>
/* PANEL GŁÓWNY - PC */
.main-panel {
    width: 95%;
    max-width: 850px;
    margin: 60px auto 100px;
    padding: 80px 50px;
    background: rgba(255, 255, 255, 0.4);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border-radius: 20px;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: var(--text-main);
    box-sizing: border-box;
}

/* TYPOGRAFIA NAGŁÓWKÓW */
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
    font-size: 2rem;
    text-align: center;
    margin-bottom: 40px;
    display: block;
    color: var(--text-main);
}

.intro-text {
    font-size: 1.2rem;
    line-height: 1.4;
    text-align: justify;
    max-width: 650px;
    margin: 0 auto 80px;
    letter-spacing: 0.3px;
    font-weight: 300;
    text-justify: inter-word;
}

/* UKŁAD SZCZEGÓŁÓW - PC */
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
    font-size: 1.4rem;
    text-transform: uppercase;
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
    font-size: 1.2rem;
    line-height: 1.4;
    margin: 0;
    letter-spacing: 0.3px;
    font-weight: 300;
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

.map-btn-box img:hover { transform: scale(1.2); }

.bottom-section {
    font-size: 1rem;
    line-height: 1.4;
    letter-spacing: 0.3px;
    font-weight: 300;
    text-align: center;
    border-top: 1px solid rgba(74, 63, 53, 0.1);
    padding-top: 60px;
}

.btn-rsvp {
    display: inline-block;
    padding: 16px 45px;
    border: 1px solid var(--text-main);
    color: var(--text-main);
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 0.85rem;
    transition: all 0.4s ease;
    margin-bottom: 50px;
}

.btn-rsvp:hover { background: var(--text-main); color: #fff !important; }

.contact-links { display: flex; justify-content: center; gap: 50px; }
.contact-link { text-decoration: none; color: inherit; text-align: center; display: inline-block; transition: transform 0.3s ease, color 0.3s ease; /* Płynne powiększenie i zmiana koloru */}
/* EFEKT PO NAJECHANIU (HOVER) */
.contact-link:hover {
    transform: scale(1.1); /* Delikatne powiększenie o 10% */
    color: var(--accent);  /* Opcjonalnie: zmiana koloru na Twój akcentowy */
}
/* Dodatkowo, żeby napisy pod numerem nie skakały */
.contact-link span {
    display: block;
    font-size: 1rem;
    text-transform: uppercase;
    opacity: 0.6;
    transition: opacity 0.3s ease;
}
.contact-link strong { font-size: 1.2rem; font-weight: 400; }
.contact-link:hover span {
    opacity: 1; /* Napis "Natalia/Łukasz" stanie się wyraźniejszy po najechaniu */
}

/* --- RESPONSYWNOŚĆ (TYLKO DLA TELEFONU) --- */
@media (max-width: 768px) {
    .main-panel {
        width: 100%;
        margin: 0;
        padding: 40px 15px;
        border-radius: 0;
    }
    
    .invitation-header { font-size: 1.8rem; letter-spacing: 1px;}
    .wedding-date-hero { font-size: 1.2rem; }

    /* Justowanie powitania */
    .intro-text { 
        font-size: 1rem; 
        line-height: 1.4;
        letter-spacing: 0.3px;
        font-weight: 300;
        text-align: justify; 
        text-justify: inter-word; 
        margin-bottom: 40px;
        padding: 0 5px;
    }

    .wedding-details-container {
        display: block; /* Zmiana na blokowy układ pionowy */
        margin-bottom: 40px;
    }

    .vertical-line, .details-left, .map-col { 
        display: none; 
    }

    .details-right { padding: 0; }

    /* Stylizacja sekcji ŚLUB i WESELE na mobile */
    .info-block {
        height: auto;
        margin-bottom: 60px;
        font-size: 1rem; 
        text-align: center;
    }

    .divider {
        width: 120px;
        margin: 30px auto;
    }

    

    /* Mniejsza czcionka szczegółów */
    .info-block p {
        font-size: 1rem; 
        margin-top: 5px;
        line-height: 1.4;
        letter-spacing: 0.3px;
        font-weight: 300;
    }

    /* Pinezka bezpośrednio pod tekstem */
    .mobile-map-link {
        display: block;
        margin-top: 15px;
    }
    .mobile-map-link img {
        width: 24px;
        height: 24px;
    }


    /* Mniejsza czcionka numerów telefonu */
    .contact-links {
        flex-direction: column;
        gap: 20px;
    }
    .contact-link span { font-size: 1rem; }
    .contact-link strong { font-size: 1rem; }
}

/* Ukrycie mobilnych pinezek na PC */
@media (min-width: 769px) {
    .mobile-map-link { display: none; }
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
            <div class="info-block" data-label="ŚLUB">
                <div class="divider"></div>
                <p>Ceremonia zaślubin odbędzie się</p>
                <p>dnia 18 września 2026 o godzinie 13.30</p>
                <p>w Parafii św. Jana Pawła II w Nowym Sączu.</p>
                <a href="https://maps.google.com/?q=Parafia+Jana+Pawła+II+Nowy+Sącz" target="_blank" class="mobile-map-link">
                    <img src="assets/pin.png" alt="mapa">
                </a>
            </div>

            <div class="info-block" data-label="WESELE">
                <div class="divider"></div>
                <p>Przyjęcie weselne odbędzie się</p>
                <p>w Restauracji Stacja Wola</p>
                <p>w miejscowości Wola Kurowska 69.</p>
                <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola" target="_blank" class="mobile-map-link">
                    <img src="assets/pin.png" alt="mapa">
                </a>
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

    <div class="bottom-section">
        <p class="rsvp-text">Prosimy o potwierdzenie obecności do dnia 8 sierpnia 2026 w poniższym formularzu</p>
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