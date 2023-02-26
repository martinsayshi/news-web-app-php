<div class="card card-body bg-light mt-5">
    <h2>Edit Post</h2>
    <p>Edit a post with this form</p>
    <form action="/edit?id=<?php echo $params->getId(); ?>" method="post">
        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" id='title' name="title" class="form-control form-control-lg" value="<?php echo $params->getTitle(); ?>">
        </div>
        <div class="form-group">
            <label for="text">Text:</label>
            <textarea id='text' name="text" class="form-control form-control-lg"><?php echo $params->getText(); ?></textarea>
        </div>
        <div class="form-group mb-2">
            <label for="author">Author(s):</label>
            <br>
            <label for="option1">
            <input type="checkbox" id="option1" name="authors[]" value="John Smith">
            John Smith
            </label>
            <br>
            <label for="option2">
                <input type="checkbox" id="option2" name="authors[]" value="Jane Doe">
                Jane Doe
            </label>
            <br>
            <label for="option3">
                <input type="checkbox" id="option3" name="authors[]" value="Alan Fresco">
                Alan Fresco
            </label>
            <br>
            <label for="option4">
                <input type="checkbox" id="option4" name="authors[]" value="Douglas Lyphe">
                Douglas Lyphe
            </label>
            <br>
            <label for="option5">
                <input type="checkbox" id="option5" name="authors[]" value="Hugh Saturation">
                Hugh Saturation
            </label>
    
        </div>
        <div class="form-group mb-2">
        <input type="date" id="date" name="date" required>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
    </form>
</div>