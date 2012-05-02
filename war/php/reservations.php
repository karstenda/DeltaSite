<?php
require_once 'fileHandler.php';

$fileName = realpath('..' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $_GET['event'] . '.csv';
$fileHandler = new FileHandler($fileName);

$max_count = array(
	'bbq' => 60,
	'bbq2' => 60,
	'kebab' => 90,
	'kebab2' => 60,
	'laser' => 24
);

$laserstart = 13;
$laserend = 22;

switch($_GET['action']) {
	case 'makeReservation':
		$formData = array();
		parse_str($_POST['formData'], $formData);
		
		$eventReservations = $fileHandler->readString();
		switch($_GET['event']) {
			case 'bbq':
			case 'bbq2':
			case 'kebab':
			case 'kebab2':
				if('' == $formData['firstname']) {
					echo 'empty_firstname';
					break 2;
				}
				
				if('' == $formData['lastname']) {
					echo 'empty_lastname';
					break 2;
				}
				
				if('' == $formData['email']) {
					echo 'empty_email';
					break 2;
				}
				
				if($fileHandler->getEntryCount() >= $max_count[$_GET['event']] + 1) {
					echo 'event_full';
					break 2;
				}
				
				$eventReservations = $eventReservations . $formData['firstname'] . "," . $formData['lastname'] . "," . $formData['email'] . "," . $formData['vegi'];
				
				if ($_GET['event'] == 'bbq' || $_GET['event'] == 'bbq2')
					$eventReservations = $eventReservations . "," . $formData['number'];
				
				$eventReservations = $eventReservations . "\n";
				
				echo $fileHandler->writeString($eventReservations);
			break;
			case 'quiz':
				if('' == $formData['firstname']) {
					echo 'empty_firstname';
					break 2;
				}
				
				if('' == $formData['lastname']) {
					echo 'empty_lastname';
					break 2;
				}
				
				if('' == $formData['email']) {
					echo 'empty_email';
					break 2;
				}
				
				$eventReservations = $eventReservations . $formData['firstname'] . "," . $formData['lastname'] . "," . $formData['email'] . "," . $formData['joker'];

				$eventReservations = $eventReservations . "\n";
				
				echo $fileHandler->writeString($eventReservations);
				
			break;
			case 'laser':
				if('' == $formData['firstname']) {
					echo 'empty_firstname';
					break 2;
				}
				
				if('' == $formData['lastname']) {
					echo 'empty_lastname';
					break 2;
				}
				
				if('' == $formData['email']) {
					echo 'empty_email';
					break 2;
				}
				
				if($fileHandler->getEntryCountFor($formData['moment']) >= $max_count[$_GET['event']] + 1) {
					echo 'event_full';
					break 2;
				}
				
				$eventReservations = $eventReservations . $formData['moment'] . "," . $formData['firstname'] . "," . $formData['lastname'] . "," . $formData['email'];
				$eventReservations = $eventReservations . "\n";
				
				echo $fileHandler->writeString($eventReservations);
			default:
				echo false;
			break;
		}
	break;
	case 'isVolzet':
		echo ($fileHandler->getEntryCount() >= $max_count[$_GET['event']] + 1);
	break;
	case 'getFreeMoments':
		$returnArray = array();

		if('laser' == $_GET['event']) {
		/*	if(!file_exists($fileName)) {
				$fileHandler->writeArray(array());
			}*/
			
			$momentHour = $laserstart;
			$momentMinutes = 0;
			while($momentHour < $laserend) {
				
				$momentString = $momentHour . ":" . (0 == $momentMinutes ? '00' : $momentMinutes);
				
				$remaining = $max_count['laser'] - $fileHandler->getEntryCountFor($momentString);
				
				if ($remaining > 0) {
					// Append an item to the array
					
					$returnArray[] = array(
						'value' => $momentString,
						'text' => $momentString . ' (Nog ' . $remaining . ' over)'
					);
				}
				
				$momentMinutes += 20;
				
				if (60 == $momentMinutes) {
					$momentMinutes = 0;
					$momentHour++;
				}
			}
		echo json_encode($returnArray);
		} else {
			echo 'wrong_event';
		}
	break;
}
