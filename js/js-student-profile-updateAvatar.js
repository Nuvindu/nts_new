// iterator design pattern
var Iterator = function (items) {
	this.index = 0;
	this.items = items;
};

Iterator.prototype = {
	first: function () {
		this.reset();
		return this.next();
	},
	next: function () {
		return this.items[this.index++];
	},
	hasNext: function () {
		return this.index < this.items.length;
	},
	reset: function () {
		this.index = 0;
	},
	each: function (callback) {
		for (var item = this.first(); this.hasNext(); item = this.next()) {
			callback(item);
		}
	}
};

function Iterate(Iterator, Src, FileDir) {
	while (Iterator.hasNext()) {
		Iterator.next().setAttribute(Src, FileDir);
		// 		console.log(Iterator.next(),FileDir);
	}
}

// manipulating profile picture
$(document).ready(function () {
	var UserSessionName = document.getElementById('id-html').innerHTML;
	var profilePicElements = document.getElementsByClassName('profile-pic');
	var itr = new Iterator(profilePicElements);
	// after loading html page update profile picture
	$.ajax({
		type: 'POST',
		url: '/nts_new/Model/db_load_profilePicture.php',
		data: {
			// send this variable to server to identify user to database manipulate
			UserSessionName: UserSessionName
		},
		dataType: 'JSON',
		success: function (data) {
			var profPicDir = data[0];
			if (profPicDir == '') {
				Iterate(itr, 'src', './img/empty-pp.png');
				// document.getElementsByClassName('profile-img').setAttribute('src', './img/empty-pp.png');
				// $('img').attr('src', './img/empty-pp.png');
			} else {
				Iterate(itr, 'src', './profile-pictures/' + profPicDir);

				// document.getElementsByClassName('profile-img').setAttribute('src', './profile-pictures/' + profPicDir);
				// $('img').attr('src', './profile-pictures/' + profPicDir);
			}
			sessionStorage.setItem('ProfilePictureDir', profPicDir);
		}
	});

	// after press save button in profile-picture area picture send to the database
	$('#save-img').click(function (e) {
		e.preventDefault(); //this prevent reloading web page when submitting form.It's prevent default function of event(submit)
		var fd = new FormData();
		var imageFile = $('#image-file')[0].files[0];
		var UserSessionName = document.getElementById('id-html').innerHTML;
		fd.append('imageFile', imageFile);
		fd.append('UserSessionName', UserSessionName);
		$('#save-img').prop('disabled', true);

		$.ajax({
			type: 'POST',
			url: '/nts_new/Model/db_update_profilePicture.php',
			data: fd,
			processData: false,
			contentType: false,

			success: function (data) {
				location.reload(true);
			},
			error: function (error) {
				alert(error);
			}
		});
	});
});