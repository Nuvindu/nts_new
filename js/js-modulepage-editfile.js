function EditFile(fileId) {

    var Name = document.getElementById("name").textContent;

    var FileName = document.getElementById(fileId).textContent;

    // Get the modal
    var modal = document.getElementById("fileUpdateModal");
    // Get the button that opens the modal
    // var btn = btn;
    // console.log(btn);

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[1];

    // When the user clicks the button, open the modal 
    modal.style.display = "block";


    // When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function (event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }



    $('#update-file').click(function () {
        if ($("#input-file-edit").get(0).files.length === 0) {
            $("#No_file-edit").css("display", "block");
        } else {
            $("#No_file-edit").css("display", "none");
            var date = new Date();

            // event.preventDefault();

            var fd = new FormData();
            var docTypeFile = $("#input-file-edit")[0].files[0];
            var d = String(date.getFullYear()) + '-' + String(date.getMonth() + 1) + '-' + String(date.getDate());
            console.log(d);

            fd.append("docTypeFile", docTypeFile);
            fd.append('moduleName', Name);
            fd.append('date', d);
            fd.append("oldFileName", FileName);
            console.log(FileName);
            $(document).ajaxStart(function () {
                $("#wait-edit").css("display", "block");
            });
            $(document).ajaxComplete(function () {
                $("#wait-edit").css("display", "none");
            });

            $.ajax({
                type: 'POST',
                url: '/nts_new/Model/db_update_file.php',
                data: fd,
                processData: false,
                contentType: false,
                success: function (data) {
                    console.log(docTypeFile.name);
                    document.getElementById(fileId).href = 'data/' + Name + "/" + (docTypeFile.name);
                    var textnode = document.createTextNode(docTypeFile.name);
                    var item = document.getElementById(fileId).childNodes[0];
                    item.replaceChild(textnode, item.childNodes[0]);


                }
            });
        }
    });

}