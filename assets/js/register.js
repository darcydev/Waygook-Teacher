// execute as soon as the document is ready
$(document).ready(function() {
  // create jQuery object
	$("#hideLogin").click(function() {
		$("#loginForm").hide();
		$("#studentRegisterForm").show();
	});
  // create jQuery object
	$("#hideRegister").click(function() {
		$("#loginForm").show();
		$("#studentRegisterForm").hide();
	});
});
