<!doctype html>

<title>My blog</title>
<link rel="stylesheet" href="/app.css" />

<body>
    <?php foreach ($posts as $post): ?>
        <article>
            <?= $post; ?>
        </article>
    <?php endforeach; ?>
</body>