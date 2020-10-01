<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/xl.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <title>Results Upload</title>
</head>

<body>
    <div class="header">
        <?php include_once('header.php'); ?>
    </div>
    <div class="form">
        <div class="input-field">
            <input type="file" name="input-file" id="input-file"
                accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>
            <button id="save-file">Save</button>
        </div>
        <span id="uploadStatus">
            <div class="progressbar"></div>
        </span>
        <span class="import-status-uploading" id="import-status-uploading">
        </span>
    </div>
    </div>
    </div>
</body>
<script src="./js/upload.js"></script>

</html>