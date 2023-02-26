<h1><?php echo $params->getTitle();?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Written by <?php echo $params->getAuthors();?> on <?php echo $params->getCreationDate();?>
</div>
<p><?php echo $params->getText();?></p>
<hr>
<a href="/edit?id=<?php echo $params->getId(); ?>" class="btn btn-dark">Edit</a>

