<div class="container-portfolio content m-auto p-1">
    <h1>Meu Portifólio</h1>
    <div class="content-portfolio d-flex justify-content-start">
        <?php foreach($portfolio as $item): ?>
        <div class="portfolio_item">
            <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $item['url']; ?>" width="190" height="100" alt="">
        </div>
        <?php endforeach; ?>
    </div>
</div>