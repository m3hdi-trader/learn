<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg']) : ?>
            <p class="msg">
                <?php echo $_SESSION['msg']  ?>
            </p>
            <?php unset($_SESSION['msg']) ?>
        <?php endif ?>

        <form action="02-upload.php" method="post" enctype="multipart/form-data">
            <div>
                <input type="file" id="file-upload" name="uploadFile">
            </div>
            <input type="submit" value="upload" name="uploadBtn">
        </form>

    </div>

</body>

</html>