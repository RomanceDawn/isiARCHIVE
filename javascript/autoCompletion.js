            var form = document.getElementById('file-form');
            var fileSelect = document.getElementById('file');
            var uploadButton = document.getElementById('auto');

            uploadButton.onclick = function (event) {
                var files = fileSelect.files;
                if (files.length === 0)
                {
                    alert("Aucune fichier selectionner");
                    return;
                }
                uploadButton.innerHTML = '<span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Patientez...';
                event.preventDefault();

                var formData = new FormData();
                for (var i = 0; i < files.length; i++) {
                    var file = files[i];
                    formData.append('file', file, file.name);
                }
                try
                {
                    var xhr = new ActiveXObject("Microsoft.XMLHTTP");
                }
                catch (e)
                {
                    var xhr = new XMLHttpRequest();
                }

                // Update button text.

                xhr.open('POST', '../php/autoCompletionManager.php', true);
                xhr.onload = function () {
                    if (xhr.status === 200) {
                        //document.getElementById('centre').innerHTML = xhr.responseText;
                        var obj = JSON.parse(xhr.responseText);
                        var titre = document.getElementById('titre');
                        var auteur = document.getElementById('auteur');
                        var date = document.getElementById('date');
                        var motscles = document.getElementById('motscles');
                        var sujet = document.getElementById('sujet');
                        var texte = document.getElementById('texte');
                        titre.value = obj.titre;
                        auteur.value = obj.auteur;
                        date.value = obj.date;
                        motscles.value = obj.mots_clefs;
                        sujet.value = obj.sujet;
                        texte.value = obj.texte;

                    } else {
                        alert('Une erreur est survenue.\n Auto-complétion impossible.');
                        uploadButton.setAttribute("disabled", true);
                        uploadButton.className += " btn-danger"
                    }

                    uploadButton.innerHTML = 'Auto-Complétion';
                };
                xhr.send(formData);
                // The rest of the code will go here...

            }
