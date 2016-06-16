<?php require 'function.php' ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Delsius</title>
    <link href='https://fonts.googleapis.com/css?family=Ubuntu:500,700,400|Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/style.css" media="screen" title="no title" charset="utf-8">
    <!-- Add jQuery library -->
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

    <!-- Add mousewheel plugin (this is optional) -->
    <script type="text/javascript" src="fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

    <!-- Add fancyBox -->
    <link rel="stylesheet" href="fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

    <!-- Optionally add helpers - button, thumbnail and/or media -->
    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

    <link rel="stylesheet" href="fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
    <script type="text/javascript" src="fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

    <script type="text/javascript">
  		$(document).ready(function() {
  			/*
  			 *  Simple image gallery. Uses default settings
  			 */

  			$('.fancybox').fancybox();

  			/*
  			 *  Different effects
  			 */
         $("a[href$='.jpg'],a[href$='.jpeg'],a[href$='.png'],a[href$='.gif']").attr('rel', 'gallery').fancybox();
  			// Change title type, overlay closing speed
        $(".fancybox-effects-a").fancybox({
  				helpers: {
  					title : {
  						type : 'outside'
  					},
  					overlay : {
  						speedOut : 0
  					}
  				}
  			});

  			// Disable opening and closing animations, change title type
  			$(".fancybox-effects-b").fancybox({
  				openEffect  : 'none',
  				closeEffect	: 'none',

  				helpers : {
  					title : {
  						type : 'over'
  					}
  				}
  			});

  			// Set custom style, close if clicked, change title type and overlay color
  			$(".fancybox-effects-c").fancybox({
  				wrapCSS    : 'fancybox-custom',
  				closeClick : true,

  				openEffect : 'none',

  				helpers : {
  					title : {
  						type : 'inside'
  					},
  					overlay : {
  						css : {
  							'background' : 'rgba(238,238,238,0.85)'
  						}
  					}
  				}
  			});

  			// Remove padding, set opening and closing animations, close if clicked and disable overlay
  			$(".fancybox-effects-d").fancybox({
  				padding: 0,

  				openEffect : 'elastic',
  				openSpeed  : 150,

  				closeEffect : 'elastic',
  				closeSpeed  : 150,

  				closeClick : true,

  				helpers : {
  					overlay : null
  				}
  			});

  			/*
  			 *  Button helper. Disable animations, hide close button, change title type and content
  			 */

  			$('.fancybox-buttons').fancybox({
  				openEffect  : 'none',
  				closeEffect : 'none',

  				prevEffect : 'none',
  				nextEffect : 'none',

  				closeBtn  : false,

  				helpers : {
  					title : {
  						type : 'inside'
  					},
  					buttons	: {}
  				},

  				afterLoad : function() {
  					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
  				}
  			});


  			/*
  			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
  			 */

  			$('.fancybox-thumbs').fancybox({
  				prevEffect : 'none',
  				nextEffect : 'none',

  				closeBtn  : false,
  				arrows    : true,
  				nextClick : true,

  				helpers : {
  					thumbs : {
  						width  : 50,
  						height : 50
  					},
            title : {
  						type : 'under'
  					}
  				}
  			});

  			/*
  			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
  			*/
  			$('.fancybox-media')
  				.attr('rel', 'media-gallery')
  				.fancybox({
  					openEffect : 'none',
  					closeEffect : 'none',
  					prevEffect : 'none',
  					nextEffect : 'none',

  					arrows : false,
  					helpers : {
  						media : {},
  						buttons : {}
  					}
  				});

  			/*
  			 *  Open manually
  			 */

  			$("#fancybox-manual-a").click(function() {
  				$.fancybox.open('1_b.jpg');
  			});

  			$("#fancybox-manual-b").click(function() {
  				$.fancybox.open({
  					href : 'iframe.html',
  					type : 'iframe',
  					padding : 5
  				});
  			});

  			$("#fancybox-manual-c").click(function() {
  				$.fancybox.open([
  					{
  						href : '1_b.jpg',
  						title : 'My title'
  					}, {
  						href : '2_b.jpg',
  						title : '2nd title'
  					}, {
  						href : '3_b.jpg'
  					}
  				], {
  					helpers : {
  						thumbs : {
  							width: 75,
  							height: 50
  						}
  					}
  				});
  			});


  		});
  	</script>

  </head>
  <body>

    <!-- Facebook init JS SDK -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          appId      : '873520582752116',
          xfbml      : true,
          version    : 'v2.6'
        });

        FB.getLoginStatus(function(response){
          if (response.status === 'connected') {
            document.getElementById('status').innerHTML = 'we are connected';
          } else if (response.status === 'not_authorized') {
            document.getElementById('status').innerHTML = 'we are NOT connected';
          }
        });


      };


      (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/en_US/sdk.js";
         fjs.parentNode.insertBefore(js, fjs);
       }(document, 'script', 'facebook-jssdk'));

       // My own code ---------------------------------
       function login(){
         FB.login(function(response){
           if (response.status === 'connected') {
             document.getElementById('status').innerHTML = 'we are connected';
             document.getElementById('login').style.visibility = 'hidden';
           } else if (response.status === 'not_authorized') {
             document.getElementById('status').innerHTML = 'we are NOT connected';
           }
         }, {scope: 'email'}); //frågar om email address
       };

       function getInfo(){
         FB.api('/me', 'GET', {fields: 'first_name,last_name,name,picture.width(250).height(250)'}, function(response){
           document.getElementById('test').innerHTML = "<img src='" + response.picture.data.url + "'>";
         });
       };
      /*
         FB.api('/me', 'GET', {"fields":"albums.limit(2){photos.limit(2)}"},function (response) {
              document.getElementById('status').innerHTML = console.log(response);
            }
          );*/


    </script>
    <!-- Facebook init JS SDK -->


<!--   ******************** TESTING FROM HERE *********************    -->


  <div class="container">
    <!-- -->
    <p>
      <h1><b>Fancybox Gallery</b></h1>
    </p>
    <?php
      $result = get_result("SELECT photo,textbody,bygg_id,headline,state FROM album /* FIXA SÅ DEN HÄMTAR ALLA TABELLER */ ");
      //print_r($result);
        while($row = $result->fetch_assoc()){
          if ($row['state'] == 1) {

          ?>

          <div class="fancybox-div row">
            <a class="fancybox-thumbs" data-fancybox-group="<?php echo $row['bygg_id']; ?>" href="<?php echo $row['photo']; ?>" title="<h2><b><?php echo $row['headline'];?></b></h2> <?php echo $row['textbody'];?>"><img style="width:250px;"  title="<?php echo $var ?> "src="<?php echo $row['photo'];?>" /></a>
            <div class="text">
              <?php  echo $row['headline']; ?>
            </div>
          </div>


  <?php }else {?>

          <div class="hidden">
            <a class="fancybox-thumbs" data-fancybox-group="<?php echo $row['bygg_id']; ?>" href="<?php echo $row['photo']; ?>" ><img src="<?php echo $row['photo']; ?>" style="width:200px;"  title="<?php echo $row['title']; ?>" alt="" /></a>
          </div>
  <?php }} ?>
    <!-- -->




  </div>

    <!--
    <div id="status"></div>
    <button onclick="getInfo()">Get info</button>
    <button onclick="login()" id="login">Login Facebook</button>
    </div>
    <!-- FB -->

  </body>
</html>
