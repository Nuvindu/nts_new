<?php session_start(); ?>
<?php require_once('Service/operator-service.php'); ?>

<?php require_once('Model/multiple_update.php'); ?>
<html>  
    <head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Student Year</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="./style/style-header.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
          
    </head>  
    <body style="background-color:rgb(218, 213, 213);">  
    <header>
            <div class="logger" style="padding-top: 5px;float: right;">Welcome <?php echo $_SESSION['first_name'] ?>!&nbsp <a
            href="Service/logout.php">Log Out</a> </div>  
    </header>
    <br>
    <br>
    <div class="header">
            <?php include_once('header.php'); ?>
    </div>
        <div class="container" >  
            <br />
   <div class="table-responsive">  
    <h3 align="center" style="font-weight: bold;margin-right: 110px;">Update Student Year</h3><br />
    <div class="add" style="float:right"><a href="operator.php" style="color:black;"><i class="fas fa-angle-double-left fa-2x"></i></a> </br></div>
    <form method="post" id="update_form">
                    <div align="left" > 
                        <input type="submit" style="background-color:black;" name="multiple_update" id="multiple_update" class="btn btn-info"  value="Multiple Update" />
                    </div>
                    <br />
                    <div class="table-responsive" >
                        <table class="table table-bordered table-striped">
                            <thead style="background-color:rgb(133, 128, 128);">
                                <th width="5%">Select</th>
                                
                                <th width="30%">Index_no</th>
                                <th width="20%">Year</th>
                                
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
    
    function fetch_data()
    {
        $.ajax({
            url:"/nts_new/Model/select.php",
            method:"POST",
            dataType:"json",
            success:function(data)
            {
                var html = '';
                for(var count = 0; count < data.length; count++)
                {
                    html += '<tr>';
                    html += '<td><input type="checkbox" id="'+data[count].index_no+'" data-index_no="'+data[count].index_no+'" data-year="'+data[count].year+'" class="check_box"  /></td>';
                    html += '<td>'+data[count].index_no+'</td>';
                    html += '<td>'+data[count].year+'</td></tr>';
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
            html = '<td><input type="checkbox" id="'+$(this).attr('index_no')+'" data-index_no="'+$(this).data('index_no')+'" data-year="'+$(this).data('year')+'"  class="check_box" checked /></td>';
            html += '<td><input type="text" name="index_no[]" class="form-control" value="'+$(this).data("index_no")+'" /></td>';
            
            html += '<td><select name="year[]" id="year_'+$(this).attr('index_no')+'" class="form-control"><option value="01">01</option><option value="02">02</option><option value="03">03</option></select><input type="hidden" name="hidden_id[]" value="'+$(this).attr('index_no')+'" /></td>';
        }
        else
        {
            html = '<td><input type="checkbox" id="'+$(this).attr('index_no')+'" data-index_no="'+$(this).data('index_no')+'" data-year="'+$(this).data('year')+'"   class="check_box" /></td>';
            html += '<td>'+$(this).data('index_no')+'</td>';
            
            html += '<td>'+$(this).data('year')+'</td>';            
        }
        $(this).closest('tr').html(html);
        $('#year_'+$(this).attr('index_no')+'').val($(this).data('year'));
    });

    $('#update_form').on('submit', function(event){
        event.preventDefault();
        if($('.check_box:checked').length > 0)
        {
            $.ajax({
                url:"/nts_new/Model/multiple_update.php",
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
