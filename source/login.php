<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
	<ul class="cd-switcher">
		<?php
		if(utenteLoggato($mysqli) == false) {
		?> 
			<li><a href="#0">Accedi</a></li>
			<li><a href="#0">Registrati</a></li>
		<?php
		}else{
		?> 
			<li><a href="#0">Modifica account</a></li>
		<?php
		}
		?>		
	</ul>

	
	  
	 <?php
	 if(utenteLoggato($mysqli) == false) {
	 ?>   
		<!-- ================ log in form ================= -->
		<div id="cd-login"> 
		  <form class="cd-form"  name="loginForm" id="loginForm" >
			<p class="fieldset">
			  <label class="image-replace cd-email" for="signin-email">E-mail</label>
			  <input class="full-width has-padding has-border" id="signin-email" type="email" placeholder="E-mail">
			  <span class="cd-error-message">Email o password errata! Oppure devi attivare l'account</span>
			</p>

			<p class="fieldset">
			  <label class="image-replace cd-password" for="signin-password">Password</label>
			  <input class="full-width has-padding has-border" id="signin-password" type="password"  placeholder="Password">
			  <a href="#0" class="hide-password">Mostra</a>
			  <span class="cd-error-message">Email o password errata! Oppure devi attivare l'account</span>
			</p>

			<p class="fieldset">
			  <input type="checkbox" id="remember-me" checked>
			  <label for="remember-me">Ricordami</label>
			</p>

			<p class="fieldset">
			  <input class="full-width" type="submit" value="Login">
			</p>
		  </form>

		  <p class="cd-form-bottom-message"><a href="#0">Hai dimenticato la password?</a></p>
		  <!-- <a href="#0" class="cd-close-form">Close</a> -->
		</div> <!-- cd-login -->  
	 <?php
	 }else{
	 ?>
		<!-- ================ updateUserForm ================= -->
		<div id="updateUserForm"> 
		  <form class="cd-form"  name="updateUserForm" id="updateUserForm" >
			<p class="fieldset">
			   
			  <input type="hidden" id="updateUserForm-email"  name="updateUserForm-email" value="<?php echo $_SESSION['username']; ?>" >
			   
			</p>

			<p class="fieldset">
				<label>Cambio password: </label>
			</p>
			<p class="fieldset">
			  
			  <input class="full-width has-padding has-border" id="vecchia-password" name="vecchia-password" type="password"  placeholder="Vecchia Password">
			  <a href="#0" class="hide-password">Mostra</a>
			  <span class="cd-error-message">Password Errata</span>
			</p>			
			<p class="fieldset">
			   
			  <input class="full-width has-padding has-border" id="updateUser-password" name="updateUser-password" type="password"  placeholder="Nuova Password">
			  <a href="#0" class="hide-password">Mostra</a>
			  <span class="cd-error-message">Password troppo corta (inserisci un minimo di 8 caratteri)</span>
			</p>			
			<p class="fieldset">
			   
			  <input class="full-width has-padding has-border" id="updateUser-conferma-password" name="updateUser-conferma-password" type="password"  placeholder="Conferma Nuova Password">
			  <a href="#0" class="hide-password">Mostra</a>
			  <span class="cd-error-message">Le 2 password non coincidono!</span>
			</p>

			<p class="fieldset">
			  <input class="full-width" type="submit" value="Modifica Account">
			</p>
		  </form>
		</div> <!-- updateUserForm -->  
	 <?php
	 }
	 ?>	
	
	
	
	<?php
	if(utenteLoggato($mysqli) == false) {
	?> 
		<!-- ==================== sign up form ================== -->
		<div id="cd-signup"> 
		  <form  id="formRegister" name="formRegister" class="cd-form" method="POST">
			<p class="fieldset">
			  <label class="image-replace cd-username" for="signup-username">Username</label>
			  <input class="full-width has-padding has-border" id="signup-username" name="signup-username" type="text" placeholder="Username">
			  <span class="cd-error-message">Inserisci un username di almeno 4 caratteri.</span>
			</p>
			
			<p class="fieldset">
			  <label class="image-replace cd-data-nascita" for="signup-data-nascita">Data di nascita</label>
			  <input class="full-width has-padding has-border" type="text" id="data_nascita" name="data_nascita" placeholder="Data di nascita" />
				<script>	  
					//if ( $('#data_nascita')[0].type != 'datetime-local' ){
						$('#data_nascita').datepicker();
					//}	
				</script>
			   <span class="cd-error-message">data errata, rivedi il campo data nascita.</span>
			</p>

			<p class="fieldset">
			  <label class="image-replace cd-email" for="signup-email">E-mail</label>
			  <input class="full-width has-padding has-border" id="signup-email" name="signup-email" type="email" placeholder="E-mail">
			  <span class="cd-error-message">Email non corretta!</span>
			</p>
			
			<p class="fieldset">
			  <label class="image-replace cd-email" for="signup-conferma-email">E-mail</label>
			  <input class="full-width has-padding has-border" id="signup-conferma-email" name="signup-conferma-email" type="email" placeholder="Conferma E-mail">
			  <span class="cd-error-message">Le Email non coincidono!</span>
			</p>

			<p class="fieldset">
			  <label class="image-replace cd-password" for="signup-password">Password</label>
			  <input class="full-width has-padding has-border" id="signup-password" name="signup-password" type="password"  placeholder="Password">
			  <a href="#0" class="hide-password">Mostra</a>
			  <span class="cd-error-message">Password troppo corta (inserisci un minimo di 8 caratteri)</span>
			</p>

			<p class="fieldset">
			  <label class="image-replace cd-password" for="signup-password">Conferma Password</label>
			  <input class="full-width has-padding has-border" id="signup-conferma-password" name="signup-conferma-password" type="password"  placeholder="Conferma Password">
			  <a href="#0" class="hide-password">Mostra</a>
			  <span class="cd-error-message">Le 2 password non coincidono!</span>
			</p>
			
			<p class="fieldset">
			  <input type="checkbox" id="accept-terms">
			  <span class="cd-error-message">Per continuare devi accettare i termini</span>
			  <label for="accept-terms">I agree to the <a href="//www.iubenda.com/privacy-policy/587389" class="iubenda-white iubenda-embed" title="Privacy Policy" style="color:black;">Terms</a></label>
			</p>

			<p class="fieldset">
			  <input class="full-width has-padding" type="submit" value="Create account">
			</p>
		  </form>
		</div> <!-- cd-signup -->
	<?php
	}
	?>	
	
	  <!-- <a href="#0" class="cd-close-form">Close</a> -->
	

	<div id="cd-reset-password"> <!-- reset password form -->
	  <p class="cd-form-message">Hai dimenticato la password? Inserisci la tua email. Ti invieremo una password provvisoria.</p>

	  <form id="formReset" name="formReset" class="cd-form">
		<p class="fieldset">
		  <label class="image-replace cd-email" for="reset-email">E-mail</label>
		  <input class="full-width has-padding has-border" id="resetEmail" name="resetEmail" type="email" placeholder="E-mail">
		  <span class="cd-error-message">Errore! controlla l'email.</span>
		</p>

		<p class="fieldset">
		  <input class="full-width has-padding" type="submit" value="Resetta password">
		</p>
	  </form>

	  <p class="cd-form-bottom-message"><a href="#0">Torna al log-in</a></p>
	</div> <!-- cd-reset-password -->
	
	
	<a href="#0" class="cd-close-form">Chiudi</a>	
	
  </div> <!-- cd-user-modal-container -->