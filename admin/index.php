<?php 
session_start();
require('libs/path.php');
require('../models/load_class.php');

if (!isset($_SESSION['login'])) 
	{
		header('location:'.adm.'login');
	}	
else
	{
		if(!$libs->cek_login()) header('location:'.adm.'login');
	}
require('libs/routers.php');
require('views/component/header.php');
require('views/component/aside.php');
	switch($model)
	{
		case'':
        include 'views/home.php';
        require('views/component/footer.php');
        break;
		case 'pengurus':
		include 'views/pengurus_vw.php';
        require('views/component/footer.php');
		break;
		case 'artikel':
		include 'views/artikel_vw.php';
		break;
		case 'informasi':
		include 'views/informasi_vw.php';
		break;
       
		case 'user':
         if ($_SESSION['level'] == 'Admin')
        {
		include 'views/user_vw.php';
        }
        else
        {
         echo '<p>Error</p>';
        }
		break;
        
        
		case 'mahasiswa':
		include 'views/mahasiswa_vw.php';
		break;
        case 'ketua':
        include 'views/ketualembaga_vw.php';
        break;
        case 'dewan':
        include 'views/dewan_vw.php';
        break;
        case 'headline':
        include 'views/headline_vw.php';
        break;
        
		default:
		include 'views/home.php';
		break;
	}

?> 
<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo adm ;?>assets/js/jquery.js"></script>
    <script src="<?php echo adm ;?>assets/js/jquery-1.8.3.min.js"></script>
    <script src="<?php echo adm ;?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo adm ;?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo adm ;?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo adm ;?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo adm ;?>assets/js/jquery.sparkline.js"></script>


    <!--common script for all pages-->
    <script src="<?php echo adm ;?>assets/js/common-scripts.js"></script>
    
    <script type="text/javascript" src="<?php echo adm ;?>assets/js/gritter/js/jquery.gritter.js"></script>
    <script type="text/javascript" src="<?php echo adm ;?>assets/js/gritter-conf.js"></script>

    <!--script for this page-->
    <script src="<?php echo adm ;?>assets/js/sparkline-chart.js"></script>    
	<script src="<?php echo adm ;?>assets/js/zabuto_calendar.js"></script>	
	
	<script type="text/javascript">
        $(document).ready(function () {
        var unique_id = $.gritter.add({
            // (string | mandatory) the heading of the notification
            title: 'Welcome to Dashboard OKIF',
            // (string | mandatory) the text inside the notification
            text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo. Free version for <a href="http://blacktie.co" target="_blank" style="color:#ffd777">BlackTie.co</a>.',
            // (string | optional) the image to display on the left
            image: '<?php echo adm ;?>assets/img/original.png',
            // (bool | optional) if you want it to fade out on its own or just sit there
            sticky: true,
            // (int | optional) the time you want it to be alive for before fading out
            time: '',
            // (string | optional) the class name you want to apply to that specific message
            class_name: 'my-sticky-class'
        });

        return false;
        });
	</script>
	
	<script type="application/javascript">
        $(document).ready(function () {
            $("#date-popover").popover({html: true, trigger: "manual"});
            $("#date-popover").hide();
            $("#date-popover").click(function (e) {
                $(this).hide();
            });
        
            $("#my-calendar").zabuto_calendar({
                action: function () {
                    return myDateFunction(this.id, false);
                },
                action_nav: function () {
                    return myNavFunction(this.id);
                },
                ajax: {
                    url: "show_data.php?action=1",
                    modal: true
                },
                legend: [
                    {type: "text", label: "Special event", badge: "00"},
                    {type: "block", label: "Regular event", }
                ]
            });
        });
        
        
        function myNavFunction(id) {
            $("#date-popover").hide();
            var nav = $("#" + id).data("navigation");
            var to = $("#" + id).data("to");
            console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
        }
    </script>
  