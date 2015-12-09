<?php
    $options = vp_option('vpt_option');
?>
<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="holder"><?php dynamic_sidebar('sidebar-footer'); ?></div>
    <?php if($options['copyright']) echo '<div class="copyright">'. $options['copyright'] .'</div>'; ?>
    <?php if($options['backtop_show']) echo '<a href="#" id="scrollTopLink"><span class="glyphicon glyphicon-circle-arrow-up"></span></a>'; ?>
  </div>
</footer>
