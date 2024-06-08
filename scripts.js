// scrool background

window.addEventListener('scroll', () => {
  const header = document.getElementById('mainHeader');
  const logo = document.querySelector('.logo');
  const links = document.querySelectorAll('.nav-link');
  const burger = document.querySelectorAll('.burger');

  if (window.scrollY > 50) {
    header.classList.add('h-20');
    header.classList.remove('h-28');
    header.classList.add('bg-opacity-80');
    header.classList.remove('h-28');
    logo.classList.add('h-16');
    logo.classList.remove('h-24');
    burger.classList.remove('h-14');
    burger.classList.add('h-10');
    burger.classList.remove('w-14');
    burger.classList.add('w-10');
  } else {
    header.classList.add('h-28');
    header.classList.remove('h-20');
    logo.classList.add('h-24');
    logo.classList.remove('h-16');
    header.classList.remove('bg-opacity-80');
    logo.classList.remove('h-20');
    burger.classList.remove('h-10');
    burger.classList.add('h-14');
    burger.classList.add('w-14');
    burger.classList.remove('w-10');
  }
});

// menu hamburger
function toggleMenu() {
  const menu = document.getElementById('menu');
  if (menu.classList.contains('hidden')) {
    menu.classList.remove('hidden');
    menu.classList.add('block');
  } else {
    menu.classList.add('hidden');
    menu.classList.remove('block');
  }
}
// buttonalert rezerwacje do poprawyy bo wyrzuca do formbold
function buttonalert() {
  window.confirm('Rezerwacja przebiegła pomyślnie!');
  window.confirm.location.href = 'index.html';
}

function slider() {
  document.addEventListener('alpine:init', () => {
    Alpine.data('imageSlider', () => ({
      currentIndex: 1,
      images: [
        '/images/image1.jpg',
        '/images/image2.jpg',
        '/images/image3.jpg',
      ],
      previous() {
        if (this.currentIndex > 1) {
          this.currentIndex = this.currentIndex - 1;
        }
      },
      forward() {
        if (this.currentIndex < this.images.length) {
          this.currentIndex = this.currentIndex + 1;
        }
      },
    }));
  });
}

function validateForm() {
  const pass = document.getElementById('pass').value;
  const passAgain = document.getElementById('pass2').value;
  if (pass !== passAgain) {
      alert('Hasła nie są zgodne.');
      return false;
  }

  const email = document.getElementById('email').value;
  const firstName = document.getElementById('firstName').value;
  const lastName = document.getElementById('lastName').value;

  if (email.length > 50) {
      alert('Adres email nie może przekraczać 50 znaków.');
      return false;
  }
  if (firstName.length > 30) {
      alert('Imię nie może przekraczać 30 znaków.');
      return false;
  }
  if (lastName.length > 30) {
      alert('Nazwisko nie może przekraczać 30 znaków.');
      return false;
  }

  return true;
}

function showAlert() {
  const alertBox = document.getElementById('alert-box');
  alertBox.classList.remove('hidden');
  setTimeout(() => {
    alertBox.classList.add('hidden');
  }, 5000); // Zmieniono na 5000 ms (5 sekund)
}
function showAlert1() {
  const alertBox = document.getElementById('alert-box1');
  alertBox.classList.remove('hidden');
  setTimeout(() => {
    alertBox.classList.add('hidden');
  }, 5000); // Zmieniono na 5000 ms (5 sekund)
}
function showAlert2() {
  const alertBox = document.getElementById('alert-box2');
  alertBox.classList.remove('hidden');
  setTimeout(() => {
    alertBox.classList.add('hidden');
  }, 5000); // Zmieniono na 5000 ms (5 sekund)
}
function showAlert3() {
  const alertBox = document.getElementById('alert-box3');
  alertBox.classList.remove('hidden');
  setTimeout(() => {
    alertBox.classList.add('hidden');
  }, 5000); // Zmieniono na 5000 ms (5 sekund)
}

window.onload = function() {
  const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('showAlert')) {
    showAlert();
  }
  if (urlParams.has('showAlert1')) {
    showAlert1();
  }
  if (urlParams.has('showAlert2')) {
    showAlert2();
  }
  if (urlParams.has('showAlert3')) {
    showAlert3();
  }
  
}



