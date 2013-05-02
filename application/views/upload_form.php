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

<?php echo $error;?>

<?php echo form_open_multipart('upload/do_upload');?>

<input type="file" name="userfile" size="20" />

<br /><br />

<input type="submit" value="upload" />

</form>

</body>
</html>