            // Get the template HTML and remove it from the doument
            var previewNode = document.querySelector("#template");
            previewNode.id = "";
            var previewTemplate = previewNode.parentNode.innerHTML;
            previewNode.parentNode.removeChild(previewNode);

            var myDropzone = new Dropzone(document.body, {// Make the whole body a dropzone
                url: "../php/multiUploadManager.php", // Set the url
                parallelUploads: 1,
                previewTemplate: previewTemplate,
                createImageThumbnails: false,
                acceptedFiles: ".pdf",
                maxFilesize: 128,
                paramName: "file",
                autoQueue: false, // Make sure the files aren't queued until manually added
                previewsContainer: "#previews", // Define the container to display the previews
                clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.

            });

            myDropzone.on("success", function (file, response) {
                file.serverId = response;
//                alert(response);
            });

            myDropzone.on("removedfile", function (file) {
//                alert(file.serverId);

//            $.ajax({
//                url: "../php/delete.php",
//                type: "POST",
//                data: {'id': file.serverId}
//            });   
                try
                {
                    var XhrObj = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e)
                {
                    var XhrObj = new XMLHttpRequest();
                }



                XhrObj.open("POST", "../php/deleteManager.php");
                XhrObj.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                XhrObj.send("id=" + file.serverId);


            });
            myDropzone.on("addedfile", function (file) {
                var parts = file.name.split(".");
                var ext = (parts[(parts.length - 1)]);
                if (ext.toLowerCase() !== "pdf")
                {
//                    alert();
                    this.removeFile(file);
                }
                else {
                    // Hookup the start button
                    file.previewElement.querySelector(".start").onclick = function () {
                        myDropzone.enqueueFile(file);

                    };
                }

            });

            // Update the total progress bar
            myDropzone.on("totaluploadprogress", function (progress) {
                var perc = (this.getFilesWithStatus(Dropzone.SUCCESS).length + progress * (this.getFilesWithStatus(Dropzone.QUEUED).length + 1) / 100
                        ) / (this.getFilesWithStatus(Dropzone.SUCCESS).length + this.getFilesWithStatus(Dropzone.QUEUED).length + 1);
                perc=+(perc*100).toFixed(2);
                document.querySelector("#total-progress .progress-bar").style.width = perc + "%";
                document.querySelector("#progbar").innerHTML = perc  + "%";
            });

            myDropzone.on("sending", function (file) {
                // Show the total progress bar when upload starts
                document.querySelector("#total-progress").style.opacity = "1";
                // And disable the start button
                file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
            });

            // Hide the total progress bar when nothing's uploading anymore
            myDropzone.on("queuecomplete", function (progress) {
                document.querySelector("#total-progress").style.opacity = "0";
                //alert(this.getFilesWithStatus(Dropzone.ERROR).length);
                var fileserror = this.getFilesWithStatus(Dropzone.ERROR);
                var filessuccess = this.getFilesWithStatus(Dropzone.SUCCESS);
                if (fileserror.length > 0)
                {
                    var list = "";
                    var arrayLength = fileserror.length;
                    for (var i = 0; i < arrayLength; i++) {

                        list += fileserror[i].name;
                        list += "<br/>";
                    }

                    document.querySelector("#error-files").style.display = "block";
                    document.querySelector("#error-files").style.opacity = "1";


                    var err = document.getElementById('error-files');
                    err.children[0].innerHTML = "<strong>" + fileserror.length + " erreur(s).</strong> Veuillez passer par la <a href='simpleUpload.php' target='_blank'>page d'uplaod simple </a>pour ces fichiers :";
                    err.children[1].innerHTML = list;
                }

                if (filessuccess.length > 0)
                {
                    document.querySelector("#success-files").style.display = "block";
                    document.querySelector("#success-files").style.opacity = "1";
                    document.getElementById('success-files').innerHTML = "<strong>" + filessuccess.length + " fichiers(s)</strong> envoyés avec succés.";

                }
            });

            // Setup the buttons for all transfers
            // The "add files" button doesn't need to be setup because the config
            // `clickable` has already been specified.
            document.querySelector("#actions .start").onclick = function () {
                myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
            };
            document.querySelector("#actions .cancel").onclick = function () {
                myDropzone.removeAllFiles(true);
            };

            window.onbeforeunload = function () {
                if(myDropzone.getFilesWithStatus(Dropzone.PROCESSING).length>0
                        ||myDropzone.getFilesWithStatus(Dropzone.QUEUED).length>0 )
                return 'Des fichiers sont en cours d\'envoie.';

            };