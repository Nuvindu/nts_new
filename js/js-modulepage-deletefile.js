function DeleteFile(fileId) {
    var Name = document.getElementById("name").textContent;

    var FileName = document.getElementById(fileId).textContent;

    document.getElementById('id01').style.display = 'block'

    $("#confirm-delete").click(function () {
        $.ajax({
            type: 'POST',
            url: '/nts_new/Model/db_delete_file.php',
            data: {
                Name: Name,
                fileName: FileName
            },
            success: function (data) {
                document.getElementById(fileId.substring(4)).remove();
                document.getElementById('id01').style.display = 'none';

            }
        });
    })

}