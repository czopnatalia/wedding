<?php include 'includes/header.php'; ?>

<style>
/* Resetujemy blokady szerokości z header.php */
body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    width: 100%;
}

/* To sprawia, że strona ignoruje ograniczenia "site-wrapper" ze starego CSS */
.split-wrapper {
    display: flex;
    min-height: 100vh;
    width: 100vw;
    position: absolute; /* Wyrywamy się z kontenerów header.php */
    top: 0;
    left: 0;
    z-index: 1;
}

.split-image {
    flex: 1;
    background-image: url('assets/image_141cec.jpg'); 
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

.split-content {
    flex: 1;
    background: #ffffff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 60px;
}

.content-inner {
    max-width: 650px; /* Twoja szerokość tekstu */
    width: 100%;
}

/* TWOJA TYPOGRAFIA (Dopasowana do nowych wymogów) */
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
    line-height: 1.8;
    text-align: justify;
    margin: 0 auto 80px;
    font-weight: 300;
    hyphens: none;
    word-break: keep-all;
    text-justify: inter-word;
}

/* TWOJE SZCZEGÓŁY Z LINIĄ */
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
    line-height: 1.5;
    margin: 0;
    letter-spacing: 0.5px;
}

/* KONTAKT I HOVER */
.contact-link {
    text-decoration: none;
    color: inherit;
    transition: all 0.3s ease;
}
.contact-link:hover {
    transform: scale(1.08);
    color: var(--accent);
}

@media (max-width: 900px) {
    .split-wrapper { flex-direction: column; position: relative; }
    .split-image { height: 40vh; flex: none; }
    .wedding-details-container { grid-template-columns: 1fr; }
    .vertical-line, .details-left { display: none; }
    .details-right { padding-left: 0; text-align: center; }
}
</style>

<div class="split-wrapper">
    <div class="split-image"></div>
    
    <div class="split-content">
        <div class="content-inner">
            
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
                <p style="margin-bottom: 30px;">Prosimy o potwierdzenie obecności do dnia 15 sierpnia 2026 w poniższym formularzu</p>
                <a href="rsvp.php" style="display: inline-block; padding: 16px 45px; border: 1px solid #000; text-decoration: none; color: #000; text-transform: uppercase; letter-spacing: 3px; font-size: 0.85rem; margin-bottom: 50px;">Potwierdzam obecność</a>

                <div style="display: flex; justify-content: center; gap: 50px;">
                    <a href="tel:+48513999738" class="contact-link">
                        <span style="display: block; font-size: 1rem; text-transform: uppercase; opacity: 0.6;">Natalia</span>
                        <strong>513 999 738</strong>
                    </a>
                    <a href="tel:+48512899847" class="contact-link">
                        <span style="display: block; font-size: 1rem; text-transform: uppercase; opacity: 0.6;">Łukasz</span>
                        <strong>512 899 847</strong>
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php 
// Ważne: zamykamy divy, które otworzył header.php, żeby nie psuły układu
echo "</div></div>"; 
include 'includes/footer.php'; 
?>