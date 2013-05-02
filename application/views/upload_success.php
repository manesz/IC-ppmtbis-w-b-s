<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux
 * Date: 1/5/2556
 * Time: 17:16 น.
 * To change this template use File | Settings | File Templates.
 */
?>
<html>
<head>
    <title>Upload Form</title>
</head>
<body>

<h3>Your file was successfully uploaded!</h3>

<ul>
    <?php foreach ($upload_data as $item => $value):?>
        <li><?php echo $item;?>: <?php echo $value;?></li>
    <?php endforeach; ?>
</ul>

<p><?php echo anchor('uploads', 'Upload Another File!'); ?></p>

</body>
</html>