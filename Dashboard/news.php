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
