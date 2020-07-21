<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php
if (!isset($_SESSION['index_no'])) {
    header('Location: login.php');
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/module.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="./style/style-header.css">
    <script src="./js/jquery-3.3.1.js"></script>
</head>

<body>
    <div class="logger" style="
    text-align: end;
">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span> </div>

    <!-- sidebar -->
    <div class="side-bar" onmouseover="resizeInfoAreaUp()" onmouseout="resizeInfoAreaDown()">
        <span style="
                                    text-align: center;
                                    margin: 0;
                                    height: 50px;
                                    align-items: center;
                                    display: flex;
                                    justify-content: center;
                                    /* padding-left: 11px; */
                                "><i class="fas fa-align-justify" aria-hidden="true" style="
                    padding-left: 17px;
                "></i></span>
        <ul>

            <li><a href=<?php if (strlen($_SESSION['index_no']) == 4) {
                            echo "lecturer.php";
                        } else if (strlen($_SESSION['index_no']) == 6) {
                            echo "student.php";
                        } ?>><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="student-profile.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="exams.php"><i class="fas fa-project-diagram"></i>Exams</a></li>
            <li><a href="view-results.php"><i class="fas fa-address-card"></i>Results</a></li>
            <li><a href="#"><i class="fas fa-blog"></i>Blogs</a></li>
            <li><a href="#"><i class="fas fa-map-pin"></i>Student Details</a></li>
        </ul>
    </div>
    <!-- header -->
    <div class="header" style='overflow-wrap: anywhere;
'>
        <div class="nts-text" style="margin:10px 10px 5px 10px">
            <div>
                <a href="index.php"><img class="logo" src="./img/logo-0.png" alt="logo"></a>
            </div>
            <div style="flex-grow: 8">
                <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
            </div>
            <div>
                <a href="index.php"><img class="logo profile-pic" src="" alt="logo" id="profile-pic"
                        style="border-radius: 100px;"></a>
            </div>

        </div>
    </div>

    <div class="card" id="info-area">
        <!-- module description -->
        <h3 id="name"><?php
                        $url_components = parse_url($_SERVER['REQUEST_URI']);

                        // Use parse_str() function to parse the 
                        // string passed via URL 
                        parse_str($url_components['query'], $params);

                        // Display result 
                        echo $params['moduleName'] ?>
        </h3>
        <p style="margin: 20px;border: 1px solid;padding: 15px;border-radius: 15px;">
            <?php if (isset($_SESSION[$params['moduleName']])) {
                echo $_SESSION[$params['moduleName']];
            } else {
                header('Location: login.php');
            } ?></p>


        <table id="file-table" style="width: 85%;">
            <tr>
                <th>Module materials</th>
                <?php
                if (strlen($_SESSION['index_no']) == 4) echo " <th>Lecturer Privileges</th>"
                ?>

            </tr>
        </table>

        <!-- confirmation modal for deletefile -->
        <div id="id01" class="confirm-modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close-confirm-modal"
                title="Close Modal">×</span>
            <form class="confirm-modal-content" action="/action_page.php">
                <div class="container">
                    <h1>Delete File</h1>
                    <p>Are you sure you want to delete your File?</p>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'"
                            class="cancelbtn">No</button>
                        <button type="button" id="confirm-delete" class="deletebtn">Yes</button>
                    </div>
                </div>
            </form>
        </div>



        <!-- Trigger/Open The Modal -->
        <?php
        if (strlen($_SESSION['index_no']) == 4) echo "<button onclick='topFunction()' id='Upload'>Upload File</button>"
        ?>


        <!-- file upload modal -->
        <!-- The Modal -->
        <div id="fileUploadModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Upload file (.pdf/.docx/.pptx)</h2>
                </div>
                <div class="modal-body">
                    <div id="label" style="
    /* margin-top: 36px; */
    text-align: center;
    line-height: 85px;
">
                        Select file:
                    </div>
                    <div id="input-field" style="
    /* margin-top: 36px; */
    text-align: center;
    line-height: 85px;
">
                        <input type="file" name="input-file" id="input-file"
                            accept=".doc,.docx,.pdf,.pptx,.txt,.rtf,.wpd" required>
                    </div>
                    <div id="No_file">
                        Input has no file
                    </div>
                    <div id="wait">
                        <img src="./img/tenor.gif" alt="" style="
    height: 80px;
    width: 80px;
    /* padding: 40px; */
">
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="save-file">Save</button><span id="uploadStatus">File upload complete</span>
                </div>
            </div>

        </div>


        <!-- file replace modal -->
        <!-- The Modal -->
        <div id="fileUpdateModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close">&times;</span>
                    <h2>Update file (.pdf/.docx/.pptx)</h2>
                </div>
                <div class="modal-body">
                    <div id="label" style="
    /* margin-top: 36px; */
    text-align: center;
    line-height: 85px;
">
                        Select file:
                    </div>
                    <div id="input-field" style="
    /* margin-top: 36px; */
    text-align: center;
    line-height: 85px;
">
                        <input type="file" name="input-file-edit" id="input-file-edit"
                            accept=".doc,.docx,.pdf,.pptx,.txt,.rtf,.wpd" required>
                    </div>
                    <div id="No_file-edit">
                        Input has no file
                    </div>
                    <div id="wait-edit">
                        <img src="./img/tenor.gif" alt="" style="
    height: 80px;
    width: 80px;
    /* padding: 40px; */
">
                    </div>
                </div>

                <div class="modal-footer">
                    <button id="update-file">Update</button><span id="uploadStatus">File upload complete</span>
                </div>
            </div>

        </div>
    </div>
    <footer style="
    margin-left: 80px;
   margin-right: 17px;
" id="footer">
        <div class="column clearfix">
            <h3>Contact Us</h3>
            <ul>
                <div class="icon1"><img src="img/location.ico" width="22" height="22"></div>
                <li>Nurses Training School, Mahamodara, Galle, Sri Lanka</li>
                <div class="icon1"><img src="img/at.ico" width="20" height="20"></div>
                <li>Email - nts-galle@gov.lk</li>
                <div class="icon1"><img src="img/tele.ico" width="20" height="20"></div>
                <li>Telephone Number - 0912234452</li>
            </ul>
        </div>
    </footer>
    </div>
    <script src="./js/js-modulepage-modals.js"></script>
    <script src="./js/js-modulepage-upload&retrievefile.js"></script>
    <script src="./js/js-modulepage-editfile.js"></script>
    <script src="./js/js-modulepage-deletefile.js"></script>
    <script>
    $(document).ready(function() {
        $.ajax({
            type: 'POST',
            url: '/nts/dbOperations/db_load_profilePicture.php',
            data: {
                // send this variable to server to identify user to database manipulate
                UserSessionName: document.getElementById('index-no').textContent
            },
            dataType: 'JSON',
            success: function(data) {
                var profPicDir = data[0];
                if (profPicDir == '') {
                    // $('img').attr('src', './img/empty-pp.png');
                    document.getElementById('profile-pic').setAttribute('src',
                        './img/empty-pp.png');
                } else {

                    document.getElementById('profile-pic').setAttribute('src',
                        './profile-pictures/' + profPicDir);

                }
            }
        });


    })
    </script>
    <script>
    function resizeInfoAreaUp() {
        console.log('hi');
        document.getElementById('info-area').style.marginLeft = '180px';
        document.getElementById('footer').style.marginLeft = '180px';
    }

    function resizeInfoAreaDown() {
        document.getElementById('info-area').style.marginLeft = '70px';
        document.getElementById('footer').style.marginLeft = '80px';
    }
    </script>
</body>

</html>