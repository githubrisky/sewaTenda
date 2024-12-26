<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet" />
<!-- Feather Icons -->
<script src="https://unpkg.com/feather-icons"></script>
<!-- css sendiri  -->
<link rel="stylesheet" href="../assets/css/style.css" />
<!-- Midtrans Script -->
<script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js"
    data-client-key="SB-Mid-client-gTN69I8mNZY_k6MV"></script>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-transparent fixed-top" x-data>
        <div class="container">
            <a class="navbar-brand" href="#">SewaTenda</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon bg-light"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">BERANDA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">TENTANG KAMI</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#product">PRODUK</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">KONTAK</a>
                    </li>
                </ul>
            </div>
            <div class="navbar-extra d-flex">
                <a href="#" id="search-button"><i data-feather="search"></i></a>
                <a href="#" id="shopping-cart-button">
                    <i data-feather="shopping-cart"></i>
                    <span class="quantity-notif" x-show="$store.cart.quantity" x-text="$store.cart.quantity"></span>
                </a>
                <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
            </div>
            <a class="loginButton btn btn-primary me-2" id="loginButton" href="#">Login</a>
            <a class="registerButton btn btn-outline-light" id="registerButton" href="#">Register</a>
            <!-- Search Form start -->
            <div class="search-form">
                <input type="search" id="search-box" placeholder="search here..." />
                <label for="search-box"><i data-feather="search"></i></label>
            </div>
            <!-- Search Form end -->

            <!-- Shopping Cart start -->
            <div class="shopping-cart">
                <h3 x-show="$store.cart.items.length">Barang di Keranjangmu</h3>
                <template x-for="(item, index) in $store.cart.items" x-key="index">
                    <div class="cart-item">
                        <img :src="`../assets/images/products/${item.img}`" :alt="item.name" />
                        <div class="item-detail">
                            <h3 x-text="item.name"></h3>
                            <div class="item-price">
                                <span x-text="rupiah(item.price)"></span> &times;
                                <button id="remove" @click="$store.cart.remove(item.id)">&minus;</button>
                                <span x-text="item.quantity"></span>
                                <button id="add" @click="$store.cart.add(item)">&plus;</button>&equals;
                                <span x-text="rupiah(item.total)"></span>
                            </div>
                        </div>
                    </div>
                </template>
                <h4 x-show="!$store.cart.items.length" style="margin-top: 1rem">Keranjang Kosong, Sewa Sekarang</h4>
                <h4 x-show="$store.cart.items.length">Total : <span x-text="rupiah($store.cart.total)"></span></h4>
                <div class="form-container shadow rounded-3" x-show="$store.cart.items.length">
                    <form action="" id="checkcoutForm">
                        <input type="hidden" name="items" x-model="JSON.stringify($store.cart.items)">
                        <input type="hidden" name="total" x-model="$store.cart.total">
                        <h5 class="text-center">Customer Details</h5>
                        <label for="name">
                            <span>Name</span>
                            <input type="text" name="name" id="name" class="form-control" />
                        </label>

                        <label for="email">
                            <span>Email</span>
                            <input type="text" name="email" id="email" class="form-control" />
                        </label>

                        <label for="phone">
                            <span>No Telepon</span>
                            <input type="number" name="phone" id="phone" autocomplete="off" class="form-control" />
                        </label>
                        <!-- <label for="date">
                <span>Tanggal Pinjam</span>
                <input type="date" name="date" id="date" class="form-control" />
              </label>
              <label for="date">
                <span>Tanggal Kembali</span>
                <input type="date" name="date" id="date" class="form-control" />
              </label> -->
                        <button class="checkout-button disabled" type="button" id="checkout-button"
                            value="checkout">CheckOut</button>
                    </form>
                </div>
            </div>
            <!-- Shopping Cart end -->
        </div>
    </nav>

    <script>
    feather.replace();
    </script>

    <!-- Boostraps -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <!-- Alphine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <!-- javascript eksternal -->
    <script src="../assets/js/script.js"></script>
    <!-- App JS -->
    <script src="../src/app.js"></script>