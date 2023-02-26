<?php foreach ($params as $authorsDTO) : ?>
        <div class="col-md-3 mb-4">
            <div class="card">
                <div class="card-body">
                    <a href="/authors?id=<?php echo $authorsDTO->id; ?>"><h6 class="card-body text-center"><?php echo $authorsDTO->name; ?></h6></a>
                </div>
            </div>
        </div>
    <?php endforeach ?>