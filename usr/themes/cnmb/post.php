<?php 
if(isset($_GET["action"]) && $_GET["action"] == "ajax_comments"){
$this->need('comments.php');
}else{
if(strpos($_SERVER["PHP_SELF"],"themes")) header('Location:/');
$this->need('header.php');
?>

                         <!-- /.aside -->
        <section id="content">
          <section class="vbox">
            <section class="scrollable wrapper-lg">
              <div class="row">
<div class="col-lg-12">
                  <!-- .breadcrumb -->
                  <ul class="breadcrumb">
                    <li> <a href="<?php $this->options->siteUrl(); ?>"><i class="fa fa-home"></i> 首页</a></li>
                   <?php if ($this->is('index')) : ?>
<?php else: ?> <li class="active">       <a href="#"><i class="fa fa-list-ul"></i> <?php $this->category(','); ?></a>   </li>
<?php endif; ?>
                  </ul>
                  <!-- / .breadcrumb -->
                </div>
         
     
   
               
                <div class="col-sm-9">
                  <div class="blog-post">     
                  <!-- 呈现  -->   
                         
                    <div class="post-item">
                      <!-- <div class="post-media">
                    <img src="<?php $this->options->themeUrl('images/m42.jpg'); ?>" class="img-full"> 
                      </div> -->
                      <div class="caption wrapper-lg">
                        <h2 class="post-title"><a itemtype="url" href="<?php $this->permalink() ?>" class="title"><span style="font-family:'Microsoft YaHei';color:#00D5FF;"><strong><?php $this->title() ?></strong></span></a></h2>
                        <div class="text-muted">
                          <i class="fa fa-user icon-muted">by-</i><a href="#" class="m-r-sm"><?php $this->author(); ?></a>
                          <i class="fa fa-clock-o icon-muted"></i><?php $this->date('Y-m-j  H:i:s'); ?>
                      

     
 <a href="#" class="m-l-sm"><i class="fa fa-comment-o icon-muted"></i><?php $this->commentsNum(); ?> </a>                     
                        </div>
                        <div class="line line-lg"></div>
                        
                        <div class="post-sum">
                     <style>
 img {
max-width: 100%;
max-height: 100%;
height:auto;
zoom:expression( function(e) {
if(e.width>e.height) {if (e.width>128) { e.height = e.height*(128 /e.width); e.width=128; }}
else {if (e.height>128) { e.width = e.width*(128 /e.height); e.height=128; }}
e.style.zoom = '1'; }(this));
overflow:hidden;
}
</style>
                 <?php $this->content(); ?>
                       

    <span class="text-muted hide" id="moreless">  <a href="#" class="btn btn-default btn-block"><i class="fa fa-bars pull-left"></i> 文章详情</a><div class="panel-body">
<i class="fa fa-hand-o-right"></i>作者：<?php $this->author(); ?><br>
<i class="fa fa-hand-o-right"></i>分类：<?php $this->category(','); ?><br><i class="fa fa-hand-o-right"></i>标签：
<?php $this->tags(', ', true, '无标签'); ?>
<br><i class="fa fa-hand-o-right"></i>评论：
<?php $this->commentsNum(); ?>  次
<br><i class="fa fa-hand-o-right"></i>地址：
<a itemtype="url" href="<?php $this->permalink() ?>" class="title"><?php $this->permalink() ?></a></div>
</span>  <p>
                         <a href="#moreless" class="btn btn-sm btn-default" data-toggle="class:show"> <i class="fa fa-plus text"></i> <span class="text">More</span> <i class="fa fa-minus text-active"></i> <span class="text-active">Less</span> </a>
</p>
                        </div>
             
                       <div style="margin-top:20px;">
									
								
								
								<div id="author-box">
						<h3 style="height: 35px;font-size: 18px;"><i class="fa fa-github-alt"></i>&nbsp;作者：<?php $this->author(); ?></h3>
						<div class="author-info">
							<div class="author-avatar">
							<img <?php if ($this->options->logoUrl){ ?>src="<?php $this->options->logoUrl();?>"<?php }else{ ?>src="http://secure.gravatar.com/avatar/"<?php };?> alt="<?php $this->options->title();?>" height="64" width="64" class="avatar"/>

							</div>
							<div class="author-description">
								<p>
								<span style="color: #ff6600;"><strong>本博客如无特殊说明皆为原创，转载请注明来源：</strong></span><strong><span style="color:#808080;"><span style="font-size:18px;"><span style="font-family:楷体;"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></span></span></span></strong></p>
								<ul class="author-social follows nb"><!-- 分享代码 -->
									<div class="bshare-custom">
										<a title="分享到" href="http://www.bShare.cn/"
											id="bshare-shareto" class="bshare-more">分享到</a><a
											title="分享到QQ空间" class="bshare-qzone">QQ空间</a><a
											title="分享到新浪微博" class="bshare-sinaminiblog">新浪微博</a><a
											title="分享到人人网" class="bshare-renren">人人网</a><a
											title="分享到腾讯微博" class="bshare-qqmb">腾讯微博</a><a
											title="分享到网易微博" class="bshare-neteasemb">网易微博</a><a
											title="更多平台"
											class="bshare-more bshare-more-icon more-style-addthis"></a><span
											class="BSHARE_COUNT bshare-share-count">0</span>
									</div>
									<script type="text/javascript" charset="utf-8"
										src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=&amp;pophcol=1&amp;lang=zh"></script>
									<script type="text/javascript" charset="utf-8"
										src="http://static.bshare.cn/b/bshareC0.js"></script>
										<!-- 分享代码 -->

								</ul>

							</div>
							<div class="clear">
							</div>
						</div>
					</div>
					</div>
					
                      </div>
                    </div>
                  
                    <!--  呈现  -->     
                  </div><div class="alert alert-success"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-ok-sign"></i><?php $this->thePrev('上一篇：%s', '没有上片文章'); ?> </div>
<div class="alert alert-info"> <button type="button" class="close" data-dismiss="alert">×</button> <i class="fa fa-info-sign"></i><?php $this->theNext('下一篇：%s ', '没有下篇文章'); ?> </div>

               <?php $this->need('comments.php'); ?> 
       
            
                 
               
                </div>
  
<?php $this->need('sidebar.php'); ?>

<?php $this->need('footer.php');?>
 
<?php }?>  