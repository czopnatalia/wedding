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
            --text: #1a1a1a; /* Bardziej czarny dla elegancji */
            --bg-soft: #fcfaf8;
        }

        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            overflow: hidden; /* Blokujemy przewijanie na stronie wejściowej */
            font-family: "Inter", sans-serif;
        }

        .split-container {
            display: flex;
            height: 100vh;
            width: 100%;
        }

        /* LEWA STRONA: ZDJĘCIE */
        .split-image {
            flex: 1;
            background-image: url('assets/hero.jpg'); /* WPISZ SWOJĄ NAZWĘ PLIKU */
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        /* PRAWA STRONA: BIAŁA KARTA */
        .split-content {
            flex: 1;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px;
        }

        .panel {
            max-width: 450px;
            width: 100%;
            text-align: center;
            color: var(--text);
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: clamp(2.2rem, 4vw, 3rem);
            font-weight: 400;
            letter-spacing: 0.1em;
            margin: 0 0 10px;
            text-transform: uppercase;
        }

        .date-main {
            font-size: 1.1rem;
            letter-spacing: 0.4em;
            text-transform: uppercase;
            margin-bottom: 30px;
            font-weight: 300;
        }

        .divider {
            width: 50px;
            height: 1px;
            background: #000;
            margin: 50px auto;
            opacity: 0.2;
        }

        .countdown-label {
            font-size: 0.75rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 25px;
            opacity: 0.6;
        }

        .countdown {
            display: flex;
            justify-content: center;
            gap: 25px;
            margin-bottom: 50px;
        }

        .time-box { text-align: center; }
        .time-val { font-size: 1.6rem; font-weight: 200; display: block; }
        .time-label { font-size: 0.6rem; text-transform: uppercase; opacity: 0.5; letter-spacing: 1px; }

        /* FORMULARZ */
        .form-container { max-width: 280px; margin: 0 auto; }
        
        input[type="password"] {
            width: 100%;
            padding: 12px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            font-size: 1rem;
            margin-bottom: 30px;
            outline: none;
            text-align: center;
            transition: 0.3s;
        }

        input[type="password"]:focus { border-bottom-color: #000; }

        button {
            background: #000;
            color: #fff;
            border: 1px solid #000;
            padding: 12px 40px;
            font-size: 0.75rem;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            transition: 0.4s;
        }

        button:hover {
            background: #fff;
            color: #000;
        }

        .error { color: #b05a5a; font-size: 0.8rem; margin-top: 20px; }

        /* DOPASOWANIE DO TELEFONÓW */
        @media (max-width: 850px) {
            .split-container { flex-direction: column; overflow-y: auto; }
            .split-image { height: 40vh; flex: none; }
            .split-content { flex: 1; padding: 60px 20px; }
            h1 { font-size: 2rem; }
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