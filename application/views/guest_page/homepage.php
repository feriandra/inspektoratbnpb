<main id="main">
    <section id="hero" class="hero section">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-7 order-2 order-lg-1 d-flex flex-column justify-content-center">

                    <h1>INSPEKTORAT UTAMA BNPB</h1>

                    <p style="font-size: 19px;">Inspektorat Utama BNPB adalah unit pengawasan internal yang bertugas memastikan akuntabilitas, transparansi, dan
                        kepatuhan dalam seluruh penyelenggaraan penanggulangan bencana, melalui audit, reviu, evaluasi, pemantauan, serta pengawasan
                        kinerja di lingkungan BNPB</p>

                    <a href="<?= base_url('struktur-organisasi') ?>" class="btn-get-started" style="width: fit-content !important;"><b>STRUKTUR ORGANISASI</b></a>
                </div>
                <div class="col-lg-5 order-1 order-lg-2 hero-img d-flex justify-content-center">
                    <img src="<?= base_url(); ?>assets/public_page/img/LOGO.png" class="img-fluid" alt="Logo Inspektorat Utama BNPB" style="width: 300px; height: auto;">
                </div>
            </div>
        </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container" data-aos="fade-up">
            <div class="row gx-0">

                <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
                    <img src="<?= base_url(); ?>assets/public_page/img/highlight_foto.webp" class="img-fluid" alt="hightlight_image.webp">
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
                    <div class="content pt-4 pt-lg-0" style=" height: 100%; align-content: center; ">
                        <h2>Sekilas Tentang Kami</h2>
                        <p class="fst-italic">
                            Sejarah Lembaga Badan Nasional Penanggulangan Bencana (BNPB) terbentuk tidak terlepas dari perkembangan penanggulangan
                            bencana pada masa kemerdekaan hingga bencana alam berupa gempa bumi dahsyat di Samudera Hindia pada abad 20. Sementara itu,
                            perkembangan tersebut sangat dipengaruhi pada konteks situasi, cakupan dan paradigma penanggulangan bencana.

                            Melihat kenyataan saat ini, berbagai bencana yang dilatarbelakangi kondisi geografis, geologis, hidrologis, dan demografis
                            mendorong Indonesia untuk membangun visi untuk membangun ketangguhan bangsa dalam menghadapi bencana.
                        </p>
                    </div>
                </div>

                <div class="col-lg-12 d-flex flex-column justify-contents-center" data-aos="zoom-in">
                    <hr>
                    <h2>Visi & Misi Kami</h2>
                    <div class="content pt-4 pt-lg-0" style=" height: 100%; align-content: center; ">
                        <p class="fst-italic">
                            Visi kami untuk meningkatkan ketangguhan bangsa dalam menghadapi bencana dan
                            misi kami, yaitu
                        </p>
                        <ol>
                            <li>Melindungi bangsa dari ancaman bencana dengan membangun budaya pengurangan risiko bencana dan kesiapsiagaan dalam menghadapi bencana menjadi bagian yang terintegrasi dalam pembangunan nasional;</li>
                            <li>Membangun sistem penanganan darurat bencana secara cepat, efektif dan efisien;</li>
                            <li>Menyelenggarakan pemulihan wilayah dan masyarakat pascabencana melalui rehabilitasi dan rekonstruksi yang lebih baik yang terkoordinasi dan berdimensi pengurangan risiko bencana;</li>
                            <li>Menyelenggarakan dukungan dan tata kelola logistik dan peralatan penanggulangan bencana;</li>
                            <li>Menyelenggarakan penanggulangan bencana secara transparan dengan prinsip good governance.</li>
                        </ol>

                    </div>
                </div>

            </div>
        </div>

    </section><!-- /About Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Daftar Inspektur dan Kabag BNPB</h2>
            <p></p>
        </div><!-- End Section Title -->


        <?php
        $kabag = [
            [
                "jabatan" => "Inspektur Utama",
                "nama" => "Plt.Saeful Alam, S.E., Ak., CFrA., CFE., CA., CRMP.",
                "img_src" => base_url('assets/public_page/img/saefulalam2.jpg')
            ],
            [
                "jabatan" => "Inspektur 1",
                "nama" => "Saeful Alam, S.E., Ak., CFrA., CFE., CA., CRMP.",
                "img_src" => base_url('assets/public_page/img/saefulalam2.jpg')
            ],
            [
                "jabatan" => "Inspektur 2",
                "nama" => "Agus Hardja Santana, A.k., M.M. CA., CRMP., CRGP.",
                "img_src" => base_url('assets/public_page/img/agushardja2.jpg')
            ],
            [
                "jabatan" => "Inspektur 3",
                "nama" => "Plt.Kombes Pol Deden Nurhidayatullah., S.H., S.I.K., M.H., CPHR.",
                "img_src" => base_url('assets/public_page/img/kombes_inspektorat_3.jpg')
            ],
            [
                "jabatan" => "Kepala Bagian Tata Usaha",
                "nama" => "Erna Juita, S.E., M.M.",
                "img_src" => base_url('assets/public_page/img/ernajuita3.jpg')
            ],
        ];
        ?>

        <div class="container">
            <div class="row gy-5">
                <div class="row">
                    <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
                        <ul class="nav nav-tabs flex-column">
                            <?php foreach ($kabag as $key => $k) : ?>
                                <li class="nav-item custom-nav-item mb-2" data-aos="fade-up">
                                    <a class="nav-link <?= ($key == 0) ? 'active show' : '' ?>" data-bs-toggle="tab" href="#tab-<?= $key ?>">
                                        <h4><?= $k['jabatan'] ?></h4>
                                        <p><?= $k['nama'] ?></p>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
                        <div class="tab-content">
                            <?php foreach ($kabag as $key => $k) : ?>
                                <div class="tab-pane <?= ($key == 0) ? 'active show' : '' ?>" id="tab-<?= $key ?>" data-aos="fade-up" data-aos-delay="300">
                                    <figure class="cust-img-box">
                                        <img src="<?= $k['img_src'] ?>" alt=""
                                            class="img-fluid">
                                    </figure>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /Team Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Galeri</h2>
            <p></p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
                    <?php foreach ($video_yt as $video): ?>
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-video">
                            <div class="portfolio-content h-100">
                                <img src="<?= htmlspecialchars($video['thumbnail']) ?>" class="img-fluid w-100" alt="<?= htmlspecialchars($video['title']) ?>">
                                <div class="portfolio-info">
                                    <h4>Video YouTube</h4>
                                    <p><?= htmlspecialchars($video['title']) ?></p>
                                    <!-- Link untuk GLightbox -->
                                    <a href="<?= htmlspecialchars($video['url']) ?>" class="portfolio-lightbox preview-link" data-type="video" title="<?= htmlspecialchars($video['title']) ?>"><i class="bi bi-play-circle"></i></a>
                                    <a href="<?= htmlspecialchars($video['url']) ?>" title="Watch on YouTube" class="details-link" target="_blank"><i class="bi bi-link-45deg"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><!-- End Portfolio Container -->
            </div>
            <div class="d-flex align-items-center justify-content-center mt-5" data-aos="fade-up" data-aos-delay="200">
                <button onclick="window.open(`https://www.youtube.com/@bnpb_indonesia/videos`, `_blank`);" class="btn primary-button">Lihat Video Lainnya</button>
            </div>
        </div>

    </section><!-- /Portfolio Section -->

    <?php $akses = (!empty($this->session->userdata('logged_in')) && $this->session->userdata('privillage') != 2); ?>
    <!-- Pricing Section -->
    <section id="dokumen" class="pricing section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Lainnya</h2>
            <p></p>
        </div><!-- End Section Title -->

        <div class="container">

            <div class="row">
                <?php foreach ($dokumen as $d) : ?>
                    <?php if ($d->is_showing == 1) : ?>
                        <?php
                        $mainLink = "";
                        if (stripos(strtolower($d->title), "daftar pegawai") !== false) {
                            $mainLink = base_url('list-pegawai');
                        } else {
                            $mainLink = ($d->link ?? '#');
                        }
                        ?>
                        <div class="col-lg-4 col-md-6 py-3">
                            <div data-aos="zoom-in" data-aos-delay="100">
                                <div class="pricing-item" style="height: 512px !important;">
                                    <div class="d-flex flex-column justify-content-between h-100">
                                        <div>
                                            <div class="d-flex w-100 justify-content-center mb-5">
                                                <i class="<?= $d->icon ?> custom-icon-xe"></i>
                                            </div>
                                            <h2><?= $d->title ?></h2>
                                            <div style="height: 120px; overflow: hidden; text-overflow: ellipsis;">
                                                <p><?= $d->body ?></p>
                                            </div>
                                        </div>
                                        <div class="text-center"><a href="<?= ($akses) ? $mainLink : base_url('login') ?>" target="_blank" class="buy-btn">Lihat</a></div>
                                    </div>
                                </div>
                            </div><!-- End Pricing Item -->
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>

    </section><!-- /Pricing Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p></p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <div class="row gy-4">

                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="200">
                                <i class="bi bi-geo-alt"></i>
                                <h4>Lokasi:</h4>
                                <p>Jl. Rw. Jaya Jl. Pramuka No.38 11, RT.11/RW.5, Utan Kayu Utara</p>
                                <p>Kec. Matraman, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13120</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="300">
                                <i class="bi bi-telephone"></i>
                                <h2>Telepon</h2>
                                <p> (021) 29827793</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="400">
                                <i class="bi bi-envelope"></i>
                                <h2>Email</h2>
                                <p>contact@bnpb.go.id</p>
                            </div>
                        </div><!-- End Info Item -->

                        <div class="col-md-6">
                            <div class="info-item" data-aos="fade" data-aos-delay="500">
                                <i class="bi bi-clock"></i>
                                <h2>Jam buka</h2>
                                <p>Senin - Jum'at</p>
                                <p>8 Pagi - 6 Sore</p>
                            </div>
                        </div><!-- End Info Item -->

                    </div>

                </div>

                <div class="col-lg-6">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2845.782859829042!2d106.8660548749902!3d-6.192803593794823!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f4f5aeb78597%3A0x26ba158b7a7b4745!2sGRAHA%20Badan%20Nasional%20Penanggulangan%20Bencana!5e1!3m2!1sen!2sid!4v1756715704464!5m2!1sen!2sid"
                        frameborder="0" style="border:0; width: 100%; height: 100%;" allowfullscreen></iframe>
                </div><!-- End Contact Form -->

            </div>

        </div>

    </section><!-- /Contact Section -->
</main><!-- End #main -->

<style>
    .cust-img-box {
        height: 420px;
        overflow: hidden;
    }

    .cust-img-box img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        display: block;
    }

    .pricing .buy-btn:hover {
        background: #044086 !important;
        border-color: #044086 !important;
        color: #fff;
    }

    .pricing .buy-btn {
        background: #fff !important;
        border-color: #044086 !important;
        color: #044086;
    }

    .custom-nav-item {
        border-color: #000;
    }

    .custom-nav-item .nav-link h4 {
        color: #000;
    }

    .custom-nav-item .nav-link p {
        color: #818181ff;
    }

    .nav-tabs .nav-link.active {
        color: #fff !important;
        background-color: #044086;
        border-color: #044086;
    }

    .nav-tabs .nav-link {
        border-radius: 0.375rem !important;
    }

    .custom-nav-item .nav-link.active p {
        color: #fff !important;
    }

    .custom-nav-item .nav-link.active h4 {
        color: #fff !important;
    }
</style>

<script>
    const newLightbox = GLightbox({
        selector: '.portfolio-lightbox',
        type: 'video',
        source: 'youtube',
        autoplayVideos: true
    });
</script>