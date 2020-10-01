<?php session_start(); ?>
<?php 
	if (isset($_SESSION['index_no'])) {
		if (strlen($_SESSION['index_no']) == 7) {
			header('Location: view-exam-timetables.php');
		} elseif (strlen($_SESSION['index_no']) == 2) {
			header('Location: add_exam_timetables.php');
		}elseif (strlen($_SESSION['index_no']) == 4) {
			header('Location: add_exam_timetables.php');
		}
	}

 ?>