
	
	$(".login-btn").click(function(){
		$("#loginBox").show();
		$("#signupBox").hide();
		$("#forgotPasswordBox").hide();
	})
	$(".signup-btn").click(function(){
		$("#signupBox").show();
		$("#loginBox").hide();
		$("#forgotPasswordBox").hide();

	})
	$(".signin-btn").click(function(){
		$("#signupBox").hide();
		$("#loginBox").show();

	})
	$(".forget-password").click(function(){
		$("#forgotPasswordBox").show();
		$("#loginBox").hide();

	})
	
	$('.edit-address').click(function(){
		$('#myaddress').toggle();
	})

	
	
