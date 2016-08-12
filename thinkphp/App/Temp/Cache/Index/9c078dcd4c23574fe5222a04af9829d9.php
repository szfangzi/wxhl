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


<link href="__PUBLIC__/css/style.css" rel="stylesheet">
<article>
  <h2 class="about_h">您现在的位置是：<a href="/">首页</a> > <span><?php echo ($post['post_title']); ?></span></h2>
  <div class="index_about">
    <h2 class="c_titile"><?php echo ($post['post_title']); ?></h2>
    <p class="box_c"><span class="d_time">发布时间：<?php echo (date('Y-m-d',$post['post_date'])); ?></span><span>编辑：<?php echo ($post['post_author']); ?></span><span>浏览：<?php echo ($post['view_count']); ?></span><span>评论：<?php echo ($post['comment_count']); ?></span></p>
    <div class="infos">
      <?php echo ($post['post_content']); ?>
    </div>
    <div class="keybq">
      <p><span>关键字词:</span>£ººÚÉ«,¸öÈË²©¿Í_,Ê±¼äÖá,ÏìÓ¦Ê½</p>
    </div>
    <div class="nextinfo">
      <p>上一篇：<?php if($postPre!=false){ ?><a href="<?php echo U('Index/List/detail/id');?>/<?php echo ($postPre['id']); ?>"><?php echo ($postPre['post_title']); ?></a><?php }else{ ?>没有了！<?php } ?></p>
      <p>下一篇：<?php if($postNext!=false){ ?><a href="<?php echo U('Index/List/detail/id');?>/<?php echo ($postNext['id']); ?>"><?php echo ($postNext['post_title']); ?></a><?php }else{ ?>没有了！<?php } ?></p>
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        <li><a href="/news/s/2013-07-25/524.html" title="ÏÖÔÚ£¬ÎÒÏàÐÅ°®Çé£¡">ÏÖÔÚ£¬ÎÒÏàÐÅ°®Çé£¡</a></li>
        <li><a href="/newstalk/mood/2013-07-24/518.html" title="ÎÒÏ£ÍûÎÒµÄ°®ÇéÊÇÕâÑùµÄ">ÎÒÏ£ÍûÎÒµÄ°®ÇéÊÇÕâÑùµÄ</a></li>
        <li><a href="/newstalk/mood/2013-07-02/335.html" title="ÓÐÖÖÇéÒê£¬²»ÊÇ°®Çé£¬Ò²Ëã²»µÃÓÑÇé">ÓÐÖÖÇéÒê£¬²»ÊÇ°®Çé£¬Ò²Ëã²»µÃÓÑÇé</a></li>
        <li><a href="/newstalk/mood/2013-07-01/329.html" title="ÊÀÉÏ×îÃÀºÃµÄ°®Çé">ÊÀÉÏ×îÃÀºÃµÄ°®Çé</a></li>
        <li><a href="/news/read/2013-06-11/213.html" title="°®ÇéÃ»ÓÐÓÀÔ¶£¬µØÀÏÌì»ÄÒ²×ß²»Íê">°®ÇéÃ»ÓÐÓÀÔ¶£¬µØÀÏÌì»ÄÒ²×ß²»Íê</a></li>
        <li><a href="/news/s/2013-06-06/24.html" title="°®ÇéµÄ±³ÅÑÕß">°®ÇéµÄ±³ÅÑÕß</a></li>
      </ul>
    </div>
  </div>

</article>

