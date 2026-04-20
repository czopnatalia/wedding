<?php
include 'includes/header.php';
?>

<style>
/* GŁÓWNY PANEL - EFEKT SZKŁA */
.main-panel {
    width: 95%;
    max-width: 850px;
    margin: 60px auto;
    padding: 60px 40px;
    border-radius: var(--radius-lg);
    background: rgba(255, 255, 255, 0.45);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.3);
    box-shadow: var(--shadow-soft);
    color: var(--text-main);
}

/* TYPOGRAFIA NAGŁÓWKA */
.invitation-header {
    font-family: "Playfair Display", serif;
    font-size: 2.5rem;
    text-transform: uppercase;
    letter-spacing: 6px;
    text-align: center;
    margin-bottom: 50px;
    font-weight: 400;
}

/* UKŁAD LISTY Z LINIĄ */
.wedding-details-container {
    display: grid;
    /* Etykiety | Linia | Opis | Mapa */
    grid-template-columns: 140px 2px 1fr 60px; 
    gap: 0;
    position: relative;
}

/* PIONOWA LINIA */
.vertical-line {
    background: rgba(74, 63, 53, 0.3);
    height: 100%;
}

/* LEWA STRONA - ETYKIETY */
.details-left {
    padding-right: 40px;
    text-align: right;
    display: flex;
    flex-direction: column;
}

/* PRAWA STRONA - TREŚĆ */
.details-right {
    padding-left: 40px;
    text-align: left;
    display: flex;
    flex-direction: column;
}

/* BLOKI INFORMACYJNE */
.info-block {
    margin-bottom: 50px;
    min-height: 100px;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.category-label {
    font-family: "Playfair Display", serif;
    font-size: 1.6rem;
    color: var(--text-main);
    height: 100px; 
    margin-bottom: 50px;
    display: flex;
    align-items: center;
    justify-content: flex-end;
}

.info-block p {
    font-size: 1.1rem;
    line-height: 1.5;
    margin: 0;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.info-block span {
    display: block;
    font-size: 1rem;
    opacity: 0.8;
    margin-top: 8px;
    text-transform: none;
}

/* SEKACJA MAPY (PINEZKI) */
.map-col {
    display: flex;
    flex-direction: column;
}

.map-btn-box {
    height: 100px;
    margin-bottom: 50px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.mini-map-btn img {
    width: 32px;
    height: 32px;
    transition: transform 0.3s ease;
}

.mini-map-btn:hover img {
    transform: scale(1.2);
}

/* LINKI TELEFONICZNE I RSVP */
.contact-link {
    text-decoration: none;
    color: inherit;
    transition: 0.3s;
    display: block;
    margin-bottom: 8px;
    font-size: 0.95rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.contact-link strong {
    color: var(--accent);
}

.contact-link:hover {
    color: var(--accent);
}

.rsvp-link {
    text-decoration: none;
    color: var(--text-main);
    font-weight: 600;
    font-size: 0.85rem;
    letter-spacing: 1px;
    border-bottom: 1px solid var(--accent);
    padding-bottom: 2px;
    margin-top: 10px;
    display: inline-block;
}

/* RESPONSYWNOŚĆ */
@media (max-width: 768px) {
    .wedding-details-container {
        grid-template-columns: 1fr;
    }
    .vertical-line, .details-left, .map-col { display: none; }
    .details-right { padding-left: 0; text-align: center; }
    .invitation-header { font-size: 1.8rem; }
}
</style>

<div class="main-panel">
    <div class="invitation-header">Zaproszenie</div>

    <div class="wedding-details-container">
        
        <div class="details-left">
            <div class="category-label">Ślub</div>
            <div class="category-label">Wesele</div>
            <div class="category-label">Kontakt</div>
        </div>

        <div class="vertical-line"></div>

        <div class="details-right">
            
            <div class="info-block">
                <p>Ceremonia zaślubin odbędzie się<br>18 września 2026 o godzinie 13:30</p>
                <span>w Parafii św. Jana Pawła II w Nowym Sączu</span>
            </div>

            <div class="info-block">
                <p>Przyjęcie weselne odbędzie się w</p>
                <span>Restauracji Stacja Wola<br>Wola Kurowska 69</span>
            </div>

            <div class="info-block">
                <p>Prosimy o potwierdzenie obecności do dnia 15 sierpnia:</p>
                <a href="rsvp.php" class="rsvp-link">POTWIERDŹ OBECNOŚĆ →</a>
                <a href="tel:+48513999738" class="contact-link">
                    <strong>Natalia:</strong> 513 999 738
                </a>
                <a href="tel:+48512899847" class="contact-link">
                    <strong>Łukasz:</strong> 512 899 847
                </a>
                
            </div>

        </div>

        <div class="map-col">
            <div class="map-btn-box">
                <a href="https://maps.google.com/?q=Parafia+św.+Jana+Pawła+II+Nowy+Sącz" target="_blank" class="mini-map-btn">
                    <img src="assets/pin.png" alt="mapa">
                </a>
            </div>
            <div class="map-btn-box">
                <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola+Wola+Kurowska+69" target="_blank" class="mini-map-btn">
                    <img src="assets/pin.png" alt="mapa">
                </a>
            </div>
            <div class="map-btn-box"></div>
        </div>

    </div>
</div>

<?php include 'includes/footer.php'; ?>