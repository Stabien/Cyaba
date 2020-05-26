var check_box = $('.check_box');

function check_select() {
	var select = $('select');
	var check_box = $('.check_box');

	if (check_box[0].checked) {
		select[0].disabled = "disabled";
		select[1].disabled = "disabled";
	}
	else if (check_box[1].checked) {
		select[0].disabled = false;
		select[1].disabled = "disabled";
	}
	else {
		select[0].disabled = "disabled";
		select[1].disabled = false;
	}
}
for (var i = 0; i < 3; i++)
	check_box[i].addEventListener('click', check_select);