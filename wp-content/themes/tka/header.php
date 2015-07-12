<?php if (!is_pjax()) : ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=12">

  <?php wp_head(); ?>

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="//cloud.typography.com/7528232/709982/css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/css/styles.min.css">
</head>
<?php endif; ?>
<body <?php body_class(); ?> data-color="<?php print rand(1,8); ?>">

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <header class="page-head container">
    <a data-pjax class="logo colorize-bg" href="/" title="The Kitchen Adventurer"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" width="58" height="31" alt="The Kitchen Adventurer"></a>

    <nav class="navigation" role="navigation">
      <ul class="primary-nav nav delta">
        <li class="nav__item primary-nav__home"><a data-pjax href="/">Home</a></li>
        <li class="nav__item"><a data-pjax href="/about">About</a></li>
      </ul>

      <!-- TODO: About Blurb -->

      <ul class="social-nav nav">
        <li class="nav__item"><a class="ss-icon" href="https://instagram.com/thekitchenadventurer/" target="_blank">Instagram</a></li>
        <li class="nav__item"><a class="ss-icon" href="https://pinterest.com/thekitchenadv/" target="_blank">Pinterest</a></li>
      </ul>
    </nav>
  </header>

  <main id="main" class="main <?php if (!is_pjax()) { print 'is-loading'; }  ?>" role="main">
    <span id="pjax-helper" data-bc='<?php body_class(); ?>' data-title="<?php print wp_title('|', true, 'right'); ?>" style="display: none;"></span>
