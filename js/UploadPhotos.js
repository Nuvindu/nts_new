$(document).ready(function () {

    $('#btn').click(function () {
        var name = $('#name').val();
        var description = $('#description').val();
        var folder_name = $('#folder_name').val();
        var clicks = $('#clicks').val();
        var files = $('input[type=file]')[0].files;
        var image = $('input[type=file]')[0].files[0].name;
        // if
        if (name == "") {
            alert('name required')
            return
        } else if (description == "") {
            alert('discription required')
            return
        } else if (files.length == 0) {
            alert('Insert Image Files');
            return
        }
        $.ajax({
            type: 'POST',
            url: 'Model/db_database_upload.php',
            data: {
                name: name,
                description: description,
                folder_name: folder_name,
                clicks: clicks,
                image: image
            },
            dataType: 'JSON',
            success: function (data) {
                console.log(data)

                if (data['nameExist']) {
                    alert('An album already exist by this name.Try different name');
                } else {
                    console.log('submitting');
                    $('input[type=file]').simpleUpload(`Model/db_photo_upload.php?dir=${name}`, {

                        /*
                         * Each of these callbacks are executed for each file.
                         * To add callbacks that are executed only once, see init() and finish().
                         *
                         * "this" is an object that can carry data between callbacks for each file.
                         * Data related to the upload is stored in this.upload.
                         */

                        start: function (file) {
                            //upload started

                            this.block = $('<div class="block"></div>');
                            this.progressBar = $('<div class="progressBar"></div>');
                            this.block.append(this.progressBar);

                            $('#uploads').append(this.block);

                        },

                        progress: function (progress) {
                            //received progress
                            this.progressBar.width(progress + "%");
                        },

                        success: function (DATA) {
                            //upload successful

                            // this.progressBar.remove();

                            /*
                             * Just because the success callback is called doesn't mean your
                             * application logic was successful, so check application success.
                             *
                             * Data as returned by the server on...
                             * success:	{"success":true,"format":"..."}
                             * error:	{"success":false,"error":{"code":1,"message":"..."}}
                             */

                            var d = JSON.parse(DATA)

                            if (d.success) {
                                //now fill the block with the format of the uploaded file
                                var format = d.format;
                                var formatDiv = $('<div class="format"></div>').text(d.url);
                                this.block.append(formatDiv);
                            } else {
                                console.log(d.success)

                                //our application returned an error
                                var error = data.error.message;
                                var errorDiv = $('<div class="error"></div>').text(error);
                                this.block.append(errorDiv);
                            }

                        },

                        error: function (error) {
                            //upload failed
                            this.progressBar.remove();
                            var error = error.message;
                            var errorDiv = $('<div class="error"></div>').text(error);
                            this.block.append(errorDiv);
                        }

                    });
                }
            }
        });

    });

});