<?php
	function get_relative_time($re_time) {
		$now = time();
		$given = strtotime($re_time);

		$diff = $now - $given;
		if ($diff > 365 * 60 * 60 * 24) {
			$rem = $diff / (24 * 60 * 60);
			$str = " years ago";
			settype($rem, 'integer');
			if ($rem == 1) $str = " year ago";
			settype($rem, 'string');
			return $rem.$str;
		} else if ($diff > 24 * 60 * 60) {
			$rem = $diff / (24 * 60 * 60);
			$str = " days ago";
			settype($rem, 'integer');
			if ($rem == 1) $str = " day ago";
			settype($rem, 'string');
			return $rem.$str;
		} else if ($diff > 60 * 60) {
			$rem = $diff / (60 * 60);
			$str = " hours ago";
			settype($rem, 'integer');
			if ($rem == 1) $str = " hour ago";
			settype($rem, 'string');
			return $rem.$str;
		} else if ($diff > 60) {
			$rem = $diff / 60;
			$str = " minutes ago";
			settype($rem, 'integer');
			if ($rem == 1) $str = " minute ago";
			settype($rem, 'string');
			return $rem.$str;
		} else {
			$rem = $diff;
			$str = " seconds ago";
			settype($rem, 'integer');
			if ($rem == 1) $str = " second ago";
			settype($rem, 'string');
			return $rem.$str;
		}

		return "Unknown error";
	}
?>