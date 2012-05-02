<?php

	switch($_GET['action']) {
		case 'makeReservation':
		
			switch($_GET['event']) {
				case 'bbq':
					echo true;
					break;
				default:
					echo false;
			}
		
		break;
		default:
			echo false;
	}

?>
