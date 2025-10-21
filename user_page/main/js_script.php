<!-- Script untuk halaman profil -->
<script>
    const $rules = $("#password-rules");

    function submitForm() {
        var isValid = true;
        var form = $('#form-submit')[0];
        if (!form.checkValidity()) {
            form.reportValidity();
            isValid = false;
            return false;
        }

        let pass = $("#pass").val();
        let rePass = $("#re-pass").val();
        let rePassHelp = $("#rePassHelp");
        rePassHelp.text("");
        if (rePass.length > 0 && pass !== rePass) {
            rePassHelp.text("Password tidak sama dengan Re-type Password.");
            isValid = false;
        }

        if (!validatePassword()) {
            $rules.stop(true, true).slideDown(300);
            isValid = false;
        }

        if (isValid) {
            Swal.fire({
                title: "Menyimpan...",
                html: "Mohon ditunggu, sistem sedang menyimpan data anda...",
                allowOutsideClick: false,
                allowEscapeKey: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            form.submit();
        }
    }

    $("#re-pass").on("keyup blur", function() {
        validatePassword();
    });

    $("#pass").on("focus keyup", function() {
        validatePassword();
        $rules.stop(true, true).slideDown(300);
    });

    $("#pass").on("blur", function() {
        $rules.stop(true, true).slideUp(300);
    });

    function validatePassword() {
        let pass = $("#pass").val();
        let passHelp = $("#passHelp");

        // Regex: min 8, ada huruf besar, kecil, angka
        let conCapital = (/[A-Z]/.test(pass));
        let conLower = (/[a-z]/.test(pass));
        let conNum = (/\d/.test(pass));
        let conLength = (pass.length >= 8);

        // Cek huruf besar
        if (conCapital) {
            $("#capital").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> Huruf Besar`);
        } else {
            $("#capital").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> Huruf Besar`);
        }

        // Cek huruf kecil
        if (conLower) {
            $("#lower").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> Huruf Kecil`);
        } else {
            $("#lower").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> Huruf Kecil`);
        }

        // Cek angka
        if (conNum) {
            $("#number").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> Angka`);
        } else {
            $("#number").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> Angka`);
        }

        // Cek panjang
        if (conLength) {
            $("#length").removeClass("text-danger").addClass("text-success").html(`<i class="fas fa-check-circle me-2"></i> 8+ karakter`);
        } else {
            $("#length").removeClass("text-success").addClass("text-danger").html(`<i class="fas fa-times-circle me-2"></i> 8+ karakter`);
        }

        if (conCapital && conLower && conNum && conLength) {
            return true;
        } else {
            return false;
        }
    }

    function handlePassField(e) {
        var $btn = $(e);
        var $inp = $('#pass');
        var $inrep = $('#re-pass');
        var type = $inp.attr('type') === 'password' ? 'text' : 'password';
        var typerep = $inrep.attr('type') === 'password' ? 'text' : 'password';
        $inp.attr('type', type);
        $inrep.attr('type', typerep);

        var $icon = $btn.find('i');

        if (type === 'text') {
            $icon.removeClass('fa-eye').addClass('fa-eye-slash');
            $btn.attr('aria-label', 'Hide password');
        } else {
            $icon.removeClass('fa-eye-slash').addClass('fa-eye');
            $btn.attr('aria-label', 'Show password');
        }
    }
</script>