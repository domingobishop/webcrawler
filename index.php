<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>UK genpress tag webcrawler and comparison</title>
  <meta name="description" content="Crawls The Guardian, Mirror Online and The Sun homepages for frequency of tags">

  <meta property="og:type" content="article" />
  <meta property="og:title" content="UK press tag webcrawler and comparison" />
  <meta property="og:description" content="Crawls The Guardian, Mirror Online and The Sun homepages for frequency of tags" />
  <meta property="og:url" content="http://chrisbishop.me.uk/crawler/" />
  <meta property="og:image" content="http://chrisbishop.me.uk/crawler/crawler.jpg" />

  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- CSS concatenated and minified via ant build script-->
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <!-- end CSS-->

  <script src="js/libs/modernizr-2.0.6.min.js"></script>
</head>

<body>

  <div id="container" class="container">
      <select id="text-select">
        <option value="guardian7jun">The Guardian 7 Jun</option>
        <option value="mirror7jun">Mirror Online 7 Jun</option>
        <option value="sun7jun">The Sun 7 Jun</option>
        <option value="guardian8jun">The Guardian 8 Jun</option>
        <option value="mirror8jun">Mirror Online 8 Jun</option>
        <option value="sun8jun">The Sun 8 Jun</option>
        <option value="guardian9jun">The Guardian 9 Jun</option>
        <option value="mirror9jun">Mirror Online 9 Jun</option>
        <option value="sun9jun">The Sun 9 Jun</option>
      </select>
    <header>
    <h2><small>BETA</small> Frequency of tags used on:</h2>
      <h2 id="book-title"></h2>
    </header>
    <div id="main" role="main">
      <div id="vis"></div>
    </div>
    <footer>
    </footer>
  </div> <!--! end of #container -->


  <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.2.min.js"><\/script>')</script>


  <script defer src="js/plugins.js"></script>
  <script src="js/libs/coffee-script.js"></script>
  <script src="js/libs/d3.min.js"></script>
  <script type="text/coffeescript" src="coffee/vis.coffee"></script>
  <script type="text/javascript">
  </script>
  
</body>
</html>
