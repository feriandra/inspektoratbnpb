   <script>
       const Toast = Swal.mixin({
           toast: true,
           position: "top-end",
           showConfirmButton: false,
           timer: 3000,
           timerProgressBar: true,
           didOpen: (toast) => {
               toast.onmouseenter = Swal.stopTimer;
               toast.onmouseleave = Swal.resumeTimer;
           }
       });
       <?php if (!empty($this->session->flashdata('succ_msg'))) { ?>
           Toast.fire({
               icon: "success",
               title: <?= json_encode(str_replace('`', '', $this->session->flashdata('succ_msg'))) ?>
           });

       <?php } ?>
       <?php if (!empty($this->session->flashdata('err_msg'))) { ?>
           Toast.fire({
               icon: "error",
               title: <?= json_encode(str_replace('`', '', $this->session->flashdata('err_msg'))) ?>
           });
       <?php } ?>
   </script>

   <script>
       const swalWithBootstrapButtons = Swal.mixin({
           customClass: {
               confirmButton: "btn btn-success rounded-1",
               cancelButton: "btn btn-danger rounded-1 me-2"
           },
           buttonsStyling: false
       });

       function handleLogout() {
           swalWithBootstrapButtons.fire({
               title: "Apakah anda yakin ingin keluar aplikasi?",
               text: "",
               icon: "warning",
               showCancelButton: true,
               confirmButtonText: "Ya",
               cancelButtonText: "Tidak",
               reverseButtons: true
           }).then((result) => {
               if (result.isConfirmed) {
                   location.href = "<?= base_url('logout') ?>"
               }
           });
       }
   </script>

   </body>

   </html>