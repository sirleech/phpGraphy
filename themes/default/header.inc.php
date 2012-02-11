<?php

/***
*
* phpGraphy header file
*
* Tip: You can use $_GET['popup'] variable to not display the same thing while in a popup
*      ie: If you have a big banner or whatever...
*
***/

// Start the counter to calculate the page's generation time
$timegen=gettimeofday();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $language_file_info['country_code'] ?>" <?php if ($language_file_info['direction']) echo 'dir="'.$language_file_info['direction'].'"'?>>
  <head>
    <meta http-equiv="Content-Script-Type" content="text/javascript" />
    <meta http-equiv="Content-Type" content="text/html; charset=<?php echo $language_file_info['charset'] ?>" />
    <link rel="stylesheet" href="<?php echo $theme_dir ?>phpgraphy.css" type="text/css" />
    <link rel="icon" href="<?php echo $base_images_dir ?>favico.ico" type="image/ico" />
    <link rel="shortcut icon" href="<?php echo $base_images_dir ?>favico.ico" type="image/ico" />
    <script src="<?php echo $base_js_dir ?>phpgraphy.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo $base_3rd_part_dir ?>flv-player/swfobject.js"></script>
<?php if ($mode == 'slideshow') { ?>
    <script src="<?php echo $base_js_dir ?>slideshow.js" type="text/javascript"></script>
    <script src="<?php echo $base_js_dir ?>x_core.js" type="text/javascript"></script>
<?php } ?>

    <?php if($config['use_comments']): ?>
    <link rel="alternate" type="application/rss+xml" title="RSS 1.0" href="<?php echo SCRIPT_NAME; ?>?lastcommented=&amp;rss=1" />
    <?php endif; ?>
    <?php if($config['use_ratings']): ?>
    <link rel="alternate" type="application/rss+xml" title="RSS 1.0" href="<?php echo SCRIPT_NAME; ?>?toprated=&amp;rss=1" />
    <?php endif; ?>
    <link rel="alternate" type="application/rss+xml" title="RSS 1.0" href="<?php echo SCRIPT_NAME; ?>?lastaddedpictures=&amp;rss=1" />
    <link rel="alternate" type="application/rss+xml" title="RSS 1.0" href="<?php echo SCRIPT_NAME; ?>?lastaddedpicturesperdir=&amp;rss=1" />

<?php
    /* Only used during installation */
    if (strstr(SCRIPT_NAME, "install.php")) {
        echo '    <script src="'.$base_js_dir.'install.js" type="text/javascript"></script>'."\n";
        echo '    <link rel="stylesheet" href="'.$base_styles_dir.'/install.css" type="text/css" />'."\n";
    }
    /* Only used when authenticated as admin */
    if ($admin) {
        echo '<link rel="stylesheet" href="'.$theme_dir.'admin.css" type="text/css" />'."\n";
    }
?>
    <title><?php echo $txt_site_title ?></title>
  </head>
<body <?php if($mode == 'slideshow') echo 'onload="slides.update()"'?>>
<div <?php if (!$_GET['popup']) echo 'id="main"'; ?>>

<?php if($mode != 'slideshow') { ?>
<a href="<?php echo SCRIPT_NAME; ?>"><img src="<?php echo $base_images_dir ?>phpgraphy-banner.gif" alt="phpGraphy banner" id="banner" /></a>
<?php } ?>
