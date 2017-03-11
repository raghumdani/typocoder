<?php
	function get_row_color($beg, $end) {
		$now = date('Y-m-d H:i:s');
		$diff = strcmp($now, $beg);
		if ($diff < 0) {
			return "style = 'background-color : #42C25B;'";
		}
		$diff = strcmp($now, $end);
		if ($diff < 0) {
			return "style = 'background-color : #E3547F;'";
		}
		return "";
	}
?>