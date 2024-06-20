// Skrypt na przewijanie tła
window.addEventListener('scroll', () => {
  const header = document.getElementById('mainHeader');
  const logo = document.querySelector('.logo');
  const burger = document.querySelectorAll('.burger');

  if (window.scrollY > 50) {
    header.classList.remove('h-28');
    header.classList.add('h-22', 'bg-opacity-80');
    logo.classList.add('h-16');
    logo.classList.remove('h-24');
    burger.forEach(b => {
      b.classList.remove('h-14', 'w-14');
      b.classList.add('h-10', 'w-10');
    });
  } else {
    header.classList.remove('h-22', 'bg-opacity-80');
    header.classList.add('h-28');
    logo.classList.add('h-24');
    logo.classList.remove('h-16');
    burger.forEach(b => {
      b.classList.remove('h-10', 'w-10');
      b.classList.add('h-14', 'w-14');
    });
  }
});

// Menu hamburger
function toggleMenu() {
  const menu = document.getElementById('menu');
  menu.classList.toggle('hidden');
  menu.classList.toggle('block');
}

// Walidacja formularza
function validateForm() {
  const pass = document.getElementById('pass').value;
  const passAgain = document.getElementById('pass2').value;
  if (pass !== passAgain) {
      showAlert('Hasła nie są zgodne.', 'error');
      return false;
  }

  const email = document.getElementById('email').value;
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;

  if (email.length > 50) {
      showAlert('Adres email nie może przekraczać 50 znaków.', 'error');
      return false;
  }
  if (firstName.length > 30) {
      showAlert('Imię nie może przekraczać 30 znaków.', 'error');
      return false;
  }
  if (lastName.length > 30) {
      showAlert('Nazwisko nie może przekraczać 30 znaków.', 'error');
      return false;
  }

  return true;
}

// Walidacja email i numeru telefonu
function validateEmail(email) {
  const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return re.test(String(email).toLowerCase());
}

function validatePhoneNumber(phoneNumber) {
  const re = /^[0-9]{9}$/;
  return re.test(String(phoneNumber));
}

// Wyświetlanie komunikatów walidacji
function displayMessages(messages) {
  const messagesDiv = document.getElementById('messages');
  messagesDiv.innerHTML = '';
  messages.forEach(function(message) {
    const p = document.createElement('p');
    p.textContent = message;
    p.className = 'text-red-500';
    messagesDiv.appendChild(p);
  });
}

// Obsługa formularza po załadowaniu strony
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  const emailInput = document.getElementById('email');
  const firstNameInput = document.getElementById('firstName');
  const lastNameInput = document.getElementById('lastName');
  const phoneNumberInput = document.getElementById('phoneNumber');
  const passInput = document.getElementById('pass');
  const passAgainInput = document.getElementById('pass2');
  
  form.addEventListener('submit', function(event) {
    let valid = true;
    let messages = [];

    if (!validateEmail(emailInput.value)) {
      valid = false;
      messages.push('Niepoprawny adres email.');
    }

    if (firstNameInput.value.trim() === '') {
      valid = false;
      messages.push('Imię jest wymagane.');
    }

    if (lastNameInput.value.trim() === '') {
      valid = false;
      messages.push('Nazwisko jest wymagane.');
    }

    if (!validatePhoneNumber(phoneNumberInput.value)) {
      valid = false;
      messages.push('Niepoprawny numer telefonu.');
    }

    if (passInput.value.length < 8) {
      valid = false;
      messages.push('Hasło musi mieć co najmniej 8 znaków.');
    }

    if (passInput.value !== passAgainInput.value) {
      valid = false;
      messages.push('Hasła nie są zgodne.');
    }

    if (!valid) {
      event.preventDefault();
      displayMessages(messages);
    }
  });
});

