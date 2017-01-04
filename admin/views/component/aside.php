<?php
if (isset($model)):
    $homepage_active = $model == ''? "active" : "";
    $pengurus_active = $model == 'pengurus'? "active" : "";
    $mahasiswa_active = $model == 'mahasiswa'? "active" : "";
    $media_active = $model == 'informasi'? "active" : "";
    $berita_active = $model == 'berita'? "active" : "";
    $artikel_active = $model == 'artikel'? "active" : "";
    $user_active = $model == 'user'? "active" : "";
endif;
echo '
		 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.html"><img src="'.root.'asset/user/'.$_SESSION['foto'].'" class="img-circle" width="60"></a></p>
              	  <h5 class="centered">'.$_SESSION['name'].'</h5>
              	  	
                  <li class="mt">
                      <a class="'.$homepage_active.'" href="'.adm.'">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                 <li class="sub-menu">
                      <a class="'.$pengurus_active.'" href="'.adm.'pengurus" >
                          <i class="fa fa-user"></i>
                          <span>Pengurus</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a class="'.$mahasiswa_active.'"href="'.adm.'mahasiswa" >
                          <i class="fa fa-book"></i>
                          <span>Mahasiswa Dan Alumni</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="'.$media_active.'" href="'.adm.'informasi">
                          <i class="fa fa-tasks"></i>
                          <span>Media Informasi</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="'.$artikel_active.'" href="'.adm.'artikel" >
                          <i class="fa fa-tasks"></i>
                          <span>Artikel</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class="'.$user_active.'" href="'.adm.'user" >
                          <i class="fa fa-user"></i>
                          <span>User</span>
                      </a>
                  </li>
                  

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>

';