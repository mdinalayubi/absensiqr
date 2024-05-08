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
               <div class="card-header card-header-tabs card-header-info">
                  <div class="nav-tabs-navigation">
                     <div class="row">
                        <div class="col">
                           <h4 class="card-title"><b>Daftar Petugas</b></h4>
                           <p class="card-category">Petugas absensi</p>
                        </div>
                        <div class="col-auto">
                           <div class="nav-tabs-wrapper">
                              <ul class="nav nav-tabs" data-tabs="tabs">
                                 <li class="nav-item">
                                    <a class="nav-link" id="tabBtn" onclick="removeHover();" href="<?= base_url('admin/petugas/register'); ?>">
                                       <i class="material-icons">add</i> Tambah data petugas
                                       <div class="ripple-container"></div>
                                    </a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link" id="refreshBtn" onclick="getDataPetugas()" href="#" data-toggle="tab">
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
               <div id="dataPetugas">
                  <p class="text-center mt-3">Daftar petugas muncul disini</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<script>
   var kelas = null;
   var jurusan = null;

   getDataPetugas();

   function getDataPetugas() {
      jQuery.ajax({
         url: "<?= base_url('/admin/petugas'); ?>",
         type: 'post',
         data: {},
         success: function(response, status, xhr) {
            // console.log(status);
            $('#dataPetugas').html(response);
            removeHover();

            $('html, body').animate({
               scrollTop: $("#dataPetugas").offset().top
            }, 500);
         },
         error: function(xhr, status, thrown) {
            console.log(thrown);
            $('#dataPetugas').html(thrown);
         }
      });
   }

   function removeHover() {
      setTimeout(() => {
         $('#tabBtn').removeClass('active show');
         $('#refreshBtn').removeClass('active show');
      }, 250);
   }
</script>
<?= $this->endSection() ?>