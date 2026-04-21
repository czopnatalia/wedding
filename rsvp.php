<?php
include 'includes/header.php';
?>

<style>
#rsvp-container.section-card {
    max-width: 700px;
    margin: 20px auto 60px;
    padding: 30px;
    box-sizing: border-box;
}

#rsvp-container input[type="text"], 
#rsvp-container select {
    width: 100%;
    padding: 14px;
    font-size: 16px !important; 
    border-radius: 10px;
    border: 1px solid rgba(0,0,0,0.1);
    box-sizing: border-box;
    margin-top: 5px;
    margin-bottom: 15px;
}

.person-block { margin-bottom: 35px; padding-bottom: 25px; border-bottom: 1px solid rgba(0,0,0,0.1); }

@media (max-width: 600px) {
    #rsvp-container.section-card {
        margin: 0;
        width: 100%;
        max-width: 100%;
        border-radius: 0;
        padding: 30px 15px;
    }
}
</style>

<div class="section-card" id="rsvp-container">
    <h2>Potwierdzenie obecności</h2>

    <?php if (isset($_GET['success'])): ?>
        <div style="text-align:center; padding:20px;">Dziękujemy za potwierdzenie obecności!</div>
    <?php endif; ?>

    <?php if (isset($_GET['duplikaty'])): ?>
        <div style="text-align:center; padding:20px; color:red;">
            Osoby, które już potwierdziły:<br>
            <strong><?= htmlspecialchars($_GET['duplikaty']) ?></strong>
        </div>
    <?php endif; ?>

    <?php if (!isset($_GET['success']) && !isset($_GET['duplikaty'])): ?>
    <form action="rsvp_submit.php" method="POST" id="rsvp-form">
        <div id="persons-wrapper">
            <div class="person-block">
                <div class="form-row"><label>Imię:</label><input type="text" name="imie[]" required></div>
                <div class="form-row"><label>Nazwisko:</label><input type="text" name="nazwisko[]" required></div>
                <div class="form-row">
                    <label>Czy potwierdzasz swoją obecność?</label>
                    <select name="obecnosc[]" class="presence-select" required>
                        <option value="">-- Wybierz --</option>
                        <option value="tak">Tak</option>
                        <option value="nie">Nie</option>
                    </select>
                </div>
                <div class="diet-section" style="display:none; background:rgba(0,0,0,0.02); padding:15px; border-radius:10px;">
                    <label>Wymagania co do diety:</label>
                    <div style="display:flex; flex-direction:column; gap:10px; margin-top:10px;">
                        <label><input type="checkbox" name="dieta_gluten[0]" value="bezglutenowa"> Bezglutenowa</label>
                        <label><input type="checkbox" name="dieta_vege[0]" value="wegetariańska"> Wegetariańska</label>
                        <label><input type="checkbox" class="other-check"> Inne:</label>
                        <input type="text" name="dieta_other_text[0]" class="other-text" placeholder="Wpisz inne wymagania" style="display:none;">
                    </div>
                    <div style="margin-top:20px;">
                        <label>Podaj tytuł piosenki, którą chcesz usłyszeć na weselu</label>
                        <input type="text" name="piosenka[0]" placeholder="Tytuł i wykonawca">
                    </div>
                </div>
            </div>
        </div>
        <button type="button" id="add-person" style="width:100%; padding:15px; margin-top:10px; cursor:pointer;">+ Potwierdź obecność osoby towarzyszącej lub innego członka rodziny</button>
        <button type="submit" style="width:100%; padding:15px; margin-top:20px; background:#d4af37; color:#fff; border:none; cursor:pointer; font-weight:bold; text-transform:uppercase;">Wyślij potwierdzenie</button>
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
    wrapper.appendChild(clone);
});
</script>
<?php include 'includes/footer.php'; ?>