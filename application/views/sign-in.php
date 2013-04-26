<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux-Notebook
 * Date: 21/4/2556
 * Time: 11:15 น.
 * To change this template use File | Settings | File Templates.
 */
?>

<form id="frmLogin" name="frmLogin" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
        <tr>
            <td width="33%" valign="top">
                <div align="right">
                    USERNAME
                </div>
            </td>
            <td width="67%" valign="top"><input name="username" type="text" id="username" maxlength="32"></td>
        </tr>
        <tr>
            <td valign="top">
                <div align="right">
                    PASSWORD
                </div>
            </td>
            <td valign="top"><input name="password" type="password" id="password" maxlength="32"></td>
        </tr>
        <tr>
            <td valign="top">&nbsp;</td>
            <td valign="top"><p>
                    <input type="submit" name="Button" value="เข้าระบบ">
                </p></td>
        </tr>
        </tbody>
    </table>

</form>