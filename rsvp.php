<?php
include 'includes/header.php';
?>

<style>
/* STYLE TYLKO DLA STRONY RSVP - nie ruszają strony home */
#rsvp-container.section-card {
    max-width: 700px;
    margin: 40px auto;
    box-sizing: border-box;
}

/* Zapobieganie przybliżaniu ekranu na iPhone (czcionka 16px) */
#rsvp-container input[type="text"], 
#rsvp-container select {
    width: 100%;
    padding: 12px;
    font-size: 16px !important; 
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.1);
    box-sizing: border-box;
}

.person-block {
    margin-bottom: 35px;
    padding-bottom: 25px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.diet-options {
    display: flex;
    flex-direction: column;
    gap: 12px;
    margin-top: 12px;
}

.diet-item {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1rem;
}

.diet-item input[type="checkbox"] {
    width: 22px;
    height: 22px;
}

.add-person-btn {
    width: 100%;
    margin-top: 20px;
    background: rgba(255,255,255,0.2);
    padding: 15px;
    border-radius: 12px;
    border: 1px solid rgba(255,255,255,0.3);
    cursor: pointer;
    color: var(--text-main);
    font-weight: 500;
}

.submit-btn {
    width: 100%;
    margin-top: 30px;
    background: var(--accent);
    color: #000;
    padding: 16px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
}


/* --- RESPONSYWNOŚĆ DLA MOBILE --- */
@media (max-width: 600px) {
    #rsvp-container.section-card {
        margin: 10px; /* Delikatny odstęp od krawędzi telefonu */
        padding: 25px 15px;
        width: calc(100% - 20px); /* Prawie pełna szerokość */
    }

    h2 {
        font-size: 1.6rem !important;
        text-align: center;
    }

    .form-row label {
        display: block;
        margin-bottom: 8px;
        font-size: 0.95rem;
    }
}
</style>

<div class="section-card" id="rsvp-container">
    <h2>Potwierdzenie obecności</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="success-message">Dziękujemy za potwierdzenie obecności!</div>
    <?php endif; ?>

    <?php if (isset($_GET['duplikaty'])): ?>
        <div class="success-message" style="color:#ff8080;">
            Osoby, które już potwierdziły:<br>
            <strong><?= htmlspecialchars($_GET['duplikaty']) ?></strong>
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
                    <label>Czy potwierdzasz obecność?</label>
                    <select name="obecnosc[]" class="presence-select" required>
                        <option value="">-- Wybierz --</option>
                        <option value="tak">Tak</option>
                        <option value="nie">Nie</option>
                    </select>
                </div>

                <div class="diet-section" style="display:none; background: rgba(255,255,255,0.1); padding: 15px; border-radius: 10px; margin-top: 15px;">
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
                        <input type="text" name="dieta_other_text[0]" class="other-text" placeholder="Wpisz inne wymagania" style="display:none; margin-top: 5px;">
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <label>Piosenka, którą chcesz usłyszeć:</label>
                        <input type="text" name="piosenka[0]" placeholder="Tytuł i wykonawca">
                    </div>
                </div>
            </div>
        </div>

        <button type="button" id="add-person" class="add-person-btn">+ Dodaj osobę towarzyszącą</button>
        <button type="submit" class="submit-btn">Wyślij potwierdzenie</button>
    </form>
    <?php endif; ?>
</div>

<script>
/* Ten sam skrypt co wcześniej - działa poprawnie */
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
    const otherText = clone.querySelector(".other-text");
    if(otherText) otherText.style.display = "none";
    
    wrapper.appendChild(clone);
});
</script>

<?php include 'includes/footer.php'; ?>