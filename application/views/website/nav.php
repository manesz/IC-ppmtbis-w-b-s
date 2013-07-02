<?php
$arrJobsMenu = $this->Website_model->getListJobMenu();
$arrPageTypeOurService = $this->CPanel_model->pageList(0, 2);

?>

<nav class="menu eleven columns">

<!-- PRIMARY MENU (NORMAL BROWSERS) [ add class="selected" on the current <a> ]-->
<ul id="menulava" class="sf-menu">
    <li class="menu-item">
        <a href="<?php echo $webUrl; ?>" <?php echo $selectBar == "home" ? "class=\"selected\"" : ""; ?> >Home</a>
    </li>

    <li class="menu-item">
        <a href="<?php echo $webUrl; ?>website/our_service" <?php echo $selectBar == "our_service" ? "class=\"selected\"" : ""; ?> >Our
            Service</a>
        <ul class="sub-menu">
            <?php foreach ($arrPageTypeOurService as $key => $value): ?>
            <li class="menu-item"><a
                    href="<?php echo $webUrl; ?>website/page/<?php echo $value->id; ?>"><?php echo $value->title; ?></a></li>
            <?php endforeach; ?>
        </ul>
    </li>

<li class="menu-item">
    <a href="#" <?php echo $selectBar == "job" ? "class=\"selected\"" : ""; ?>>Jobs</a>

<ul class="sub-menu">
    <?php $oldID = ""; ?>
    <?php foreach ($arrJobsMenu as $key => $value) : ?>
    <?php if ($value->type != $oldID): ?>
        <?php if ($key > 0): ?>
        </ul>
    </li>
    <!--                        </ul>-->
            <?php endif; ?>
        <?php $oldID = $value->type; ?>
    <li class="menu-item">
        <a href="<?php echo $webUrl; ?>"><?php echo $value->type_name; ?></a>
        <ul class="sub-menu">
            <li class="menu-item">
                <a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>"><?php echo $value->title; ?></a>
            </li>
        <?php else: ?>
        <li class="menu-item">
            <a href="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>"><?php echo $value->title; ?></a>
        </li>
        <?php
    endif;
    ?>
    <?php endforeach; ?>
    <?php ?>
</ul>
</li>
</ul>


<!--<ul class="sub-menu">-->
<!--            <li class="menu-item">-->
<!--                <a href="#">Administration</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Administration - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Administration - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--<li class="menu-item">-->
<!--    <a href="#">Engineer/Production</a>-->
<!---->
<!--    <ul class="sub-menu">-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=2&jobID=1">Laminating Manager</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=2&jobID=2">After Service Sales Manager</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=2&jobID=3">Sales Manager Automation</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->
<!---->
<!--<li class="menu-item">-->
<!--    <a href="#">Financial/Accounting</a>-->
<!---->
<!--    <ul class="sub-menu">-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=3&jobID=1">Commercial Executive</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=3&jobID=2">Chief Accountant</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=3&jobID=3">Country Chief Accountant and Controller</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=3&jobID=4">Accounting Supervisor</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

<!--            <li class="menu-item">-->
<!--                <a href="#">Hospitality</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Hospitality - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Hospitality - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--<li class="menu-item">-->
<!--    <a href="#">HR</a>-->
<!---->
<!--    <ul class="sub-menu">-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=5&jobID=1">HR Manager ( C & B )</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=5&jobID=2">HR Manager ( Recruitment & Training )</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

