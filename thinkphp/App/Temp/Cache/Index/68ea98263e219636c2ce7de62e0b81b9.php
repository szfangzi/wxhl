<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>如影随形黑色个人博客HTML5模板 - 源码之家</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="__PUBLIC__/css/base.css" rel="stylesheet">
<link href="__PUBLIC__/css/media.css" rel="stylesheet">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<!--[if lt IE 9]>
<script src="__PUBLIC__/js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<div class="ibody">
  <header>
    <h1>如影随形</h1>
    <h2>影子是一个会撒谎的精灵，它在虚空中流浪和等待被发现之间;在存在与不存在之间....</h2>
    <div class="logo"><a href="/"></a></div>
    <nav id="topnav"><a href="<?php echo U('Index/Index/index');?>">首页</a><a href="<?php echo U('Index/Index/about');?>">关于我</a><a href="<?php echo U('Index/List/index');?>">慢生活</a></nav>
  </header>


  <link href="__PUBLIC__/css/index.css" rel="stylesheet">
  <article>
    <div class="banner">
      <ul class="texts">
        <p>The best life is use of willing attitude, a happy-go-lucky life. </p>
        <p>最好的生活是用心甘情愿的态度，过随遇而安的生活。</p>
      </ul>
    </div>
    <div class="bloglist">
      <h2>
        <p><span>推荐</span>文章</p>
      </h2>

      <?php if(is_array($posts)): foreach($posts as $k=>$v): ?><div class="blogs">
        <h3><a href="/"><?php echo ($v["post_title"]); ?></a></h3>
        <figure><img src="images/01.jpg" ></figure>
        <ul>
          <p><?php echo ($v["post_content"]); ?></p>
          <a href="/" target="_blank" class="readmore">查看全文</a>
        </ul>
        <p class="autor"><span>作者:<?php echo ($v["post_author"]); ?></span><span>分类<a href="/"><!-- <?php echo ($v["post_author"]); ?> --></a></span><span>浏览<a href="/"><?php echo ($v["view_count"]); ?></a></span><span>评论<a href="/"><?php echo ($v["comment_count"]); ?></a></span></p>
        <div class="dateview"><?php echo (date('Y-m-d',$v["post_date"])); ?></div>
      </div><?php endforeach; endif; ?>
    </div>
  </article>
  
<aside>
  <div class="avatar"><a href="about.html"><span>关于杨青</span></a></div>
  <div class="topspaceinfo">
    <h1>执子之手，与子偕老</h1>
    <p>于千万人之中，我遇见了我所遇见的人....</p>
  </div>
  <div class="about_c">
    <p>网名：DanceSmile | 即步非烟</p>
    <p>职业：Web前端设计师、网页设计</p>
    <p>籍贯：四川省—成都市</p>
    <p>电话：13662012345</p>
    <p>邮箱：dancesmiling@qq.com</p>
  </div>
 <!--  <div class="tj_news">
    <h2>
      <p class="tj_t1">最新文章</p>
    </h2>
    <ul>
      <li><a href="/">·¸´íÁËÔõÃ´°ì£¿</a></li>
      <li><a href="/">Á½Ö»ÎÏÅ£¼èÄÑÓÖÀËÂþµÄÒ»ÎÇ</a></li>
      <li><a href="/">´ºÅ¯»¨¿ª-×ß×ßÍ£Í£-·¢ÏÖÃÀ</a></li>
      <li><a href="/">çüÖÇ¹ú¼Ê-Nativ for Life¹Ù·½ÍøÕ¾</a></li>
      <li><a href="/">¸öÈË²©¿ÍÄ£°å£¨2014²Ý¸ùÑ°ÃÎ£©</a></li>
      <li><a href="/">¼òµ¥ÊÖ¹¤Ö½Ãµ¹å</a></li>
      <li><a href="/">ÏìÓ¦Ê½¸öÈË²©¿ÍÄ£°å£¨À¶É«ÇåÐÂ£©</a></li>
      <li><a href="/">À¶É«Õþ¸®£¨ÎÀÉú¼Æ»®ÉúÓý¾Ö£©ÍøÕ¾</a></li>
    </ul>
    <h2>
      <p class="tj_t2">推荐文章</p>
    </h2>
    <ul>
      <li><a href="/">·¸´íÁËÔõÃ´°ì£¿</a></li>
      <li><a href="/">Á½Ö»ÎÏÅ£¼èÄÑÓÖÀËÂþµÄÒ»ÎÇ</a></li>
      <li><a href="/">´ºÅ¯»¨¿ª-×ß×ßÍ£Í£-·¢ÏÖÃÀ</a></li>
      <li><a href="/">çüÖÇ¹ú¼Ê-Nativ for Life¹Ù·½ÍøÕ¾</a></li>
      <li><a href="/">¸öÈË²©¿ÍÄ£°å£¨2014²Ý¸ùÑ°ÃÎ£©</a></li>
      <li><a href="/">¼òµ¥ÊÖ¹¤Ö½Ãµ¹å</a></li>
      <li><a href="/">ÏìÓ¦Ê½¸öÈË²©¿ÍÄ£°å£¨À¶É«ÇåÐÂ£©</a></li>
      <li><a href="/">À¶É«Õþ¸®£¨ÎÀÉú¼Æ»®ÉúÓý¾Ö£©ÍøÕ¾</a></li>
    </ul>
  </div> -->
  <div class="links">
    <h2>
      <p>友情链接</p>
    </h2>
    <ul>
      <li><a href="/">杨青个人博客</a></li>
      <li><a href="/">3DST技术社区</a></li>
    </ul>
  </div>
  <div class="copyright">
    <ul>
      <p> Design by <a href="/">DanceSmile</a></p>
      <p>蜀ICP备11002373号-1</p>
      </p>
    </ul>
  </div>
</aside>



	
  	<div class="clear"></div>
  	<script src="__PUBLIC__/js/jquery.min.js"></script>
  	<script src="__PUBLIC__/js/ejs.min.js"></script>
  	<script src="__PUBLIC__/js/common.js"></script>
  	<script src="__PUBLIC__/js/silder.js"></script>
  	
</div>
</body>
</html>