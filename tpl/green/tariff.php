<?php if (!defined('WY_ROOT')) exit; ?>

<div id="dowebok">
    <div class="section section1">
        <div id="container">
            <img src="/new2/app.png" width="1165" height="553" class="app_left">
            <div></div>
        </div>
    </div>
</div>
<script src="/new2/main.js"></script>
<script>
    $(function () {
        $('#dowebok').fullpage({
            scrollingSpeed: 300,
            loopBottom: true,
            anchors: ['page1', 'page2', 'page3', 'page4', 'page5', 'page6'],
            menu: '#menu',
            resize: false,
            scrollBar: true,
            afterRender: function () {
                wow = new WOW({
                    animateClass: 'animated',
                });
                wow.init();
            }
        });
    });
</script>



