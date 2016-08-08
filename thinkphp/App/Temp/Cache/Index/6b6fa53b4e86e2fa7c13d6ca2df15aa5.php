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
    <nav id="topnav"><a href="<?php echo U('Index/Index/index');?>">首页</a><a href="about.html">关于我</a><a href="<?php echo U('Index/List/index');?>">慢生活</a></nav>
  </header>


<link href="__PUBLIC__/css/style.css" rel="stylesheet">
<article>
  <h2 class="about_h">您现在的位置是：<a href="/">首页</a>><a href="1/">慢生活</a></h2>
  <div class="bloglist">
    <?php if(is_array($posts)): foreach($posts as $k=>$v): ?><div class="newblog">
      <ul>
        <h3><a href="/"><?php echo ($v["post_title"]); ?></a></h3>
        <div class="autor"><span>作者:<?php echo ($v["post_author"]); ?></span><span>分类<a href="/"><!-- <?php echo ($v["post_author"]); ?> --></a></span><span>浏览（<a href="/"><?php echo ($v["view_count"]); ?></a>）</span><span>评论（<a href="/"><?php echo ($v["comment_count"]); ?></a>）</span></div>
        <p><?php echo ($v["post_content"]); ?>sssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssss...<a href="/" target="_blank" class="readmore">查看全文</a></p>
      </ul>
      <figure><img src="images/001.jpg" ></figure>
      <div class="dateview"><?php echo (date('Y-m-d',$v["post_date"])); ?></div>
    </div><?php endforeach; endif; ?>
  </div>
  <div class="page">
<script type="text/javascript">
  var xx = JSON.parse('<?php echo ($page); ?>');console.log(xx);
</script>
    <span title="Total record">共 <b>113</b> 条数据</span> 
    <a href="javascript:;">&lt;</a><a href="javascript:;">&lt;&lt;</a>
    <a href="javascript:;" class="on">1</a>
    <a href="javascript:;">2</a>
    <a href="javascript:;">3</a>
    <a href="javascript:;">4</a>
    <a href="javascript:;">5</a>
    <a href="javascript:;">&gt;</a><a href="javascript:;">&gt;&gt;</a>
  </div>
</article>

<aside>
    <div class="rnav">
      <li class="rnav1 "><a href="/">ÈÕ¼Ç</a></li>
      <li class="rnav2 "><a href="/">ÐÀÉÍ</a></li>
      <li class="rnav3 "><a href="/">³ÌÐòÈËÉú</a></li>
      <li class="rnav4 "><a href="/">¾­µäÓïÂ¼</a></li>
    </div>
    <div class="ph_news">
      <h2>
        <p>µã»÷ÅÅÐÐ</p>
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
        <p>À¸Ä¿ÍÆ¼ö</p>
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
        <p>×îÐÂÆÀÂÛ</p>
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
        <p>×î½ü·Ã¿Í</p>
        <ul>
          <img src="__PUBLIC__/images/vis.jpg"><!-- Ö±½ÓÊ¹ÓÃ¡°¶àËµ¡±²å¼þµÄµ÷ÓÃ´úÂë -->
        </ul>
      </h2>
    </div>
    <div class="copyright">
      <ul>
        <p> Design by <a href="/">DanceSmile</a></p>
        <p>ÊñICP±¸11002373ºÅ-1</p>
        </p>
      </ul>
    </div>
  </aside>

  <script src="__PUBLIC__/js/silder.js"></script>
  <div class="clear"></div>
</div>
</body>
</html>