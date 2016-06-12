<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
  <div id="comments">
      <?php $this->comments()->to($comments); ?>
      <?php if($this->allow('comment')): ?>
      <div id="<?php $this->respondId(); ?>" class="respond">
          <div class="cancel-comment-reply">
          <?php $comments->cancelReply(); ?>
          </div>
        <div class="ds-thread" data-thread-key="<?php $this->cid(); ?>" data-count-type="<?php $this->commentsNum(); ?>" data-title="<?php $this->title(); ?>" data-author-key="<?php $this->authorId(); ?>" data-url="<?php $this->permalink(); ?>"></div>
        <script type="text/javascript">
          var duoshuoQuery = {short_name:"<?php $this->options->duosuokey(); ?>"};
            (function() {
              var ds = document.createElement('script');
                  ds.type = 'text/javascript';ds.async = true;
                  ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '<?php $this->options->duosuojs(); ?>';
              (document.getElementsByTagName('head')[0]
                || document.getElementsByTagName('body')[0]).appendChild(ds);
  
           })();
        </script>
  
      </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>