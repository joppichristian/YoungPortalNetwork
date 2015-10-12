<div class="cd-user-modal-container"> <!-- this is the container wrapper -->
	<ul class="cd-switcher">
		<li><a href="#0">Accedi</a></li>
		<li><a href="#0">Registrati</a></li>
	</ul>

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
		  <input class="full-width has-padding has-border" id="signin-password" type="text"  placeholder="Password">
		  <a href="#0" class="hide-password">Nascondi</a>
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

	<!-- ==================== sign up form ================== -->
	<div id="cd-signup"> 
	  <form  id="formRegister" name="formRegister" class="cd-form" method="POST">
		<p class="fieldset">
		  <label class="image-replace cd-username" for="signup-username">Username</label>
		  <input class="full-width has-padding has-border" id="signup-username" name="signup-username" type="text" placeholder="Username">
		  <span class="cd-error-message">Error message here!</span>
		</p>

		<p class="fieldset">
		  <label class="image-replace cd-email" for="signup-email">E-mail</label>
		  <input class="full-width has-padding has-border" id="signup-email" name="signup-email" type="email" placeholder="E-mail">
		  <span class="cd-error-message">Error message here!</span>
		</p>

		<p class="fieldset">
		  <label class="image-replace cd-password" for="signup-password">Password</label>
		  <input class="full-width has-padding has-border" id="signup-password" name="signup-password" type="text"  placeholder="Password">
		  <a href="#0" class="hide-password">Hide</a>
		  <span class="cd-error-message">Error message here!</span>
		</p>

		<p class="fieldset">
		  <label class="image-replace cd-password" for="signup-password">Conferma Password</label>
		  <input class="full-width has-padding has-border" id="signup-conferma-password" name="signup-conferma-password" type="text"  placeholder="Conferma Password">
		  <a href="#0" class="hide-password">Hide</a>
		  <span class="cd-error-message">Le 2 password non coincidono!</span>
		</p>

		<p class="fieldset">
		  <input type="checkbox" id="accept-terms">
		  <label for="accept-terms">I agree to the <a href="#0">Terms</a></label>
		</p>

		<p class="fieldset">
		  <input class="full-width has-padding" type="submit" value="Create account">
		</p>
	  </form>

	  <!-- <a href="#0" class="cd-close-form">Close</a> -->
	</div> <!-- cd-signup -->

	<div id="cd-reset-password"> <!-- reset password form -->
	  <p class="cd-form-message">Lost your password? Please enter your email address. You will receive a link to create a new password.</p>

	  <form class="cd-form">
		<p class="fieldset">
		  <label class="image-replace cd-email" for="reset-email">E-mail</label>
		  <input class="full-width has-padding has-border" id="reset-email" type="email" placeholder="E-mail">
		  <span class="cd-error-message">Error message here!</span>
		</p>

		<p class="fieldset">
		  <input class="full-width has-padding" type="submit" value="Reset password">
		</p>
	  </form>

	  <p class="cd-form-bottom-message"><a href="#0">Back to log-in</a></p>
	</div> <!-- cd-reset-password -->
	<a href="#0" class="cd-close-form">Close</a>
  </div> <!-- cd-user-modal-container -->