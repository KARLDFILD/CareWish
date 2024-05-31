//--------SLIDER ON ABOUT PAGE--------

const slider = document.querySelector('.slider');
const slides = slider.querySelectorAll('img');
let currentSlide = 0;

function nextSlide() {
	slides[currentSlide].classList.remove('active');
	currentSlide = (currentSlide + 1) % slides.length;
	slides[currentSlide].classList.add('active');
}

setInterval(nextSlide, 5000);

//---------LOGIN POPUP-----------
function openPopupLogin() {
	const popupLogin = document.querySelector('.popupLogin');
	popupLogin.style.display = 'block';
	window.onclick = function (event) {
		if (event.target == popupLogin) {
			popupLogin.style.display = 'none';
		}
	}
}

//---------REG POPUP-----------
function openPopupReg() {
	const popupReg = document.querySelector('.popupReg');
	popupReg.style.display = 'block';
	popupLogin.style.display = 'none';
	window.onclick = function (event) {
		if (event.target == popupReg) {
			popupReg.style.display = 'none';
			popupLogin.style.display = 'none';
		}
	}
}


//---------VIEW POPUP-----------
function openPopupView() {
	const popupView = document.querySelector('.popupView');
	popupView.style.display = 'block';
	window.onclick = function (event) {
		if (event.target == popupLogin) {
			popupView.style.display = 'none';
		}
	}
}

//------------Price and area out-----------
function priceOut() {
	let priceSlider = document.getElementById("price");
	let priceOutput = document.getElementById("price-value");
	priceOutput.innerHTML = priceSlider.value;
}

function areaOut() {
	let areaSlider = document.getElementById("area");
	let areaOutput = document.getElementById("area-value");
	areaOutput.textContent = areaSlider.value;
}
