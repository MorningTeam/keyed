<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {

  //网站LOGO
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点LOGO地址'), _t('logo头像地址，不填写默认调用博主邮箱头像（极有可能被墙的说），这个建议用正方形的图片如500*500，否则有些地方会显示的很奇怪√'));
    $form->addInput($logoUrl);

 $sidebarBlock = new Typecho_Widget_Helper_Form_Element_Checkbox('sidebarBlock', 
    array('gg' => _t('打开公告'),'ShowRecentPosts' => _t('显示最新文章'),
'ShowCategory' => _t('显示分类'),
	'ShowRecentComments' => _t('显示最近回复'),'tag' => _t('显示文章标签'),
'Showt' => _t('显示文章缩略图'),),
    array('ShowRecentPosts','ShowCategory' , 'ShowRecentComments', 'tag', 'Showt'), _t('侧边栏显示'),_t('缩略图开启后会获取文章中第一个图片，如果没有图片则会显示下方设置的默认图片地址'));
    $form->addInput($sidebarBlock->multiMode());
//缩略图尺寸
    $cc = new Typecho_Widget_Helper_Form_Element_Text('cc', NULL, '20%', _t('缩略图大小%'), _t('缩略图有从上向下截取，推荐20%或者填入30%，手机电脑效果都很好，默认20%，提示：填100%你会后悔的（>V<）'));
 $form->addInput($cc);

//关于
    $ab = new Typecho_Widget_Helper_Form_Element_Text('ab', NULL, NULL, _t('关于独立页面地址'), _t('新建独立页面，引入about模板，这里就填加独立页面的后缀地址,如bbs.qqdie.com/index.php/about.html就填index.php/about.html'));
 $form->addInput($ab);

//公告
    $gg = new Typecho_Widget_Helper_Form_Element_Text('gg', NULL, '我是公告', _t('公告'), _t('写入全局公告内容'));
 $form->addInput($gg);

    //博主qq
    $qq = new Typecho_Widget_Helper_Form_Element_Text('qq', NULL, '530736933', _t('博主QQ'), _t('在这里填入博主的QQ号码如：530736933'));
    $form->addInput($qq);
  //博主微博
    $weiboz = new Typecho_Widget_Helper_Form_Element_Text('weiboz', NULL, 'http://weibo.com', _t('博主所属微博'), _t('在这里填入博主所属微博，新浪填写http://weibo.com腾讯微博就填http://t.qq.com等，如我的微博地址是：http://weibo.com/jinzeboke那么就填写http://weibo.com'));
    $form->addInput($weiboz);
   //博主微博
    $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, 'jinzeboke', _t('博主微博'), _t('在这里填入博主的微博地址，如我的微博地址是：http://weibo.com/jinzeboke那么就填写jinzeboke'));
    $form->addInput($weibo);
