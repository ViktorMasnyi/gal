<?php
	define("IMGDIR", "images/");
	define("FILE_MASK", "*.jpg");
	define("FILE_PATTERN", '/^images\/([0-9]+).jpg$/');
	
	$imgList = array();
	foreach (glob(IMGDIR.FILE_MASK) as $fileName)
	{
		list($width, $height) = getimagesize($fileName);
		preg_match(FILE_PATTERN, $fileName, $matches);
		if (sizeof($matches) > 1)
		{
			$imgList[intval($matches[1])] = array($fileName, $width, $height, $matches[1]);
		}
	}
	ksort($imgList);
?>

<!DOCTYPE html>
<html manifest="manifest.php">
<html >
  <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
        <link rel="apple-touch-icon-precomposed" href="apple-touch-icon.png">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />	
	<link rel="shortcut icon" href="apple-touch-icon.png">

	<title><?php echo $title = file_get_contents("title.txt"); ?></title>
	<link rel='stylesheet prefetch' href='css/photoswipe.css'>
	<link rel='stylesheet prefetch' href='css/default-skin.css'>

        <link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet' id='googlefonts-css'  href='http://fonts.googleapis.com/css?family=Lobster:400&subset=cyrillic' type='text/css' media='all' />

	<link rel="stylesheet" type="text/css" href="css/addtohomescreen.css">
	<script>
	alert("This WEB application can be used on desk-tops and mobile devices. If you're interested, please, try to open web app on android or apple device. You will be proposed to save it on your devices home screen. And then you will have a possibility to use web app even in case of your device is offline.");
	</script>
	<script src="js/addtohomescreen.min.js"></script>
	<script>
	addToHomescreen();
	</script>

	<script src="js/jquery-latest.min.js"></script>
	<script src="js/masonry.pkgd.min.js"></script>
  </head>

  <body>
    <div class="page">
    <script language="JavaScript" type="text/javascript">
    $( window ).load(function() {
    $( '.item' ).masonry( { columnWidth: 0, singleMode: false, isAnimated: false, itemSelector: 'figure' } );
    });
    </script>

    <p><img src="logo.jpg" alt="Семейный фотограф лого" width="90%"></p>

    <div class="item">

    <?php
	foreach($imgList as $image)
	{
		list($fileName, $width, $height, $name) = $image;
    ?>
    <figure itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
      <a href="<?php echo $fileName; ?>" itemprop="contentUrl" data-size="<?php echo $width."x".$height; ?>">
      <img src="thumbs/<?php echo $name; ?>.jpg" itemprop="thumbnail" alt="" />
      </a>
      <figcaption itemprop="caption description"></figcaption>
    </figure>
<?php
	}
?>



</div> <!-- div class list -->

<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                <button class="pswp__button pswp__button--share" title="Share"></button>

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                <!-- element will get class pswp__preloader--active when preloader is running -->
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>

<div class="descr">
<p align="center">заказать сьемку:</p>
<p align="center">телефон: +380983734343</p>
<p align="center"> <a href="http://www.rodynnefoto.com.ua">RodynneFoto.com.ua</a></p>
<p></p>
</div>

</div>
<script src='js/photoswipe.min.js'></script>
<script src='js/photoswipe-ui-default.min.js'></script>

    
    <script src="js/index.js"></script>

    
    
    
  </body>
</html>
