<?php session_start(); ?>
<?php include_once('inc/connection.php'); ?>
<?php include_once('inc/functions.php'); ?>
<?php include_once('Model/dbResults.php'); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <title>Add/Modify Results</title>
        <link rel="stylesheet" href="./style/style-header.css">
        <link rel="stylesheet" type="text/css" href="css/results.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>          
    </head>  
    <body>  

    <header>
    <div class="logger">Welcome <?php echo $_SESSION['first_name'] ?>! <a href="logout.php">Log Out</a></div>
    <div class="header">
            <div class="nts-text" style="margin:10px 10px 5px 10px">
                <div>
                    <a href="index.php">
                    <img class="logo" src="./img/logo-0.png" alt="logo">
                    </a>
                </div>
                <div style="flex-grow: 8">
                    <h1 class="nts-text1">NURSES TRAINING SCHOOL</h1>
                </div>

            </div>
        </div>
    </header>
       
        <div class="container">  
        <div class="dash"><span><a href="lecturer-db.php"><< Back to Dashboard</a></span> </div>
            <br />
   <div class="table-responsive">  
    <h1>Year <?php echo $year; ?></h1>
    <h1><?php echo $module; ?> Results <div class="change"><span><a href="go-to-results.php"> Change Module</a></span></div></h1>
    <form method="post" id="update_form">
                    <div align="left">
                        <input type="submit" name="multiple_update" id="multiple_update" class="btn btn-info" value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <th width="5%"></th>
                                <th width="20%">Index Number</th>
                                <th width="30%">First Name</th>
                                <th width="30%">Last Name</th>
                                <th width="15%"> Grade </th>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </form>
   </div>  
  </div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  

    var batch = '<?php echo $batch ?>';
    var module_code = '<?php echo $module_code ?>';
    
    function fetch_data()
    {
        $.ajax({
            url:"select_results.php"+"?batch="+batch+"&module_code="+module_code,
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
                url:"multiple_results_update.php?module_code="+module_code,
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
