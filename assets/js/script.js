document.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 50) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});

// nav

document.addEventListener('DOMContentLoaded', () => {
  // Simulasi apakah user sudah login (gunakan data dari server untuk kasus nyata)
  // Menggunakan PHP untuk menentukan status login
const isLoggedIn = true; // Simulasi user sudah login
  // Jika user sudah login, maka tampilkan tombol logout
  if (isLoggedIn) {
      const loginButton = document.querySelector('#loginButton'); // Tombol Login
      const registerButton = document.querySelector('#registerButton'); // Tombol Register

      if (loginButton) loginButton.style.display = 'none'; // Sembunyikan tombol login
      if (registerButton) registerButton.style.display = 'none'; // Sembunyikan tombol register
  }else {
    // Jika user belum login, tampilkan tombol login dan register
    if (loginButton) loginButton.style.display = 'block'; // Tampilkan tombol login
    if (registerButton) registerButton.style.display = 'block'; // Tampilkan tombol register
}
  
});

// Container tempat bintang jatuh
const starfall = document.getElementById('starfall');

// Fungsi untuk membuat bintang
function createStar() {
  const star = document.createElement('div');
  star.classList.add('star');
  
  // Posisi horizontal acak
  star.style.left = Math.random() * 100 + 'vw';
  
  // Durasi animasi acak
  star.style.animationDuration = Math.random() * 2 + 2 + 's';
  
  // Ukuran bintang acak
  star.style.width = star.style.height = Math.random() * 3 + 'px';
  
  starfall.appendChild(star);
  
  // Hapus bintang setelah animasi selesai
  setTimeout(() => {
    star.remove();
  }, 3000);
}

// Loop untuk menambahkan bintang
setInterval(createStar, 150);

document.addEventListener('DOMContentLoaded', function() {
  feather.replace();
});
// Toggle class active untuk hamburger menu
const navbarNav = document.querySelector('.navbar-nav');
// ketika hamburger menu di klik
document.querySelector('#hamburger-menu').onclick = () => {
  navbarNav.classList.toggle('active');
};

// Toggle class active untuk search form
const searchForm = document.querySelector('.search-form');
const searchBox = document.querySelector('#search-box');

document.querySelector('#search-button').onclick = (e) => {
  searchForm.classList.toggle('active');
  searchBox.focus();
  e.preventDefault();
};

// Toggle class active untuk shopping cart
const shoppingCart = document.querySelector('.shopping-cart');
document.querySelector('#shopping-cart-button').onclick = (e) => {
  shoppingCart.classList.toggle('active');
  e.preventDefault();
};

// Klik di luar elemen
const hm = document.querySelector('#hamburger-menu');
const sb = document.querySelector('#search-button');
const sc = document.querySelector('#shopping-cart-button');

document.addEventListener('click', function (e) {
  if (!hm.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove('active');
  }

  if (!sb.contains(e.target) && !searchForm.contains(e.target)) {
    searchForm.classList.remove('active');
  }

  if (!sc.contains(e.target) && !shoppingCart.contains(e.target)) {
    shoppingCart.classList.remove('active');
  }
});

// Modal Box
const itemDetailModal = document.querySelector('#item-detail-modal');
const itemDetailButtons = document.querySelectorAll('.item-detail-button');

itemDetailButtons.forEach((btn) => {
  btn.onclick = (e) => {
    itemDetailModal.style.display = 'flex';
    e.preventDefault();
  };
});

// klik tombol close modal
document.querySelector('.modal .close-icon').onclick = (e) => {
  itemDetailModal.style.display = 'none';
  e.preventDefault();
};

// klik di luar modal
window.onclick = (e) => {
  if (e.target === itemDetailModal) {
    itemDetailModal.style.display = 'none';
  }
};
//slider
document.addEventListener("DOMContentLoaded", function () {
  // Mengatur interval auto-slide pada carousel
  let carousel = document.querySelector('#aboutCarousel');
  let carouselInstance = new bootstrap.Carousel(carousel, {
      interval: 500, // Waktu pindah slide (dalam milidetik), di sini 1 detik
      ride: 'carousel'
  });
});


