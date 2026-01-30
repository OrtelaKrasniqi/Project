<?php
session_start();

$news_list = [
    ["title" => "School Reopening!", "content" => "School will reopen on 1st February."],
    ["title" => "New Library Books", "content" => "The library has new books for students."]
];


$isAdmin = true; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News Section</title>
    <link rel="stylesheet" href="news.css">
</head>
<body>
    <header>
        <h1>📰 Latest News</h1>
    </header>

    <main>
        <section id="news-list">
            <?php foreach ($news_list as $news): ?>
                <div class="news-item">
                    <h2><?php echo htmlspecialchars($news['title']); ?></h2>
                    <p><?php echo htmlspecialchars($news['content']); ?></p>

                    <?php if ($isAdmin): ?>
                        <div class="admin-controls">
                            <a href="#">Edit</a>
                            <a href="#">Delete</a>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>
