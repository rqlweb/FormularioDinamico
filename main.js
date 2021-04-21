
let radioCivilStatus = document.querySelectorAll(".radio-civil");

radioCivilStatus.forEach(radio => {
	radio.addEventListener("click", () => {
		let married = document.querySelector(".married");
	
		if (radio.checked && radio.value == "Casado") {
			married.classList.remove("d-none");
		} else {
			married.classList.add("d-none");
		}

		
	});
});
