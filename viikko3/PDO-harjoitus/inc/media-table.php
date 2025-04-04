<section id="media-items">
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Created</th>
            <th>Owner</th>
            <th>Thumbnail</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php
        require_once __DIR__ . '/../operations/selectData.php';
        ?>
        </tbody>
    </table>
</section>