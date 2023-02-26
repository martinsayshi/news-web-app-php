<div class="row">
    <?php if(!empty($params)) : ?>
    <?php foreach ($params as $authorsDTO) : ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-body text-center"><?php echo $authorsDTO->getName(); ?></h6>
                    <h6 class="card-body text-center"><?php echo $authorsDTO->getArticleCount(); ?></h6>
                </div>
            </div>
        </div>
    <?php endforeach ?>
    <?php else : ?>
        <p> There are no news published</p>
    <?php endif; ?>  
</div>