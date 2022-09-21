const popupLinks = document.querySelectorAll('.popup__open');  // записываем все блоки с классом
const popupBody = '.popup__body';  // класс, при клике на который попап не будет закрываться
const popupCloseIcon = document.querySelectorAll('.close-popup'); // иконка закрытия попапа
const body = document.querySelector('body'); //записываем боди
const lockPadding = document.querySelectorAll(".lock-padding"); // записываем все блоки с классом, добавляем этот класс, если много попапов



let unlock = true; 

const timeout = 300; // заддержка перед снятием лока

// если есть ссылки
if (popupLinks.length > 0) {
	for (let index = 0; index < popupLinks.length; index++) {
        // проверяем конкретную ссылку
		const popupLink = popupLinks[index];
        // при клике на нее
		popupLink.addEventListener("click", function (e) {
            // записываем класс попапа
			const popupName = popupLink.getAttribute('href').replace('#', '.');
			const curentPopup = document.querySelector(popupName);
            // и открыаем его
			popupOpen(curentPopup);
            // убираем действие ссылки
			e.preventDefault();
		});
	}
}

// закрытие попапа по иконке
if (popupCloseIcon.length > 0) {
	for (let index = 0; index < popupCloseIcon.length; index++) {
		const el = popupCloseIcon[index];
        // при клике на иконку закрываем ближайший к ней попап
		el.addEventListener('click', function (e) {
			popupClose(el.closest('.popup'));
			e.preventDefault();
		});
	}
}

// открытие попапа
function popupOpen(curentPopup) {
    // если есть попап и боди не локнут
	if (curentPopup && unlock) {
        // если есть открытый попап, то закрываем, если нет, то лочим бади
		const popupActive = document.querySelector('.popup._open');
		if (popupActive) {
			popupClose(popupActive, false);
		} else {
			bodyLock();
		}
        // открываем попап
		curentPopup.classList.add('_open');
        // если кликаем не по popup__content, то попап закрывается
		curentPopup.addEventListener("click", function (e) {
			if (!e.target.closest(popupBody)) {
				popupClose(e.target.closest('.popup'));
			}
		});
	}
}

// закрытие попапа
function popupClose(popupActive, doUnlock = true) {
	if (unlock) {
		popupActive.classList.remove('_open');
		if (doUnlock) {
			bodyUnLock();
		}
	}
}

// лок бади и добавление паддинга, чтоб не было отскока
function bodyLock() {
	const lockPaddingValue = window.innerWidth - document.querySelector('.wrapper').offsetWidth + 'px';

	if (lockPadding.length > 0) {
		for (let index = 0; index < lockPadding.length; index++) {
			const el = lockPadding[index];
			el.style.paddingRight = lockPaddingValue;
		}
	}
	body.style.paddingRight = lockPaddingValue;
	body.classList.add('_lock');

	unlock = false;
	setTimeout(function () {
		unlock = true;
	}, timeout);
}

// анлок бади
function bodyUnLock() {
	setTimeout(function () {
		if (lockPadding.length > 0) {
			for (let index = 0; index < lockPadding.length; index++) {
				const el = lockPadding[index];
				el.style.paddingRight = '0px';
			}
		}
		body.style.paddingRight = '0px';
		body.classList.remove('_lock');
	}, timeout);

	unlock = false;
	setTimeout(function () {
		unlock = true;
	}, timeout);
}

// закрытие по эскейпу
document.addEventListener('keydown', function (e) {
	if (e.which === 27) {
		const popupActive = document.querySelector('.popup._open');
		popupClose(popupActive);
	}
});

(function () {
	// проверяем поддержку
	if (!Element.prototype.closest) {
		// реализуем
		Element.prototype.closest = function (css) {
			var node = this;
			while (node) {
				if (node.matches(css)) return node;
				else node = node.parentElement;
			}
			return null;
		};
	}
})();
(function () {
	// проверяем поддержку
	if (!Element.prototype.matches) {
		// определяем свойство
		Element.prototype.matches = Element.prototype.matchesSelector ||
			Element.prototype.webkitMatchesSelector ||
			Element.prototype.mozMatchesSelector ||
			Element.prototype.msMatchesSelector;
	}
})();
