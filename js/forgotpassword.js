$(function(){
	$("#verify").hide();  //hide the verification input when the page loads
});

$(document).ready(function(){
	$(".verifybtn").click(function(event){
		event.preventDefault();
		$(".progress").show();
		$("#sendindex").hide();
		setTimeout(function() { 
			$(".verify").show();
			$(".progress").hide();

    	}, 2000);

		var formData = $('#subform').serialize();
		$.post(                
			"forgotpassword.php",
			formData,
			function(data,status){
				$("#test").html(data);
			}

		); //send the index to the db file using post method
	});
});

$(document).ready(function(){
	$(".enterbtn").click(function(event){
		event.preventDefault();
		var enterData = $('#verifyform').serialize();
		$.post(
			"forgotpassword.php",
			enterData,
			function(data,status){
				$("#test1").html(data);
			}

		); //send the verify code to the db file using post method
	});
});

// $(document).ready(function()  {
// 	$("#verifycode").keyup(function(){
// 		var id = $("#verifycode").val();
// 	// $("#test").html(id);
// 	$.post("Service/forgotpw-service.php",{index : id},function(data, status){$("#test").html(id);
// 		});
// 	});
// });
	
