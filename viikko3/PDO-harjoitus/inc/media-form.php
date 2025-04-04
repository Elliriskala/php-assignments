<section id="insert-media-item">
    <form action="./operations/insertData.php" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title"/>
        </div>
        <div class="form-control">
            <label for="description">Description:</label>
            <textarea name="description" id="description" rows="5"></textarea>
        </div>
        <div class="form-control">
            <label for="file">Select image to upload:</label>
            <input type="file" name="file" id="file"/>
        </div>
        <button type="submit">Upload Image</button>
    </form>
</section>