//qq空间签名档
    $qqqm = new Typecho_Widget_Helper_Form_Element_Text('qqqm', NULL, 'http://r.qzone.qq.com/cgi-bin/cgi_get_user_pic?openid=0000000000000000000000000DB70025&pic=5.jpg&key=de638b89bab4979061e19df49c9c7c42', _t('QQ空间签名档
'), _t(' <a href="http://connect.qq.com/intro/signature" target="_blank">获取KEY地址</a> (src后双引号的全部内容)'));
    $form->addInput($qqqm);
//关于界面展示图
    $tt = new Typecho_Widget_Helper_Form_Element_Text('tt', NULL, 'http://file.juzimi.com/weibopic/jxzlmx2.jpg', _t('关于界面展示图
'), _t(' 填入图片地址，建议图片高度158px'));
    $form->addInput($tt);
 //建站时间
    $time = new Typecho_Widget_Helper_Form_Element_Text('time', NULL, '06,18,2015', _t('博客成立时间'), _t('在这里填入博客的成立时间,格式要求“月,日,年”，如填入“06,18,2015”,注意逗号是英文输入法下的逗号'));
    $form->addInput($time);
    //友情链接
    $FriendLink = new Typecho_Widget_Helper_Form_Element_Textarea('FriendLink', NULL,'<a style="margin-bottom: 5px;" href="http://qqdie.com/" class="btn btn-s-md btn-default"  target="_blank">QQ爹博客</a>', _t('友情链接'), _t('每条一行，按照输入框里面格式。。'));
    $form->addInput($FriendLink);
   
   //统计代码
$tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('统计代码'), _t(''));
$form->addInput($tongji);

}


function getFriendWall(){
   $period = time() - 99999999999999999999999; // 单位: 秒, 时间范围: 2592000为30天
   $db = Typecho_Db::get();
   $sql = $db->select('COUNT(author) AS cnt', 'author', 'url', 'mail')
   ->from('table.comments')
   ->where('created > ?', $period )
   ->where('status = ?', 'approved')
   ->where('type = ?', 'comment')          
   ->where('authorId = ?', '0')
   ->where('mail != ?', '')   //排除自己上墙
   ->group('author')
   ->order('cnt', Typecho_Db::SORT_DESC)
   ->limit('50');    //读取几位用户的信息
   $result = $db->fetchAll($sql);
$mostactive = "";
$my_array=array('www','0','1','2'); //我自定义的随机一个头像服务器,减少同时往一个服务器发起多次请求
   if (count($result) > 0) {
       foreach ($result as $value) {
           $mostactive .= '<li><a href="' . $value['url'] . '" title="' . $value['author'] . ':' . $value['cnt'] . '℃" target="_blank" rel="nofollow">';
           $mostactive .= '<img class="avatar" src="http://'.$my_array[rand(0,3)].'.gravatar.com/avatar/'.md5(strtolower($value['mail'])).'?s=40&d=&r=G"/></a></li>';
       }
       echo $mostactive;
   }
}
function img_postthumb($cid) {
   $db = Typecho_Db::get();
   $rs = $db->fetchRow($db->select('table.contents.text')
       ->from('table.contents')
       ->where('table.contents.cid=?', $cid)
       ->order('table.contents.cid', Typecho_Db::SORT_ASC)
       ->limit(1));

   preg_match_all("/\<img.*?src\=\"(.*?)\"[^>]*>/i", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
   $img_src = $thumbUrl[1][0];  //将赋值给img_src
   $img_counter = count($thumbUrl[0]);  //一个src地址的计数器

   switch ($img_counter > 0) {
       case $allPics = 1:
           echo $img_src;  //当找到一个src地址的时候，输出缩略图
           break;
       default:
           echo "http://7xjpi6.com1.z0.glb.clouddn.com/2015/11/743008418.png";  //没找到(默认情况下)，输入默认图片
   };
}

//自定义评论列表区域
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>

<style>

#comments .page-navigator{text-align:center;}
#comments .page-navigator li{display:inline-block;margin:0 4px;}
#comments .page-navigator li a{background:#4cb6cb;color:#fff;display:block;padding:0 16px;line-height:42px;border-radius:4px;}
#comments .page-navigator .current a,#comments .page-navigator a:hover{background:#009ACD;}

.comment-list,.comment-list ol{margin:0;padding:0;list-style:none}
.comment-list{margin-top:-1px}
.respond p{margin:10px 0}
.respond h3{margin:12px 0 0 0}
.comment-list li{padding:15px 0 0}
.comment-list li .comment-reply{float:right;margin-top:-39px;padding:0 10px;border:1px solid #ccc;font-size:.92857em}
.comment-meta a{color:#999;font-size:.92857em}
.comment-author{display:block;margin-bottom:3px;color:#444}
.comment-author .avatar{float:left;margin:1px 10px 0 0;padding:1px;border:1px solid #ddd;border-radius:50%}
.comment-author .avatar:hover{float:left;margin:1px 10px 0 0;padding:1px;border:1px solid #3c3;border-radius:50%}
.comment-author cite{font-weight:700;font-style:normal}
.comment-list .respond{margin-top:15px;border-top:1px solid #aaa}
.comment-body .respond{margin:0 0 25px;border:0}
.respond .cancel-comment-reply{float:right;padding:0 10px;border:1px solid #ccc;border-top:0;border-bottom:0;background:#ddd;font-size:14px}
#comment-form label{position:absolute;display:block;margin:6px;color:#888}
#comment-form input{-webkit-box-sizing:border-box;-moz-box-sizing:border-box;box-sizing:border-box;padding:5px 6px 5px 45px;height:32px;border:solid 1px #d4d4d4;background:#fdfdfd;line-height:16px;-ms-box-sizing:border-box}
.comment-children{padding-left:30px}
.comment-children .comment-children{padding-left:0}
.comment-content{overflow:hidden;margin-right:50px}
</style>



<li id="li-<?php $comments->theId(); ?>" class="comment-body<?php 
if ($comments->levels > 0) {
    echo ' comment-child';
    $comments->levelsAlt(' comment-level-odd', ' comment-level-even');
} else {
    echo ' comment-parent';
}
$comments->alt(' comment-odd', ' comment-even');
echo $commentClass;
?>">
    <div id="<?php $comments->theId(); ?>">
        <div class="comment-author">
            <?php
            //头像CDN by Rich
            $host = 'https://secure.gravatar.com'; //自定义头像CDN服务器
            $url = '/avatar/'; //自定义头像目录,一般保持默认即可
            $size = '32'; //自定义头像大小
            $rating = Helper::options()->commentsAvatarRating;
            $hash = md5(strtolower($comments->mail));
            $avatar = $host . $url . $hash . '?s=' . $size . '&r=' . $rating . '&d=';
            ?>
            <img class="avatar" src="<?php echo $avatar ?>" alt="<?php echo $comments->author; ?>" width="<?php echo $size ?>" height="<?php echo $size ?>" />
            <cite class="fn"><?php $comments->author(); ?></cite>
        </div>
        <div class="comment-meta">
            <a href="<?php $comments->permalink(); ?>"><?php $comments->date('Y-m-d H:i'); ?></a>
            <span class="comment-reply"><?php $comments->reply(); ?></span>
        </div>
        <?php $comments->content(); ?>
    </div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
</li>
<?php }