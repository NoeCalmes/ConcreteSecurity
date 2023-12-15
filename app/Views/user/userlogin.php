<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
	href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
	rel="stylesheet">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link
	href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
	rel="stylesheet">

<article class="user">
	<!-- <h2></h2> -->
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="<?php echo base_url('user/createaccount'); ?>" method="post">
				<h1 class="compte">Créer un compte</h1>
				<input type="text" name="nom-user" placeholder="Nom" />
				<input type="email" name="email-user" placeholder="Email" />
				<input type="password" name="mdp-user" placeholder="Mot de passe" />
				<button type="submit" class="inscrire">S'inscrire</button>
			</form>

		</div>
		<div class="form-container sign-in-container">
			<form action="<?php echo base_url('user/login'); ?>" method="post">
				<h1 class="client">Déjà client ?</h1>
				<input type="email" placeholder="Email" name="email-connect" />
				<input type="password" placeholder="Mot de passe" name="mdp-connect" />
				<!-- <a href="#">Mot de passe oublié ?</a> -->
				<button class="conect">Se connecter</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Content de te revoir !</h1>
					<p> Pour rester en contact avec nous, veuillez vous connecter avec vos informations personnelles</p>
					<button class="ghost lop " id="signIn">Se connecter</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1 class="noir">Bienvenue mon ami !</h1>
					<p class="noir">Entrez vos informations personnelles et commencez à créer votre compte</p>
					<button class="ghost lop" id="signUp">Créé un compte</button>
				</div>
			</div>
		</div>
	</div>

</article>

<style>
	/* Scroll bar debut */
	::-webkit-scrollbar {
		width: 10px;
	}

	::-webkit-scrollbar-thumb {
		background-color: #888;
		border-radius: 5px;
	}

	::-webkit-scrollbar-thumb:hover {
		background-color: #555;
	}



	::-webkit-scrollbar-button {
		display: none;
	}

	::selection {
		background-color: #1c2752;
		/* Couleur de fond de la sélection */
	}


	* {
		text-decoration: none;
		list-style: none;
		margin: 0;
		padding: 0;
		font-family: 'Mulish';

	}

	article.user * {
		box-sizing: border-box;
	}




	article.user h1.noir,
	article.user p.noir {
		color: white;
	}

	article.user .compte {
		margin-bottom: 20px;
	}

	article.user .client {
		margin-bottom: 15px;
	}

	article.user button.conect {
		margin-top: 10px;
	}

	/* 	footer {
		background-color: #f4f4f4 !important;
		color: black!important;
	}
	.copyright {
		background-color: #f4f4f4!important;
		color: black!important;
	}
	 

	.boutonbottom a {
		color: black!important;
	 }
 */

	article.user {
		background: white;
		display: flex;
		justify-content: center;
		align-items: center;
		flex-direction: column;
		font-family: 'Mulish';
		height: 78vh;
		margin-bottom: 40px;
	}

	article.user h1 {
		font-weight: bold;
		margin: 0;
	}

	article.user button.inscrire {
		margin-top: 12px;
		padding: 12px 70px;
	}


	article.user h2 {
		text-align: center;
	}

	article.user p {
		font-size: 14px;
		font-weight: 100;
		line-height: 20px;
		letter-spacing: 0.5px;
		margin: 20px 0 30px;
	}



	article.user a {
		color: #333;
		font-size: 14px;
		text-decoration: none;
		margin: 15px 0;
	}

	article.user button {
		border-radius: 20px;
		border: 1px solid #FFA928;
		background-color: #FFA928;
		color: #FFFFFF;
		font-size: 12px;
		font-weight: bold;
		padding: 12px 45px;
		letter-spacing: 1px;
		text-transform: uppercase;
		transition: transform 80ms ease-in;
	}

	article.user button:active {
		transform: scale(0.95);
	}

	button:focus {
		outline: none;
	}

	button.ghost {
		background-color: transparent;
		border-color: #FFFFFF;
	}

	article.user form {
		background-color: #FFFFFF;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 50px;
		height: 100%;
		text-align: center;
	}

	article.user input {
		background-color: #eee;
		border: none;
		padding: 12px 15px;
		margin: 8px 0;
		width: 100%;
	}

	article.user .container {
		background-color: #fff;
		border-radius: 10px;
		box-shadow: 0 14px 28px rgba(0, 0, 0, 0.25),
			0 10px 10px rgba(0, 0, 0, 0.22);
		position: relative;
		overflow: hidden;
		width: 850px;
		max-width: 100%;
		min-height: 500px;
	}

	article.user .form-container {
		position: absolute;
		top: 0;
		height: 100%;
		transition: all 0.6s ease-in-out;
	}

	article.user .sign-in-container {
		left: 0;
		width: 50%;
		z-index: 2;
	}

	article.user .container.right-panel-active .sign-in-container {
		transform: translateX(100%);
	}

	article.user .sign-up-container {
		left: 0;
		width: 50%;
		opacity: 0;
		z-index: 1;
	}

	article.user .container.right-panel-active .sign-up-container {
		transform: translateX(100%);
		opacity: 1;
		z-index: 5;
		animation: show 0.6s;
	}

	@keyframes show {

		0%,
		49.99% {
			opacity: 0;
			z-index: 1;
		}

		50%,
		100% {
			opacity: 1;
			z-index: 5;
		}
	}

	article.user .overlay-container {
		position: absolute;
		top: 0;
		left: 50%;
		width: 50%;
		height: 100%;
		overflow: hidden;
		transition: transform 0.6s ease-in-out;
		z-index: 100;
	}

	article.user .container.right-panel-active .overlay-container {
		transform: translateX(-100%);
	}

	article.user .overlay {
		background: #ffb342;
		background: -webkit-linear-gradient(to right, #ffb342);
		background: linear-gradient(to right, #C4C4C4);
		background-repeat: no-repeat;
		background-size: cover;
		background-position: 0 0;
		color: #FFFFFF;
		position: relative;
		left: -100%;
		height: 100%;
		width: 200%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	article.user .container.right-panel-active .overlay {
		transform: translateX(50%);
	}

	article.user .overlay-panel {
		position: absolute;
		display: flex;
		align-items: center;
		justify-content: center;
		flex-direction: column;
		padding: 0 40px;
		text-align: center;
		top: 0;
		height: 100%;
		width: 50%;
		transform: translateX(0);
		transition: transform 0.6s ease-in-out;
	}

	article.user .overlay-left {
		transform: translateX(-20%);
	}

	article.user .container.right-panel-active .overlay-left {
		transform: translateX(0);
	}

	article.user .overlay-right {
		right: 0;
		transform: translateX(0);
	}

	article.user .container.right-panel-active .overlay-right {
		transform: translateX(20%);
	}
</style>

<script>
	const signUpButton = document.getElementById('signUp');
	const signInButton = document.getElementById('signIn');
	const container = document.getElementById('container');

	signUpButton.addEventListener('click', () => {
		container.classList.add("right-panel-active");
	});

	signInButton.addEventListener('click', () => {
		container.classList.remove("right-panel-active");
	});
</script>