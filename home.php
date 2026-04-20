<?php
include 'includes/header.php';
?>

<style>
/* KONTENER GŁÓWNY */
.main-panel {
    width: 100%;
    max-width: 900px; /* Nieco węższy dla lepszego skupienia wzroku */
    margin: 60px auto 100px;
    padding: 60px 40px;
    border-radius: var(--radius-lg);
    background: rgba(255, 255, 255, 0.45);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    border: 1px solid rgba(255, 255, 255, 0.4);
    box-shadow: var(--shadow-soft);
    text-align: center;
}

/* NAGŁÓWKI */
.wedding-date-hero {
    font-family: "Playfair Display", serif;
    font-size: 1.1rem;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: var(--accent);
    margin-bottom: 10px;
    display: block;
}

.main-panel h2 {
    font-family: "Playfair Display", serif;
    font-size: 2.8rem;
    margin-bottom: 40px;
    color: var(--text-main);
    font-weight: 400;
}

/* LINIA ROZDZIELAJĄCA Z ORNAMENTEM */
.divider {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 40px 0;
    color: var(--accent);
    opacity: 0.6;
}
.divider::before, .divider::after {
    content: "";
    height: 1px;
    width: 80px;
    background: currentColor;
    margin: 0 15px;
}

/* INFORMACJA RSVP - Bardziej prestiżowa */
.rsvp-card {
    background: rgba(255, 255, 255, 0.3);
    padding: 30px;
    border-radius: var(--radius-md);
    margin-bottom: 60px;
    border: 1px solid rgba(255, 255, 255, 0.2);
}
.rsvp-card p {
    font-size: 1.1rem;
    font-style: italic;
    margin-bottom: 20px;
}
.btn-rsvp {
    display: inline-block;
    padding: 12px 35px;
    background: var(--text-main);
    color: #fff !important;
    text-decoration: none;
    text-transform: uppercase;
    letter-spacing: 2px;
    font-size: 0.8rem;
    border-radius: 50px;
    transition: all 0.4s ease;
}
.btn-rsvp:hover {
    background: var(--accent);
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* SEKCJA SZCZEGÓŁÓW — ELEGANCKA LISTA */
.details-section h3 {
    font-family: "Playfair Display", serif;
    font-size: 2rem;
    color: var(--text-main);
    margin-bottom: 40px;
    font-weight: 400;
}

.detail-row {
    display: grid;
    grid-template-columns: 80px 1fr 80px;
    align-items: center;
    margin-bottom: 40px;
    text-align: left;
}

.detail-icon-box {
    width: 50px;
    height: 50px;
    background: #fff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--accent);
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.detail-info {
    padding: 0 20px;
}
.detail-info strong {
    display: block;
    font-family: "Playfair Display", serif;
    font-size: 1.4rem;
    color: var(--text-main);
    margin-bottom: 5px;
}
.detail-info span {
    font-size: 1rem;
    color: var(--text-main);
    opacity: 0.8;
}

.map-link {
    text-align: right;
}
.map-link img {
    width: 35px;
    filter: sepia(0.5) contrast(0.8); /* Nadaje pinezce elegancki, złoty odcień */
    transition: 0.3s;
}
.map-link img:hover {
    transform: scale(1.1);
    filter: sepia(0);
}

/* KONTAKT */
.contact-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 30px;
    margin-top: 50px;
}
.contact-card {
    padding: 20px;
    border-right: 1px solid rgba(0,0,0,0.05);
}
.contact-card:last-child { border-right: none; }

.contact-name {
    font-family: "Playfair Display", serif;
    font-size: 1.5rem;
    margin-bottom: 10px;
    color: var(--text-main);
}
.contact-phone {
    color: var(--accent);
    text-decoration: none;
    font-weight: 500;
    letter-spacing: 1px;
    font-size: 1.1rem;
}

/* RWD */
@media (max-width: 768px) {
    .detail-row {
        grid-template-columns: 1fr;
        text-align: center;
        gap: 15px;
    }
    .detail-icon-box { margin: 0 auto; }
    .map-link { text-align: center; }
    .contact-grid { grid-template-columns: 1fr; }
    .contact-card { border-right: none; border-bottom: 1px solid rgba(0,0,0,0.05); }
}
</style>

<div class="main-panel">
    <span class="wedding-date-hero">20 Czerwca 2026</span>
    <h2>Zaproszenie</h2>
    
    <div class="divider">✧</div>

    <div class="rsvp-card">
        <p>Będzie nam niezmiernie miło świętować ten dzień razem z Wami.</p>
        <a href="rsvp.php" class="btn-rsvp">Potwierdź obecność</a>
    </div>

    <div class="details-section">
        <h3>Harmonogram Uroczystości</h3>

        <div class="detail-row">
            <div class="detail-icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22l-8-5V7l8-5 8 5v10l-8 5z"></path><path d="M12 22V12"></path><path d="M12 12l8-5"></path><path d="M12 12L4 7"></path></svg>
            </div>
            <div class="detail-info">
                <strong>Ceremonia Zaślubin</strong>
                <span>Parafia św. Jana Pawła II w Nowym Sączu<br>Godzina 13:30</span>
            </div>
            <div class="map-link">
                <a href="https://maps.google.com/?q=Parafia+św.+Jana+Pawła+II+Nowy+Sącz" target="_blank">
                    <img src="assets/pin.png" alt="Mapa">
                </a>
            </div>
        </div>

        <div class="detail-row">
            <div class="detail-icon-box">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-8a2 2 0 0 0-2-2H6a2 2 0 0 0-2 2v8"></path><path d="M4 21h16"></path><path d="M7 11V7a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v4"></path><path d="M12 2v3"></path></svg>
            </div>
            <div class="detail-info">
                <strong>Przyjęcie Weselne</strong>
                <span>Restauracja Stacja Wola<br>Wola Kurowska 69</span>
            </div>
            <div class="map-link">
                <a href="https://maps.google.com/?q=Restauracja+Stacja+Wola" target="_blank">
                    <img src="assets/pin.png" alt="Mapa">
                </a>
            </div>
        </div>
    </div>

    <div class="divider">✧</div>

    <div class="contact-section">
        <h3>Kontakt</h3>
        <div class="contact-grid">
            <div class="contact-card">
                <div class="contact-name">Natalia</div>
                <a href="tel:+48513999738" class="contact-phone">513 999 738</a>
            </div>
            <div class="contact-card">
                <div class="contact-name">Łukasz</div>
                <a href="tel:+48512899847" class="contact-phone">512 899 847</a>
            </div>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>