<!--the page to upload a lot of report-->
<?php
include("./header.php");


if (empty($_SESSION['login'])) {
    header('Location: ../pages/index.php');
}
?>
<div class="container theme-showcase" role="main">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3>Upload multiple</h3>
        </div>
        <div id="success-files" class="alert alert-success fade in" style="display:none;opacity:0;margin: auto; width: 80%; margin-top: 10px;">

        </div>

        <div id="error-files" class="panel panel-danger" style="display:none;opacity:0;margin: auto; width: 80%; margin-top: 10px;">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body"></div>
        </div>

        <div id="actions" class="row">

            <p class="text-info" style="margin:10px;">Vous pouvez glisser-déposer les rapports sur cette fenêtre.
                Seuls les fichiers PDF sont acceptés.</p>
            <div class="col-lg-7">
                <!-- The fileinput-button span is used to style the file input field as button -->
                <span class="btn btn-success fileinput-button">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add files...</span>
                </span>
                <button type="submit" class="btn btn-primary start">
                    <i class="glyphicon glyphicon-upload"></i>
                    <span>Start upload</span>
                </button>
                <button type="reset" class="btn btn-warning cancel">
                    <i class="glyphicon glyphicon-ban-circle"></i>
                    <span>Cancel upload</span>
                </button>
            </div>

            <div class="col-lg-5">
                <!-- The global file processing state -->
                <span class="fileupload-process">
                    <div id="total-progress" class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress id="progbar"></div>
                    </div>
                </span>
            </div>

        </div>

        <div class="table table-striped" class="files" id="previews">

            <div id="template" class="file-row">
                <!-- This is used as the file preview template -->
                <!--                <div>
                                    <span class="preview"><img data-dz-thumbnail /></span>
                                </div>-->
                <div class="dropName">
                    <p class="name" data-dz-name></p>
                    <strong class="error text-danger" data-dz-errormessage></strong>
                </div>
                <div  class="dropBar">
                    <p class="size" data-dz-size></p>
                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                        <div class="progress-bar progress-bar-success" style="width:0%;" data-dz-uploadprogress></div>
                    </div>
                </div>
                <div>
                    <button class="btn btn-primary start">
                        <i class="glyphicon glyphicon-upload"></i>
                        <span>Start</span>
                    </button>
                    <button data-dz-remove class="btn btn-warning cancel">
                        <i class="glyphicon glyphicon-ban-circle"></i>
                        <span>Cancel</span>
                    </button>
                    <button data-dz-remove class="btn btn-danger delete">
                        <i class="glyphicon glyphicon-trash"></i>
                        <span>Delete</span>
                    </button>
                </div>
            </div>

        </div>

        <script type="text/javascript" src="../javascript/multiUpload.js"></script>


    </div>
</div>
 
<?php
include("./footer.php");
?>