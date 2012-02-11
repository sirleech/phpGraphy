<?php

  if ($timegen) {
    $timenow=gettimeofday();
    $gen=$timegen["sec"]+($timegen["usec"]/1000000);
    $now=$timenow["sec"]+($timenow["usec"]/1000000);
    $page_generation_time = substr(($now-$gen),0,5);
  }

if ($config['debug_mode'] >= 3) {


    $debug_buffer = $error_handler->getDebugBuffer();
    if ($debug_buffer) {

        // Text here is not translated as this is normally used only by developers - popup only when there is content
        echo '<div id="debugbox"><a href="javascript:switch_display(\'debugmsgs\')">&raquo; See DEBUG info</a>';
        echo '<div id="debugmsgs" style="display: none">';

        foreach($debug_buffer as $value) {
            $error_handler->displayError($value['errsev'], $value['errstr'], $value['errfile'], $value['errline']);
        }

        echo '</div><!--//debugmsgs--></div><!--//debugbox-->';

    }

}

?>

<div id="footer" class="small"> This site is using <a href="http://phpgraphy.sourceforge.net/">phpGraphy</a>
<?php

  echo PHPGRAPHY_VERSION;
  if ($timegen) {
    echo ' - Page generated in '.$page_generation_time.'s.';
  }

?>
</div><!--//footer-->
</div>
</body>
</html>
