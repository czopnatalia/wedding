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
            --text: #1a1a1a;
        }

        body, html {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            width: 100%;
            background: #f8f8f8;
            font-family: 'Inter', sans-serif;
            /* Usunięto overflow: hidden, aby na telefonie dało się przewijać w dół do przycisku */
        }

        .split-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
            overflow-x: hidden; /* Blokuje przesuwanie na boki */
        }

        /* LEWA STRONA: ZDJĘCIE */
        .split-image {
            flex: 1;
            background-image: url('assets/hero.jpg'); 
            background-size: cover;
            background-position: center;
            position: relative;
        }

        /* PRAWA STRONA: TREŚĆ */
        .split-content {
            flex: 1;
            background: #ffffff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 40px;
            position: relative;
        }

        /* PANEL Z EFEKTEM SZKŁA */
        .panel {
            width: 100%;
            max-width: 450px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            padding: 40px;
            text-align: center;
            /* Usunięto sztywne ramki i cienie dla lekkości */
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 5px;
            font-weight: 400;
            margin-bottom: 30px;
        }

        /* LICZNIK */
        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 40px;
        }

        .time-unit { display: flex; flex-direction: column; align-items: center; }
        .time-val { font-family: "Playfair Display", serif; font-size: 2rem; color: var(--accent); }
        .time-label { font-size: 0.7rem; text-transform: uppercase; letter-spacing: 2px; opacity: 0.6; }

        /* FORMULARZ */
        .form-container input {
            width: 100%;
            max-width: 280px;
            padding: 12px;
            border: 1px solid #ddd;
            background: transparent;
            text-align: center;
            margin-bottom: 15px;
            font-family: inherit;
            outline: none;
        }

        .form-container button {
            width: 100%;
            max-width: 280px;
            padding: 12px;
            background: var(--text);
            color: white;
            border: none;
            text-transform: uppercase;
            letter-spacing: 2px;
            cursor: pointer;
            transition: 0.3s;
        }

        .form-container button:hover { opacity: 0.8; }

        /* ====== RESPONSYWNOŚĆ (KLUCZOWE POPRAWKI) ====== */
        @media (max-width: 900px) {
            .split-container {
                flex-direction: column; /* Zdjęcie nad tekstem */
            }

            .split-image {
                height: 45vh; /* Zdjęcie zajmuje niecałą połowę wysokości */
                width: 100%;
                flex: none;
            }

            .split-content {
                width: 100%;
                flex: none;
                padding: 40px 20px;
                min-height: 55vh; /* Reszta dla treści */
            }

            .panel {
                padding: 20px;
                max-width: 90%; /* Żeby nie dotykało krawędzi ekranu */
            }

            h1 {
                font-size: 1.8rem;
                letter-spacing: 3px;
            }

            .countdown {
                gap: 10px;
            }

            .time-val {
                font-size: 1.5rem;
            }

            /* Zapewnia, że formularz i przycisk są widoczne bez przewijania w boki */
            .form-container {
                width: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
            }
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