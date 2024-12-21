document.addEventListener('alpine:init', () => {
  Alpine.data('products', () => ({
    items: [
      { id: 1, name: 'Tenda Pramuka', img: 'tenda1.jpg', price: 100000, stock: 15, rate: 4.9 },
      { id: 2, name: 'Tenda Kemah', img: 'tenda2.jpg', price: 200000, stock: 10, rate: 5.0 },
      { id: 3, name: 'Tenda Outdor', img: 'tenda3.jpg', price: 300000, stock: 35, rate: 3.0 },
      { id: 4, name: 'Tenda Kemah / Pramuka', img: 'tenda1.jpg', price: 400000, stock: 20, rate: 4.5 },
    ],
  }));
  Alpine.store('cart', {
    items: [],
    total: 0,
    quantity: 0,
    add(newItem) {
      // cek apakah ada barang yang sama
      const cartItem = this.items.find((item) => item.id === newItem.id);
      // jika belum ada / kosong
      if (!cartItem) {
        this.items.push({ ...newItem, quantity: 1, total: newItem.price });
        this.quantity++;
        this.total += newItem.price;
      } else {
        // jika barang sudah ada di cart,cek apakah barang beda atau sama dengan yang ada di cart
        this.items = this.items.map((item) => {
          // jika barang berbeda
          if (item.id !== newItem.id) {
            return item;
          } else {
            // jika barang sudah ada, quantity dan totalnya di tambah
            item.quantity++;
            item.total = item.price * item.quantity;
            this.quantity++;
            this.total += newItem.price;
            return item;
          }
        });
      }
      // console.log(this.items);
      // alert(`${newItem.name} berhasil ditambahkan ke keranjang!`);
    },
    remove(id) {
      // ambil item yang mau di remove berdasarkan id nya
      const cartItem = this.items.find((item) => item.id === id);
      // jika item lebih dari 1
      if (cartItem.quantity > 1) {
        // telusuri 1 1
        this.items = this.items.map((item) => {
          // jika bukan barang yang di klik
          if (item.id !== id) {
            return item;
          } else {
            item.quantity--;
            item.total = item.price * item.quantity;
            this.quantity--;
            this.total -= item.price;
            return item;
          }
        });
      } else if (cartItem.quantity === 1) {
        // jika barangnya sisa 1
        this.items = this.items.filter((item) => item.id !== id);
        this.quantity--;
        this.total -= cartItem.price;
      }
    },
  });
});

// Form Validasi
const checkoutButton = document.querySelector('#checkout-button'); // Seleksi tombol checkout
checkoutButton.disabled = true; // Nonaktifkan tombol secara default

const form = document.querySelector('#checkcoutForm'); // Seleksi formulir

form.addEventListener('keyup', function () {
  // Flag untuk mengecek apakah semua input memiliki nilai
  let allFieldsFilled = true;

  // Iterasi melalui semua elemen dalam formulir
  for (let i = 0; i < form.elements.length; i++) {
    const element = form.elements[i];

    // Periksa input tipe teks dan nomor
    if (element.tagName === 'INPUT' && element.type !== 'hidden' && element.value.trim() === '') {
      allFieldsFilled = false;
      break;
    }
  }

  // Atur status tombol berdasarkan validasi
  if (allFieldsFilled) {
    checkoutButton.disabled = false;
    checkoutButton.classList.remove('disabled');
  } else {
    checkoutButton.disabled = true;
    checkoutButton.classList.add('disabled');
  }
});

// Kirim data
checkoutButton.addEventListener('click', async function (e) {
  e.preventDefault();
  const formData = new FormData(form);
  const data = new URLSearchParams(formData);
  const objData = Object.fromEntries(data);
  // const message = formatMessage(objData);
  // window.open('https://wa.me/628?text=' + encodeURIComponent(message));

  // mengambil transaski token dengan ajax
  try {
    const response = await fetch('../backend/placeOrder.php', {
      method: 'POST',
      body: data,
    });
    // console.log(await response.text()); // Log response untuk debugging

    // const token = await response.text();
    // console.log(token);
    // window.snap.pay(token);
    const result = await response.json();
if (result.snapToken) {
    window.snap.pay(result.snapToken); // Pastikan snapToken adalah string langsung
} else {
    console.error('Error:', result.error);
}

  } catch (err) {
    console.log(err.message);
  }
});
// format pesan ke whatsap
// const formatMessage = (obj) => {
//   return `Data Customer
//   Nama : ${obj.name}
//   Email : ${obj.email}
//   No HP : ${obj.phone}

// Order Details
// ${JSON.parse(obj.items).map((item) => `${item.name} (${item.quantity} x ${rupiah(item.total)}) \n`)}
// Thank to Order
//   `;
// };

// // convert to rupiah
const rupiah = (number) => {
  return new Intl.NumberFormat('id-ID', {
    style: 'currency',
    currency: 'IDR',
    minimumFractionDigits: 0,
  }).format(number);
};
