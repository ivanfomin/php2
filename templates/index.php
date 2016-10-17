<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Все новости</title>
</head>
<body>

  <?php foreach ($news as $article) : ?>
      <article>
        <h1><?php echo $article->title; ?></h1>
        <div><?php echo $article->lead; ?></div>
      </article>
  <?php endforeach; ?>

</body>
</html>