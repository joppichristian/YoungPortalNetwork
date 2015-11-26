jQuery(document).ready(function($){
	var $form_modal = $('.cd-user-modal'),
		$form_login = $form_modal.find('#cd-login'),
		$form_signup = $form_modal.find('#cd-signup'),
		$form_updatePwd = $form_modal.find('#updateUserForm'),
		$form_forgot_password = $form_modal.find('#cd-reset-password'),
		$form_modal_tab = $('.cd-switcher'),
		$tab_login = $form_modal_tab.children('li').eq(0).children('a'),
		$tab_signup = $form_modal_tab.children('li').eq(1).children('a'),
		$forgot_password_link = $form_login.find('.cd-form-bottom-message a'),
		$back_to_login_link = $form_forgot_password.find('.cd-form-bottom-message a'),
		$main_nav = $('.main-nav');

	//open modal
	$main_nav.on('click', function(event){

		if(event.target.id != "a-esci"){
			if( $(event.target).is($main_nav) ) {
				// on mobile open the submenu
				$(this).children('ul').toggleClass('is-visible');
			} else {
				// on mobile close submenu
				$main_nav.children('ul').removeClass('is-visible');
				//show modal layer
				$form_modal.addClass('is-visible');	
				//show the selected form
				( $(event.target).is('.cd-signup') ) ? signup_selected() : login_selected();
			}
		}	
		
	});

	//close modal
	$('.cd-user-modal').on('click', function(event){
		if( $(event.target).is($form_modal) || $(event.target).is('.cd-close-form') ) {
			$form_modal.removeClass('is-visible');
		}	
	});
	//close modal when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$form_modal.removeClass('is-visible');
	    }
    });

	//switch from a tab to another
	$form_modal_tab.on('click', function(event) {
		event.preventDefault();
		( $(event.target).is( $tab_login ) ) ? login_selected() : signup_selected();
	});

	//hide or show password
	$('.hide-password').on('click', function(){
		var $this= $(this),
			$password_field = $this.prev('input');
		
		( 'password' == $password_field.attr('type') ) ? $password_field.attr('type', 'text') : $password_field.attr('type', 'password');
		( 'Nascondi' == $this.text() ) ? $this.text('Mostra') : $this.text('Nascondi');
		//focus and move cursor to the end of input field
		$password_field.putCursorAtEnd();
	});

	//show forgot-password form 
	$forgot_password_link.on('click', function(event){
		event.preventDefault();
		forgot_password_selected();
	});

	//back to login from the forgot-password form
	$back_to_login_link.on('click', function(event){
		event.preventDefault();
		login_selected();
	});

	function login_selected(){
		$form_login.addClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.addClass('selected');
		$tab_signup.removeClass('selected');
	}

	function signup_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.addClass('is-selected');
		$form_forgot_password.removeClass('is-selected');
		$tab_login.removeClass('selected');
		$tab_signup.addClass('selected');
	}

	function forgot_password_selected(){
		$form_login.removeClass('is-selected');
		$form_signup.removeClass('is-selected');
		$form_forgot_password.addClass('is-selected');
	}
	
	 function emailCorretta(email) { 
	 
		if(email.length < 7){
			return false; 
		}	
	 
        var charEmailObbligatori1 = "@";  
		var charEmailObbligatori2 = "."; 

        if (email.indexOf(charEmailObbligatori1) == -1) {  
            return false; 
        }  
		if (email.indexOf(charEmailObbligatori2) == -1) {  
            return false; 
        }  
        return true; 
    }
	
	$form_forgot_password.find('input[type="submit"]').on('click', function(event){
		
		var eMail = document.getElementById("resetEmail").value;	
		
		if(!emailCorretta(eMail)){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_forgot_password.find('input[id="resetEmail"]').toggleClass('has-error').next('span').addClass('is-visible');
		}else{
			$form_forgot_password.find('input[id="resetEmail"]').toggleClass('has-error').next('span').removeClass('is-visible');
		}
		
		if(!hasErrors){		
			document.formReset.method = 'POST';
			document.formReset.action = 'private/resetta-password.php';
			document.formReset.submit();
		}
		
	});	
 	
	$form_login.find('input[type="submit"]').on('click', function(event){
			 
		// non inviare la password in chiaro
		//document.getElementById("signin-password").value = "";
				
		var pwd = SHA512(document.getElementById("signin-password").value);
		var email = document.getElementById("signin-email").value;
		
		$.ajax({
			url:'private/effettua-login.php',
			type: 'POST',
			data: { 
				'signin-email': email, 
				'p': pwd,
				'cod': '12345'
			},
			success:function(response){
			
				//alert("Resp:"+response);
				//alert("response index of success="+response.indexOf("success"));
											
				if( response.indexOf("success") > -1){
					//UTENTE LOGGATO
					//alert("Loggato correttamente...");
					location.reload();
					
				}else{
					
					//MOSTRA MESSAGGIO DI ERRORE				 
					$form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
					$form_login.find('input[id="signin-password"]').toggleClass('has-error').next('span').toggleClass('is-visible');				 
					 
				}
			}
		});	
		event.preventDefault();
		//$form_login.find('input[type="email"]').toggleClass('has-error').next('span').toggleClass('is-visible');
	});
	$form_signup.find('input[type="submit"]').on('click', function(event){
		
		var p = document.createElement("input");
		document.formRegister.appendChild(p);
		p.name = "p";
		p.type = "hidden"
		p.value = SHA512(document.getElementById("signup-password").value);
		
		var hasErrors = false;	
	
		var username = document.getElementById("signup-username").value;	
		var password = document.getElementById("signup-password").value;			
		var confermaP  = document.getElementById("signup-conferma-password").value;
		var eMail = document.getElementById("signup-email").value;		
		var eMailConferma = document.getElementById("signup-conferma-email").value;		
		var acceptTerms = document.getElementById("accept-terms");	
		
		if(username.length < 4){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_signup.find('input[id="signup-username"]').toggleClass('has-error').next('span').addClass('is-visible');
		}else{
			$form_signup.find('input[id="signup-username"]').toggleClass('has-error').next('span').removeClass('is-visible');
		}		
		
		if(!emailCorretta(eMail)){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_signup.find('input[id="signup-email"]').toggleClass('has-error').next('span').addClass('is-visible');
		}else{
			$form_signup.find('input[id="signup-email"]').toggleClass('has-error').next('span').removeClass('is-visible');
		}
		
		if(eMail!=eMailConferma){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_signup.find('input[id="signup-conferma-email"]').toggleClass('has-error').next('span').addClass('is-visible');
		}else{
			$form_signup.find('input[id="signup-conferma-email"]').toggleClass('has-error').next('span').removeClass('is-visible');
		}
		
		if(password.length < 8){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_signup.find('input[id="signup-password"]').toggleClass('has-error').next('a').next('span').addClass('is-visible');
		}else{
			$form_signup.find('input[id="signup-password"]').toggleClass('has-error').next('a').next('span').removeClass('is-visible');
		}	
					
		if(password!=confermaP){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_signup.find('input[id="signup-conferma-password"]').toggleClass('has-error').next('a').next('span').addClass('is-visible');
		}else{
			$form_signup.find('input[id="signup-conferma-password"]').toggleClass('has-error').next('a').next('span').removeClass('is-visible');
		}	
		
		if(!acceptTerms.checked){
			//MESSAGGIO DI ERRORE
			var hasErrors = true;
			event.preventDefault();
			$form_signup.find('input[id="accept-terms"]').toggleClass('has-error').next('span').addClass('is-visible');
		}else{
			$form_signup.find('input[id="accept-terms"]').toggleClass('has-error').next('span').removeClass('is-visible');
		}
		
		 
		if(!hasErrors){		
			// Assicurati che la password non venga inviata in chiaro.
			document.getElementById("signup-password").value = "";
			document.getElementById("signup-conferma-password").value = "";		
			document.formRegister.method = 'POST';
			document.formRegister.action = 'private/accetta-registrazione.php';
			document.formRegister.submit();
		}		
	
	
	});
	
	
	//========================================================= Form update account ===========================================================
	$form_updatePwd.find('input[type="submit"]').on('click', function(event){
									
		// Controllo se la vecchia password è corretta.
		var vecchiaPassword = SHA512(document.getElementById("vecchia-password").value);	
		var email = document.getElementById("updateUserForm-email").value;
		
		$form_updatePwd.find('input[id="vecchia-password"]').toggleClass('has-error').next('a').next('span').removeClass('is-visible');		
		$.ajax({
			url:'private/effettua-login.php',
			type: 'POST',
			data: { 
				'signin-email': email, 
				'p': vecchiaPassword,
				'cod': '12345'
			},
			success:function(response){			
				//alert("Resp:"+response);
				
				if( response.indexOf("success") > -1){
					//UTENTE LOGGATO -> PASSWORD VECCHIA CORRETTA
					$form_updatePwd.find('input[id="vecchia-password"]').toggleClass('has-error').next('a').next('span').removeClass('is-visible');		
					
					var p = document.createElement("input");
					document.updateUserForm.appendChild(p);
					p.name = "p";
					p.type = "hidden"
					p.value = SHA512(document.getElementById("updateUser-password").value);
					
					var hasErrors = false;		
					var password = document.getElementById("updateUser-password").value;			
					var confermaP  = document.getElementById("updateUser-conferma-password").value;
					
					if(password.length < 8){
						//MESSAGGIO DI ERRORE
						var hasErrors = true;
						event.preventDefault();
						$form_updatePwd.find('input[id="updateUser-password"]').toggleClass('has-error').next('a').next('span').addClass('is-visible');
					}else{
						$form_updatePwd.find('input[id="updateUser-password"]').toggleClass('has-error').next('a').next('span').removeClass('is-visible');
					}	
								
					if(password!=confermaP){
						//MESSAGGIO DI ERRORE
						var hasErrors = true;
						event.preventDefault();
						$form_updatePwd.find('input[id="updateUser-conferma-password"]').toggleClass('has-error').next('a').next('span').addClass('is-visible');
					}else{
						$form_updatePwd.find('input[id="updateUser-conferma-password"]').toggleClass('has-error').next('a').next('span').removeClass('is-visible');
					}	
						 
					if(!hasErrors){		
						// Assicurati che la password non venga inviata in chiaro.
						document.getElementById("updateUser-password").value = "";
						document.getElementById("updateUser-conferma-password").value = "";	
						document.updateUserForm.method = 'POST';			
						document.updateUserForm.action = 'private/post-modifica-account.php';
						document.updateUserForm.submit();
					}	
					
				}else{					
					//MOSTRA MESSAGGIO DI ERRORE				 
					$form_updatePwd.find('input[id="vecchia-password"]').toggleClass('has-error').next('a').next('span').addClass('is-visible');						 
				}
			}
		});	
		event.preventDefault();	
	});


	//IE9 placeholder fallback
	//credits http://www.hagenburger.net/BLOG/HTML5-Input-Placeholder-Fix-With-jQuery.html
	if(!Modernizr.input.placeholder){
		$('[placeholder]').focus(function() {
			var input = $(this);
			if (input.val() == input.attr('placeholder')) {
				input.val('');
		  	}
		}).blur(function() {
		 	var input = $(this);
		  	if (input.val() == '' || input.val() == input.attr('placeholder')) {
				input.val(input.attr('placeholder'));
		  	}
		}).blur();
		$('[placeholder]').parents('form').submit(function() {
		  	$(this).find('[placeholder]').each(function() {
				var input = $(this);
				if (input.val() == input.attr('placeholder')) {
			 		input.val('');
				}
		  	})
		});
	}

});


//credits http://css-tricks.com/snippets/jquery/move-cursor-to-end-of-textarea-or-input/
jQuery.fn.putCursorAtEnd = function() {
	return this.each(function() {
    	// If this function exists...
    	if (this.setSelectionRange) {
      		// ... then use it (Doesn't work in IE)
      		// Double the length because Opera is inconsistent about whether a carriage return is one character or two. Sigh.
      		var len = $(this).val().length * 2;
      		this.setSelectionRange(len, len);
    	} else {
    		// ... otherwise replace the contents with itself
    		// (Doesn't work in Google Chrome)
      		$(this).val($(this).val());
    	}
	});
};