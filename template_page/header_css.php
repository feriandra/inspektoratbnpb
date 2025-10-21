<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Title untuk SEO -->
    <title>Inspektorat Utama BNPB | Pengawasan & Akuntabilitas Penanggulangan Bencana</title>

    <!-- Meta SEO -->
    <meta name="description" content="Inspektorat Utama BNPB memastikan transparansi, akuntabilitas, dan kepatuhan dalam penanggulangan bencana di Indonesia melalui audit, evaluasi, dan pengawasan.">
    <meta name="keywords" content="Inspektorat Utama BNPB, BNPB, pengawasan bencana, audit BNPB, mitigasi bencana, tanggap darurat, rehabilitasi, rekonstruksi">
    <meta name="author" content="Inspektorat Utama BNPB">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" id="theme-color" content="#0000a4">
    <meta name="google-site-verification" content="JS50wDNCfGAUwYAfqJ1D51XOFG2nik3VzLt4XcT4CrI" />

    <!-- Open Graph (Facebook, LinkedIn, WhatsApp) -->
    <meta property="og:site_name" content="BNPB">
    <meta property="og:title" content="Inspektorat Utama BNPB | Pengawasan & Akuntabilitas Penanggulangan Bencana">
    <meta property="og:description" content="Unit pengawasan internal BNPB yang memastikan akuntabilitas, audit, dan transparansi dalam penanggulangan bencana di Indonesia.">
    <meta property="og:image" content="<?= base_url() ?>assets/image/LOGO2.png">
    <meta property="og:url" content="<?= base_url() ?>">
    <meta property="og:type" content="website">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:site" content="@BNPB_Indonesia">
    <meta name="twitter:creator" content="@BNPB_Indonesia">
    <meta name="twitter:title" content="Inspektorat Utama BNPB | Pengawasan Penanggulangan Bencana">
    <meta name="twitter:description" content="Inspektorat Utama BNPB mengawasi akuntabilitas dan transparansi dalam penanggulangan bencana di Indonesia.">
    <meta name="twitter:image" content="<?= base_url() ?>assets/image/LOGO2.png">

    <!-- Favicons -->
    <link href="<?= base_url() ?>assets/image/LOGO2.png" rel="icon">
    <link href="<?= base_url() ?>assets/image/LOGO2.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url(); ?>assets/public_page/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/public_page/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/public_page/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/public_page/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/public_page/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css" />
    <!-- DataTables core -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.3/css/dataTables.dataTables.css">

    <!-- Buttons -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.4/css/buttons.dataTables.css">

    <!-- Responsive -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.3/css/responsive.dataTables.css">

    <!-- Main CSS File -->
    <link href="<?= base_url(); ?>assets/public_page/css/main.css" rel="stylesheet">

    <style>
        .form-control:read-only {
            background-color: #dbdbdbff;
        }

        .custom-footer {
            background: #044086 !important;
            color: #fff !important;
        }

        .custom-footer .footer-top {
            background: #f7f8f9;
            padding: 0 0 30px 0;
            color: #364146;
            font-size: 14px;
        }

        .custom-footer .container a {
            color: #fff !important;
        }

        .custom-header {
            background: #044086 !important;
            color: #fff !important;
        }

        .custom-header a {
            color: #fff !important;
        }

        .custom-header li ul li a {
            color: #044086 !important;
        }

        .custom-header a:hover {
            color: #e2e2e2ff !important;
        }

        .custom-header li ul li a:hover {
            color: #044086 !important;
        }

        .primary-button {
            font-family: "Raleway", sans-serif;
            font-weight: 500;
            font-size: 15px;
            letter-spacing: 1px;
            display: inline-block;
            padding: 6px 27px;
            border-radius: 4px;
            transition: 0.5s;
            margin: 10px;
            color: #fff;
            background: #009cea;
        }

        .primary-button:hover {
            color: #fff;
            background: #008bd1;
        }

        .custom-icon-ex {
            display: block !important;
            font-size: 25px !important;
        }

        .custom-icon-xe {
            font-size: 125px;
            color: #044086;
        }

        @media (max-width: 1199px) {
            .mobile-nav-active .navmenu>ul {
                display: block;
                background-color: #044086;
            }

            .custom-header li ul li a {
                color: #fff !important;
            }

            .custom-icon-ex {
                display: none !important;
            }

            .custom-icon-xe {
                font-size: 95px;
                color: #044086;
            }
        }
    </style>

    <!-- Vendor JS Files -->

    <script src="<?= base_url(); ?>assets/public_page/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url(); ?>assets/public_page/vendor/php-email-form/validate.js"></script>
    <script src="<?= base_url(); ?>assets/public_page/vendor/aos/aos.js"></script>
    <script src="<?= base_url(); ?>assets/public_page/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="<?= base_url(); ?>assets/public_page/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/public_page/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?= base_url(); ?>assets/public_page/vendor/swiper/swiper-bundle.min.js"></script>

    <!-- Additional JS -->
    <script src="<?= base_url(); ?>assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.3/js/dataTables.js"></script>

    <!-- Buttons -->
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.2.4/js/buttons.print.min.js"></script>

    <!-- Responsive -->
    <script src="https://cdn.datatables.net/responsive/3.0.3/js/dataTables.responsive.js"></script>

    <!-- Schema Markup JSON-LD -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "GovernmentOrganization",
            "name": "Inspektorat Utama BNPB",
            "alternateName": "Badan Nasional Penanggulangan Bencana",
            "url": "<?= base_url() ?>",
            "logo": "<?= base_url() ?>assets/image/LOGO2.png",
            "sameAs": [
                "https://twitter.com/BNPB_Indonesia",
                "https://www.facebook.com/BNPB.Indonesia",
                "https://www.instagram.com/bnpb_indonesia",
                "https://www.youtube.com/@bnpb_indonesia"
            ],
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+62-21-29827793",
                "contactType": "Customer Service",
                "areaServed": "ID",
                "availableLanguage": ["Indonesian"]
            },
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Jl. Rw. Jaya Jl. Pramuka No.38 11, RT.11/RW.5, Utan Kayu Utara, Kec. Matraman",
                "addressLocality": "Jakarta Timur",
                "addressRegion": "DKI Jakarta",
                "postalCode": "13120",
                "addressCountry": "ID"
            }
        }
    </script>
</head>

<body class="index-page">