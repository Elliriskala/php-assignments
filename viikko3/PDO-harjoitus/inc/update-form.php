<section id="update-media-item">
    <form action="./operations/updateData.php" method="post">
        <div class="form-control">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title"/>
        </div>
        <div class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
        <input type="hidden" name="user_id" value="1">
        <input type="hidden" name="media_id" value="<?php echo $_GET['media_id']; ?>">
        <button type="submit">Update Image</button>
    </form>
</section>
