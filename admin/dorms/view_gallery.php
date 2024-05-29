<?php
require_once('../../config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $qry = $conn->query("SELECT * FROM dorm_gallery WHERE dorm_id = '$id'");

    if ($qry->num_rows > 0):
?>
<div class="container-fluid">
    <div class="row">
        <?php while ($row = $qry->fetch_assoc()): ?>
            <div class="col-md-4 mb-3">
                <img src="<?php echo $row['file_path']; ?>" class="img-responsive" alt="Dorm Image">
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php
    else:
        echo "<h5 class='text-center'>No photos available.</h5>";
    endif;
}
?>
