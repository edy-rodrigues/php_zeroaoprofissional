<h2><?php echo $title ?></h2>
<?php foreach($news as $item): ?>
    <h3><?php echo $item['title']; ?></h3>
    <a href="<?php echo site_url('news/'. $item['uri']); ?>">Ver mais</a>
<?php endforeach; ?>