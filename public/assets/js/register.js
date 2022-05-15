const email = document.getElementById('email')
const password = document.getElementById('password')
const confirm_password = document.getElementById('confirm_password')
const error = document.getElementById('error')
const button = document.getElementById('button')


function validatePassword() {
	if (password.value === confirm_password.value) {
		error.innerHTML = ""
		return true
	} else {
		error.innerHTML = "Les mot de passe ne correspondent pas"
		return false
	}
}


function validateEmail(mail) {
	const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
	if (re.test(mail.value)) {
		error.innerHTML = ""
		return true
	} else {
		error.innerHTML = "L'adresse email n'est pas valide"
		return false
	}
}

document.getElementsByTagName('form')[0].addEventListener('input', function () {
	if (validateEmail.value != null && (password.value != null && confirm_password.value != null)) {
		if (validatePassword() && validateEmail(email)) {
			button.disabled = false
		} else {
			button.disabled = true
		}
	}
})