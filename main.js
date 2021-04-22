
let radioCivilStatus = document.querySelectorAll(".radio-civil");

radioCivilStatus.forEach(radio => {
	radio.addEventListener("click", () => {
		let married = document.querySelector(".married");
	
		if (radio.checked && radio.value == "Casado")
                {
                    var ruta=('input:radio[name=married]:checked').val();
			married.classList.remove("d-none");
		} else {
			married.classList.add("d-none");
		}

		$.ajax({
                    url:'index.php',
                    type: 'POST',
                    data:'ruta',
                })
                .done(function(res){
                   $('.respuesta').html(res)         
                });
	});
});

    
