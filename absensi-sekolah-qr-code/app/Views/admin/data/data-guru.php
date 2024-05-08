<?= $this->extend('templates/admin_page_layout') ?>
<?= $this->section('content') ?>
<div class="content">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12 col-md-12">
            <?php if (session()->getFlashdata('msg')) : ?>
               <div class="pb-2 px-3">
                  <div class="alert alert-success">
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="material-icons">close</i>
                     </button>
                     <?= session()->getFlashdata('msg') ?>
                  </div>
               </div>
            <?php endif; ?>
            <div class="card">
               <div class="card-header card-header-tabs card-header-success">
                  <div class="nav-tabs-navigation">
                     <div class="row">
                        <div class="col">
                           <h4 class="card-title"><b>Daftar Guru</b></h4>
                           <p class="card-category">Angkatan 2024/2025</p>
                        </div>
                        <div class="col-auto">
                           <div class="nav-tabs-wrapper">
                              <ul class="nav nav-tabs" data-tabs="tabs">
                                 <li class="nav-item">
                                    <a class="nav-link" id="tabBtn" onclick="removeHover()" href="<?= base_url('admin/guru/create'); ?>">
                                       <i class="material-icons">add</i> Tambah data guru
                                       <div class="ripple-container"></div>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="refreshBtn" onclick="getDataGuru()" href="#" data-toggle="tab">
                                       <i class="material-icons">refresh</i> Refresh
                                       <div class="ripple-container"></div>
                                    </a>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="dataGuru">
                  <p class="text-center mt-3">Daftar guru muncul disini</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   getDataGuru();

   function getDataGuru() {
      jQuery.ajax({
         url: "<?= base_url('/admin/guru'); ?>",
         type: 'post',
         data: {},
         success: function(response, status, xhr) {
            // console.log(status);
            $('#dataGuru').html(response);

            $('html, body').animate({
               scrollTop: $("#dataGuru").offset().top
            }, 500);
            $('#refreshBtn').removeClass('active show');
         },
         error: function(xhr, status, thrown) {
            console.log(thrown);
            $('#dataGuru').html(thrown);
            $('#refreshBtn').removeClass('active show');
         }
      });
   }

   function removeHover() {
      setTimeout(() => {
         $('#tabBtn').removeClass('active show');
      }, 250);
   }
</script>
<?= $this->endSection() ?>