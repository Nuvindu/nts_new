<?php require_once('Model/db-department-head.php'); ?>
<?php 
	if (isset($_POST['submit'])) {
		$controller = (new Controller())->changeDepHead(1);
		$controller = (new Controller())->changeDepHead(2);
		$controller = (new Controller())->changeDepHead(3);
		$controller = (new Controller())->changeDepHead(4);
		$controller = (new Controller())->changeDepHead(5);
	}

?>