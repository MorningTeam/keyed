<?php
/**
 * cnmb指的是菜鸟模板，没有什么其他含义哦，这是jrotty的移植作品，qq530736933
 * 
 * @package cnmb
 * @author jrotty
 * @version 1.3.1
 * @link http://qqdie.com
 */
$this->need('header.php');
?>


                         <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable wrapper-lg">
              <div class="row"><?php if ($this->is('index')) : ?>
<?php else: ?><?php if ($this->is('search')) : ?>
 <!-- .breadcrumb -->
                  <ul class="breadcrumb">
                    <li> <a href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-home"></i> 首页</a></li>
                    <li class="active">       <a href="#"><i class="fa fa-list-ul"></i> <?php $this->archiveTitle(array(
'category'=>_t('分类 %s 下的文章'),
'search'=>_t('包含关键字 %s 的文章'),
'tag' =>_t('标签 %s 下的文章'),
'author'=>_t('%s 发布的文章')
), '', ' -如下 '); ?></a>   </li>
 </ul>
                  <!-- / .breadcrumb -->
                </div>
<?php else: ?>
<div class="col-lg-12">
                  <!-- .breadcrumb -->
                  <ul class="breadcrumb">
                    <li> <a href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-home"></i> 首页</a></li>
                    <li class="active">       <a href="#"><i class="fa fa-list-ul"></i> <?php $this->category(','); ?></a>   </li>
 </ul>
                  <!-- / .breadcrumb -->
                </div>
         <?php endif; ?> <?php endif; ?>
                 

              
                <div class="col-sm-9">
                  <div class="blog-post">     
                  <!-- 开始循环  -->   
 
 <?php while($this->next()): ?>
  <div class="post-item"> <div class="post-media">
      <?php if (!empty($this->options->sidebarBlock) && in_array('Showt', $this->options->sidebarBlock)): ?>      

    <style>
.img-full{
  max-width: 100%;
    height: 0;
padding-bottom:<?php $this->options->cc(); ?>;
    overflow: hidden;
}.img-full img{

width:100%
}
</style>
 <a itemtype="url" href="<?php $this->permalink() ?>" class="title"><div class="img-full">

<img src=<?php echo img_postthumb($this->cid); ?> > 
</a></div>
          <?php endif; ?>   </div>      
                      <div class="caption wrapper-lg">
                        <h3 class="post-title"><a itemtype="url" href="<?php $this->permalink() ?>" class="title"><?php $this->title() ?></a></h3>
                        <div class="post-sum" >
                    <?php $this->excerpt(250, '...'); ?> 
                        </div>
                        <div class="line line-lg"></div>
                        <div class="text-muted">
                          <i class="fa fa-user icon-muted">by-</i> <a href="#" class="m-r-sm"><?php $this->author(); ?></a>
                          <i class="fa fa-clock-o icon-muted"></i><?php $this->date('Y-m-j  H:i'); ?>
                         <a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i><?php $this->commentsNum(); ?> </a>
                          
                        </div>
                      </div>

                    
</div>
              <?php endwhile; ?>  </div>
                    <!-- 结束循环  --> 
                  <div class="text-center m-t-lg m-b-lg">
                  
                    <ul class="pagination pagination-md">
                   
                    <?php $this->pageNav('&laquo; ', '&raquo;',1,'...',array('wrapClass'=>'pagination pagination-success','currentClass'=>'active')); ?>
            
                 
                    </ul>
                    
                  </div>

                </div>
                                     
 
<?php $this->need('sidebar.php'); ?>
          
<?php $this->need('footer.php');?>