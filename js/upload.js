$(document).ready(function () {
    $('#save-file').click(function (event) {
        var worker = new Worker('js/worker.js');
        $("#save-file").prop('disabled', true);
        if ($('#input-file').get(0).files.length === 0) { // $('#No_file').css('display', 'block');
            $("#save-file").prop('disabled', false);
        } else {
            event.preventDefault();

            var fd = new FormData();
            var docTypeFile = $('#input-file')[0].files[0];
            console.log(docTypeFile);

            fd.append('docTypeFile', docTypeFile);

            $.ajax({
                type: 'POST',
                url: 'reading.php',
                data: fd,
                processData: false,
                contentType: false,
                xhr: function () {
                    var xhr = new window.XMLHttpRequest();
                    // Handle progress
                    //Upload progress
                    //
                    xhr.upload.addEventListener('progress', function (evt) {
                        if (evt.lengthComputable) {
                            var percentComplete = evt.loaded / evt.total;
                            //Do something with upload progress
                            console.log(percentComplete);
                            $('.progressbar').width(percentComplete * 100 + '%');
                        }
                    }, false);

                    xhr.onreadystatechange = function () {
                        worker.postMessage(xhr.readyState);
                    };
                    worker.onmessage = function (e) {
                        if (e.data[0]) {
                            document.getElementById('import-status-uploading').classList.add('animated');
                            document.getElementById('import-status-uploading').innerHTML = 'result uploading to database.Don\'t close the browser';
                        } else {
                            document.getElementById('import-status-uploading').classList.remove('animated');
                            document.getElementById('import-status-uploading').innerHTML = 'uploaded';

                            $('.progressbar').width(0);
                            worker.terminate();
                        }
                    };

                    console.log(worker);
                    return xhr;

                },
                complete: function () {
                    console.log(worker);
                },
                success: function (data) {
                    $("#save-file").prop('disabled', false);
                }
            });
        }
    });
});