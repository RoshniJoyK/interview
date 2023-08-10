/* $.validator.setDefaults( {
		submitHandler: function () {			
			setTimeout(() => {
		
				Lobibox.notify('success', {
					pauseDelayOnHover: true,
					continueDelayOnInactiveTab: false,
					position: 'top right',
					icon: 'bx bx-check-circle',
					msg: 'Data saved successfully!!',
					delay: false,
					
				
				});
				
						
			  }, 400);
			 return true; 
			 
		}
	
		} );
 */
/* $.validator.setDefaults({
	submitHandler: function () {
		Lobibox.notify('success', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			icon: 'bx bx-check-circle',
			msg: 'Data saved successfully!!'
		
		});
		setTimeout(() => {
			return true
		}, 5000);
		return true;
	}
	
 	
 });   
  */
 /* $.validator.setDefaults({
	submitHandler:setTimeout(() => {
		
		var notification2 = Lobibox.notify('success', {
			pauseDelayOnHover: true,
			continueDelayOnInactiveTab: false,
			position: 'top right',
			icon: 'bx bx-check-circle',
			msg: 'Data saved successfully!!',
			delay: false
		
		});
			
		  	  
	  }, 1000),
	  
});  */


		$.validator.addMethod(
			/* The value you can use inside the email object in the validator. */
			"regex",
		
			/* The function that tests a given string against a given regEx. */
			function(value, element, regexp)  {
				/* Check if the value is truthy (avoid null.constructor) & if it's not a RegEx. (Edited: regex --> regexp)*/
		
				if (regexp && regexp.constructor != RegExp) {
				   /* Create a new regular expression using the regex argument. */
				   regexp = new RegExp(regexp);
				}
		
				/* Check whether the argument is global and, if so set its last index to 0. */
				else if (regexp.global) regexp.lastIndex = 0;
		
				/* Return whether the element is optional or the result of the validation. */
				return this.optional(element) || regexp.test(value);
			}
		);

		$(document).ready(function () {

			$("#AddjobsValidationForm").validate({
				rules: {
					title: "required",
					description: "required",
					responsibilities: "required",
					requirements: "required",
					year: "required",
					month: "required",
					salary: "required",
					deadline: "required",
					company: "required"
				},
				messages: {
					title: "Please enter job title",
					description:
					{
						required: "Please enter job description"
					},
		
					responsibilities: "Please enter key responsibilities",
					requirements: "Please enter skills and requirements",
					year: "",
					month: "",
					salary: "Please enter approx.salary",

					deadline: {
						required: "Please choose a date"
					},
		company: "Please choose company",
				},
		
			});
			
		
		});
		
		$(document).ready(function () {

			$("#AttendedCandidate").validate({
				rules: {
					result: "required",
					details: "required",
					expected_salary: "required",
					joining_date: "required",
					notice_period: "required",
					
				},
				messages: {
		
					result: "Please enter your result",
					details: "Please enter your details",
					expected_salary: "Please enter your expected salary",
					joining_date: "Please enter your joining date",
					notice_period: "please enter your notice period",
					
				},
				
		
			});
			/* $('#upload_code').change(function() {
				var file = $(this).val();
				var ext = file.split('.').pop().toLowerCase();
				if ($.inArray(ext, ['zip', 'rar']) == -1) {
					alert('Invalid file type, please select a ZIP or RAR file.');
					$(this).val('');
				}
			});
			$('#upload_interview_papaer').change(function() {
				var file = $(this).val();
				var ext = file.split('.').pop().toLowerCase();
				if ($.inArray(ext, ['doc', 'docx', 'pdf']) == -1) {
					alert('Invalid file type, please select a DOC or DOCX or PDF file.');
					$(this).val('');
				}
			}); */
		
		
		});		


		$( document ).ready( function () {

			$( "#add_candidate" ).validate( {
				rules: {
					name: "required",
					phone1: "required",
					
					gender:{
						required: true
					},
					location: {
						required: true
					},
					district_id: {
						required: true
					},
					email: {
						required: true,
						email: true,
						regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
					},
                    skills: "required",
                 
					cv: "required",
					
					job_id: "required",
					apply_thru: "required",
					applied_date:"required",
					exp_sal:"required",

				},
				messages: {
					name: "Please enter your your name",
					phone1: "Please enter your phone number",
					
					gender: {
						required: ""
					},
					location: {
						required: "Please provide a location"
					},
					district_id: {
						required: "Please select one"
					},
                    email: "Please enter a valid email address",
                    skills: "Please enter your skills",
                 
					cv: "Please select CV",
					
					job_id: "Please select one",

					apply_thru: {required: "Please select one"},
					applied_date: {required: "Please select one"},
					exp_sal: {required: "Please enter salary"}
				},			
			} );
		} );

		$( document ).ready( function () {

			$( "#user_profile" ).validate( {
				rules: {
					username: "required",
					email: {
						required: true,
						email: true,
						regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
					},
                    cpassword:{

                        equalTo: "#password"
                    }
				},
				messages: {
					username: "Please enter username",
                    email: "Please enter a valid email address",
                    cpassword:{

                        equalTo:"Password mismatch!"
                    }
				},
			});
		});

		$( document ).ready( function () {

			$( "#edit_candidate" ).validate( {
				rules: {
					name: "required",
					phone1: "required",
					
					gender:{
						required: true
					},
					location: {
						required: true
					},
					/* district_id: {
						required: true
					}, */
					email: {
						required: true,
						email: true,
						regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
					},
                    skills: "required",
                 
					//cv: "required",
					//photo: "required",
					job_id: "required",
					//pply_thru: "required"
				},
				messages: {
					name: "Please enter your your name",
					phone1: "Please enter your phone number",
					
					gender: {
						required: ""
					},
					location: {
						required: "Please provide a location"
					},
					/* district_id: {
						required: "Please select one"
					} */
                    email: "Please enter a valid email address",
                    skills: "Please enter your skills",
                 
					//cv: "Please select CV",
					//photo: "Please select photo",
					job_id: "Please select one",
					//apply_thru: "Please select one"
				},	

			} );
		} );
  
		// Numeric only control handler
		jQuery.fn.ForceNumericOnly =
		function()
		{
			return this.each(function()
			{
				$(this).keydown(function(e)
				{
					var key = e.charCode || e.keyCode || 0;
					// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
					// home, end, period, and numpad decimal
					return (
						key == 8 || 
						key == 9 ||
						key == 13 ||
						key == 46 ||
						key == 110 ||
						key == 190 ||
						(key >= 35 && key <= 40) ||
						(key >= 48 && key <= 57) ||
						(key >= 96 && key <= 105));
				});
			});
		};
		$("#input50").ForceNumericOnly();
		$("#input76").ForceNumericOnly();
		$("#input66").ForceNumericOnly();
		$("#from").ForceNumericOnly();
		$("#to").ForceNumericOnly();
		$("#expected").ForceNumericOnly();

		// Schedule Interview
		$( document ).ready( function () {

			$( "#interview_sched" ).validate( {
				rules: {
					round: "required",
					idate: "required",					
					radio_type: "required",
					question: "required"
				},
				messages: {
					round: "Please choose one",
					idate: "Please choose a date",					
					radio_type: "",
					question: "Please type question"
				},			
			} );		
		} );

		$( document ).ready( function () {

			$( "#add_staff" ).validate( {
				rules: {
					name: "required",
					phone1: "required",

					
					gender:{
						required: true
					},
					location: {
						required: true
					},
					district_id: {
						required: true
					},
					email: {
						required: true,
						email: true,
						regex: /^\b[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
					},
                    skills: "required",
                    addr: "required",
					cv: "required",
                    
					
                    exp_sal:'required',
                    applied_thru:'required',
					job_id: "required",
					apply_thru: "required",
                   
					offerdetails: "required",
					salary:"required",
					joiningdate:"required",
					flexRadioDefault:"required",
					numberofdays:"required",
					offerletter:"required",
				},
				messages: {
					name: "Please enter your your name",
					phone1: "Please enter your phone number",
					
					gender: {
						required: ""
					},
					location: {
						required: "Please provide a location"
					},
					district_id: {
						required: "Please select one"
					},
                    email: "Please enter a valid email address",
                    skills: "Please enter your skills",
                  
					cv: "Please select CV",
					
					job_id: "Please select one",
					apply_thru: "Please select one",
                    addstaff: "This field is required",
					offerdetails: "This field is required",
					salary:"This field is required",
					joiningdate:"This field is required",
					flexRadioDefault:"This field is required",
					numberofdays:"This field is required",
					offerletter:"This field is required",
				},





			} );
		} );
        $("#show-content").hide();
		$("#flexRadioDefault1").click(function() {
			if($(this).is(":checked")) {
				$("#show-content").show(300);
			}
            $("#flexRadioDefault2").click(function() {
                if($(this).is(":checked")) {
                    $("#show-content").hide(300);
                }
            });
		});
		//Add Jobs
		$( document ).ready( function () {

			$( "#AddjobsValidationForm" ).validate( {
				rules: {
					jobtitle: "required",
					description: "required",
                    responsibilities: "required",
                    requirements: "required",
					year: "required",
					month: "required",
					salary: "required",
					deadline: "required"
				},
				messages: {
					jobtitle: "Please enter job title",
					description: 
					{
						required: "Please enter job description"
					},
					
                    responsibilities: "Please enter key responsibilities",
                    requirements: "Please enter skills and requirements",
					
					salary: "Please enter approx.salary",
					deadline: {
						required: "Please choose a date"
					},
					
				},
			
			} );	
			

		} );
		$(document).ready(function () {

			$("#notAttended").validate({
				rules: {
					reason: "required"
					
		
				},
				messages: {
		
					reason: "Please enter your reason"
				
				},
				
		
			});
		} );

		$(document).ready(function () {

			$("#Postponed").validate({
				rules: {
					date: "required",
					reason: "required"

		
				},
				messages: {
					date:"Please enter your new date of interview",
					reason: "Please enter your reason"
				
				},
			
		
			});
		});
		$(document).ready(function () {

			$("#AttendedCandidate").validate({
				rules: {
					result: "required",
					details:"required",
					expected_salary:"required",
					joining_date:"required",
					notice_period:"required",
					
		
				},
				messages: {
		
					result: "Please enter your result",
					details: "Please enter your details",
					expected_salary: "Please enter your expected_salary",
					joining_date: "Please enter your joining_date",
					notice_period: "Please enter your notice_period",
					

				
				},
			
		
			});
		});
		//Admin Login
		$( document).ready( function(){

			$( "#login_form").validate({
				// errorPlacement: function(error, element) {
				// 	//Custom position: first name
				// 	if (element.attr("name") == "Email" ) {
				// 		$("#errETxt").text(error);
				// 	}
				// 	//Custom position: second name
				// 	else if (element.attr("name") == "Password" ) {
				// 		$("#errPTxt").text(error);
				// 	}
				// 	// Default position: if no match is met (other fields)
				// 	// else {
				// 	// 	 error.append($('.errorTxt span'));
				// 	// }
				// },
				rules: {
					Email: "required",
					Password: "required"
				},
				messages: {					
                    Email: "",
                    Password: ""					
				},			
			});		
		});