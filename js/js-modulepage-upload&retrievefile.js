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
		return this.index < Object.keys(this.items).length;
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

function Iterate(Iterator, Name, fileCounter, index) {      //iterator design pattern
	while (Iterator.hasNext()) {
		var docTypeFile = Iterator.next();

		if (index.length == 4) {
			var ElementRow =
				"<tr id='" +
				String(fileCounter) +
				"'" +
				"><td><a id ='file" +
				String(fileCounter) +
				"'" +
				"href= 'data" +
				'/' +
				docTypeFile['fileUrl'] +
				"'><h1 id = ''>" +
				docTypeFile['fileUrl'] +
				"</h1></a></td><td><button class='edit-file' id='edit-file" +
				String(fileCounter) +
				"'" +
				" onClick=EditFile('file" +
				String(fileCounter) +
				"'" +
				")><img src='./img/pencil.png ' class='priviledge-icon' alt='icon'></button>&nbsp<button class='delete-file'     id='delete-file" +
				String(fileCounter) +
				"'" +
				" onClick=DeleteFile('file" +
				String(fileCounter) +
				"'" +
				")><img src='./img/delete.png ' class='priviledge-icon' alt='icon'></button></td></tr>";
			$('#file-table').append(ElementRow);
		} else {
			var ElementRow =
				"<tr><td><a id ='file" +
				String(fileCounter) +
				"'" +
				"href= 'data" +
				'/' +
				docTypeFile['fileUrl'] +
				"'><h1 id = ''>" +
				docTypeFile['fileUrl'] +
				'</tr>';
			$('#file-table').append(ElementRow);
		}

		fileCounter++;

		console.log(fileCounter);
	}
	sessionStorage.setItem('fileCounter', fileCounter);
}

$(document).ready(function () {
	var Name = document.getElementById('name').textContent;
	// get the table element for update its elements
	var tableElement = document.getElementById('file-table');
	// change upload status
	sessionStorage.setItem('fileCounter', 0);

	var indexNo = document.getElementById('index-no').textContent;

	// get list of files
	$.ajax({
		type: 'POST',
		url: '/nts_new/Model/db_load_files.php',
		data: {
			Name: Name
		},
		success: function (data) {
			var arrayOfFilenames = $.parseJSON(data);
			console.log(arrayOfFilenames);
			var itr = new Iterator(arrayOfFilenames);
			Iterate(itr, Name, sessionStorage.getItem('fileCounter'), indexNo);
		}
	});

	$('#save-file').click(function (event) {
		$("#save-file").prop('disabled', true);
		if ($('#input-file').get(0).files.length === 0) {
			$('#No_file').css('display', 'block');
			$("#save-file").prop('disabled', false);
		} else {
			$('#No_file').css('display', 'none');
			var date = new Date();

			event.preventDefault();

			var fd = new FormData();
			var docTypeFile = $('#input-file')[0].files[0];
			var d = String(date.getFullYear()) + '-' + String(date.getMonth() + 1) + '-' + String(date.getDate());
			console.log(d);

			fd.append('docTypeFile', docTypeFile);
			fd.append('moduleName', Name);
			fd.append('date', d);

			$(document).ajaxStart(function () {
				$('#wait').css('display', 'block');
			});
			$(document).ajaxComplete(function () {
				$('#wait').css('display', 'none');
			});

			$.ajax({
				type: 'POST',
				url: '/nts_new/Model/db_upload_file.php',
				data: fd,
				processData: false,
				contentType: false,
				success: function (data) {
					var fileCounterInSession = sessionStorage.getItem('fileCounter');
					if (indexNo.length == 4) {
						var ElementRow =
							"<tr id='" +
							String(fileCounterInSession) +
							"'" +
							"><td><a id ='file" +
							String(fileCounterInSession) +
							"'" +
							"href= 'data" +
							'/' +
							docTypeFile.name +
							"'><h1 id = ''>" +
							docTypeFile.name +
							"</h1></a></td><td><button class='edit-file' id='edit-file" +
							String(fileCounterInSession) +
							"'" +
							" onClick=EditFile('file" +
							String(fileCounterInSession) +
							"'" +
							") ><img src='./img/pencil.png ' class='priviledge-icon'></button>&nbsp<button class='delete-file' id='delete-file" +
							String(fileCounterInSession) +
							"'" +
							" onClick=DeleteFile('file" +
							String(fileCounterInSession) +
							"'" +
							")><img src='./img/delete.png ' class='priviledge-icon'></button></td></tr>";
						$('#file-table').append(ElementRow);
					} else {
						var ElementRow =
							"<tr><td><a id ='file" +
							String(fileCounterInSession) +
							"'" +
							"href= 'data" +
							'/' +
							docTypeFile.name +
							"'><h1 id = ''>" +
							docTypeFile.name +
							'</tr>';
						$('#file-table').append(ElementRow);
					}
					fileCounterInSession++;
					sessionStorage.setItem('fileCounter', fileCounterInSession);
					$("#save-file").prop('disabled', false);
					$('#input-file').val('');
					console.log($('#input-file').val());
				}
			});
		}
	});
});