// Wyświetlanie niestandardowego alertu
function showCustomAlert(message) {
  const overlay = document.createElement('div');
  overlay.className = 'fixed inset-0 bg-gray-600 bg-opacity-50 flex justify-center items-center';

  const alertBox = document.createElement('div');
  alertBox.className = 'bg-white p-6 rounded-lg shadow-md max-w-sm w-full';

  const messageElement = document.createElement('p');
  messageElement.textContent = message;
  messageElement.className = 'text-gray-700';

  const buttonElement = document.createElement('button');
  buttonElement.textContent = 'OK';
  buttonElement.className = 'mt-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600';

  buttonElement.addEventListener('click', function() {
    document.body.removeChild(overlay);
  });

  alertBox.appendChild(messageElement);
  alertBox.appendChild(buttonElement);
  overlay.appendChild(alertBox);

  document.body.appendChild(overlay);
}

// Obsługa alertów na podstawie parametrów URL
document.addEventListener('DOMContentLoaded', function() {
  const urlParams = new URLSearchParams(window.location.search);
  let message = '';
  let type = '';

  if (urlParams.has('success')) {
    switch (urlParams.get('success')) {
      case '1':
        message = 'Zarezerwowano pomyślnie';
        break;
      case 'logout':
        message = 'Wylogowano pomyślnie';
        break;
      case 'registered':
        message = 'Wysłano mail weryfikacyjny';
        break;
      case 'emailverified':
        message = 'Email zweryfikowany';
        break;
      default:
        message = 'Operacja zakończona pomyślnie';
        break;
    }
    type = 'success';
  }

  if (urlParams.has('action')) {
    switch (urlParams.get('action')) {
      case 'logout':
        message = 'Wylogowano pomyślnie';
        break;
      case 'RoomNotAvailable':
        message = 'Brak wolnych pokoi w podanym terminie';
        break;
      case 'NotLoggedIn':
        message = 'Musisz być zalogowany, aby utworzyć rezerwację';
        break;
    }
    type = 'success';
  }

  if (urlParams.has('error')) {
    switch (urlParams.get('error')) {
      case 'NoAvailableRooms':
        message = 'Brak wolnych pokoi w podanym terminie';
        break;
      case 'RoomNotAvailable':
        message = 'Brak wolnych pokoi w podanym terminie';
        break;
      case 'allimputsmustbefilled':
        message = 'Wszystkie pola muszą być wypełnione';
        break;
      case 'passwordsdontmatch':
        message = 'Hasła nie są identyczne';
        break;
      case 'emailExists':
        message = 'Email jest już w bazie';
        break;
      case 'WrongData':
        message = 'Podano nieprawidłowe hasło lub email';
        break;
      case 'passwordtooshort':
        message = 'Hasło powinno mieć minimum 8 znaków';
        break;
      case 'wrongemail':
        message = 'Podano zły email';
        break;
      case 'NotLoggedIn':
        message = 'Musisz być zalogowany, aby utworzyć rezerwację';
        break;
      case 'emailnotverified':
        message = 'Konto nie jest zweryfikowane, sprawdź maila';
        break;
      default:
        message = 'Error';
        break;
    }
    type = 'error';
  }

  if (message) {
    showAlert(message, type);
  }
});

function showAlert(message, type) {
  const alertBox = document.createElement('div');
  alertBox.classList.add('fixed', 'text-xl', 'h-screen', 'top-0', 'left-0', 'w-full', 'flex', 'items-center', 'justify-center', 'z-50');

  const alertContent = document.createElement('div');
  alertContent.classList.add('bg-white', 'p-4', 'rounded-lg', 'shadow-lg', 'max-w-sm', 'mx-auto', 'text-center');

  if (type === 'success') {
    alertContent.classList.add('border', 'border-green-500', 'text-green-500');
  } else if (type === 'error') {
    alertContent.classList.add('border', 'border-red-500', 'text-red-500');
  }

  const alertMessage = document.createElement('p');
  alertMessage.textContent = message;
  alertContent.appendChild(alertMessage);

  const closeButton = document.createElement('button');
  closeButton.textContent = 'Ok';
  closeButton.classList.add('mt-4', 'bg-blue-500', 'text-white', 'px-4', 'py-2', 'rounded');
  closeButton.onclick = function() {
    document.body.removeChild(alertBox);
  };

  alertContent.appendChild(closeButton);
  alertBox.appendChild(alertContent);
  document.body.appendChild(alertBox);
}
