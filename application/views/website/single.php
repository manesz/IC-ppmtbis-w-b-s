<?php $this->load->view("website/header"); ?>
<?php $this->load->view("website/functions"); ?>

<?php $this->load->view("website/header-content"); ?>

<?php

//$this->load->view("website/title");
$baseUrl = base_url();
$jqueryUpload = $baseUrl . "assets/plugin/jquery-upload/";
$jqueryUpload2 = $baseUrl . "assets/plugin/j-upload/";
?>

    <!-- Bootstrap CSS Toolkit styles -->
<!--    <link rel="stylesheet" href="--><?php //echo $jqueryUpload; ?><!--css/bootstrap.min.css">-->
    <link rel="stylesheet" href="http://blueimp.github.io/cdn/css/bootstrap.min.css"
          xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
    <!-- Generic page styles -->
    <!--    <link rel="stylesheet" href="--><?php //echo $jqueryUpload; ?><!--css/style.css">-->
    <!-- Bootstrap styles for responsive website layout, supporting different screen sizes -->
    <link rel="stylesheet" href="<?php echo $jqueryUpload; ?>css/bootstrap-responsive.min.css">
    <!-- Bootstrap CSS fixes for IE6 -->
    <!--[if lt IE 7]>
    <link rel="stylesheet" href="<?php echo $jqueryUpload; ?>css/bootstrap-ie6.min.css">
    <![endif]-->
    <!-- blueimp Gallery styles -->
    <link rel="stylesheet" href="<?php echo $jqueryUpload; ?>css/blueimp-gallery.min.css">
    <!-- CSS to style the file input field as button and adjust the Bootstrap progress bars -->
    <link rel="stylesheet" href="<?php echo $jqueryUpload; ?>css/jquery.fileupload-ui.css">
    <!-- CSS adjustments for browsers with JavaScript disabled -->
    <noscript>
        <link rel="stylesheet" href="<?php echo $jqueryUpload; ?>css/jquery.fileupload-ui-noscript.css">
    </noscript>
    <!--<script  src="http://code.jquery.com/jquery-1.7.min.js" ></script>-->
    <script  type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js" ></script>

    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/tmpl.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/load-image.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/canvas-to-blob.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/bootstrap.min.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/bootstrap-image-gallery.min.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/jquery.iframe-transport.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/jquery.fileupload.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/jquery.fileupload-ip.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/jquery.fileupload-ui.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/locale.js" ></script>
    <script  type="text/javascript" src="<?php echo $jqueryUpload2; ?>js/fileupload/main.js" ></script>

    <!-- TITLE -->
    <div class="fullwidth-container"
         style="position: relative;float: left; height: 110px; width: 100%;height: 110px;background: white;">
        <div class="container container-border" style='border-top: 1px solid #ededed;'>
            <div class="pageTitle sixteen columns" style='margin-top: 0px;'>
                <h3 class="page_title nine columns"
                    style="color: #444444; font-size: 18px"><?php echo $arrData->title; ?></h3>

                <div class="entry-breadcrumb no-flicker seven columns"
                     style="  border: none; color: #444444; font-size: 18px">
                    <p style="float: right;">You are here: <a href="#">PROMPTBIS</a> » <a href="#"
                                                                                          title="<?php echo $arrData->title; ?>"><?php echo $arrData->title; ?></a>
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- END : TITLE -->

    <div id="white_content">

        <div id="wrapper">

            <div class="container" style='border-top: 1px solid #ededed;'>

                <section id="primary" role="region" class="eleven columns" style="margin-top: 0px;">
                    <div id="content">
                        <div class="post-listing" style="border-right: 1px solid #EDEDED; padding-right: 40px;">
                            <!--            <H4>--><?php //echo $arrData->title; ?><!--</H4>-->
                            <!--            <div class='des-sc-dots-divider'></div>-->
                            <?php
                            //echo $arrData->description;
                            $description = $arrData->description;
                            if (!empty($description)) {
                                echo "<H4>Description :</H4>" . $description;
                            };
                            ?>
                            <H4>Salary : <?php echo $arrData->salary; ?></H4>
                            <H4>Workplace : <?php echo $arrData->workplace; ?></H4>
                            <H4>Responsibilities</H4>
                            <?php echo $arrData->responsibilities; ?>
                            <H4>Qualifications</H4>
                            <?php echo $arrData->qualification; ?>
                            <br/><br/>

                            <div>
                                <form id="frmApplyJob" action="" method="post">
                                    <input type="hidden" name="typeJob" value="<?php echo $arrData->title; ?>"/>
                                    <label>Name: <input name="name" id="name" type="text" class="yourname txt corner-input"/></label>
                                    <label>Email: <input name="email" id="email" type="text" class="yourname txt corner-input"/></label>
                                    <label>Mobile: <input name="email" id="email" type="text" class="yourname txt corner-input"/></label>
                                    <label>Description: <textarea class="yourmessage textarea message corner-input"></textarea></label>
                                </form>
                                <form id="fileupload" action="<?php echo $webUrl; ?>apply_job/upload_img" method="POST"
                                      enctype="multipart/form-data">
                                    <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                                    <div class="row fileupload-buttonbar">
                                        <div class="span7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <span><i class="icon-plus icon-white"></i> Add files...</span>
                                            <input type="file" name="userfile" multiple>
                                        </span>
                                            <button type="submit" class="btn btn-primary start">
                                                <i class="icon-upload icon-white"></i> Start upload
                                            </button>
                                            <button type="reset" class="btn btn-warning cancel">
                                                <i class="icon-ban-circle icon-white"></i> Cancel upload
                                            </button>
                                            <button type="button" class="btn btn-danger delete">
                                                <i class="icon-trash icon-white"></i> Delete
                                            </button>
                                            <input type="checkbox" class="toggle">
                                        </div>
                                        <div class="span5">
                                            <!-- The global progress bar -->
                                            <div class="progress progress-success progress-striped active fade">
                                                <div class="bar" style="width:0%;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- The loading indicator is shown during image processing -->
                                    <div class="fileupload-loading"></div>
                                    <br>
                                    <!-- The table listing the files available for upload/download -->
                                    <table class="table table-striped">
                                        <tbody class="files" data-toggle="modal-gallery"
                                               data-target="#modal-gallery"></tbody>
                                    </table>
                                </form>
                                <script id="template-upload" type="text/x-tmpl">
                                    {% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l;
                                    file=files[++i]) { %}
                                    <tr class="template-upload fade">
                                        <td class="preview"><span class="fade"></span></td>
                                        <td class="name">{%=file.name%}</td>
                                        <td class="size">{%=o.formatFileSize(file.size)%}</td>
                                        {% if (file.error) { %}
                                        <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span>
                                            {%=locale.fileupload.errors[file.error] || file.error%}
                                        </td>
                                        {% } else if (o.files.valid && !i) { %}
                                        <td>
                                            <div class="progress progress-success progress-striped active">
                                                <div class="bar" style="width:0%;"></div>
                                            </div>
                                        </td>
                                        <td class="start">{% if (!o.options.autoUpload) { %}
                                            <button class="btn btn-primary">
                                                <i class="icon-upload icon-white"></i> {%=locale.fileupload.start%}
                                            </button>
                                            {% } %}
                                        </td>
                                        {% } else { %}
                                        <td colspan="2"></td>
                                        {% } %}
                                        <td class="cancel">{% if (!i) { %}
                                            <button class="btn btn-warning">
                                                <i class="icon-ban-circle icon-white"></i> {%=locale.fileupload.cancel%}
                                            </button>
                                            {% } %}
                                        </td>
                                    </tr>
                                    {% } %}
                                </script>

                                <div id="download-files">
                                    <!-- The template to display files available for download -->
                                    <script id="template-download" type="text/x-tmpl">
                                        {% for (var i=0, files=o.files, l=files.length, file=files[0]; i< l;
                                        file=files[++i]) { %}
                                        <tr class="template-download fade">
                                            {% if (file.error) { %}
                                            <td></td>
                                            <td class="name">{%=file.name%}</td>
                                            <td class="size">{%=o.formatFileSize(file.size)%}</td>
                                            <td class="error" colspan="2"><span class="label label-important">{%=locale.fileupload.error%}</span>
                                                {%=locale.fileupload.errors[file.error] || file.error%}
                                            </td>
                                            {% } else { %}
                                            <td class="preview">
                                                {% if (file.thumbnail_url) { %}
                                                    <a href="<?php echo $baseUrl; ?>{%=file.url%}" title="{%=file.name%}"
                                                       download="{%=file.name%}" data-gallery>
                                                        <img width="100px" src="<?php echo $baseUrl; ?>{%=file.thumbnail_url%}">
                                                    </a>
                                                {% } %}
                                            </td>
                                            <td class="name">
                                                <a href="<?php echo $baseUrl; ?>{%=file.url%}" title="{%=file.name%}"
                                                   rel="{%=file.thumbnail_url&&'gallery'%}" download="{%=file.name%}">{%=file.name%}</a>
                                                <input type="hidden" id="fileUp" name="fileUp[]" value="<?php echo $baseUrl; ?>{%=file.url%}">
                                            </td>
                                            <td class="size">{%=o.formatFileSize(file.size)%}</td>
                                            <td colspan="2"></td>
                                            {% } %}
                                            <td class="delete">
                                                <button class="btn btn-danger"
                                                    onclick="return clickDelete('{%=file.delete_url%}');">
                                                    <i class="icon-trash icon-white"></i> {%=locale.fileupload.destroy%}
                                                </button>
                                                <input type="checkbox" name="delete" value="1">
                                            </td>

                                            <td class="add">
<!--                                                <button class="btn btn-success add-article" title="{%=file.name%}"-->
<!--                                                        data-type="PRIMARYIMAGE" data-url="{%=file.url%}">-->
<!--                                                    <i class="icon-plus icon-white"></i> Add-->
<!--                                                </button>-->

                                            </td>
                                        </tr>
                                        {% } %}
                                    </script>
                                    <script>
                                        function clickDelete(url)
                                        {
                                            $.post(url, {data:""},
                                                function (result) {
                                                }
                                            );
                                            return false;
                                        }
                                    </script>
                                </div>

                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>

        <section class="one column"></section>
        <div id="secondary" class="widget-area four columns" style="position: relative; float: right;">

            <?php $this->load->view("website/sidebar"); ?>

        </div>
        <!-- #secondary .widget-area -->
    </div>
    <!-- #primary -->
    </div>
    <!-- enf of .container -->
    </div><!-- end of wrapper -->

<?php $this->load->view("website/footer"); ?>