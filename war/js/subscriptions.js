$.get('php/reservations.php?action=isVolzet&event=bbq', function(data) {
	
	if (true == data) {
		$('#bbqsubmitbutton').html('<span style="margin-right:-250px;">Volzet</span>');
	} else {
		$('#bbqsubmitbutton').html('<button id="bbqsubmitbuttonbutton" type="submit" class="submitbutton button">Inschrijven</button>');
	}
	
});

$.get('php/reservations.php?action=isVolzet&event=bbq2', function(data) {
	
	if (true == data) {
		$('#bbq2submitbutton').html('<span style="margin-right:-250px;">Volzet</span>');
	} else {
		$('#bbq2submitbutton').html('<button id="bbqsubmitbuttonbutton" type="submit" class="submitbutton button">Inschrijven</button>');
	}
	
});

$.get('php/reservations.php?action=isVolzet&event=kebab', function(data) {
	
	if (true == data) {
		$('#kebabsubmitbutton').html('<span style="margin-right:-250px;">Volzet</span>');
	} else {
		$('#kebabsubmitbutton').html('<button id="kebabsubmitbuttonbutton" type="submit" class="submitbutton button">Inschrijven</button>');
	}
	
});

$.get('php/reservations.php?action=isVolzet&event=kebab2', function(data) {
	
	if (true == data) {
		$('#kebab2submitbutton').html('<span style="margin-right:-250px;">Volzet</span>');
	} else {
		$('#kebab2submitbutton').html('<button id="kebab2submitbuttonbutton" type="submit" class="submitbutton button">Inschrijven</button>');
	}
	
});

$('#bbqform').submit(function() {

	$("#bbqsubmitbuttonbutton").attr("disabled", "disabled");
	
	$.post('php/reservations.php?action=makeReservation&event=bbq', {formData: $('#bbqform').serialize()}, function(data) {
		if(true == data){
			$('#bbqfeedback').html('Ingeschreven');
			$('#bbqsubmitbutton').html('');
		}
		else if(false == data) {
			$('#bbqfeedback').html('Er liep iets mis tijdens je inschrijving. Probeer het later nog eens.');
		}
		else if('empty_firstname' == data) {
			$('#bbqfeedback').html('Je bent vergeten om je voornaam op te geven.');
		}
		else if('empty_lastname' == data) {
			$('#bbqfeedback').html('Je bent vergeten om je achternaam op te geven.');
		}
		else if('empty_email' == data) {
			$('#bbqfeedback').html('Je bent vergeten om je email op te geven.');
		}
		else if('event_full' == data) {
			$('#bbqfeedback').html('Het evenement waarvoor je je wilde inschrijven, is reeds volzet.');
		} else {
			$('#bbqfeedback').html(data);
		}
		$('#bbqsubmitbuttonbutton').removeAttr("disabled");
	});
	return false;
});

$('#bbq2form').submit(function() {

	$("#bbq2submitbuttonbutton").attr("disabled", "disabled");
	
	$.post('php/reservations.php?action=makeReservation&event=bbq2', {formData: $('#bbq2form').serialize()}, function(data) {
		if(true == data){
			$('#bbq2feedback').html('Ingeschreven');
			$('#bbq2submitbutton').html('');
		}
		else if(false == data) {
			$('#bbq2feedback').html('Er liep iets mis tijdens je inschrijving. Probeer het later nog eens.');
		}
		else if('empty_firstname' == data) {
			$('#bbq2feedback').html('Je bent vergeten om je voornaam op te geven.');
		}
		else if('empty_lastname' == data) {
			$('#bbq2feedback').html('Je bent vergeten om je achternaam op te geven.');
		}
		else if('empty_email' == data) {
			$('#bbq2feedback').html('Je bent vergeten om je email op te geven.');
		}
		else if('event_full' == data) {
			$('#bbq2feedback').html('Het evenement waarvoor je je wilde inschrijven, is reeds volzet.');
		} else {
			$('#bbq2feedback').html(data);
		}
		$('#bbq2submitbuttonbutton').removeAttr("disabled");
	});
	return false;
});

$('#kebabform').submit(function() {

	$("#kebabsubmitbuttonbutton").attr("disabled", "disabled");
	
	$.post('php/reservations.php?action=makeReservation&event=kebab', {formData: $('#kebabform').serialize()}, function(data) {
		if(true == data){
			$('#kebabfeedback').html('Ingeschreven');
//			$('#kebabsubmitbutton').html('');
		}
		else if(false == data) {
			$('#kebabfeedback').html('Er liep iets mis tijdens je inschrijving. Probeer het later nog eens.');
		}
		else if('empty_firstname' == data) {
			$('#kebabfeedback').html('Je bent vergeten om je voornaam op te geven.');
		}
		else if('empty_lastname' == data) {
			$('#kebabfeedback').html('Je bent vergeten om je achternaam op te geven.');
		}
		else if('empty_email' == data) {
			$('#kebabfeedback').html('Je bent vergeten om je email op te geven.');
		}
		else if('event_full' == data) {
			$('#kebabfeedback').html('Het evenement waarvoor je je wilde inschrijven, is reeds volzet.');
		} else {
			$('#kebabfeedback').html(data);
		}
		$('#kebabsubmitbuttonbutton').removeAttr("disabled");
	});
	return false;
});

$('#kebab2form').submit(function() {

	$("#kebab2submitbuttonbutton").attr("disabled", "disabled");
	
	$.post('php/reservations.php?action=makeReservation&event=kebab2', {formData: $('#kebab2form').serialize()}, function(data) {
		if(true == data){
			$('#kebab2feedback').html('Ingeschreven');
			$('#kebab2submitbutton').html('');
		}
		else if(false == data) {
			$('#kebab2feedback').html('Er liep iets mis tijdens je inschrijving. Probeer het later nog eens.');
		}
		else if('empty_firstname' == data) {
			$('#kebab2feedback').html('Je bent vergeten om je voornaam op te geven.');
		}
		else if('empty_lastname' == data) {
			$('#kebab2feedback').html('Je bent vergeten om je achternaam op te geven.');
		}
		else if('empty_email' == data) {
			$('#kebab2feedback').html('Je bent vergeten om je email op te geven.');
		}
		else if('event_full' == data) {
			$('#kebab2feedback').html('Het evenement waarvoor je je wilde inschrijven, is reeds volzet.');
		} else {
			$('#kebab2feedback').html(data);
		}
		$('#kebab2submitbuttonbutton').removeAttr("disabled");
	});
	return false;
});