<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>upload album</title>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/simpleUpload.js"></script>
    <link rel="stylesheet" href="css/UploadPhotos.css">
    <script src="js/UploadPhotos.js"></script>


<body>
    <div>
        <div class="Input">
            Name of the Event (Max characters 15):<input type="text" name="name" id="name"
                oninput="document.getElementsByName('folder_name')[0].value = this.value" maxlength="15"
                placeholder="Max character count is 15" required>
            <br>
            Description (max characters 100):<input type="text" name="description" id="description" maxlength="100"
                placeholder="Max character count is 100" required>
            <br>
            Folder Name:<input type="text" name="folder_name" id="folder_name" disabled>
            <br>

            Clicks:<input type="text" name="clicks" id="clicks" value="0" disabled>
            <br>
            <input type="file" name="photos[]" accept="image/*" multiple>
            <button id='btn'>submit</button>

            <div id="uploads"></div>
        </div>
    </div>

</body>

</html>