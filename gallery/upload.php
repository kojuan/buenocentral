<?php
include 'functions.php';
// The output message
$msg = '';
// Check if user has uploaded new image
if (isset($_FILES['image'], $_POST['title'], $_POST['description'])) {
	// The folder where the images will be stored
	$target_dir = 'images/';
	// The path of the new uploaded image
	$image_path = $target_dir . basename($_FILES['image']['name']);
	// Check to make sure the image is valid
	if (!empty($_FILES['image']['tmp_name']) && getimagesize($_FILES['image']['tmp_name'])) {
		if (file_exists($image_path)) {
			$msg = 'Image already exists, please choose another or rename that image.';
		} else if ($_FILES['image']['size'] > 80000000) {
			$msg = 'Image file size too large, please choose an image less than 10mb.';
		} else {
			// Everything checks out now we can move the uploaded image
			move_uploaded_file($_FILES['image']['tmp_name'], $image_path);
			// Connect to MySQL
			$pdo = pdo_connect_mysql();
			// Insert image info into the database (title, description, image path, and date added)
			$stmt = $pdo->prepare('INSERT INTO images VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP)');
	        $stmt->execute([$_POST['title'], $_POST['description'], $image_path]);
			$msg = '<b style="color:blue">Image uploaded successfully!</b>';
		}
	} else {
		$msg = 'Please upload an image!';
	}
}
?>

<?=template_header('Upload Image')?>
<center>
<div class="content upload">
	<h2>Upload Image</h2>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<label for="image">Choose Image that is not exceeding 10mb file size.<BR>(ACCEPTS .jpg , .jpeg, & .png ONLY!)</label>
		<input type="file" name="image" accept="image/x-png,image/jpeg" id="image">
		<label for="title">Title ( Displayed on the User)</label>
		<input type="text" name="title" id="title">
		<label for="description">Description ( Displayed on the User)</label>
		<textarea name="description" id="description"></textarea>
	    <input type="submit" value="Upload Image" name="submit">
		<a href="gallery_administrator.php"><input type="button" value="Go Back"></a>
        
	</form>
	<p><?=$msg?></p>
</div>
</center>

<?=template_footer()?>