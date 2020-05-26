function check_user_infos() {
	var fields = $('input');
	var expressionReguliere = /^(([^<>()[]\.,;:s@]+(.[^<>()[]\.,;:s@]+)*)|(.+))@(([[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}.[0-9]{1,3}])|(([a-zA-Z-0-9]+.)+[a-zA-Z]{2,}))$/;
	var error_msg = $('p');

	if (fields[2].value.length < 3) {
		error_msg[2].style.display = 'block';
		return false;
	} 
	if (expressionReguliere.test(fields[3].value) === false) {
		error_msg[3].style.display = 'block';
		return false;
	}
	if (fields[4].value.length < 6 || fields[4].value != fields[5].value) {
		error_msg[4].style.display = 'block';
		error_msg[5].style.display = 'block';
		return false;
	}
	return true;
}