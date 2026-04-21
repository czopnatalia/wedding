<?php
session_start();
$correct_password = "kury";
$error = "";
$auto_pass = isset($_GET['pass']) ? htmlspecialchars($_GET['pass']) : "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['password'] === $correct_password) {
        $_SESSION['access'] = true;
        header("Location: home.php");
        exit;
    } else {
        $error = "Nieprawidłowe hasło.";
    }
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Natalia i Łukasz</title>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Inter:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="icon" type="image/jpeg" href="/wedding/favicon.jpg">
    <style>
        :root {
            --accent: #8c7e6d;
            --text: #4a3f35;
        }

        body, html {
            margin: 0; padding: 0; height: 100%;
            width: 100%;
            font-family: "Inter", sans-serif;
            overflow: hidden;
        }

        .split-container {
            display: flex;
            height: 100vh;
            width: 100%;
            overflow-x: hidden;
        }

        /* LEWA STRONA: ZDJĘCIE OSTRE */
        .split-image {
            flex: 1;
            background-image: url('assets/hero.jpg'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* PRAWA STRONA: EFEKT SZRONIONEGO SZKŁA */
        .split-content {
            flex: 1;
            /* Ustawiamy to samo tło co po lewej, aby blur miał co rozmywać */
            background-image: url('assets/chmury.webp');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
        }

        /* WARSTWA "SZKŁA" - To tutaj dzieje się magia Twojego CSS */
        .split-content::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            
            /* Twoja zmiana: biały z alpha 0.3 */
            background: rgba(255, 255, 255, 0.2); 
            
            /* Twoje rozmycie 10px (możesz zwiększyć do 20px dla bardziej "chmurowego" efektu) */
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            
            z-index: 0;
        }

        /* TREŚĆ NAD SZKŁEM */
        .panel {
            max-width: 450px;
            width: 100%;
            text-align: center;
            color: var(--text) !important;
            position: relative;
            z-index: 1; /* Musi być wyżej niż ::before */
        }

        /* Stylizacja nagłówka wewnątrz panelu, aby pasowała do reszty */
        h1 {
            font-family: "Playfair Display", serif;
            font-size: clamp(2.2rem, 4vw, 3rem);
            font-weight: 400;
            letter-spacing: 0.1em;
            margin: 0 0 10px;
            text-transform: uppercase;
            color: var(--text);
        }

        .date-main {
            font-size: 1.1rem;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            margin-bottom: 30px;
            font-weight: 300;
            color: var(--text);
        }

        .divider {
            width: 100px;
            height: 1px;
            margin: 50px auto;
            opacity: 0.2;
            background: var(--text);
        }

        /* Styl dla pól licznika */
        .countdown {
            display: flex;
            justify-content: center;
            gap: 35px;
            margin-bottom: 50px;
        }

        .countdown-label {
            margin-bottom: 25px;
        }

        .time-val { font-size: 1.8rem; font-weight: 300; display: block; color: var(--text);}
        .time-label { font-size: 0.65rem; text-transform: uppercase; opacity: 0.5; color: var(--text);}

        /* Styl pola hasła - bardziej subtelny */
        input[type="password"] {
            width: 100%;
            max-width: 300px;
            padding: 12px 0;
            background: transparent;
            border: none;
            color: var(--text);
            border-bottom: 1px solid rgba(74, 63, 53, 0.3);
            font-size: 1rem;
            margin-bottom: 30px;
            outline: none;
            text-align: center;
        }

        button {
            border: 1.2px solid var(--text);
            color: var(--text);
            padding: 14px 40px;
            font-size: 0.95rem;
            text-transform: uppercase;
            letter-spacing: 2.5px;
            cursor: pointer;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
            background: transparent;
        }

        button:hover {
            background: var(--text);
            color: #fff;
        }

        .btn-rsvp:hover {
            background: var(--text-main);
            color: #fff !important;
        }

        @media (max-width: 850px) {
            body, html { overflow: hidden; height: 100vh;}
            .split-content { 
                display: flex;
                flex-direction: column; /* Układamy elementy w pionie */
                align-items: center;    /* TO PRZYWRACA ŚRODEK W POZIOMIE */
                justify-content: flex-start; /* TO PRZYKLEJA TREŚĆ DO GÓRY (pod zdjęcie) */
                padding-top: 5px;         /* Usuwamy odstęp od zdjęcia */
                width: 100%;
                flex: 1;
            }
            .split-image { 
                flex: 0 0 50vh; /* Zdjęcie zajmuje dokładnie połowę wysokości (50%) */
                width: 100%;
                min-height: 50vh;
            }
            
            .divider {
                width: 140px;
                margin: 30px auto;
            }
            .panel {
                width: 100%;
                max-width: 100%;
                margin-top: 0;
                text-align: center;
                padding-top: 5px; /* Minimalny odstęp od zdjęcia dla estetyki */
                padding: 0 10px;
                display: flex;
                flex-direction: column;
                justify-content: center;
                height: auto;
            }
            h1 { 
                font-size: 1.8rem; 
                margin: 5px 0; 
                margin-top: 0; 
                width: 100%;}
            .date-main { margin-bottom: 5px; font-size: 0.9rem; }
            .countdown { 
                gap: 20px; 
                margin-bottom: 20px; /* Mniejsze odstępy w liczniku na komórki */
            }
            .countdown-label {
                margin-bottom: 5px;
                font-size: 0.85rem;
            }
            input[type="password"] {
                max-width: 140px; 
                margin-bottom: 20px;
                padding: 8px 0;
                font-size: 0.9rem;
            }
            .time-val { font-size: 1.4rem; }
            .form-container, .form-container form {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
            
            button {
                padding: 10px 30px;
                font-size: 0.85rem;
            }

            .error { font-size: 0.8rem; margin: 5px 0; }
        }
    </style>
</head>
<body>

<div class="split-container">
    <div class="split-image"></div>
    
    <div class="split-content">
        <div class="panel">
            <h1>Natalia i Łukasz</h1>
            <div class="date-main">18 września 2026</div>

            <div class="divider"></div>

            <div class="countdown-label">Do uroczystości pozostało</div>

            <div class="countdown">
                <div class="time-box">
                    <span class="time-val" id="d">00</span>
                    <span class="time-label">dni</span>
                </div>
                <div class="time-box">
                    <span class="time-val" id="h">00</span>
                    <span class="time-label">godz</span>
                </div>
                <div class="time-box">
                    <span class="time-val" id="m">00</span>
                    <span class="time-label">min</span>
                </div>
                <div class="time-box">
                    <span class="time-val" id="s">00</span>
                    <span class="time-label">sek</span>
                </div>
            </div>

            <div class="form-container">
                <form method="POST">
                    <input type="password" name="password" placeholder="Hasło dostępu" value="<?= $auto_pass ?>" required>
                    <button type="submit">Wejdź</button>
                    <?php if ($error): ?>
                        <p class="error"><?= $error ?></p>
                    <?php endif; ?>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const target = new Date("2026-09-18T13:30:00").getTime();
        const dEl = document.getElementById('d'), hEl = document.getElementById('h'), mEl = document.getElementById('m'), sEl = document.getElementById('s');
        function update() {
            const now = new Date().getTime();
            const diff = target - now;
            if (diff <= 0) { dEl.textContent = hEl.textContent = mEl.textContent = sEl.textContent = "00"; return; }
            const d = Math.floor(diff / (1000*60*60*24)), h = Math.floor((diff / (1000*60*60)) % 24), m = Math.floor((diff / (1000*60)) % 60), s = Math.floor((diff / 1000) % 60);
            dEl.textContent = d; hEl.textContent = h.toString().padStart(2,'0'); mEl.textContent = m.toString().padStart(2,'0'); sEl.textContent = s.toString().padStart(2,'0');
        }
        setInterval(update, 1000); update();
    });
</script>

</body>
</html>