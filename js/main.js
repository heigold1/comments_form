
function validateFirstName(firstName)
{
	var nameRegEx = /^[a-zA-Z ]{2,30}$/;

	if (!$.trim(firstName)) 
	{
		$("#first_name_error").html("First name cannot be blank");
		return false;
	}

	if (nameRegEx.test(firstName))
	{
		$("#first_name_error").html("");
		return true;
    }
    else
    {
    	$("#first_name_error").html("First name can only contain letters and spaces and must be from 2-30 characters long");
    	return false;
    }

}

function validateLastName(lastName)
{
	var nameRegEx = /^[a-zA-Z ]{2,30}$/;

	if (!$.trim(lastName)) 
	{
		$("#last_name_error").html("");
		return true;
	}

	if (nameRegEx.test(lastName))
	{
		$("#last_name_error").html("");
		return true;
    }
    else
    {
    	$("#last_name_error").html("Last name can only contain letters and spaces and must be from 2-30 characters long");
    	return false;
    }
}

function validateEmail(email)
{
	var emailRegEx = /^\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*$/;

	if (!$.trim(email)) 
	{
		$("#email_error").html("Email cannot be blank");
		return false;
	}

	if (emailRegEx.test(email))
	{
		$("#email_error").html("");
		return true;
    }
    else
    {
    	$("#email_error").html("Email must have the format abc@def.com and cannot have any special characters (i.e. *, ', \", \\, etc..)");
    	return false;
    }

}

function validateComments(comments)
{
	if (!$.trim(comments)) 
	{
		$("#comments_error").html("Comments cannot be blank");
		return false;
	}
	else
	{
		return true;
	}
}


function validateFields()
{
	var firstName = $("#first_name").val();
	var lastName = $("#last_name").val();
	var email = $("#email").val();
	var comments = $("#comments").val();

	if (
		validateFirstName(firstName) && 
		validateLastName(lastName) && 
		validateEmail(email) && 
		validateComments(comments)
		)
	{
		return true;
	}
	else
	{
		alert("There were errors with one or more fields.  Please see messages in red and fix");
		return false;
	}
}

$(function() {

$("#submit_button").click(function(){

	if (validateFields())
	{
		var firstName = $("#first_name").val();
		var lastName = $("#last_name").val();
		var email = $("#email").val();
		var comments = $("#comments").val();

		$.ajax(
		{
            dataType: 'json', 
            url: "save_to_database.php",
            data: {
            	'first_name' : firstName,
	    	   	'last_name' : lastName, 
	    	   	'email' : email, 
	    	   	'comments' : comments
	    	}, 
            async: false,
            contentType: "application/json; charset=utf-8",
            success: function (msg) 
            {
            	alert(msg.return_value);
            	var new_tr = "<tr><td>" + firstName + "</td><td>" + lastName + "</td><td>" + email + "</td><td>" + comment + "</td></tr>";

            	alert("about to add " + new_tr);
            	$('#main_table tr:last').after(new_tr);
           	},
            error: function(data) {
                successmessage = 'Error';
                alert("Error message is " + data.status);
                console.log(data);
            }
 		});




	};

});


});