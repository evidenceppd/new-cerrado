let faixaAviso = document.getElementById('faixaAviso');
let faixaAvisoClose = faixaAviso.querySelector('[btn-aviso=close]');

if (faixaAviso && faixaAvisoClose) {
	function closeModal() {
		faixaAviso.classList.add('oblivion');
		
		setTimeout(() => {
			setCookie('avisoFechado', true);
			// faixaAviso.remove();
		}, 1000);
	}

	faixaAvisoClose.addEventListener('click', () => {
		closeModal();
	});
}