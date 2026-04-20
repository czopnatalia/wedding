<?php
include 'includes/header.php';
?>

<style>
/* --- STYLE PODSTAWOWE (PC) --- */
#rsvp-container.section-card {
    max-width: 700px;
    margin: 40px auto;
    padding: 30px;
    box-sizing: border-box;
}

/* Blokada auto-zoomu: czcionka 16px jest kluczowa dla telefonów */
#rsvp-container input[type="text"], 
#rsvp-container select {
    width: 100%;
    padding: 12px;
    font-size: 16px !important; 
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.1);
    box-sizing: border-box;
    display: block;
}

.person-block {
    margin-bottom: 35px;
    padding-bottom: 25px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.form-row {
    margin-bottom: 15px;
}

.diet-section {
    background: rgba(255,255,255,0.1);
    padding: 20px;
    border-radius: 12px;
    margin-top: 15px;
}

.diet-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 10px;
}

.diet-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.diet-item input[type="checkbox"] {
    width: 22px;
    height: 22px;
}

.add-person-btn {
    width: 100%;
    margin-top: 10px;
    background: rgba(255,255,255,0.2);
    padding: 15px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.3);
    cursor: pointer;
    color: var(--text-main);
}

.submit-btn {
    width: 100%;
    margin-top: 25px;
    background: var(--accent);
    color: #000;
    padding: 16px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    text-transform: uppercase;
}

/* --- STYLE TYLKO NA TELEFON --- */
@media (max-width: 600px) {
    /* Usuwamy marginesy strony tylko dla tej podstrony */
    body {
        padding: 0 !important;
        margin: 0 !important;
    }

    #rsvp-container.section-card {
        margin: 0 !important;      /* Formularz od krawędzi do krawędzi */
        width: 100% !important;
        max-width: 100% !important;
        border-radius: 0 !important; /* Na pełnym ekranie brak zaokrągleń wygląda lepiej */
        padding: 30px 15px !important;
        min-height: 100vh;         /* Opcjonalnie: zajmuje całą wysokość */
    }

    .form-row label {
        font-size: 1.1rem;
        margin-bottom: 8px;
        display: block;
    }
}
</style>

<div class="section-card" id="rsvp-container">
    <h2>Potwierdzenie obecności</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="success-message" style="text-align:center; padding: 40px 0;">
            Dziękujemy za potwierdzenie obecności!
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['duplikaty'])): ?>
        <div class="success-message" style="text-align:center; color:#ff8080;">
            Osoby, które już potwierdziły:<br>
            <strong><?= htmlspecialchars($_GET['duplikaty'] ?? '') ?></strong>
        </div>
    <?php endif; ?>

    <?php if (!isset($_GET['success']) && !isset($_GET['duplikaty'])): ?>
    <form action="rsvp_submit.php" method="POST" id="rsvp-form">
        <div id="persons-wrapper">
            <div class="person-block">
                <div class="form-row">
                    <label>Imię:</label>
                    <input type="text" name="imie[]" required>
                </div>
                <div class="form-row">
                    <label>Nazwisko:</label>
                    <input type="text" name="nazwisko[]" required>
                </div>
                <div class="form-row">
                    <label>Czy potwierdzasz swoją obecność?</label>
                    <select name="obecnosc[]" class="presence-select" required>
                        <option value="">-- Wybierz --</option>
                        <option value="tak">Tak</option>
                        <option value="nie">Nie</option>
                    </select>
                </div>

                <div class="diet-section" style="display:none;">
                    <label>Wymagania co do diety:</label>
                    <div class="diet-options">
                        <label class="diet-item">
                            <input type="checkbox" name="dieta_gluten[0]" value="bezglutenowa">
                            <span>Bezglutenowa</span>
                        </label>
                        <label class="diet-item">
                            <input type="checkbox" name="dieta_vege[0]" value="wegetariańska">
                            <span>Wegetariańska</span>
                        </label>
                        <label class="diet-item">
                            <input type="checkbox" class="other-check">
                            <span>Inne:</span>
                        </label>
                        <input type="text" name="dieta_other_text[0]" class="other-text" placeholder="Wpisz wymagania" style="display:none;">
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <label>Tytuł piosenki:</label>
                        <input type="text" name="piosenka[0]" placeholder="Wykonawca i tytuł">
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-person" class="add-person-btn">+ Dodaj kolejną osobę</button>
        <button type="submit" class="submit-btn">Wyślij potwierdzenie</button>
    </form>
    <?php endif; ?>
</div>

<script>
document.addEventListener("change", function(e) {
    if (e.target.classList.contains("presence-select")) {
        const block = e.target.closest(".person-block");
        const diet = block.querySelector(".diet-section");
        diet.style.display = e.target.value === "tak" ? "block" : "none";
    }
    if (e.target.classList.contains("other-check")) {
        const text = e.target.closest(".person-block").querySelector(".other-text");
        text.style.display = e.target.checked ? "block" : "none";
    }
});

document.getElementById("add-person").addEventListener("click", () => {
    const wrapper = document.getElementById("persons-wrapper");
    const blocks = wrapper.querySelectorAll(".person-block");
    const nextIndex = blocks.length;
    const clone = blocks[0].cloneNode(true);

    clone.querySelectorAll("input, select").forEach(el => {
        if (el.type === "checkbox") el.checked = false;
        else el.value = "";
        if (el.name) el.name = el.name.replace(/\[\d+\]/, "[" + nextIndex + "]");
    });

    clone.querySelector(".diet-section").style.display = "none";
    const ot = clone.querySelector(".other-text");
    if(ot) ot.style.display = "none";
    wrapper.appendChild(clone);
});
</script>

<?php include 'includes/footer.php'; ?>