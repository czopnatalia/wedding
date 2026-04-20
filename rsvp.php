<?php
include 'includes/header.php';
?>

<style>
.person-block {
    margin-bottom: 35px;
    padding-bottom: 25px;
    border-bottom: 1px solid rgba(255,255,255,0.2);
}

.diet-options {
    display: flex;
    flex-direction: column;
    gap: 10px;
    margin-top: 12px;
}

.diet-item {
    display: flex;
    align-items: center;
    gap: 10px;
}

.diet-item input[type="checkbox"] {
    width: 18px;
    height: 18px;
}

.other-text {
    margin-top: -5px;
    padding: 8px;
    gap: 10px;
}

.add-person-btn {
    margin-top: 20px;
    background: rgba(255,255,255,0.2);
    padding: 10px 18px;
    border-radius: 10px;
    border: 1px solid rgba(255,255,255,0.3);
    cursor: pointer;
    color: var(--text-main);
    transition: 0.3s;
}

.add-person-btn:hover {
    background: rgba(255,255,255,0.35);
}

.submit-btn {
    margin-top: 30px;
    background: var(--accent);
    color: #000;
    padding: 12px 22px;
    border-radius: 12px;
    border: none;
    cursor: pointer;
    font-weight: 600;
    transition: 0.3s;
}

.submit-btn:hover {
    background: #ffe2b3;
}

.success-message {
    margin-top: 25px;
    font-size: 1.3rem;
    color: var(--accent);
    text-align: center;
}
</style>

<div class="section-card" id="rsvp-container">

    <h2>Potwierdzenie obecności</h2>

    <?php if (isset($_GET['success'])): ?>
        <div class="success-message" style="text-align:center; margin-top:40px;">
        Dziękujemy za potwierdzenie obecności!
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['exists'])): ?>
        <div class="success-message" style="color:#ff8080;">
            Ta osoba już potwierdziła swoją obecność!
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['duplikaty'])): ?>
        <div class="success-message" style="text-align:center; margin-top:40px; color:#ff8080;">
        Osoby, które już potwierdziły obecność:<br>
        <strong><?= htmlspecialchars($_GET['duplikaty']) ?></strong>
        </div>
    <?php endif; ?>

    <?php
    $success = isset($_GET['success']);
    $duplikaty = isset($_GET['duplikaty']);
    ?>

    <?php if (!$success && !$duplikaty): ?>

    <form action="rsvp_submit.php" method="POST" id="rsvp-form">

        <div id="persons-wrapper">

            <!-- OSOBA 1 -->
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

                <!-- DIETA – POKAZUJE SIĘ TYLKO JEŚLI "TAK" -->
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

                        <input type="text" name="dieta_other_text[0]" class="other-text" placeholder="Wpisz inne wymagania" style="display:none;">

                    </div>
                </div>
                    
                <div style="margin-top: 20px;">
                    <label style="margin-bottom: 8px;">Podaj tytuł piosenki, którą chcesz usłyszeć na weselu</label>
                    <input type="text" name="piosenka[0]" placeholder="Tytuł i wykonawca" style="width: 100%;">
                </div>
                
            </div>

        </div>

        <!-- DODAJ KOLEJNĄ OSOBĘ -->
        <button type="button" id="add-person" class="add-person-btn">+ Potwierdź obecność osoby towarzyszącej lub innego członka rodziny</button>

        <!-- WYŚLIJ -->
        <button type="submit" class="submit-btn">Wyślij potwierdzenie</button>

    </form>

    <?php endif; ?>

</div>

<script>
document.addEventListener("change", function(e) {

    // POKAZYWANIE DIETY
    if (e.target.classList.contains("presence-select")) {
        const block = e.target.closest(".person-block");
        const diet = block.querySelector(".diet-section");

        diet.style.display = e.target.value === "tak" ? "block" : "none";
    }

    // INNE – pokazuje pole tekstowe
    if (e.target.classList.contains("other-check")) {
        const text = e.target.closest(".person-block").querySelector(".other-text");
        text.style.display = e.target.checked ? "block" : "none";
    }
});

// DODAWANIE OSÓB
// DODAWANIE OSÓB
document.getElementById("add-person").addEventListener("click", () => {
    const wrapper = document.getElementById("persons-wrapper");
    const blocks = wrapper.querySelectorAll(".person-block");
    const nextIndex = blocks.length; // Liczymy ile osób już jest, by nadać nowy numer

    const first = blocks[0];
    const clone = first.cloneNode(true);

    // RESET WARTOŚCI I AKTUALIZACJA INDEKSÓW [ ]
    clone.querySelectorAll("input, select").forEach(el => {
        // Resetujemy wartości
        if (el.type === "checkbox") el.checked = false;
        else el.value = "";

        // KLUCZOWE: Zmieniamy [0] na [1], [2] itd. w atrybucie name
        if (el.name) {
            el.name = el.name.replace(/\[\d+\]/, "[" + nextIndex + "]");
        }
    });

    // Resetowanie widoczności sekcji diety
    clone.querySelector(".diet-section").style.display = "none";
    if (clone.querySelector(".other-text")) {
        clone.querySelector(".other-text").style.display = "none";
    }

    wrapper.appendChild(clone);
});
</script>

<?php include 'includes/footer.php'; ?>
