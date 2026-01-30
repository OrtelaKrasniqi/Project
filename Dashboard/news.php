<?php

$news_list = [
    ["title" => "School Reopening!", "content" => "School will reopen on 1st February."],
    ["title" => "New Library Books", "content" => "The library has new books for students."]
];


$isAdmin = true; 

foreach ($news_list as $news) {
    echo '<div class="news-item">';
    echo '<h2>' . htmlspecialchars($news['title']) . '</h2>';
    echo '<p>' . htmlspecialchars($news['content']) . '</p>';

    if ($isAdmin) {
        echo '<div class="admin-controls">';
        echo '<a href="#">Edit</a>';
        echo '<a href="#">Delete</a>';
        echo '</div>';
    }

    echo '</div>';
}
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
            <?php include 'news.php'; ?>
        </section>
    </main>
</body>
</html>
