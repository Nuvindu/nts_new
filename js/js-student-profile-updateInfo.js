$(document).ready(function () {
	var UserSessionName = document.getElementById('id-html').innerHTML;
	$.ajax({
		type: 'POST',
		url: '/nts_new/Model/db_load_profileInfo.php',
		data: {
			// send this variable to server to identify user to database manipulate
			UserSessionName: UserSessionName
		},
		dataType: 'JSON',
		success: function (data) {
			// change name,NIC,email in html to updated info
			$('#name-html').html(data['first_name']);
			$('#NIC-html').html(data['NIC']);
			$('#email-html').html(data['email']);
			$('#id-html').html(UserSessionName);
			$('#name').attr('value', data['first_name']);
			$('#lname').attr('value', data['last_name']);
			$('#NIC').attr('value', data['NIC']);
			$('#email').attr('value', data['email']);
		}
	});
	// on click in save button in modal will update profile info in html and database
	$('#save').click(function () {
		$("#save").prop('disabled', true);
		var name = $('#name').val();
		var NIC = $('#NIC').val();
		var email = $('#email').val();
		var lname = $('#lname').val();
		var UserSessionName = document.getElementById('id-html').innerHTML;

		$.ajax({
			type: 'POST',
			url: '/nts_new/Model/db_update_profileInfo.php',
			data: {
				// data to send to server that to be updated
				name: name,
				email: email,
				NIC: NIC,
				lname: lname,
				UserSessionName: UserSessionName
			},
			success: function (data) {
				alert('Data updated');
				$.ajax({
					type: 'POST',
					url: '/nts_new/Model/db_load_profileInfo.php',
					data: {
						// send this variable to server to identify user to database manipulate
						UserSessionName: UserSessionName
					},
					dataType: 'JSON',
					success: function (data) {
						// change name,NIC,email in html to updated info
						console.log(data);
						$('#name-html').html(data['first_name']);
						$('#NIC-html').html(data['NIC']);
						$('#email-html').html(data['email']);
						$('#id-html').html(UserSessionName);
						$('#name').attr('value', data['first_name']);
						$('#NIC').attr('value', data['NIC']);
						$('#email').attr('value', data['email']);
						$("#save").prop('disabled', false);

					}
				});

				// if data update is success then vanish the modal of update info
				var modalInfo = document.getElementById('modal-Info');
				modalInfo.style.display = 'none';
			}
		});
	});
});