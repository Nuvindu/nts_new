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
	
const hamburger = document.querySelector('.header .nav-bar .nav-list .hamburger');
const mobile_menu = document.querySelector('.header .nav-bar .nav-list ul');
const menu_item = document.querySelectorAll('.header .nav-bar .nav-list ul li a');
// const header = document.querySelector('.header.container');
hamburger.addEventListener('click', () => {
    hamburger.classList.toggle('active');
    mobile_menu.classList.toggle('active');
});
