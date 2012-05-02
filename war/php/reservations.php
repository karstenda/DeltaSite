<?php
require_once 'fileHandler.php';

$fileName = realpath('..' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $_GET['event'] . '.csv';
$fileHandler = new FileHandler($fileName);

$max_count = array(
	'bbq' => 60,
	'bbq2' => 60,
	'kebab' => 90,
	'kebab2' => 60
);

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
			default:
				echo false;
			break;
		}
	break;
	case 'isVolzet':
		echo ($fileHandler->getEntryCount() >= $max_count[$_GET['event']] + 1);
	break;
	case 'getTotal':
		if('lasershoot' != $_GET['event']) {
			if(!file_exists($fileName)) {
				$fileHandler->writeArray(array(
					'momentOne' => array(),
					'momentTwo' => array()
				));
			}
			$eventReservations = $fileHandler->readArray();
			echo json_encode(array(
				'momentOne' => ('pasta' == $_GET['event'] ? 100 : 125) - count($eventReservations['momentOne']),
				'momentTwo' => ('pasta' == $_GET['event'] ? 100 : 125) - count($eventReservations['momentTwo'])
			));	 
		}
	break;
	case 'getFreeMoments':
		$returnArray = array();
		$eventReservations = $fileHandler->readArray();
		if('lasershoot' == $_GET['event']) {
			if(!file_exists($fileName)) {
				$fileHandler->writeArray(array());
			}
			
			$momentHour = 13;
			$momentMinutes = 0;
			for($i = 0; $i < 36; $i++) {
				if(50 == $momentMinutes) {
					$momentHour++;
					$momentMinutes = 0;
				}
				else {
					if($i != 0)
						$momentMinutes += 10;
				}
				
				if(!isset($eventReservations[$i]) || count($eventReservations[$i]) < 2) {
					$returnArray[] = array(
						'momentNumber' => $i,
						'momentTime' => $momentHour . ':' . (0 == $momentMinutes ? '00' : $momentMinutes) . ' (Plaats voor ' . (count($eventReservations[$i]) == 0 ? 2 : 1) . ' Team' . (count($eventReservations[$i]) == 0 ? 's' : '').')'
					);
				}
			}
		}
		else {
			if(!file_exists($fileName)) {
				$fileHandler->writeArray(array(
					'momentOne' => array(),
					'momentTwo' => array()
				));
			}
			
			if('pasta' == $_GET['event']) {
				if(count($eventReservations['momentOne']) <= 100)
					$returnArray[] = '18:00';
				if(count($eventReservations['momentTwo']) <= 100)
					$returnArray[] = '19:30';
			}
			else if('wraps' == $_GET['event']) {
				if(count($eventReservations['momentOne']) <= 125)
					$returnArray[] = '18:00';
				if(count($eventReservations['momentTwo']) <= 125)
					$returnArray[] = '19:30';
			}
		}
		echo json_encode($returnArray);
	break;
}
