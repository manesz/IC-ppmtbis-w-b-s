<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Rux-Notebook
 * Date: 21/4/2556
 * Time: 20:20 น.
 * To change this template use File | Settings | File Templates.
 */
?>


<?php
$this->load->view('header');
?>

<form id="form1" name="form1" method="post" action="<?php $_SERVER['PHP_SELF']; ?>">
    <label>ชื่อ - สกุล
        <input name="name" type="text" id="name" />
    </label>
    <label>รายละเอียด
        <textarea name="description" id="description"></textarea>
    </label>
    <p>
        <label>ประเภทพนักงาน
            <select name="employee_type" id="employee_type">
                <option value="1">1. job holder</option>
                <option value="2">2. writer</option>
                <option value="3">3. writer freelance</option>
                <option value="4">4. researcher</option>
                <option value="5">5. key account manager</option>
                <option value="6">6. responsibility</option>
                <option value="7">7. manager</option>
                <option value="8">8. admin</option>
            </select>
        </label>
    </p>
    <p>
        <label>เบอร์ติดต่อ
            <input name="phone_number" type="text" id="phone_number" />
        </label>
        <label>email
            <input name="email" type="text" id="email" />
        </label>
    </p>
    <p>
        <label>ที่อยู่
            <textarea name="address" id="address"></textarea>
        </label>
    </p>
    <p>
        <label>username
            <input name="username" type="text" id="username" />
        </label>
        <label>password
            <input name="password" type="password" id="password" />
        </label>
    </p>
    <p>
        <input name="submit" type="submit" id="submit" value="Submit" />
    </p>
</form>

<?php
$this->load->view('footer');
?>