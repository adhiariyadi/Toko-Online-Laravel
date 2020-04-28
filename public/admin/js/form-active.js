(function ($) {
 "use strict";
 
	// Validation for login form
		$("#adminpro-form").validate(
		{					
			rules:
			{	
				email:
				{
					required: true,
					email: true
				},
				password:
				{
					required: true,
					minlength: 3,
					maxlength: 20
				}
			},
			messages:
			{	
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				password:
				{
					required: 'Please enter your password'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
		
	// Validation for Register form
		$("#adminpro-register-form").validate(
		{					
			rules:
			{	
				username:
				{
					required: true
				},
				email:
				{
					required: true,
					email: true
				},
				password:
				{
					required: true,
					minlength: 3,
					maxlength: 20
				},
				confarm_password:
				{
					required: true,
					minlength: 3,
					maxlength: 20
				}
			},
			messages:
			{	
				username:
				{
					required: 'Please enter your username'
				},
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				password:
				{
					required: 'Please enter your password'
				},
				confarm_password:
				{
					required: 'Please enter your confarm password'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for Contact form
		$("#adminpro-contact-form").validate(
		{					
			rules:
			{	
				email:
				{
					required: true,
					email: true
				},
				subject:
				{
					required: true
				},
				message:
				{
					required: true
				}
			},
			messages:
			{	
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				subject:
				{
					required: 'Please enter your subject'
				},
				message:
				{
					required: 'Please enter your message'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for Comment form
		$("#adminpro-comment-form").validate(
		{					
			rules:
			{	
				name:
				{
					required: true
				},
				email:
				{
					required: true,
					email: true
				},
				phone:
				{
					required: true
				},
				website:
				{
					required: true
				},
				comment:
				{
					required: true
				}
			},
			messages:
			{	
				name:
				{
					required: 'Please enter your full name'
				},
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				phone:
				{
					required: 'Please enter phone number'
				},
				website:
				{
					required: 'Please enter your website'
				},
				comment:
				{
					required: 'Please enter description'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for review form
		$("#adminpro-review-form").validate(
		{					
			rules:
			{	
				name:
				{
					required: true
				},
				email:
				{
					required: true,
					email: true
				},
				subject:
				{
					required: true
				},
				review:
				{
					required: true
				}
			},
			messages:
			{	
				name:
				{
					required: 'Please enter your full name'
				},
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				subject:
				{
					required: 'Please enter your subject'
				},
				review:
				{
					required: 'Please enter your review text'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for masking form
		$("#adminpro-masking-form").validate(
		{					
			rules:
			{	
				phone:
				{
					required: true
				},
				date:
				{
					required: true
				},
				serial:
				{
					required: true
				},
				card:
				{
					required: true
				},
				cvv:
				{
					required: true
				},
				tax:
				{
					required: true
				}
			},
			messages:
			{	
				phone:
				{
					required: 'Please enter masking phone number'
				},
				date:
				{
					required: 'Please enter masking date'
				},
				serial:
				{
					required: 'Please enter your serial number'
				},
				card:
				{
					required: 'Please enter your credit card number'
				},
				cvv:
				{
					required: 'Please enter your cvv2 number'
				},
				tax:
				{
					required: 'Please enter your tax id number'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for checkout form
		$("#adminpro-checkout-form").validate(
		{					
			rules:
			{	
				firstname:
				{
					required: true
				},
				lastname:
				{
					required: true
				},
				email:
				{
					required: true,
					email: true
				},
				phone:
				{
					required: true
				},
				address:
				{
					required: true
				},
				interested:
				{
					required: true
				},
				city:
				{
					required: true
				},
				interestedbd:
				{
					required: true
				},
				cartname:
				{
					required: true
				},
				cardnumber:
				{
					required: true
				},
				cvv2:
				{
					required: true
				},
				finish:
				{
					required: true
				}
			},
			messages:
			{	
				firstname:
				{
					required: 'Please enter first name'
				},
				lastname:
				{
					required: 'Please enter last name'
				},
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				phone:
				{
					required: 'Please enter your phone number'
				},
				address:
				{
					required: 'Please enter your address'
				},
				interested:
				{
					required: 'Please select your country'
				},
				city:
				{
					required: 'Please enter your city'
				},
				interestedbd:
				{
					required: 'Please select your Budgets'
				},
				cartname:
				{
					required: 'Please enter your cartname'
				},
				cardnumber:
				{
					required: 'Please enter your card number'
				},
				cvv2:
				{
					required: 'Please enter your cvv2 number'
				},
				finish:
				{
					required: 'Please select expired date'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for order form
		$("#adminpro-order-form").validate(
		{					
			rules:
			{	
				fullname:
				{
					required: true
				},
				email:
				{
					required: true,
					email: true
				},
				phone:
				{
					required: true
				},
				companyname:
				{
					required: true
				},
				start:
				{
					required: true
				},
				finish:
				{
					required: true
				},
				interestedcategory:
				{
					required: true
				},
				interestedbudget:
				{
					required: true
				},
				cardnumber:
				{
					required: true
				},
				cvv2:
				{
					required: true
				},
				finish:
				{
					required: true
				}
			},
			messages:
			{	
				fullname:
				{
					required: 'Please enter full name'
				},
				email:
				{
					required: 'Please enter your email address',
					email: 'Please enter a VALID email address'
				},
				phone:
				{
					required: 'Please enter your phone number'
				},
				companyname:
				{
					required: 'Please enter your company name'
				},
				start:
				{
					required: 'Please select your start date'
				},
				finish:
				{
					required: 'Please enter your end date'
				},
				interestedcategory:
				{
					required: 'Please select category'
				},
				interestedbudget:
				{
					required: 'Please enter your budgets'
				},
				cardnumber:
				{
					required: 'Please enter your card number'
				},
				cvv2:
				{
					required: 'Please enter your cvv2 number'
				},
				finish:
				{
					required: 'Please select expired date'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
	// Validation for captcha form
		$("#adminpro-captcha-form").validate(
		{					
			rules:
			{	
				captcha:
				{
					required: true
				}
			},
			messages:
			{	
				captcha:
				{
					required: 'Please enter captcha'
				}
			},					
			
			errorPlacement: function(error, element)
			{
				error.insertAfter(element.parent());
			}
		});
		
 
})(jQuery); 