<main id="main">
    <section id="hero" style="padding-bottom: 0px !important;">
        <div class="container">
            <div class="row">
                <div class="section-title" data-aos="fade-up" style="text-align: left; padding-bottom: 0px !important;">
                    <div class="d-flex justify-content-between">
                        <h2>Struktur Organisasi</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="portfolio" class="portfolio" style="padding-top: 0px !important;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
                    <img src="<?= base_url(); ?>assets/public_page/img/struktur_org/img_5.jpg" style="width: 100%;">
                </div>
            </div>
        </div>
        <?php
        $data = [
            [
                "title" => "Sekretariat Utama",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_4.jpg')
            ],
            [
                "title" => "-",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_3.jpg')
            ],
            [
                "title" => "Pusat Data, Informasi dan Komunikasi Kebencanaan",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_6.jpg')
            ],
            [
                "title" => "Pusat Pendidikan dan Pelatihan Penanggulangan Bencana",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_7.jpg')
            ],
            [
                "title" => "Pusat Pengendalian Operasi",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_8.jpg')
            ],
            [
                "title" => "Deputi Bidang Sistem dan Strategi",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_9.jpg')
            ],
            [
                "title" => "Deputi Bidang Pencegahan",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_10.jpg')
            ],
            [
                "title" => "Deputi Bidang Penanganan Darurat",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_11.jpg')
            ],
            [
                "title" => "Deputi Bidang Rehabilitasi dan Rekonstruksi",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_12.jpg')
            ],
            [
                "title" => "Deputi Bidang Logistik dan Peralatan",
                "img_src" => base_url('assets/public_page/img/struktur_org/img_13.jpg')
            ],
        ];
        ?>
        <!-- <div class="container">
            <div class="row">
                <ul class="list-group">
                    <?php foreach ($data as $d) : ?>
                        <li class="list-group-item" data-aos="fade-up">
                            <a href="<?= $d['img_src'] ?>" class="btn primary-button glightbox preview-link" 
                                data-gallery="portfolio-gallery-branding"  title="<?= $d['title'] ?>" style="cursor: pointer;">
                                <?= $d['title'] ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div> -->
    </section>
</main>

<style>
    body {
        background-color: #f8f9fa;
    }
</style>

<script>
    const glightbox = GLightbox({
        selector: '.glightbox'
    });
</script>