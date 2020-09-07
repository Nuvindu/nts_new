<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php include_once('Model/dbResults.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <title>Add/Modify Results</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="./style/style-header.css">
        <link rel="stylesheet" type="text/css" href="css/results.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>          
    </head>  
    <body>  

    <body>
<div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a href="Service/logout.php">Log
            Out</a><span id="index-no" style="display: none;"><?php echo $_SESSION['index_no']; ?></span>
    </div>

<div class="header">
        <?php include_once('header.php'); ?>
    </div>

    <!-- navbar -->
    <?php include_once('navbar.php'); ?>
	<div class="side-bar">
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
            <li><a href="Model/lecturer-db.php"><i class="fas fa-home"></i>Dashboard</a></li>
            <li><a href="notifications.php"><i id = "icon" class="far fa-bell"></i><span id="notify"></span>Notifications</a></li>
            <li><a href="profiles.php"><i class="fas fa-user"></i>Profile</a></li>
            <li><a href="add_exam_timetables.php"><i class="fas fa-table"></i>Exam Timetables</a></li>
            <li><a href="results_nav.php"><i class="fas fa-poll"></i>Results</a></li>
            <li><a href="feedback.php"><i class="fas fa-comment-dots"></i>Feedback</a></li>
        </ul>
    </div> <!-- side-bar -->
   <div class="table-responsive" style="padding-left:5%;">  
    <h1 >Year <?php echo $year; ?></h1>
    <h2 style="font-size:20px;"><?php echo $module; ?> Results <div class="change"><span><a href="go-to-results.php"> Change Module</a></span></div></h2>
    <form method="post" id="update_form">
                    <div align="left">
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info"  value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead style="background-color:rgb(133, 128, 128);">
                                <th width="5%"></th>
                                <th width="11%">Index_no</th>
                                <th width="30%">First Name</th>
                                <th width="30%">Last Name</th>
                                <th width="15%"> Grade </th>
                            </thead>
                            <tbody style="background-color:lightgray;"></tbody>
                        </table>
                    </div>
                </form>
   </div>  
  </div>
  <footer>
        <div class="column clearfix" style="padding-top:10%;">
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
    <script src="./js/js-notify-counter.js"></script>
    </body>  
</html>  
<script>  
$(document).ready(function(){  

    var batch = '<?php echo $batch ?>';
    var module_code = '<?php echo $module_code ?>';
    
    function fetch_data()
    {
        $.ajax({
            url:"/nts_new/Model/select_results.php"+"?batch="+batch+"&module_code="+module_code,
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html='';
                for(var count = 0; count < data.length; count++)
                {
                    var details = data[count];
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+details['index_no']+'" data-index_no="'+details['index_no']+'" data-first_name="'+details['first_name']+'" data-last_name="'+details['last_name']+'" data-grade="'+details[module_code] +'" class="check_box"  /></td>';
                    html += '<td>'+details['index_no']+'</td>';
                    html += '<td>'+details['first_name']+'</td>';
                    html += '<td>'+details['last_name']+'</td>';
                    html += '<td>'+details[module_code]+'</td></tr>';
                }
                $('tbody').html(html);
            }
        });
    }

    fetch_data();

    $(document).on('click', '.check_box', function(){
        var html = '';
        if(this.checked)
        {
            console.log($(this).data);
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-index_no="'+$(this).data('index_no')+'" data-first_name="'+$(this).data('first_name')+'" data-last_name="'+$(this).data('last_name')+'" data-grade="'+$(this).data('grade')+'"  class="check_box" checked /></td>';
            html += '<td><input type="text" name="index_no[]" class="form-control" value="'+$(this).data("index_no")+'" /></td>';
            html += '<td><input type="text" name="first_name[]" class="form-control" value="'+$(this).data("first_name")+'" /></td>';
            html += '<td><input type="text" name="last_name[]" class="form-control" value="'+$(this).data("last_name")+'" /></td>';
            html += '<td><select name="grade[]" id="grade_'+$(this).attr('id')+'" class="form-control"><option value="A">A</option><option value="B">B</option><option value="C">C</option><option value="D">D</option><option value="W">W</option></select><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
            //html += '<td><input type="text" name="grade[]" class="form-control" value="'+$(this).data("grade")+'" /><input type="hidden" name="hidden_id[]" value="'+$(this).attr('id')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('id')+'" data-index_no="'+$(this).data('index_no')+'" data-first_name="'+$(this).data('first_name')+'" data-last_name="'+$(this).data('last_name')+'" data-grade="'+$(this).data("grade")+'"  class="check_box" /></td>';
            html += '<td>'+$(this).data('index_no')+'</td>';
            html += '<td>'+$(this).data('first_name')+'</td>';
            html += '<td>'+$(this).data('last_name')+'</td>';
            html += '<td>'+$(this).data('grade')+'</td>';        
        }
        $(this).closest('tr').html(html);
        $('#grade_'+$(this).attr('id')+'').val($(this).data('grade'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"/nts_new/Model/multiple_results_update.php?module_code="+module_code,
                method:"POST",
                data:$(this).serialize(),
                success:function()
                {
                    alert('Data Updated');
                    fetch_data();
                }
            })
        }
    });

});  
</script>
