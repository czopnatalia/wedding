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
    <title>Natalia i Łukasz</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500&family=Inter:wght@200;300;400&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --accent: #8c7e6d;
            --text: #4a3f35;
            --glass: rgba(255, 255, 255, 0.35);
        }

        body {
            margin: 0;
            height: 100vh;
            background-image: url('assets/chmury.webp'); 
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: "Inter", sans-serif;
            color: var(--text);
        }

        .panel {
            width: 85%;
            max-width: 500px;
            background: var(--glass);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 60px 40px;
            border-radius: 30px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.4);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.05);
            animation: fadeIn 1.2s ease-out forwards;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            font-family: "Playfair Display", serif;
            font-size: 2.8rem;
            font-weight: 400;
            letter-spacing: 0.12em;
            margin: 0 0 15px;
            text-transform: uppercase;
        }

        .date-main {
            font-size: 1rem;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            margin-bottom: 25px;
            font-weight: 300;
        }

        .divider {
            width: 40px;
            height: 1px;
            background: var(--accent);
            margin: 50px auto;
            opacity: 0.5;
        }

        .countdown-label {
            font-size: 0.8rem;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            margin-bottom: 20px;
            opacity: 0.8;
            font-weight: 300;
        }

        /* Subtelny zegar */
        .countdown {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 45px;
        }

        .time-box {
            display: flex;
            flex-direction: column;
        }

        .time-val {
            font-size: 1.4rem;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .time-label {
            font-size: 0.6rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            opacity: 0.5;
            margin-top: 4px;
        }

        /* Formularz */
        .form-container {
            max-width: 280px;
            margin: 0 auto;
        }

        input[type="password"] {
            width: 100%;
            padding: 12px 0;
            background: transparent;
            border: none;
            border-bottom: 1px solid rgba(140, 126, 109, 0.4);
            font-size: 0.95rem;
            margin-bottom: 25px;
            outline: none;
            color: var(--text);
            text-align: center;
            transition: border-color 0.3s;
            font-family: "Inter", sans-serif;
        }

        input[type="password"]:focus {
            border-bottom-color: var(--accent);
        }

        button {
            background: transparent;
            color: var(--text);
            border: 1px solid var(--text);
            padding: 8px 30px;
            font-size: 0.8rem;
            cursor: pointer;
            transition: all 0.4s;
            text-transform: uppercase;
            letter-spacing: 0.2em;
            border-radius: 4px; /* Minimalny promień dla elegancji */
        }

        button:hover {
            background: var(--text);
            color: #fff;
            letter-spacing: 0.3em;
        }

        .error {
            color: #b05a5a;
            margin-top: 20px;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }

        @media (max-width: 600px) {
            h1 { font-size: 1.8rem; }
            .panel { padding: 50px 25px; }
            .countdown { gap: 15px; }
        }
    </style>
</head>

<body>

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
            <input type="password" name="password"
                   placeholder="Hasło dostępu"
                   value="<?= $auto_pass ?>"
                   required>
            <br>
            <button type="submit">Wejdź</button>
            <?php if ($error): ?>
                <p class="error"><?= $error ?></p>
            <?php endif; ?>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const target = new Date("2026-09-18T13:30:00").getTime();
        const dEl = document.getElementById('d');
        const hEl = document.getElementById('h');
        const mEl = document.getElementById('m');
        const sEl = document.getElementById('s');

        function update() {
            const now = new Date().getTime();
            const diff = target - now;

            if (diff <= 0) {
                dEl.textContent = hEl.textContent = mEl.textContent = sEl.textContent = "00";
                return;
            }

            const d = Math.floor(diff / (1000*60*60*24));
            const h = Math.floor((diff / (1000*60*60)) % 24);
            const m = Math.floor((diff / (1000*60)) % 60);
            const s = Math.floor((diff / 1000) % 60);

            dEl.textContent = d;
            hEl.textContent = h.toString().padStart(2,'0');
            mEl.textContent = m.toString().padStart(2,'0');
            sEl.textContent = s.toString().padStart(2,'0');
        }
        setInterval(update, 1000);
        update();
    });
</script>

</body>
</html>