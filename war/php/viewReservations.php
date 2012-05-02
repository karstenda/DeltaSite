<?php
require_once 'fileHandler.php';

if(isset($_GET['event'])) {
	$fileName = realpath('.' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $_GET['event'] . '.data';
	$fileHandler = new FileHandler($fileName);
	
	$eventReservations = $fileHandler->readArray();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>LUX Reservaties</title>
</head>

<body>
	<h1>LUX Reservaties</h1>
    
    <ul>
        <li><a href="/php/viewReservations.php?event=bbq" title="bbq">bbq</a></li>
        <li><a href="/php/viewReservations.php?event=lasershoot" title="Lasershoot">Lasershoot</a></li>
        <li><a href="/php/viewReservations.php?event=wraps" title="Wraps">Wraps</a></li>
    </ul>

    <h2>
    	<?php
			switch($_GET['event']) {
				case 'bbq': echo 'bbq'; break;
				case 'lasershoot': echo 'Lasershoot by ExxonMobil'; break;
				case 'wraps': echo 'LUX Wraps'; break;
			}
		?>
    </h2>
        
    <?php
	if(isset($_GET['event'])) {
		if(!isset($_GET['action'])) {
	?>
        <table width="800px">
            <tr>
                <td width="15%"><b>Tijdstip</b></td>
                <td><b><?php echo 'lasershoot' != $_GET['event'] ? 'Naam' : 'Teams'; ?></b></td>
            </tr>
    
            <?php
            foreach($eventReservations as $reservationMoment => $reservationData) {
                if('lasershoot' != $_GET['event']) {
                    echo '<tr>';
                        echo '<td style="vertical-align: top;">' . ('momentOne' == $reservationMoment ? '18:00' : '19:30') . '</td>';
                        echo '<td>';
                            for($i = 0; isset($reservationData[$i]); $i++) {
                                echo $reservationData[$i]['name'] . ' (<a href="/php/viewReservations.php?action=delete&event=' . $_GET['event'] . '&reservationMoment=' . $reservationMoment . '&id=' . $i . '" title="Delete">Delete</a>)<br />';
                            }
                        echo '</td>';
                    echo '</tr>';
                }
                else {
                    echo '<tr>';
                        echo '<td>' . (13 + floor($reservationMoment / 6)) . ':' . (($reservationMoment % 6) == 0 ? '00' : ($reservationMoment % 6) * 10) . '</td>';
                        echo '<td>';
                            echo 'Team 1: ' . $reservationData[0]['personOne'] . ', ' . $reservationData[0]['personTwo'] . ', ' . $reservationData[0]['personThree'] . ', ' . $reservationData[0]['personFour'] . ' ';
                            echo '(<a href="/php/viewReservations.php?action=delete&event=lasershoot&reservationMoment=' . $reservationMoment . '&id=0" title="Delete">Delete</a>)';
                            echo '<br />';
                            echo isset($reservationData[1]) ? 'Team 2: ' . $reservationData[1]['personOne'] . ', ' . $reservationData[1]['personTwo'] . ', ' . $reservationData[1]['personThree'] . ', ' . $reservationData[1]['personFour'] . ' (<a href="/php/viewReservations.php?action=delete&event=lasershoot&reservationMoment=' . $reservationMoment . '&id=1" title="Delete">Delete</a>)' : 'Team 2:';
                        echo '</td>';
                    echo '</tr>'; 
                }
            }
            ?>
        </table>
    <?php
		}
		else if('delete' == $_GET['action']) {
			$backupFileHandler = new FileHandler(realpath('.' . DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . 'data' . DIRECTORY_SEPARATOR . $_GET['event'] .  '_' . time() . '.data');
			$backupFileHandler->writeArray($eventReservations);
			
			array_splice($eventReservations[$_GET['reservationMoment']], $_GET['id'], 1);
			if('lasershoot' == $_GET['event'] && 0 == count($eventReservations[$_GET['reservationMoment']]))
				unset($eventReservations[$_GET['reservationMoment']]);
			$fileHandler->writeArray($eventReservations);
			echo 'De reservatie werd verwijderd!<br /><br /><a href="/php/viewReservations.php?event=' . $_GET['event'] . '" title="Terug">Terug</a>';
		}
	}
	?>
</body>

</html>
