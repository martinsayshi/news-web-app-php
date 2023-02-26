<?php if(!empty($params)) : ?>
<?php foreach ($params as $articleDTO) : ?>
    <div class="card card-body-mb-3 p-3 mb-3">
        <h4 class="card-title"><?php echo $articleDTO->getTitle(); ?></h4>
        <div class="bg-light p-2 mb-3">
            Written by <?php echo $articleDTO->getAuthors(); ?> on <?php echo $articleDTO->getCreationDate(); ?>
        </div>
        <p class="card-text"><?php echo $articleDTO->getText(); ?></p>
        <a href="/posts?id=<?php echo $articleDTO->getId(); ?>" class="btn btn-dark">Go to news</a>
    </div>

<?php endforeach ?>
<?php else : ?>
    <p> There are no news</p>
<?php endif; ?>  
</div>
</form>