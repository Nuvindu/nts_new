<?php session_start(); ?>
<?php 
	if (isset($_SESSION['index_no'])) {
		if (strlen($_SESSION['index_no']) == 7) {
			header('Location: view-results.php');
		} elseif (strlen($_SESSION['index_no']) == 2) {
			header('Location: operator.php');
		}elseif (strlen($_SESSION['index_no']) == 4) {
			header('Location: go-to-results.php');
		}
	}

 ?>