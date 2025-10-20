<main id="main" class="d-flex align-items-center justify-content-center" style="min-height: 100vh; background-color: #044086;">
    <section id="hero" class="hero section" style="height: 100vh !important;">
        <div class="container">
            <div class="row gy-4">
                <div class="login-card">
                    <div class="d-flex flex-column justify-content-center align-items-center gap-4">
                        <img src="<?= base_url(); ?>assets/public_page/img/dark_logo.png"
                            alt="Official Logo BNPB"
                            class="img-fluid" width="240" height="50"
                            srcset="<?= base_url(); ?>assets/public_page/img/dark_logo.png 1x, <?= base_url(); ?>assets/public_page/img/dark_logo.png 2x"
                            sizes="(max-width: 240px) 100vw, 240px">
                    </div>

                    <hr>
                    <!-- Alert pesan error -->
                    <form action="<?= base_url('login/submit'); ?>" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label w-100" style="text-align: left;">Username / Email</label>
                            <input type="text" class="form-control" id="username" name="username" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label w-100" style="text-align: left;">Kata Sandi</label>

                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required
                                    aria-describedby="togglePassword" autocomplete="current-password">

                                <button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Show password">
                                    <i class="fa-solid fa-eye" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>

                        <div class="d-grid mt-5">
                            <button type="submit" class="btn btn-primary">Masuk</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

<script>
    window.addEventListener("load", function() {
        document.getElementById("preloader").style.display = "none";
    });
</script>

<style>
    body {
        background-color: #f8f9fa;
    }

    .input-group .btn {
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }

    .login-card {
        max-width: 400px;
        margin: auto;
        margin-top: 10vh;
        padding: 2rem;
        border-radius: 1rem;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        background: #fff;
    }
</style>

<script>
    $(function() {
        $('#togglePassword').on('click', function(e) {
            e.preventDefault();

            var $btn = $(this);
            var $inp = $('#password');
            var type = $inp.attr('type') === 'password' ? 'text' : 'password';
            $inp.attr('type', type);

            var $icon = $btn.find('i');

            if (type === 'text') {
                $icon.removeClass('fa-eye').addClass('fa-eye-slash');
                $btn.attr('aria-label', 'Hide password');
            } else {
                $icon.removeClass('fa-eye-slash').addClass('fa-eye');
                $btn.attr('aria-label', 'Show password');
            }
        });
    });
</script>

<!-- Preloader -->
<div id="preloader"></div>