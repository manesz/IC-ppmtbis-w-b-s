<?php $this->load->view("website/header"); ?>
<?php $this->load->view("website/functions"); ?>

<?php $this->load->view("website/header-content"); ?>

<?php

//$this->load->view("website/title");
$baseUrl = base_url();
$jqueryUpload = $baseUrl . "assets/plugin/jquery-upload/";
?>

    <!-- Bootstrap CSS Toolkit styles -->
    <link rel="stylesheet" href="<?php echo $jqueryUpload; ?>css/bootstrap.min.css">
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
                                <form method="post" action="#" class="validateform" id="frm-apply-job">
                                    <input type="hidden" value="true" name="applyJob" id="applyJob">
                                    <div>
                                        Message: <textarea></textarea>
                                    </div>
                                    <span class="btn btn-success fileinput-button">
                                        <i class="icon-plus icon-white"></i>
                                        <span>Add files...</span>
                                        <!-- The file input field used as target for the file upload widget -->
                                        <input id="fileupload" type="file" name="files[]" multiple>
                                    </span>
                                    <!-- The global progress bar -->
                                    <div id="progress" class="progress progress-success progress-striped">
                                        <div class="bar"></div>
                                    </div>
                                    <!-- The container for the uploaded files -->
                                    <div id="files" class="files"></div>

                                    <div>
                                        <input value="Send" type="button">
                                    </div>
                                </form>
                                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
                                <!-- The jQuery UI widget factory, can be omitted if jQuery UI is already included -->
                                <script src="<?php echo $jqueryUpload; ?>js/vendor/jquery.ui.widget.js"></script>
                                <!-- The Load Image plugin is included for the preview images and image resizing functionality -->
                                <script src="<?php echo $jqueryUpload; ?>js/load-image.min.js"></script>
                                <!-- The Canvas to Blob plugin is included for image resizing functionality -->
                                <script src="<?php echo $jqueryUpload; ?>js/canvas-to-blob.min.js"></script>
                                <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
                                <script src="<?php echo $jqueryUpload; ?>js/jquery.iframe-transport.js"></script>
                                <!-- The basic File Upload plugin -->
                                <script src="<?php echo $jqueryUpload; ?>js/jquery.fileupload.js"></script>
                                <!-- The File Upload processing plugin -->
                                <script src="<?php echo $jqueryUpload; ?>js/jquery.fileupload-process.js"></script>
                                <!-- The File Upload image preview & resize plugin -->
                                <script src="<?php echo $jqueryUpload; ?>s/jquery.fileupload-image.js"></script>
                                <!-- The File Upload audio preview plugin -->
                                <script src="<?php echo $jqueryUpload; ?>js/jquery.fileupload-audio.js"></script>
                                <!-- The File Upload video preview plugin -->
                                <script src="<?php echo $jqueryUpload; ?>js/jquery.fileupload-video.js"></script>
                                <!-- The File Upload validation plugin -->
                                <script src="<?php echo $jqueryUpload; ?>js/jquery.fileupload-validate.js"></script>
                                <script>
                                    /*jslint unparam: true, regexp: true */
                                    /*global window, $ */
                                    $(function () {
                                        'use strict';
                                        // Change this to the location of your server-side upload handler:
                                        var url = window.location.hostname === 'blueimp.github.io' ?
                                                '//jquery-file-upload.appspot.com/' : 'server/php/',
                                            uploadButton = $('<button/>')
                                                .addClass('btn')
                                                .prop('disabled', true)
                                                .text('Processing...')
                                                .on('click', function () {
                                                    var $this = $(this),
                                                        data = $this.data();
                                                    $this
                                                        .off('click')
                                                        .text('Abort')
                                                        .on('click', function () {
                                                            $this.remove();
                                                            data.abort();
                                                        });
                                                    data.submit().always(function () {
                                                        $this.remove();
                                                    });
                                                });
                                        $('#fileupload').fileupload({
                                            url: url,
                                            dataType: 'json',
                                            autoUpload: false,
                                            //acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
                                            acceptFileTypes: /(\.|\/)(txt|pdf|doc|docx)$/i,
                                            //maxFileSize: 5000000, // 5 MB
                                            maxFileSize: 3000000, // 3 MB
                                            // Enable image resizing, except for Android and Opera,
                                            // which actually support image resizing, but fail to
                                            // send Blob objects via XHR requests:
                                            disableImageResize: /Android(?!.*Chrome)|Opera/
                                                .test(window.navigator.userAgent),
                                            previewMaxWidth: 100,
                                            previewMaxHeight: 100,
                                            previewCrop: true
                                        }).on('fileuploadadd',function (e, data) {
                                                data.context = $('<div/>').appendTo('#files');
                                                $.each(data.files, function (index, file) {
                                                    var node = $('<p/>')
                                                        .append($('<span/>').text(file.name));
                                                    if (!index) {
                                                        node
                                                            .append('<br>')
                                                            .append(uploadButton.clone(true).data(data));
                                                    }
                                                    node.appendTo(data.context);
                                                });
                                            }).on('fileuploadprocessalways',function (e, data) {
                                                var index = data.index,
                                                    file = data.files[index],
                                                    node = $(data.context.children()[index]);
                                                if (file.preview) {
                                                    node
                                                        .prepend('<br>')
                                                        .prepend(file.preview);
                                                }
                                                if (file.error) {
                                                    node
                                                        .append('<br>')
                                                        .append(file.error);
                                                }
                                                if (index + 1 === data.files.length) {
                                                    data.context.find('button')
                                                        .text('Upload')
                                                        .prop('disabled', !!data.files.error);
                                                }
                                            }).on('fileuploadprogressall',function (e, data) {
                                                var progress = parseInt(data.loaded / data.total * 100, 10);
                                                $('#progress .bar').css(
                                                    'width',
                                                    progress + '%'
                                                );
                                            }).on('fileuploaddone',function (e, data) {
                                                $.each(data.result.files, function (index, file) {
                                                    var link = $('<a>')
                                                        .attr('target', '_blank')
                                                        .prop('href', file.url);
                                                    $(data.context.children()[index])
                                                        .wrap(link);
                                                });
                                            }).on('fileuploadfail',function (e, data) {
                                                $.each(data.result.files, function (index, file) {
                                                    var error = $('<span/>').text(file.error);
                                                    $(data.context.children()[index])
                                                        .append('<br>')
                                                        .append(error);
                                                });
                                            }).prop('disabled', !$.support.fileInput)
                                            .parent().addClass($.support.fileInput ? undefined : 'disabled');
                                    });
                                </script>

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