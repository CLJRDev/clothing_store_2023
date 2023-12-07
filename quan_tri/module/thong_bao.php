<?php
  function alert($message) {
		echo '<script type="text/javascript">
			alert("'.$message.'");
		</script>';
	}
	function location($url) {
		echo '<script type="text/javascript">
				window.location = "'.$url.'";
			</script>';
	}
?>