<?php if(!defined('WY_ROOT')) exit; ?>
<div class="wwmain">
    <div class="wwcolumntit">
        <div class="wwcrumbs">
            <a href="index.htm">首页</a>>
                	<a class="cur" href="javascript:;">最新动态</a>
        </div>
        <h3>最新动态</h3>
    </div>
    <div class="newsnav">
        <div class="newsnavdiv">
            <ul class="clearfix">

                <li><a href="news.htm" rel="_menu34">最新动态</a></li>

               <!-- <li><a href="news/huodong/index.html" rel="_menu35">商家须知</a></li>-->
            </ul>
            <script>
                $("#_topChannel5").addClass("cur");
                $("a[rel='_menu34']").addClass("cur");
            </script>
        </div>
    </div>

    <div class="newscontent clearfix">
        <div class="newsleft fl">
            <div class="newsleft_wrap">
                <div id="list">
                    <?php         
                    if ($lists):
                        $i = 1;
                        foreach ($lists as $key => $val):

                            $addtime = strtotime($val['addtime']);
                            $now = strtotime(date('Y-m-d H:i:s'));
                            $days = ceil(($now - $addtime) / 86400);
                    ?>
                    <dl>
                        <dd>
                            <span><?php echo date('Y-m-d', $addtime) ?></span>
                            <h3><a href="/view.htm?id=<?php echo $val['id'] ?>"  target="_blank"><?php echo $val['title'] ?></a></h3>
                            <p></p>
                        </dd>
                    </dl>

                    <?php
                        endforeach;
                    endif;
                    ?>

                </div>
                <div class="news_btn pageajax">
                    <!--<a href="javascript:;">
                            <img src="t/webimages/news_btn.jpg" alt="按钮"></a>-->

                </div>
            </div>
            <script type="text/javascript" src="js/laypage/laypage.js"></script>
            <script type="text/javascript">
                if (13 > 1) {
                    laypage({
                        cont: $(".pageajax"),
                        pages: 13,
                        skip: false,
                        skin: '#02a7f6',
                        curr: 1,
                        groups: 10,
                        formatUrl: 'index{page}.htm'
                    });
                }
            </script>
            <!--<script src="js/loadmore.js" type="text/javascript"></script>
                <script type="text/javascript">$(function () { $(".pageajax").LoadMoreAjax({ totalpage: 13, con: "#list", url: "index{page}.htm" }); });</script>-->
        </div>

    </div>
    <div class="clearfix"></div>
</div>
<!--content}-->
