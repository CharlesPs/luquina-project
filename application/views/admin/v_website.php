<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <base href="<?php echo base_url(); ?>" />

        <link rel="stylesheet" href="static/css/bootstrap.min.css">
        <link rel="stylesheet" href="static/css/bootstrap-theme.min.css">

        <link rel="stylesheet" href="static/css/typeahead.js-bootstrap.css">

        <link rel="stylesheet" href="static/css/bootstrap-wysihtml5.css">

        <link rel="stylesheet" href="static/css/admin_main.css">

        <script src="static/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,500' rel='stylesheet' type='text/css'>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
        
        <?php echo $web_content; ?>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="static/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

        <script src="static/js/vendor/bootstrap.min.js"></script>

        <script src="static/js/vendor/hogan-2.0.0.js"></script>
        <script src="static/js/vendor/typeahead.min.js"></script>

        <!-- wysihtml5 parser rules --> 
        <script src="static/wysihtml5/parser_rules/advanced.js"></script> 
        <!-- Library --> 
        <script src="static/wysihtml5/dist/wysihtml5-0.3.0.min.js"></script>
        <script src="static/js/vendor/bootstrap-wysihtml5.js"></script>

        <script src="static/js/plugins.js"></script>
        <script src="static/js/admin/main.js"></script>

        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
