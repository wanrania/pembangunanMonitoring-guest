@extends('layouts.guest.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid overflow-hidden px-0">
        <div id="carouselId" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1s"
                style="animation-delay: 1s;">
                <li data-bs-target="#carouselId" data-bs-slide-to="0" class="active" aria-current="true"
                    aria-label="First slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="1" aria-label="Second slide"></li>
                <li data-bs-target="#carouselId" data-bs-slide-to="2" aria-label="Third slide"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="{{ asset('assets-guest/img/carousel-1.jpg') }}" class="img-fluid w-100" alt="First slide" />
                    <div class="carousel-caption">
                        <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">
                            Bisnis Konstruksi Profesional
                        </p>

                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">
                            Kami Membangun Sesuatu yang Baru, Kokoh, dan Berkelanjutan.
                        </h1>

                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">
                            Kami menghadirkan solusi konstruksi yang mengutamakan kualitas, ketepatan, dan inovasi.
                            Dengan pengalaman dan dedikasi tim profesional, setiap proyek kami jalankan dengan standar
                            terbaik
                            untuk menciptakan hasil yang aman, kuat, dan bernilai jangka panjang.
                        </p>
                    </div>

                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/carousel-2.jpg') }}" class="img-fluid w-100" alt="Second slide" />
                    <div class="carousel-caption">
                        <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">
                            Inovasi dalam Konstruksi
                        </p>

                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">
                            Dari Konsep Menjadi Karya yang Menginspirasi.
                        </h1>

                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">
                            Kami menghadirkan solusi pembangunan modern yang menggabungkan kreativitas, presisi, dan
                            teknologi untuk menghasilkan konstruksi yang unggul dan bernilai jangka panjang.
                        </p>
                    </div>

                </div>
                <div class="carousel-item">
                    <img src="{{ asset('assets-guest/img/carousel-3.jpg') }}" class="img-fluid w-100" alt="Third slide" />
                    <div class="carousel-caption">
                        <p class="text-uppercase text-secondary fs-4 mb-0 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1s" style="animation-delay: 1s;">
                            Industri Konstruksi Profesional
                        </p>

                        <h1 class="display-1 text-capitalize text-white mb-4 fadeInUp animate__animated"
                            data-animation="fadeInUp" data-delay="1.3s" style="animation-delay: 1.3s;">
                            Kami Membangun Inovasi yang Kokoh dan Berkelanjutan.
                        </h1>

                        <p class="mb-5 fs-5 fadeInUp animate__animated" data-animation="fadeInUp" data-delay="1.5s"
                            style="animation-delay: 1.5s;">
                            Kami berkomitmen menghadirkan pembangunan berkualitas tinggi melalui perencanaan matang,
                            ketelitian, dan keahlian profesional. Setiap proyek dikerjakan dengan standar terbaik untuk
                            menghasilkan
                            konstruksi yang kuat, aman, dan tahan lama.
                        </p>
                    </div>

                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                <span class="carousel-control-prev-icon btn-lg-square fadeInLeft animate__animated" aria-hidden="true"
                    data-animation="fadeInLeft" data-delay="1.1s" style="animation-delay: 1.3s;"><i
                        class="fas fa-chevron-left fa-2x"></i></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                <span class="carousel-control-next-icon btn-lg-square fadeInRight animate__animated" aria-hidden="true"
                    data-animation="fadeInRight" data-delay="1.1s" style="animation-delay: 1.3s;"><i
                        class="fas fa-chevron-right fa-2x"></i></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->

    {{-- <!-- About Start -->
    <div class="container-fluid about py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.1s">
                    <div class="about-item-image d-flex">
                        <img src="{{ asset('assets-guest/img/about.jpg') }}" class="img-1 img-fluid w-50" alt="">
                        <img src="{{ asset('assets-guest/img/about-3.jpg') }}" class="img-2 img-fluid w-50"
                            alt="">
                        <div class="about-item-image-content">
                            <img src="{{ asset('assets-guest/img/about-1.png') }}" class="img-fluid w-100 h-100"
                                style="object-fit: cover;" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="about-item-content">
                        <p class="text-uppercase text-secondary fs-5 mb-0">WE ARE CONSTRUCTION COMPANY</p>
                        <h2 class="display-4 text-capitalize mb-3">Making your vision come true at the basics.</h2>
                        <p class="mb-4 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                        </p>
                        <div class="pb-4 mb-4 border-bottom">
                            <div class="row g-4">
                                <div class="col-lg-4">
                                    <div class="about-item-content-img">
                                        <img src="{{ asset('assets-guest/img/about-2.jpg') }}" class="img-fluid w-100"
                                            alt="">
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <div class="d-flex mb-4">
                                        <div class="text-secondary">
                                            <i class="fas fa-user-shield fa-3x"></i>
                                        </div>
                                        <h4 class="ms-3">Building quality standards</h4>
                                    </div>
                                    <div class="d-flex">
                                        <div class="text-secondary">
                                            <i class="fas fa-users-cog fa-3x"></i>
                                        </div>
                                        <h4 class="ms-3">Certified engineer’s team</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row gy-0 gx-4 justify-content-between pb-4">
                            <div class="col-lg-6">
                                <p class="text-dark"><i class="fas fa-check text-secondary me-1"></i> 100%
                                    Satisfaction</p>
                                <p class="text-dark"><i class="fas fa-check text-secondary me-1"></i> Trained Emploies
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p class="text-dark"><i class="fas fa-check text-secondary me-1"></i> Annual Pass
                                    Programs</p>
                                <p class="text-dark mb-0"><i class="fas fa-check text-secondary me-1"></i> Flexible
                                    and cost effective</p>
                            </div>
                        </div>
                        <a class="btn btn-secondary d-inline-block py-3 px-5 me-2 flex-shrink-0 wow fadeInUp"
                            data-wow-delay="0.1s" href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End --> --}}

    <!-- Features Start -->
<div class="container-fluid feature bg-light py-5">
    <div class="container py-5">

        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0">Mengapa Memilih Kami</p>
            <h2 class="display-4 text-capitalize mb-3">Komitmen Layanan Terbaik dalam Pelaksanaan Pembangunan</h2>
        </div>

        <div class="row g-4">

            <!-- 1. Engineer -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                <div class="feature-item text-center border p-5">
                    <div class="feature-img bg-secondary d-inline-flex p-4">
                        <i class="fas fa-city text-primary fa-5x"></i>
                    </div>
                    <a href="#" class="h4 d-block my-4">Insinyur Profesional dan Berkompeten</a>
                    <p class="mb-0">
                        Didukung oleh sumber daya manusia yang berpengalaman dan tersertifikasi, kami memastikan
                        setiap proses perencanaan dan pelaksanaan pembangunan dilakukan sesuai ketentuan teknis
                        dan standar operasional yang berlaku.
                    </p>
                </div>
            </div>

            <!-- 2. Estimates -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                <div class="feature-item text-center border p-5">
                    <div class="feature-img bg-secondary d-inline-flex p-4">
                        <i class="fas fa-funnel-dollar text-primary fa-5x"></i>
                    </div>
                    <a href="#" class="h4 d-block my-4">Perhitungan Anggaran yang Transparan</a>
                    <p class="mb-0">
                        Penyusunan estimasi biaya dilakukan secara akuntabel, transparan, dan berdasarkan analisis
                        kebutuhan lapangan, sehingga setiap pemangku kepentingan memperoleh informasi yang jelas
                        dan dapat dipertanggungjawabkan.
                    </p>
                </div>
            </div>

            <!-- 3. Quality Materials -->
            <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                <div class="feature-item text-center border p-5">
                    <div class="feature-img bg-secondary d-inline-flex p-4">
                        <i class="fas fa-tools text-primary fa-5x"></i>
                    </div>
                    <a href="#" class="h4 d-block my-4">Material Berkualitas dan Bersertifikasi</a>
                    <p class="mb-0">
                        Penggunaan material konstruksi dilakukan melalui proses seleksi ketat sesuai standar mutu
                        yang ditetapkan, guna memastikan hasil pembangunan yang aman, kuat, dan berkelanjutan.
                    </p>
                </div>
            </div>

        </div>

    </div>
</div>
<!-- Features End -->



    <!-- Testimonials Start -->
<div class="container-fluid service bg-light pb-5">
    <div class="container pb-5">

        <!-- SECTION TITLE -->
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <p class="text-uppercase text-secondary fs-5 mb-0">Testimoni</p>
            <h2 class="display-4 text-capitalize mb-3">Pendapat dari Para Pemangku Kepentingan</h2>
        </div>

        <!-- CAROUSEL -->
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.4s">

            <!-- ITEM 1 -->
            <div class="testimonial-item bg-light p-4 border rounded">
                <div class="position-relative">

                    <i class="fa fa-quote-right fa-2x text-primary position-absolute"
                       style="bottom: 30px; right: 0;"></i>

                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            “Pelaksanaan pembangunan berjalan sangat transparan dan sesuai dengan perencanaan.
                            Proses koordinasi antara pihak terkait juga berjalan efektif sehingga hasil proyek
                            memenuhi standar kualitas.”
                        </p>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <img src="{{ asset('assets-guest/img/testimonial-1.jpg') }}"
                                 class="img-fluid rounded"
                                 style="width: 90px; height: 90px; object-fit: cover;" alt="Foto Klien">
                        </div>

                        <div>
                            <h4 class="text-dark mb-1">Siti Marlina</h4>
                            <p class="m-0 pb-2 text-muted">Kepala Bidang Infrastruktur</p>

                            <div class="d-flex text-secondary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-muted"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="testimonial-item bg-light p-4 border rounded">
                <div class="position-relative">

                    <i class="fa fa-quote-right fa-2x text-primary position-absolute"
                       style="bottom: 30px; right: 0;"></i>

                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            “Tim pelaksana menunjukkan profesionalisme tinggi serta ketepatan dalam penyelesaian
                            pekerjaan. Setiap tahapan dilaporkan dengan jelas dan mudah diakses.”
                        </p>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <img src="{{ asset('assets-guest/img/testimonial-2.jpg') }}"
                                 class="img-fluid rounded"
                                 style="width: 90px; height: 90px; object-fit: cover;" alt="Foto Klien">
                        </div>

                        <div>
                            <h4 class="text-dark mb-1">Abdul Rahman</h4>
                            <p class="m-0 pb-2 text-muted">Pengawas Lapangan</p>

                            <div class="d-flex text-secondary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star text-muted"></i>
                                <i class="fas fa-star text-muted"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- ITEM 3 -->
            <div class="testimonial-item bg-light p-4 border rounded">
                <div class="position-relative">

                    <i class="fa fa-quote-right fa-2x text-primary position-absolute"
                       style="bottom: 30px; right: 0;"></i>

                    <div class="mb-4 pb-4 border-bottom border-secondary">
                        <p class="mb-0">
                            “Kualitas material yang digunakan sangat baik dan sesuai spesifikasi teknis. Proyek
                            selesai tepat waktu dengan hasil yang kokoh dan aman bagi masyarakat.”
                        </p>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="me-4">
                            <img src="{{ asset('assets-guest/img/testimonial-3.jpg') }}"
                                 class="img-fluid rounded"
                                 style="width: 90px; height: 90px; object-fit: cover;" alt="Foto Klien">
                        </div>

                        <div>
                            <h4 class="text-dark mb-1">Heri Pratama</h4>
                            <p class="m-0 pb-2 text-muted">Konsultan Teknis</p>

                            <div class="d-flex text-secondary">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
<!-- Testimonials End -->


    {{-- <!-- Fact Counter -->
    <div class="container-fluid counter py-5">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-thumbs-up fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Completed Projects</h4>
                                <div class="counter-counting">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">456</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-users fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Happy Customers</h4>
                                <div class="counter-counting">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">513</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-user fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Qualified Engineers</h4>
                                <div class="counter-counting">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">53</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="counter-box">
                        <div class="counter-item">
                            <div class="counter-item-style"></div>
                            <div class="counter-item-inner p-5">
                                <i class="fas fa-heart fa-4x text-secondary"></i>
                                <h4 class="text-dark my-4">Years Experiance</h4>
                                <div class="counter-counting">
                                    <span class="text-secondary fs-2 fw-bold" data-toggle="counter-up">17</span>
                                    <span class="h1 fw-bold text-secondary">+</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center pt-4 wow fadeInUp" data-wow-delay="0.9s">
                    <a class="counter-btn btn btn-secondary py-3 px-5" href="#">Join With Us</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact Counter --> --}}

    {{-- <!-- Projects Start -->
    <div class="container-fluid project py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Projects</p>
                <h2 class="display-4 text-capitalize mb-3">Recent Completed Projects</h2>
            </div>
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="project-img">
                                    <img src="{{ asset('assets-guest/img/project-1.jpg') }}"
                                        class="img-fluid w-100 pt-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">Architecture</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="project-img">
                                    <img src="{{ asset('assets-guest/img/project-2.jpg') }}"
                                        class="img-fluid w-100 pt-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">Interior Design</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="project-img">
                                    <img src="{{ asset('assets-guest/img/project-3.jpg') }}"
                                        class="img-fluid w-100 pt-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">House & Exterior</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="project-item">
                        <div class="row g-4">
                            <div class="col-md-4">
                                <div class="project-img">
                                    <img src="{{ asset('assets-guest/img/project-4.jpg') }}"
                                        class="img-fluid w-100 pt-3 ps-3" alt="">
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="project-content mb-4">
                                    <p class="fs-5 text-secondary mb-2">Interior Design</p>
                                    <a href="#" class="h4">We Building Everything</a>
                                    <p class="mb-0 mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                        Tenetur tempore perferendis velit minus, perspiciatis eveniet adipisci tempora
                                        voluptatem quis dolores.</p>
                                </div>
                                <a class="btn btn-primary py-2 px-4" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                    <a class="btn btn-secondary py-3 px-5" href="#">More Projects</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Projects End --> --}}

    {{-- <!-- Team Start -->
    <div class="container-fluid team pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">Our Team</p>
                <h2 class="display-4 text-capitalize mb-3">Expert team members.</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('assets-guest/img/team-1.jpg') }}" class="img-fluid w-100"
                                alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('assets-guest/img/team-2.jpg') }}" class="img-fluid w-100"
                                alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('assets-guest/img/team-3.jpg') }}" class="img-fluid w-100"
                                alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 wow fadeInUp" data-wow-delay="0.8s">
                    <div class="team-item border border-primary p-1">
                        <div class="team-border-style-1"></div>
                        <div class="team-border-style-2"></div>
                        <div class="team-border-style-3"></div>
                        <div class="team-border-style-4"></div>
                        <div class="team-img">
                            <img src="{{ asset('assets-guest/img/team-4.jpg') }}" class="img-fluid w-100"
                                alt="">
                            <div class="team-icon d-flex justify-content-around">
                                <a class="btn btn-secondary btn-md-square text-white mx-3" href=""><i
                                        class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-twitter"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a class="btn btn-secondary btn-md-square text-white me-3" href=""><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center border border-top-0 bg-white py-3">
                            <h4 class="mb-0">Masud Maria</h4>
                            <p class="mb-0">Foreman</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End --> --}}

    {{-- <!-- Blog Start -->
    <div class="container-fluid blog pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <p class="text-uppercase text-secondary fs-5 mb-0">News & Blog</p>
                <h2 class="display-4 text-capitalize mb-3">Our latest news post and articles?</h2>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="blog-item h-100">
                        <div class="blog-img">
                            <img src="{{ asset('assets-guest/img/blog-1.jpg') }}" class="img-fluid w-100"
                                alt="">
                        </div>
                        <div class="blog-content p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0"><i class="fa fa-calendar-check text-secondary me-1"></i> 26 April
                                    2025</p>
                                <p class="mb-0"><i class="fa fa-user text-secondary me-1"></i> Admin</p>
                            </div>
                            <a href="#" class="h4 d-block mb-4">Emerging Tech Trends What to in the Next
                                Decade</a>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="blog-item h-100">
                        <div class="blog-img">
                            <img src="{{ asset('assets-guest/img/blog-2.jpg') }}" class="img-fluid w-100"
                                alt="">
                        </div>
                        <div class="blog-content p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0"><i class="fa fa-calendar-check text-secondary me-1"></i> 26 April
                                    2025</p>
                                <p class="mb-0"><i class="fa fa-user text-secondary me-1"></i> Admin</p>
                            </div>
                            <a href="#" class="h4 d-block mb-4">Emerging Tech Trends What to in the Next
                                Decade</a>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="blog-item h-100">
                        <div class="blog-img">
                            <img src="{{ asset('assets-guest/img/blog-3.jpg') }}" class="img-fluid w-100"
                                alt="">
                        </div>
                        <div class="blog-content p-4">
                            <div class="d-flex justify-content-between mb-3">
                                <p class="mb-0"><i class="fa fa-calendar-check text-secondary me-1"></i> 26 April
                                    2025</p>
                                <p class="mb-0"><i class="fa fa-user text-secondary me-1"></i> Admin</p>
                            </div>
                            <a href="#" class="h4 d-block mb-4">Emerging Tech Trends What to in the Next
                                Decade</a>
                            <a class="btn btn-secondary py-2 px-4" href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog End --> --}}
@endsection