<!--            <li class="menu-item">-->
<!--                <a href="#">IT</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">IT - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">IT - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--            <li class="menu-item">-->
<!--                <a href="#">Legal</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Legal - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Legal - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--            <li class="menu-item">-->
<!--                <a href="#">PR</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">PR - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">PR - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--            <li class="menu-item">-->
<!--                <a href="#">QM & Safety</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">QM & Safety - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">QM & Safety - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--<li class="menu-item">-->
<!--    <a href="#">Sales & Marketing</a>-->
<!---->
<!--    <ul class="sub-menu">-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=10&jobID=1">Sales Engineer_OEM Sales Engineer</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=10&jobID=2">Sales Manager</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=10&jobID=3">Sales Manager_Automation / Energy</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=10&jobID=4">VP Corporate Business</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->
<!---->
<!--<li class="menu-item">-->
<!--    <a href="#">Supply Chain</a>-->
<!---->
<!--    <ul class="sub-menu">-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=11&jobID=1">Purchasing Officer</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=11&jobID=2">Planning Assistant Manager</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=11&jobID=3">Logistic Manager</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

<!--            <li class="menu-item">-->
<!--                <a href="#">Telecommunication</a>-->

<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Telecommunication - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="#">Telecommunication - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--<li class="menu-item">-->
<!--    <a href="#">Healthcare</a>-->
<!---->
<!--    <ul class="sub-menu">-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=13&jobID=1">Application Specialist DX</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=13&jobID=2.php">Upcountry Account Manager</a>-->
<!--        </li>-->
<!--        <li class="menu-item">-->
<!--            <a href="single.php?cateID=13&jobID=3.php">Application Specialist X-ray</a>-->
<!--        </li>-->
<!--    </ul>-->
<!--</li>-->

<!--            <li class="menu-item">-->
<!--                <a href="category.php">Other</a>-->
<!---->
<!--                <ul class="sub-menu">-->
<!--                    <li class="menu-item">-->
<!--                        <a href="single.php">Other - 1</a>-->
<!--                    </li>-->
<!--                    <li class="menu-item">-->
<!--                        <a href="single.php">Other - 2</a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </li>-->

<!--</ul>-->
<!--</li>-->

<!--<li class="menu-item">
    <a href="#" <?php echo $selectBar == "about_us" ? "class=\"selected\"" : ""; ?>
        >About Us</a>
</li>-->

<li class="menu-item">
    <a href="<?php echo $webUrl; ?>website/contactus"
        <?php echo $selectBar == "contactus" ? "class=\"selected\"" : ""; ?>>Contact Us</a>
</li>

</ul>
<!-- END OF PRIMARY MENU (NORMAL BROWSERS) -->

<!-- SECONDARY MENU (MOBILE BROWSERS AND SMALLER RESOLUTIONS) -->
<div id="select-menu">
    <select id="menu" class="dropdown-menu">
        <option value="">
            Mobile menu
        </option>

        <!-- HOME -->
        <option value="<?php echo $webUrl; ?>" <?php echo $selectBar == "home" ? "class=\"selected\"" : ""; ?>>
            HOME
        </option>
        <!-- #END HOME -->
        <!-- OUR SERICE -->
        <option value="<?php echo $webUrl; ?>website/our_service" <?php echo $selectBar == "our_service" ? "class=\"selected\"" : ""; ?>>
            OUR SERVICE
        </option>
        <?php foreach ($arrPageTypeOurService as $key => $value): ?>
        <option value="<?php echo $webUrl; ?>website/page/<?php echo $value->id; ?>">
            - <?php echo $value->title; ?>
        </option>
        <?php endforeach; ?>
        <!-- #END OURSERVICE -->
        <!-- JOB -->
        <option value="#">
            JOBS
        </option>
        <?php
        foreach ($arrJobsMenu as $key => $value) :
            ?>
            <option value="<?php echo $webUrl; ?>website/post/<?php echo $value->id; ?>">
                - <?php echo $value->title; ?>
            </option>
            <?php
        endforeach;
        ?>
        <!-- #END JOB -->
        <!-- CONTACT US -->
        <option value="<?php echo $webUrl; ?>website/contactus" <?php echo $selectBar == "contactus" ? "class=\"selected\"" : ""; ?>>
            CONTACT US
        </option>
        <!-- #END CONTACT US -->
    </select>
</div>
<!-- End Menu -->

</nav>