<script src="<?php echo root;?>assets/js/jquery.min.js"></script>
<script type="text/javascript">
  function filePreview1(input)
  {
    if(input.files && input.files[0])
    {
      var reader = new FileReader();
      reader.onload = function(e)
      {

        $('#uploadForm1 + img').remove();
        $('#satu').attr('src',e.target.result);

        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  function filePreviewFoto1_1(input)
  {
    if(input.files && input.files[0])
    {
      var reader = new FileReader();
      reader.onload = function(e)
      {

        $('#uploadForm1 + img').remove();
        $('#satu1').attr('src',e.target.result);
        
        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  function filePreview2(input)
  {
    if(input.files && input.files[0])
    {
      var reader = new FileReader();
      reader.onload = function(e)
      {

        $('#uploadForm2 + img').remove();
        $('#dua').attr('src',e.target.result);
        
        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  function filePreviewFoto2_2(input)
  {
    if(input.files && input.files[0])
    {
      var reader = new FileReader();
      reader.onload = function(e)
      {

        $('#uploadForm2 + img').remove();
        $('#dua1').attr('src',e.target.result);
        
        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  function filePreview3(input)
  {
    if(input.files && input.files[0])
    {
      var reader = new FileReader();
      reader.onload = function(e)
      {

        $('#uploadForm3 + img').remove();
        $('#tiga').attr('src',e.target.result);
        
        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  function filePreviewFoto3_3(input)
  {
    if(input.files && input.files[0])
    {
      var reader = new FileReader();
      reader.onload = function(e)
      {

        $('#uploadForm3 + img').remove();
        $('#tiga1').attr('src',e.target.result);
        
        
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  
</script>


<?php
error_reporting(0);

  date_default_timezone_set('Asia/Makassar');
    $aksi = adm."controllers/headline_control.php?model=headline&method="; // halaman untuk eksekusi

         

      echo'
      <section id="main-content">
        <section class="wrapper">
          <h3><i class="fa fa-angle-right"></i> Headline</h3>
          <span>Manajemen Halaman Utama Website</span>                     
          <!-- BASIC FORM ELELEMNTS -->
          ';
          $headline = $headline->getDataLengkap();
          foreach ($headline as $a) 
          {
            switch ($a['id'])
            {
              case 1 :
              $num = 'satu';
              break;
              case 2 :
              $num = 'dua';
              break;
              case 3 :
              $num = 'tiga';
              break;
              default:
              $num = 'satu';
              break;
            }

            $no++;
            echo'
            <div class="row mt">
                        <div class="col-lg-12">
                          <div class="form-panel">
                            <h4 class="mb"><i class="fa fa-angle-right"></i> Tambah Data</h4>
                            <form class="form-horizontal style-form" action="'.$aksi.'edit" method="POST" enctype="multipart/form-data" id="">

                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Judul Artikel</label>
                                <div class="col-sm-10">
                                  <input type="text" name="title" class="form-control" value="'.$a['judul'].'"  required>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Konten Artikel </label>
                                <div class="col-sm-10">
                                  <textarea class="form-control" name="content">'.$a['deskripsi'].'</textarea>
                                </div>
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                <div class="col-sm-10">
                                  <input type="file" name="foto" class="form-control" id="foto'.$a['id'].'">
                                </div>
                                
                                <label class="col-sm-2 control-label"></label>
                                <br><br>
                                <div class="col-sm-10">
                                  <script type="text/javascript">
                                $("#foto'.$a['id'].'").change(function()
                                  {
                                    filePreview'.$a['id'].'(this);
                                  });
                                </script>
                                  <img style="max-height: 250px;"  src="'.root.'asset/headline/'.$a['foto'].'" id="'.$num.'">
                                </div>
                                
                              </div>
                              <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                                <div class="col-sm-10">
                                  <input type="file" name="file" class="form-control" id="file'.$a['id'].'">
                                </div>
                                
                                <label class="col-sm-2 control-label"></label>
                                <br><br>
                                <div class="col-sm-10">
                                  <script type="text/javascript">
                                $("#file'.$a['id'].'").change(function()
                                  {
                                    filePreviewFoto'.$a['id'].'_'.$a['id'].'(this);
                                  });
                                </script>
                                ';
                                if ($a['foto_headline'] != "")
                                {
                                  echo'
                                  <img style="max-height: 250px;"  src="'.root.'asset/headline/'.$a['foto_headline'].'" id="'.$num.'1">
                                 
                                  ';

                                }
                                else
                                {
                                   echo'
                                  <img style="max-height: 250px;"  src="'.root.'asset/image/ORIGINAL.png" id="'.$num.'1">';
                                }
                                echo'
                                </div>
                                
                              </div>
                              <input type="hidden" name="id"  value="'.$a['id'].'">
                              <input type="hidden" name="foto"  value="'.$a['foto'].'">
                              <input type="hidden" name="file_headline"  value="'.$a['foto_headline'].'">
                              <button type="submit" name="edit" class="btn btn-success">Update Headline '.$num.'</button>
                            </form>
                          </div>
                        </div><!-- col-lg-12-->       
                      </div><!-- /row -->

           ';
           
         }
         ?>

     
