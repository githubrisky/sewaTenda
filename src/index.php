<!-- <?php 
// session_start();
// if (!isset($_SESSION['username'])) {
// header("Location: login.php");
// exit();
// }
// ?> -->
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sewa Tenda</title>
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
        data-client-key="CLIENT-KEY-MIDTRANS"></script>
</head>

<body>
    <!-- NAVBAR START-->
    <?php include ('../components/navbar.php');?>
    <!-- HERO END -->
    <section id="hero" class="text-center">
        <div class="hero-image">
            <!-- Container untuk Rasi Bintang -->
            <div id="starfall"></div>

            <div class="hero-text">
                <h5>Pengen Camping?</h5>
                <h3>Sewa peralatan disini</h3>
                <h1>PASTI</h1>
                <h6>Aman - Berkualitas - Murah</h6>
                <button class="btn btn-primary" href="#product">Sewa Sekarang</button>
            </div>
        </div>
    </section>
    <!-- HERO END-->
    <!-- TENTANG KAMI START -->
    <section id="about" class="container-fluid bg-light shadow mb-2 py-100">
        <div class="about container">
            <h1 class="tagline">TENTANG KAMI</h1>
            <div class="content text-center mb-4">
                <h3>Selamat datang di SewaTenda, penyedia solusi terbaik untuk kebutuhan camping Anda!</h3>
                <p>
                    Kami memahami pentingnya kenyamanan dan kepercayaan saat menjelajahi alam bebas. Oleh karena itu
                    SewaTenda hadir dengan peralatan camping berkualitas tinggi, aman, dan terpercaya untuk menjadikan
                    pengalaman outdoor Anda lebih menyenangkan dan tanpa khawatir.
                </p>
                <p>
                    Dengan berbagai pilihan perlengkapan camping yang lengkap dan harga yang terjangkau, kami
                    berkomitmen untuk memberikan pelayanan terbaik kepada pelanggan. Mulai dari tenda, matras, sleeping
                    bag, hingga perlengkapan memasak, semua tersedia untuk memenuhi kebutuhan petualangan Anda.
                    Mari ciptakan momen tak terlupakan bersama SewaTenda. Jadikan perjalanan camping Anda lebih seru dan
                    praktis bersama kami!
                </p>
            </div>

            <!-- Carousel -->
            <div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- Slide 1 -->
                    <div class="carousel-item active">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <img src="../assets/images/slider/photo1.jpg" class="img-fluid rounded"
                                    alt="Gunung 1" />
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/images/slider/photo2.jpg" class="img-fluid rounded"
                                    alt="Gunung 2" />
                            </div>
                        </div>
                    </div>
                    <!-- Slide 2 -->
                    <div class="carousel-item">
                        <div class="row text-center">
                            <div class="col-md-6">
                                <img src="../assets/images/slider/photo3.jpg" class="img-fluid rounded"
                                    alt="Gunung 3" />
                            </div>
                            <div class="col-md-6">
                                <img src="../assets/images/slider/photo6.jpg" class="img-fluid rounded"
                                    alt="Gunung 4" />
                            </div>
                        </div>
                    </div>
                    <!-- Tambahkan slide lainnya jika diperlukan -->
                </div>

                <!-- Kontrol navigasi -->
                <button class="carousel-control-prev" type="button" data-bs-target="#aboutCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#aboutCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- TENTANG KAMI END -->
    <!-- PRODUK START -->
    <section id="product" class="product container-fluid bg-light shadow rounded-3 mb-2" x-data="products">
        <div class="container">
            <h1 class="title-product">PRODUK</h1>
            <div class="category">
                <a href="#">Tenda</a>
                <a href="#">Ransel</a>
                <a href="#">Sepatu</a>
            </div>
            <div class="row row-cols-md-4 g-4">
                <template x-for="(item, index) in items" x-key="index">
                    <div class="col">
                        <div class="card">
                            <img :src="`../assets/images/products/${item.img}`" class="card-img-top" :alt="item.name" />
                            <div class="card-img-overlay d-flex justify-content-end">
                                <a href="#" class="card-link">
                                    <i data-feather="heart"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title" x-text="item.name"></h4>
                                <span class="product-rate">Rate :
                                    <span x-text="item.rate"></span><i data-feather="star"></i>
                                </span>

                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="price text-primary" x-text="rupiah(item.price)"></span>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <button type="button" class="btn btn-primary">
                                            <a href="#" class="item-detail-button feather-icons"><i
                                                    data-feather="eye"></i></a>
                                        </button>
                                        <button type="button" class="btn btn-primary">
                                            <a href="#" @click.prevent="$store.cart.add(item)"><i
                                                    data-feather="shopping-cart"></i></a>
                                        </button>
                                    </div>
                                </div>
                </template>
            </div>
        </div>
    </section>
    <!-- PRODUK END -->
    <!-- KONTAK START -->
    <section id="contact" class="contact bg-light">
        <div class="container">
            <h2 class="title-contact mb-4">CONTACT</h2>
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-6">
                    <h4>Get in Touch</h4>
                    <p>Jika kamu memiliki pertanyaaan, hubungi kami.</p>
                    <ul class="list-unstyled">
                        <li><i data-feather="map-pin" class="me-2"></i><strong>Alamat :</strong> 123 Main Street,
                            Jakarta, Indonesia</li>
                        <li><i data-feather="phone" class="me-2"></i><strong>Telepon :</strong> +62 812 3456 7890
                        </li>
                        <li><i data-feather="mail" class="me-2"></i><strong>Email :</strong> contact@example.com
                        </li>
                    </ul>
                </div>
                <!-- Contact Form -->
                <div class="col-md-6">
                    <form>
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name" />
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email" />
                        </div>
                        <div class="mb-3">
                            <label for="message" class="form-label">Message</label>
                            <textarea class="form-control" id="message" rows="4" placeholder="Your Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- KONTAK END -->

    <!-- FOOTER -->

    <?php include ('../components/footer.php')?>
    <!-- FOOTER END -->
    <!-- Feather Icons -->
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
    <script src="../js/app.js"></script>

</body>

</html>