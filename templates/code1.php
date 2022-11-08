<?php
	if(isset($_GET['accepte-cookies'])){
		setcookie('accepte-cookies', 'true', time() + 365 * 24 * 3600);
		header('location:./');
	}
