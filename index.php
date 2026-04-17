<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=sparklabs", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database verbinding mislukt: " . $e->getMessage());
}

$stmt = $pdo->query("SELECT event_name, event_date FROM events WHERE event_date >= CURDATE() ORDER BY event_date ASC LIMIT 3");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);

$next_event_name = !empty($events) ? $events[0]['event_name'] : "Next Event";
$target_date = !empty($events) ? $events[0]['event_date'] . " 00:00:00" : "2026-12-31 00:00:00";
$target = strtotime($target_date) * 1000;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@700;900&family=Rajdhani:wght@500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="index.css">
    <title>PixelStorm - Tech Events</title>
</head>
<script>
    const target = <?= $target ?>;

    function tick() {
        const daysEl = document.getElementById('days');
        const hoursEl = document.getElementById('hours');
        const minsEl = document.getElementById('minutes');
        const secsEl = document.getElementById('seconds');

        const d = target - Date.now();
        if (d <= 0) {
            if(daysEl) daysEl.textContent = "0";
            if(hoursEl) hoursEl.textContent = "0";
            if(minsEl) minsEl.textContent = "0";
            if(secsEl) secsEl.textContent = "0";
            return;
        }

        const t = n => Math.floor(n);
        if(daysEl) daysEl.textContent = t(d / 86400000);
        if(hoursEl) hoursEl.textContent = t(d % 86400000 / 3600000);
        if(minsEl) minsEl.textContent = t(d % 3600000 / 60000);
        if(secsEl) secsEl.textContent = t(d % 60000 / 1000);
    }

    setInterval(tick, 1000);
    window.addEventListener('DOMContentLoaded', tick);
</script>

<body>

    <div class="lightning-container">
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
        <div class="lightning">⚡</div>
    </div>

    <header>
        <div class="midden">
            <form action="index.php"><button style="color: #ff00ff;">Home</button></form>
            <form action="events.php"><button>Events</button></form>
            <form action="info.php"><button>Info</button></form>
            <form action="News.php"><button>News</button></form>
            <form action="Tickets.php"><button>Tickets</button></form>
        </div>
    </header>

    <div class="logo">
        <img src="pixelstormlogo.png" alt="Logo">
    </div>

    <div class="home-intro-box">
        <p>Step into the digital thunder. Discover the latest tech, join epic eSports tournaments, meet industry leaders, and experience the future of gaming. The storm is coming.</p>
    </div>

    <div class="countdown">
        <h1>COUNT DOWN FOR: <?= htmlspecialchars($next_event_name) ?></h1>
        <div class="timer">
            <div class="timer-blok"><div id="days" class="timer-getal">0</div>D</div>
            <div class="timer-scheider">:</div>
            <div class="timer-blok"><div id="hours" class="timer-getal">0</div>H</div>
            <div class="timer-scheider">:</div>
            <div class="timer-blok"><div id="minutes" class="timer-getal">0</div>M</div>
            <div class="timer-scheider">:</div>
            <div class="timer-blok"><div id="seconds" class="timer-getal">0</div>S</div>
        </div>
    </div>

    <div class="evenementen-container">
        <?php if (!empty($events)): ?>
            <?php foreach ($events as $event): ?>
                <div class="evenement-blok">
                    <?= htmlspecialchars($event['event_name']) ?>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="evenement-blok">No events planned</div>
        <?php endif; ?>
    </div>

    <div class="balkmetkat centrerings-wrapper">
        <footer class="socials-balk">
            <p>
                Socials:
                <a href="#">Facebook</a>, <a href="#">X</a>, <a href="#">Youtube</a>, <a href="#">Instagram</a>, <a href="#">Linkedin</a>
            </p>
        </footer>
        <img src="pixelcat.png" alt="Mascotte" class="kat-figuurtje">
    </div>

</body>
</html>