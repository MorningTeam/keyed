<script>
window.onblur = function() {
    document.title = " 发呆- ( ゜- ゜)つロ";
window.onfocus = function() {
    document.title = "<?php $this->archiveTitle(array(
'category'=>_t('分类 %s 下的文章'),
'search'=>_t('包含关键字 %s 的文章'),
'tag' =>_t('标签 %s 下的文章'),
'author'=>_t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?>";
}
};
</script> 
<?php $this->footer(); ?>

 <script src="<?php $this->options->themeUrl('js/app.v1.js'); ?>"></script>
 <script src="<?php $this->options->themeUrl('js/jquery.easy-pie-chart.js'); ?>"></script>   
 <script src="<?php $this->options->themeUrl('js/jquery.sparkline.min.js'); ?>"></script>     
    <script src="<?php $this->options->themeUrl('js/app.plugin.js'); ?>"></script>     
</body>
</html>