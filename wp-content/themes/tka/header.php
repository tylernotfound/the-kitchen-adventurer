<?php if (!is_pjax()) : ?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="p:domain_verify" content="108c868ff12f2d92c2764a393fb81701"/>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico?v=12">

  <?php wp_head(); ?>

  <!-- Styles -->
  <link rel="stylesheet" type="text/css" href="//cloud.typography.com/7528232/709982/css/fonts.css" />
  <link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/dist/css/styles.min.css">
</head>
<?php endif; ?>
<body <?php body_class(); ?> data-color="<?php print rand(1,7); ?>">

  <div id="fb-root"></div>
  <script>(function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.3";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));</script>

  <header class="page-head container">
    <a data-pjax class="logo colorize-bg" href="/" title="The Kitchen Adventurer">
      <img alt="The Kitchen Adventurer" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAHIAAAA+CAYAAAD3R09qAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyhpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNi1jMDY3IDc5LjE1Nzc0NywgMjAxNS8wMy8zMC0yMzo0MDo0MiAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6MERDMzkzMUQ5MDM3MTFFNUE2M0Y5RkRBMTgyRTM2NjAiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6MERDMzkzMUM5MDM3MTFFNUE2M0Y5RkRBMTgyRTM2NjAiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIDIwMTUgKE1hY2ludG9zaCkiPiA8eG1wTU06RGVyaXZlZEZyb20gc3RSZWY6aW5zdGFuY2VJRD0ieG1wLmlpZDozQkEzNjM3OTE1ODcxMUU1ODNBOUJEREQ5MTQ4RkVCQSIgc3RSZWY6ZG9jdW1lbnRJRD0ieG1wLmRpZDozQkEzNjM3QTE1ODcxMUU1ODNBOUJEREQ5MTQ4RkVCQSIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gPD94cGFja2V0IGVuZD0iciI/PqVMmdgAAAf5SURBVHja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" width="57" height="62">
    </a>

    <nav class="navigation" role="navigation">
      <ul class="primary-nav nav delta">
        <li class="nav__item primary-nav__home"><a data-pjax href="/">Recipes</a></li>
        <li class="nav__item"><a data-pjax href="/about">About</a></li>
      </ul>

      <!-- TODO: About Blurb -->

      <ul class="social-nav nav">
        <li class="nav__item nav__item--facebook">
          <a class="ss-icon" href="https://www.facebook.com/TheKitchenAdventurer" target="_blank">Facebook</a>
        </li>
        <li class="nav__item nav__item--instagram">
          <a class="ss-icon" href="https://instagram.com/thekitchenadventurer/" target="_blank">Instagram</a>
        </li>
        <li class="nav__item nav__item--pinterest">
          <a class="ss-icon" href="https://pinterest.com/thekitchenadv/" target="_blank">Pinterest</a>
        </li>
      </ul>
    </nav>
  </header>

  <main id="main" class="main <?php if (!is_pjax()) { print 'is-loading'; }  ?>" role="main">
    <span id="pjax-helper" data-bc='<?php body_class(); ?>' data-title="<?php print wp_title('|', true, 'right'); ?>" style="display: none;"></span>
