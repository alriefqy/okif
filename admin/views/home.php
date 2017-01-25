 <?php
 $a = $user->getuser();
 $b = $mahasiswa->getData();
 $c = $artikel->getArtikel();
 $d = $informasi->getInformasi();
 $e = $pengurus->getPengurus();
 echo 
  '<section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-9 main-chart">
                  
                  	<div class="row mtbox">
                  		<div class="col-md-2 col-sm-2 col-md-offset-1 box0">
                  			<div class="box1">
					  			<a href="'.adm.'user"><span class="li_user"></span>
					  			<h3>'.count($a).'</h3>
                  			</div>
					  			<p>'.count($a).'&nbsp Number of user</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1"></a>
					  			<a href="'.adm.'mahasiswa"><span class="li_data"></span>
					  			<h3>+'.count($b).'</h3>
                  			</div>
					  			<p>'.count($b).'&nbspDatabase Mahasiswa dan Alumni</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1"></a>
					  			<a href="'.adm.'artikel"><span class="li_stack"></span><h3>'.count($c).'</h3>
                  			</div>
					  			<p>'.count($c).'&nbspArtikel</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1"></a>
					  			<a href="'.adm.'informasi"><span class="li_news"></span>
					  			<h3>'.count($d).'</h3>
                  			</div>
					  			<p>'.count($d).'&nbspData Media Informasi</p>
                  		</div>
                  		<div class="col-md-2 col-sm-2 box0">
                  			<div class="box1"></a>
					  			<a href="'.adm.'pengurus"><span class="li_user"></span>
					  			<h3>'.count($e).'</h3>
                  			</div>
					  			<p>'.count($e).'&nbsp Number Of Pegurus </p>
                  		</div></a>
                  	
                  	</div><!-- /row mt -->	
                  
                      
                      <div class="row mt">
                      <!-- SERVER STATUS PANELS -->
                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn donut-chart">
                      			<div class="white-header">
						  			<h5>SERVER LOAD</h5>
                      			</div>
								<div class="row">
									<div class="col-sm-6 col-xs-6 goleft">
										<p><i class="fa fa-database"></i> 70%</p>
									</div>
	                      		</div>
								<canvas id="serverstatus01" height="120" width="120"></canvas>
								<script>
									var doughnutData = [
											{
												value: 70,
												color:"#68dff0"
											},
											{
												value : 30,
												color : "#fdfdfd"
											}
										];
										var myDoughnut = new Chart(document.getElementById("serverstatus01").getContext("2d")).Doughnut(doughnutData);
								</script>
	                      	</div><! --/grey-panel -->
                      	</div><!-- /col-md-4-->
                      	

                      	<div class="col-md-4 col-sm-4 mb">
                      		<div class="white-panel pn">
                      			<div class="white-header">
						  			<h5>TOP ARTIKEL</h5>
                      			</div>
                ';
                $topArtikel = $artikel->bestArtikel();
                foreach ($topArtikel as $a) 
                {
                  echo'
                  <div class="row">
                  <div class="col-sm-6 col-xs-6 goleft">
                    <p><i class="fa fa-eye"></i>'.$a['hit'].'</p>
                  </div>
                  <div class="col-sm-6 col-xs-6"></div>
                            </div>
                            <div class="centered">
                    <img src="'.root.'asset/artikel/'.$a['foto'].'" width="120">
                            </div>
                          </div>
                        </div><!-- /col-md-4 -->

                  ';
                }
                echo'
                	
                      	
						<div class="col-md-4 mb">
							<!-- WHITE PANEL - TOP USER -->
							<div class="white-panel pn">
								<div class="white-header">
									<h5>TOP USER</h5>
								</div>
								<p><img src="assets/img/ui-zac.jpg" class="img-circle" width="80"></p>
								<p><b>Zac Snider</b></p>
								<div class="row">
									<div class="col-md-6">
										<p class="small mt">MEMBER SINCE</p>
										<p>2012</p>
									</div>
									<div class="col-md-6">
										<p class="small mt">TOTAL SPEND</p>
										<p>$ 47,60</p>
									</div>
								</div>
							</div>
						</div><!-- /col-md-4 -->
                      	

                    </div><!-- /row -->
                    
                    				
					
				
					
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
      <div class="col-lg-3 ds">
        <!--COMPLETED ACTIONS DONUTS CHART-->
						
						<h3>TEAM MEMBERS</h3>
                      <!-- First Member -->
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="'.adm.'assets/img/D42114502.jpg" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">Al Riefqy Dasmito</a><br/>
                          <p>D42114502</p>
                          </p>
                        </div>
                      </div>
                      ';
                      $data = $user->getuser();
                      foreach ($data as $a)
                      {
                        echo'
                      <div class="desc">
                        <div class="thumb">
                          <img class="img-circle" src="'.root.'asset/user/'.$a['foto'].'" width="35px" height="35px" align="">
                        </div>
                        <div class="details">
                          <p><a href="#">'.$a['name'].'</a><br/>
                             <muted>'.$a['level'].'</muted>
                          </p>
                        </div>
                      </div>';
                      }
                      echo'
                      <!-- Second Member -->
                      

                        <!-- CALENDAR-->
                        <div id="calendar" class="mb">
                            <div class="panel green-panel no-margin">
                                <div class="panel-body">
                                    <div id="date-popover" class="popover top" style="cursor: pointer; disadding: block; margin-left: 33%; margin-top: -50px; width: 175px;">
                                        <div class="arrow"></div>
                                        <h3 class="popover-title" style="disadding: none;"></h3>
                                        <div id="date-popover-content" class="popover-content"></div>
                                    </div>
                                    <div id="my-calendar"></div>
                                </div>
                            </div>
                        </div><!-- / calendar -->
                      
                  </div><!-- /col-lg-3 -->
              </div><! --/row -->
          </section>
      </section>
';