<center>
<?php
include 'functions.php';
$pdo = pdo_connect_mysql();
$msg = '';
// Check that the poll ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM images WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $image = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$image) {
        ?>
        <br><br><br>
        <?php
        die ('Image doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            ?><br><br><br><?php
            // User clicked the "Yes" button, delete file & delete record
            unlink($image['path']);
            $stmt = $pdo->prepare('DELETE FROM images WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            // Output msg
            $msg = 'You have deleted the image!';?><br><br><br><br><br><br>
            <a href="gallery_administrator.php"><input type="button" class="content upload" value="Okay"></a><?php
        } else {
            // User clicked the "No" button, redirect them back to the home/index page
            header('Location: gallery_administrator.php');
            exit;
        }
    }
} else {
    die ('No ID specified!');
}
?>

<?=template_header('Delete')?>

<div class="content delete">
	<h2>Delete Image #<?=$image['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete <?=$image['title']?>?</p>
    <center>
    <div class="yesno">
        <a href="delete.php?id=<?=$image['id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$image['id']?>&confirm=no">No</a>
    </div>
    </center>
    <?php endif; ?>
</div>

<?=template_footer()?>
</center>