<aside>
    <div class="rnav">
      <li class="rnav1 "><a href="/">日记</a></li>
      <li class="rnav2 "><a href="/">欣赏</a></li>
      <li class="rnav3 "><a href="/">程序人生</a></li>
      <li class="rnav4 "><a href="/">经典语录</a></li>
    </div>
    <div class="ph_news">
      <h2>
        <p>点击排行</p>
      </h2>
      <ul class="ph_n">
        <li><span class="num1">1</span><a href="/">ÓÐÒ»ÖÖË¼Äî£¬ÊÇµ­µ­µÄÐÒ¸£,Ò»¸öÐÄÇéÒ»ÐÐÎÄ×Ö</a></li>
        <li><span class="num2">2</span><a href="/">ÀøÖ¾ÈËÉú-Òª×öÒ»¸öäìÈ÷µÄÅ®ÈË</a></li>
        <li><span class="num3">3</span><a href="/">Å®º¢¶¼ÓÐÀËÂþµÄÐ¡Çé»³¡ª¡ªÀËÂþµÄÇó»é´Ê</a></li>
        <li><span>4</span><a href="/">GreenÂÌÉ«Ð¡ÇåÐÂµÄÏÄÌì-¸öÈË²©¿ÍÄ£°å</a></li>
        <li><span>5</span><a href="/">Å®ÉúÇåÐÂ¸öÈË²©¿ÍÍøÕ¾Ä£°å</a></li>
        <li><span>6</span><a href="/">Wedding-»éÀñÖ÷Ìâ¡¢ÇéÈË½ÚÍøÕ¾Ä£°å</a></li>
        <li><span>7</span><a href="/">Column ÈýÀ¸²¼¾Ö ¸öÈËÍøÕ¾Ä£°å</a></li>
        <li><span>8</span><a href="/">Ê±¼äÖóÓê-¸öÈËÍøÕ¾Ä£°å</a></li>
        <li><span>9</span><a href="/">»¨ÆøÏ®ÈËÊÇ¾ÆÏã¡ª¸öÈËÍøÕ¾Ä£°å</a></li>
      </ul>
      <h2>
        <p>栏目推荐</p>
      </h2>
      <ul>
        <li><a href="/">ÓÐÒ»ÖÖË¼Äî£¬ÊÇµ­µ­µÄÐÒ¸£,Ò»¸öÐÄÇéÒ»ÐÐÎÄ×Ö</a></li>
        <li><a href="/">ÀøÖ¾ÈËÉú-Òª×öÒ»¸öäìÈ÷µÄÅ®ÈË</a></li>
        <li><a href="/">Å®º¢¶¼ÓÐÀËÂþµÄÐ¡Çé»³¡ª¡ªÀËÂþµÄÇó»é´Ê</a></li>
        <li><a href="/">GreenÂÌÉ«Ð¡ÇåÐÂµÄÏÄÌì-¸öÈË²©¿ÍÄ£°å</a></li>
        <li><a href="/">Å®ÉúÇåÐÂ¸öÈË²©¿ÍÍøÕ¾Ä£°å</a></li>
        <li><a href="/">Wedding-»éÀñÖ÷Ìâ¡¢ÇéÈË½ÚÍøÕ¾Ä£°å</a></li>
        <li><a href="/">Column ÈýÀ¸²¼¾Ö ¸öÈËÍøÕ¾Ä£°å</a></li>
        <li><a href="/">Ê±¼äÖóÓê-¸öÈËÍøÕ¾Ä£°å</a></li>
        <li><a href="/">»¨ÆøÏ®ÈËÊÇ¾ÆÏã¡ª¸öÈËÍøÕ¾Ä£°å</a></li>
      </ul>
      <h2>
        <p>最新评论</p>
      </h2>
      <ul class="pl_n">
        <dl>
          <dt><img src="__PUBLIC__/images/s8.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49·ÖÖÓÇ°</time>
          </dd>
          <dd><a href="/">ÎÄÕÂ·Ç³£ÏêÏ¸£¬ÎÒºÜÏ²»¶.Ç°¶ËµÄ¹¤³ÌÊ¦ºÜÉÙ£¬ÎÒ¼ÇµÃ¼¸ÄêÇ°yahoo»¨¸ßÐ½ÕÐÆ¸Ç°¶ËÒ²ÕÐ²»µ½</a></dd>
        </dl>
        <dl>
          <dt><img src="__PUBLIC__/images/s7.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2Ð¡Ê±Ç°</time>
          </dd>
          <dd><a href="/">ÎÒÊÖ»úÀïÃæÒ²ÓÐÕâÑùÒ»¸öºÅÂë´æÔÚ</a></dd>
        </dl>
        <dl>
          <dt><img src="__PUBLIC__/images/s6.jpg"> </dt>
          <dt> </dt>
          <dd>Ð¡ÁÖ²©¿Í
            <time>8ÔÂ7ÈÕ</time>
          </dd>
          <dd><a href="/">²©¿ÍÉ«²Ê·á¸»£¬ºÜÊÇºÃ¿´</a></dd>
        </dl>
        <dl>
          <dt><img src="__PUBLIC__/images/003.jpg"> </dt>
          <dt> </dt>
          <dd>DanceSmile
            <time>49·ÖÖÓÇ°</time>
          </dd>
          <dd><a href="/">ÎÄÕÂ·Ç³£ÏêÏ¸£¬ÎÒºÜÏ²»¶.Ç°¶ËµÄ¹¤³ÌÊ¦ºÜÉÙ£¬ÎÒ¼ÇµÃ¼¸ÄêÇ°yahoo»¨¸ßÐ½ÕÐÆ¸Ç°¶ËÒ²ÕÐ²»µ½</a></dd>
        </dl>
        <dl>
          <dt><img src="__PUBLIC__/images/002.jpg"> </dt>
          <dt> </dt>
          <dd>yisa
            <time>2Ð¡Ê±Ç°</time>
          </dd>
          <dd><a href="/">ÎÒÊÖ»úÀïÃæÒ²ÓÐÕâÑùÒ»¸öºÅÂë´æÔÚ</a></dd>
        </dl>
      </ul>
      <h2>
        <p>最近访客</p>
        <ul>
          <img src="__PUBLIC__/images/vis.jpg">
        </ul>
      </h2>
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
  	

  <script type="text/javascript">

 
  </script>

</div>
</body>
</html>