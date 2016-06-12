<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

<div>

</div>
<footer class="site-footer clearfix">
       <section class="copyright"> 友情链接： <a href="http://leiocai.github.io" target="_blank">老菜居士</a></section>
       <!-- <section class="poweredby">友情链接<a href="http://typecho.org">Typecho</a></section> -->
       <section class="poweredby"><a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a> &copy; <?php echo date('Y'); ?></section>
</footer>
</div>

<script src="<?php $this->options->themeUrl('assets/js/jquery.js');?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/jquery.fitvids.js');?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/index.js');?>"></script>
<script src="<?php $this->options->themeUrl('assets/js/site.js');?>"></script>


<?php $this->footer(); ?>
</body>
</html>
