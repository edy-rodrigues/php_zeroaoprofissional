<div class="home_sobre d-flex m-auto align-items-center p-1 content">
    <img src="<?php echo BASE_URL; ?>assets/images/home_sobre.jpg" width="300" height="150" alt="Sobre nós" class="m-1 flex-1 responsive">
    <div class="d-flex column">
        <h3>Sobre</h3>
        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quas in corporis rem illum labore cum doloremque quaerat asperiores ea vitae dolor id tempore pariatur, placeat aperiam praesentium magnam ex laudantium.</p>
    </div>
</div>
<div class="home_portfolio content m-auto p-1">
    <h3>Meu Portifólio Recente</h3>
    <div class="content-portfolio d-flex justify-content-start">
        <?php foreach($portfolio as $item): ?>
        <div class="portfolio_item">
            <img src="<?php echo BASE_URL; ?>assets/images/<?php echo $item['url']; ?>" width="190" height="100" alt="">
        </div>
        <?php endforeach; ?>
    </div>
</div>