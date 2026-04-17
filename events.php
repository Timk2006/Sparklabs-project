<?php
session_start();

require 'db.php';

$stmt = $pdo->query("SELECT * FROM events ORDER BY event_date ASC");
$events = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>PixelStorm - Events</title>
</head>

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
            <form action="index.php"><button type="submit">Home</button></form>
            <form action="events.php"><button type="submit" style="color: red;">Events</button></form>
            <form action="info.php"><button type="submit">Info</button></form>
            <form action="News.php"><button type="submit">News</button></form>
            <form action="Tickets.php"><button type="submit">Tickets</button></form>
        </div>
    </header>

    <div class="events-main-container">
        <div class="events-content-box">
            <h1>EVENTS IN <span class="underline">THE FUTURE</span>...</h1>

            <div class="incoming-section">
                <h2>↓ EVENT INCOMING ↓</h2>

                <div class="main-event-card">
                    <?php if (!empty($events)): ?>
                        <div class="main-event-info">

                            <span class="event-title">
                                <?= htmlspecialchars($events[0]['event_name']) ?>
                            </span>

                            <p class="event-description">
                                <?= htmlspecialchars($events[0]['beschrijving'] ?? 'Geen beschrijving beschikbaar') ?>
                            </p>

                            <p>📅 <?= date('d-m-Y', strtotime($events[0]['event_date'])) ?></p>

                        </div>
                    <?php else: ?>
                        <span>No events scheduled yet...</span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="events-grid">
                <?php foreach (array_slice($events, 1) as $event): ?>
                    <div class="event-small-card">

                        <h3><?= htmlspecialchars($event['event_name']) ?></h3>

                        <p class="event-description">
                            <?= htmlspecialchars($event['beschrijving']) ?>
                        </p>

                        <div class="event-details">
                            <p>📅 <?= date('d-m-Y', strtotime($event['event_date'])) ?></p>
                        </div>

                    </div>
                <?php endforeach; ?>

                <div class="event-small-card coming-soon">
                    <h3>Coming soon!</h3>
                    <p>Stay tuned for more...</p>
                </div>
            </div>

        </div>
    </div>

    <div class="balkmetkat centrerings-wrapper">
        <footer class="socials-balk">
            <p>
                Socials:
                <a href="#">Facebook</a>,
                <a href="#">X</a>,
                <a href="#">Youtube</a>,
                <a href="#">Instagram</a>,
                <a href="#">Linkedin</a>
            </p>
        </footer>
        <img src="pixelcat.png" alt="Mascotte" class="kat-figuurtje">
    </div>

</body>

</html>