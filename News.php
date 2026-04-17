<?php
require 'db.php';

$stmt = $pdo->prepare("SELECT * FROM news ORDER BY news_id DESC");
$stmt->execute();
$newsItems = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>PixelStorm - News</title>
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
            <form action="index.php"><button>Home</button></form>
            <form action="events.php"><button>Events</button></form>
            <form action="info.php"><button>Info</button></form>
            <form action="News.php"><button style="color: red;">News</button></form>
            <form action="Tickets.php"><button>Tickets</button></form>
        </div>
    </header>

    <div class="news-container">
        <div class="news-feed">

            <?php if (count($newsItems) > 0): ?>

                <?php foreach ($newsItems as $news): ?>
                    <div class="news-item">

                        <div class="news-img-wrapper">
                            <img
                                src="<?= htmlspecialchars($news['image']) ?>"
                                alt="<?= htmlspecialchars($news['title']) ?>"
                                class="news-img">
                        </div>

                        <h3>
                            <?= htmlspecialchars($news['title']) ?>
                        </h3>

                        <p>
                            <?= htmlspecialchars($news['content']) ?>
                        </p>

                        <a href="news_detail.php?id=<?= $news['news_id'] ?>" class="read-more">
                            READ MORE
                        </a>

                    </div>
                <?php endforeach; ?>

            <?php else: ?>
                <p>Geen nieuws beschikbaar.</p>
            <?php endif; ?>

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