 <!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <meta http-equiv="content-type" content="text/html; charset=<?php $this->options->charset(); ?>" />
<meta name="baidu-site-verification" content="u88j8212Rj" />
<meta name="theme-color" content="#4cb6cb">
<meta name="msapplication-TileColor" content="#4cb6cb">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta property="qc:admins" content="5747116224156375" />
<title><?php $this->archiveTitle(array(
'category'=>_t('分类 %s 下的文章'),
'search'=>_t('包含关键字 %s 的文章'),
'tag' =>_t('标签 %s 下的文章'),
'author'=>_t('%s 发布的文章')
), '', ' - '); ?><?php $this->options->title(); ?></title>


  <link rel="stylesheet" href="<?php $this->options->themeUrl('css/app.v1.css'); ?>" type="text/css" />
    <!--[if lt IE 9]>
    <script src="<?php $this->options->themeUrl('js/ie/html5shiv.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/ie/respond.min.js'); ?>"></script>
    <script src="<?php $this->options->themeUrl('js/ie/excanvas.js'); ?>"></script>
  <![endif]--> 
<?php $this->header(); ?>
</head>
 
<body >
  <section class="vbox">
   <header class="bg-white-only header header-md navbar navbar-fixed-top-xs">
     <div class="navbar-header aside bg-info dk nav-xs">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen,open" data-target="#nav,html">
          <i class="icon-list"></i>
        </a>
<a href="<?php $this->options->siteUrl(); ?>" class="navbar-brand text-lt">
          <i class=" icon-bubble"></i>
          <img src="#" alt="." class="hide">
       <span class="hidden-nav-xs m-l-sm"><?php $this->options->title(); ?></span>
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="icon-settings"></i>
        </a>
      </div>      <ul class="nav navbar-nav hidden-xs">
        <li>
          <a href="#nav,.navbar-header" data-toggle="class:nav-xs,nav-xs" class="text-muted">
            <i class="fa fa-indent text"></i>
            <i class="fa fa-dedent text-active"></i>
          </a>
        </li>
      </ul>
      <form action="?i=search" method="post" class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search" target="_blank">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">

<form id="search" method="post" action="./" role="search">

          <button type="submit" name="search" value="搜索" type="submit" class="btn btn-sm bg-white btn-icon rounded"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" name="s" class="form-control input-sm no-border rounded" placeholder="填充搜索内容..."></form>
          </div>
        </div>
      </form>
      <div class="navbar-right ">
        <ul class="nav navbar-nav m-n hidden-xs nav-user user">
    
           <li class="dropdown"> 
            <a href="#" class="dropdown-toggle bg clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
    
      <img <?php if ($this->options->logoUrl){ ?>src="<?php $this->options->logoUrl();?>"<?php }else{ ?>src="http://secure.gravatar.com/avatar/"<?php };?> alt="<?php $this->options->title();?>"/>
              </span>
        <?php if($this->user->hasLogin()): ?><?php $this->user->screenName(); ?>
 <?php else: ?>
               <?php echo "个人中心";?>  <?php endif; ?>  <b class="caret"></b>
            </a>
            <ul class="dropdown-menu animated fadeInRight">       
             <?php if($this->user->hasLogin()): ?>
              <li>    <span class="arrow top"></span>
              <a href="<?php $this->options->adminUrl(); ?>" title="<?php $this->user->screenName(); ?>" target="_blank"><?php _e('后台设置'); ?></i></a>
              </li>
             
          <?php else: ?>
               <li>
                <span class="arrow top"></span>
              <a href="<?php $this->options->adminUrl('login.php'); ?>" target="_blank"><?php _e('登录'); ?></a>
              </li>   <?php endif; ?>
              <li class="divider"></li>
              <li>
                <a href="<?php $this->options->feedUrl(); ?>" target="_blank"> 文章rss-<i class="fa fa-rss-square"></i> </a>
              </li>
 
              <li class="divider"></li>
              <li>
                <a href="<?php $this->options->commentsFeedUrl(); ?>" target="_blank" >评论rss-<i class="fa fa-rss"></i></a>
              </li><?php if($this->user->hasLogin()): ?>
         <li class="divider"></li>
              <li>
                <a href="<?php $this->options->logoutUrl(); ?>" >安全退出</a>  <?php endif; ?>
              </li>
            </ul>
          </li>
        </ul>
      </div>      
    </header>
    <section>
      <section class="hbox stretch">
        <!-- .aside -->

         <aside class="bg-black dk aside hidden-print nav-xs" id="nav">
          <section class="vbox">
            <section class="w-f-md scrollable">
              <div class="slim-scroll" data-height="auto" data-disable-fade-out="true" data-distance="0" data-size="10px" data-railOpacity="0.2">
                


                <!-- nav -->                 
             <nav class="hidden-xs nav-primary">
                  <ul class="nav bg clearfix">     
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      选择
                    </li>
                   
        <li>
                      <a href="<?php $this->options->siteUrl(); ?>">
                        <i class="icon-disc icon text-success"></i>
                        <span class="font-bold">文章</span>
                      </a>                  
                    </li>  
                   
               
<!--                     <li>
                      <a href="<?php $this->options->siteUrl(); ?>">
                        <i class="icon-drawer icon text-primary-lter"></i>
                        <b class="badge bg-primary pull-right">6</b>
                        <span class="font-bold">事件</span>
                      </a>
                    </li>
                     -->
                
              

<li>   

<a href="<?php $this->options->siteUrl(); ?><?php $this->options->ab(); ?>" >
                        <i class="icon-social-twitter icon  text-info-dker"></i>
                     <span class="font-bold"> 关于</span>
                    </a>


              </li>
<li class="m-b hidden-nav-xs"></li>         </ul>     
                  <ul class="nav" data-ride="collapse">
                    <li class="hidden-nav-xs padder m-t m-b-sm text-xs text-muted">
                      控制
                    </li>  <?php if($this->user->hasLogin()): ?>
 <li >
                      <a href="<?php $this->options->adminUrl(); ?>" class="auto">
                        <span class="pull-right text-muted">
                          
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                   <i class="icon-settings"></i>
                        <span>设置</span>
                      </a>    
                      
<?php endif; ?>
<li  class="active">   <?php if (!empty($this->options->sidebarBlock) && in_array('ShowCategory', $this->options->sidebarBlock)): ?>
           <li >
                      <a href="#" class="auto">
                        <span class="pull-right text-muted">
                          <i class="fa fa-angle-left text"></i>
                          <i class="fa fa-angle-down text-active"></i>
                        </span>
                   <i class="icon-grid icon"></i>
                        <span>分类</span>
                      </a>    
                      <ul class="nav dk text-sm"><?php $this->widget('Widget_Metas_Category_List')->to($category); ?> <?php while ($category->next()): ?>
                        <li >
                          <a href="<?php $category->permalink(); ?>" class="auto">                                                        
                            <i class="fa fa-angle-right text-xs"></i>
                            <span><?php $category->name(); ?></span> 
                          </a>
                        </li>
                       
                       <?php endwhile; ?>
                      </ul>  

                    </li>     <?php endif; ?>   </ul>  
 
             <div style="position:fixed; bottom:0; ">
   <?php $this->options->tongji(); ?>    

</div>
              
                <!-- / nav --></nav>
              </div>
            </section>
            
   
          </section>
        </aside>
        

 
                