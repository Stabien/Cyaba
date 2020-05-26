function check_user_infos() {
	var fields = $('.input');
	var error_msg = $('.erreur');

	if (fields[0].value.length < 1) {
		error_msg[0].style.visibility = 'visible';
		return false;
	} 
	if (fields[1].value.length < 1) {
		error_msg[1].style.visibility = 'visible';
		return false;
	}
	return true;	
}