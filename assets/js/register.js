const password = document.getElementById('password')
const confirm_password = document.getElementById('confirm_password')
const error = document.getElementById('error')
const button = document.getElementById('button')


// function that compare the password and confirm password inputs
confirm_password.addEventListener('input', () => {
	if (password.value === confirm_password.value) {
		error.innerHTML = ""
		button.disabled = false
	} else {
		error.innerHTML = "Les mot de passe ne correspondent pas"
		button.disabled = true
	}
})

const email = document.getElementById('email')
//function that check if the email is valid
email.addEventListener('input', () => {
	const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	if (re.test(email.value)) {
		error.innerHTML = ""
		button.disabled = false
	} else {
		error.innerHTML = "L'adresse email n'est pas valide"
		button.disabled = true
	}
})