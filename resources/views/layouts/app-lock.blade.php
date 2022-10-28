<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Peaceful Place</title>
    @yield('HeaderContent')
    <style>
        /*
        patternLock.js v 0.5.0
        Author: Sudhanshu Yadav
        Copyright (c) 2013 Sudhanshu Yadav - ignitersworld.com , released under the MIT license.
        Demo and documentaion on: ignitersworld.com/lab/patternLock.html
    */
        .patt-holder{background:#3382c0;-ms-touch-action:none}.patt-wrap{position:relative;cursor:pointer}.patt-wrap li,.patt-wrap ul{list-style:none;margin:0;padding:0}.patt-circ{position:relative;float:left;box-sizing:border-box;-moz-box-sizing:border-box}.patt-circ.hovered{border:3px solid #090}.patt-error .patt-circ.hovered{border:3px solid #BA1B26}.patt-hidden .patt-circ.hovered{border:0}.patt-dots,.patt-lines{border-radius:5px;height:10px;position:absolute}.patt-dots{background:#FFF;width:10px;top:50%;left:50%;margin-top:-5px;margin-left:-5px}.patt-lines{background:rgba(255,255,255,.7);transform-origin:5px 5px;-ms-transform-origin:5px 5px;-webkit-transform-origin:5px 5px}.patt-hidden .patt-lines{display:none}

        .mhn-ui-date-time,
        .text-center {
            text-align: center
        }
        *,
        :after,
        :before {
            box-sizing: border-box
        }
        .pull-left {
            float: left
        }
        .pull-right {
            float: right
        }
        .clearfix:after,
        .clearfix:before {
            content: '';
            display: table
        }
        .clearfix:after {
            clear: both;
            display: block
        }
        body {
            margin: 0;
            color: #fff;
            background: #9b26af;
            font: 300 14px/18px Roboto, sans-serif
        }
        a {
            color: inherit;
            text-decoration: none
        }
        a:hover {
            text-decoration: underline
        }
        .mhn-ui-wrap {
            width: 300px;
            height: 475px;
            overflow: hidden;
            position: relative;
            margin: 30px auto 0;
            background: url(https://raw.githubusercontent.com/khadkamhn/lock-screen/master/img/mhn-ui-bg.jpg) center no-repeat #2c3e50;
            box-shadow: 0 17px 50px 0 rgba(0, 0, 0, .19), 0 12px 15px 0 rgba(0, 0, 0, .24)
        }
        .mhn-ui-wrap:before {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            position: absolute;
            background: rgba(0, 0, 0, .4)
        }
        .mhn-ui-date-time {
            color: #eee;
            z-index: 100;
            position: relative
        }
        .mhn-ui-date-time .mhn-ui-time {
            font-size: 28px;
            font-weight: 400;
            margin-bottom: 15px
        }
        .mhn-ui-date-time .mhn-ui-day {
            font-size: 24px;
            margin-bottom: 10px
        }
        .mhn-ui-date-time .mhn-ui-date {
            font-size: 18px;
            font-weight: 400
        }
        .mhn-ui-app-time {
            padding: 0 5px;
            font-size: 12px;
            text-align: right;
            margin: -15px -15px auto;
            background: rgba(0, 0, 0, .6)
        }
        .mhn-lock-wrap {
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 100;
            position: absolute
        }
        .mhn-lock-wrap .mhn-lock-title {
            text-align: center;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .5)
        }
        .mhn-lock-wrap .mhn-lock-success {
            color: transparent;
            text-shadow: none
        }
        .mhn-lock-wrap .mhn-lock-failure {
            color: #f34235
        }
        .mhn-lock {
            margin: auto;
            background: 0 0
        }
        .patt-wrap {
            margin: auto;
            overflow: hidden
        }
        .patt-wrap li {
            transition: all .4s ease-in-out 0s
        }
        .patt-dots,
        .patt-lines {
            transition: background .1s ease-in-out 0s
        }
        .patt-circ {
            border: 3px solid transparent
        }
        .patt-dots {
            background: rgba(255, 255, 255, .8)
        }
        .patt-lines {
            background: rgba(255, 255, 255, .4)
        }
        .patt-circ.hovered {
            border-color: #ddd;
            background: rgba(255, 255, 255, .2)
        }
        .patt-error .patt-circ.hovered {
            background: rgba(243, 66, 53, .4);
            border-color: rgba(243, 66, 53, .8)
        }
        .patt-error .patt-lines {
            background: rgba(243, 66, 53, .5)
        }
        .patt-success .patt-circ.hovered {
            background: rgba(75, 174, 79, .4);
            border-color: rgba(75, 174, 79, .8)
        }
        .patt-success .patt-lines {
            background: rgba(75, 174, 79, .5)
        }
        .mhn-ui-page {
            height: 100%;
            z-index: 200;
            display: none;
            padding: 15px;
            position: relative
        }
        .mhn-ui-page.page-lock {
            position: initial
        }
        .mhn-ui-page .mhn-ui-app-title-head {
            padding: 15px;
            font-size: 16px;
            margin: 0 -15px;
            background: rgba(0, 0, 0, .4)
        }
        .mhn-ui-page .mhn-ui-filter {
            float: right;
            position: relative
        }
        .mhn-ui-page .mhn-ui-filter .mhn-ui-btn {
            right: 0;
            top: -5px;
            padding: 5px;
            cursor: pointer;
            position: absolute;
            display: inline-block
        }
        .mhn-ui-page .mhn-ui-filter .mhn-ui-btn.active {
            background: teal
        }
        .mhn-ui-page .mhn-ui-filter-list {
            right: 0;
            top: 20px;
            padding: 5px;
            width: 180px;
            display: none;
            position: absolute;
            background: rgba(0, 0, 0, .8)
        }
        .mhn-ui-page .mhn-ui-filter-list>div {
            display: block;
            font-size: 14px;
            cursor: pointer;
            padding: 2px 4px
        }
        .mhn-ui-page .mhn-ui-filter-list>div.active {
            color: teal
        }
        .mhn-ui-page .mhn-ui-filter-list>div:hover {
            background: teal
        }
        .mhn-ui-page .mhn-ui-filter-list>div.active:hover {
            background: 0 0
        }
        .mhn-ui-page .mhn-ui-row {
            margin-top: 15px
        }
        .mhn-ui-page .mhn-ui-row:after,
        .mhn-ui-page .mhn-ui-row:before {
            content: '';
            display: table
        }
        .mhn-ui-page .mhn-ui-row:after {
            clear: both;
            display: block
        }
        .mhn-ui-page .mhn-ui-col {
            width: 25%;
            float: left;
            margin-bottom: 15px
        }
        .mhn-ui-bottom-link-bar {
            left: 0;
            right: 0;
            bottom: 0;
            padding: 15px;
            position: absolute;
            text-align: center
        }
        .mhn-ui-bottom-link-bar .mhn-ui-bottom-btn {
            width: 40px;
            height: 40px;
            cursor: pointer;
            font-size: 28px;
            line-height: 40px;
            text-align: center;
            border-radius: 50%;
            display: inline-block
        }
        .mhn-ui-bottom-link-bar .mhn-ui-bottom-btn:nth-child(1) {
            margin-right: 15px
        }
        .mhn-ui-bottom-link-bar .mhn-ui-bottom-btn:nth-child(2) {
            margin-left: 15px
        }
        .mhn-ui-bottom-link-bar .mhn-ui-bottom-btn:hover {
            color: #ccc;
            background: rgba(0, 0, 0, .8)
        }
        .mhn-ui-icon {
            text-align: center
        }
        .mhn-ui-icon span {
            width: 55px;
            height: 55px;
            margin: auto;
            display: block;
            font-size: 28px;
            cursor: pointer;
            line-height: 55px;
            text-align: center;
            border-radius: 15px;
            background: rgba(0, 0, 0, .3);
            transition: background .4s ease-in-out 0s;
            box-shadow: 0 -1px 0 rgba(255, 255, 255, .5) inset
        }
        .mhn-ui-icon .mhn-ui-icon-title {
            margin-top: 5px;
            cursor: default;
            overflow: hidden;
            font-size: 13px;
            text-overflow: ellipsis;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .5)
        }
        .mhn-ui-page.page-author img {
            padding: 8px;
            margin-top: 15px;
            border-radius: 50%;
            background: rgba(255, 255, 255, .7)
        }
        .mhn-ui-credit {
            padding: 5px;
            font-size: 13px;
            margin-top: 15px;
            background: rgba(0, 0, 0, .2);
            border: 1px solid rgba(0, 0, 0, .2)
        }
        .mhn-ui-credit p {
            margin: 0;
            color: #aaa
        }
        .mhn-ui-credit a {
            font-weight: 500
        }
        .mhn-ui-dialog-wrap {
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: none;
            z-index: 1000;
            position: absolute;
            background: rgba(0, 0, 0, .7)
        }
        .mhn-ui-dialog {
            padding: 15px;
            background: #000;
            margin: 50% 0 auto
        }
        .mhn-ui-dialog .mhn-ui-dialog-title {
            font-size: 18px;
            font-weight: 500
        }
        .mhn-ui-dialog .mhn-ui-dialog-btn {
            padding: 5px;
            min-width: 65px;
            cursor: pointer;
            margin-right: 10px;
            text-align: center;
            display: inline-block;
            border: 2px solid rgba(255, 255, 255, .8)
        }
        .mhn-ui-dialog .mhn-ui-dialog-btn:hover {
            background: #009688;
            text-decoration: none
        }
        .mhn-ui-info {
            margin: 30px 0;
            font-size: 16px;
            text-align: center
        }
        .mhn-ui-date,
        .mhn-ui-time {
            animation: zoomIn 1s
        }
        .mhn-ui-day {
            animation: rubberBand 1s
        }
        .mhn-lock-failure {
            animation: zoomIn .4s
        }
        .patt-circ:nth-child(1),
        .patt-circ:nth-child(2),
        .patt-circ:nth-child(3) {
            animation: fadeInUp .4s
        }
        .patt-circ:nth-child(4),
        .patt-circ:nth-child(5),
        .patt-circ:nth-child(6) {
            animation: fadeInUp .6s
        }
        .patt-circ:nth-child(7),
        .patt-circ:nth-child(8),
        .patt-circ:nth-child(9) {
            animation: fadeInUp .8s
        }
        .mhn-ui-icon span {
            animation: zoomIn .6s
        }
        .mhn-ui-bottom-btn {
            animation: bounceInUp .8s
        }
        .mhn-ui-credit-list .mhn-ui-credit:nth-child(1) {
            animation: fadeInUp .4s
        }
        .mhn-ui-credit-list .mhn-ui-credit:nth-child(2) {
            animation: fadeInUp .5s
        }
        .mhn-ui-credit-list .mhn-ui-credit:nth-child(3) {
            animation: fadeInUp .6s
        }
        .mhn-ui-credit-list .mhn-ui-credit:nth-child(4) {
            animation: fadeInUp .7s
        }
        .mhn-ui-credit-list .mhn-ui-credit:nth-child(5) {
            animation: fadeInUp .8s
        }
    </style>
</head>
<body>
<div class="mhn-ui-wrap">
    <div class="mhn-ui-page page-lock">
        <div class="mhn-ui-date-time">
            <div class="mhn-ui-time">6:02 PM</div>
            <div class="mhn-ui-day">Friday</div>
            <div class="mhn-ui-date">September 05, 2015</div>
        </div>
        <div class="mhn-lock-wrap">
            <div class="mhn-lock-title" data-title="Draw a pattern to unlock"></div>
            <div class="mhn-lock"></div>
        </div>
    </div>

    <div class="mhn-ui-page page-home">
        <div class="mhn-ui-app-time">&nbsp;</div>
        <div class="mhn-ui-app-title-head">
            <span class="mhn-ui-page-title">All Application</span>
            <div class="mhn-ui-filter">
                <span class="mhn-ui-btn ion-funnel"></span>
                <div class="mhn-ui-filter-list">
                    <div data-filter="all" class="active">All Application</div>
                    <div data-filter="general">General Application</div>
                    <div data-filter="social">Social Application</div>
                    <div data-filter="credits">Credits Application</div>
                </div>
            </div>
        </div>
        <div class="mhn-ui-row mhn-ui-apps">
            <div class="mhn-ui-col" data-filter="general">
                <div class="mhn-ui-icon" data-open="page-author">
                    <span class="ion-person" data-color="#2980b9"></span>
                    <div class="mhn-ui-icon-title">Author</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="general">
                <div class="mhn-ui-icon" data-open="page-contact">
                    <span class="ion-chatbox" data-color="#8e44ad"></span>
                    <div class="mhn-ui-icon-title">Contact</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="general">
                <div class="mhn-ui-icon" data-href="http://codecanyon.net/user/khadkamhn/portfolio">
                    <span class="ion-ios-briefcase" data-color="#f39c12"></span>
                    <div class="mhn-ui-icon-title">Portfolio</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="general">
                <div class="mhn-ui-icon" data-open="page-credits">
                    <span class="ion-information-circled" data-color="#16a085"></span>
                    <div class="mhn-ui-icon-title">Credits</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="social">
                <div class="mhn-ui-icon" data-href="https://codepen.io/khadkamhn">
                    <span class="ion-social-codepen-outline" data-color="#1e1e1e"></span>
                    <div class="mhn-ui-icon-title">Codepen</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="social">
                <div class="mhn-ui-icon" data-href="https://facebook.com/khadkamhn">
                    <span class="ion-social-facebook" data-color="#3b5998"></span>
                    <div class="mhn-ui-icon-title">Facebook</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="social">
                <div class="mhn-ui-icon" data-href="https://twitter.com/khadkamhn">
                    <span class="ion-social-twitter" data-color="#56a3d9"></span>
                    <div class="mhn-ui-icon-title">Twitter</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="social">
                <div class="mhn-ui-icon" data-href="http://dribbble.com/khadkamhn">
                    <span class="ion-social-dribbble-outline" data-color="#ec4a89"></span>
                    <div class="mhn-ui-icon-title">Dribbble</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="credits">
                <div class="mhn-ui-icon" data-href="https://jquery.com/">
                    <span class="ion-social-javascript" data-color="#6639b6"></span>
                    <div class="mhn-ui-icon-title">jQuery</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="credits">
                <div class="mhn-ui-icon" data-href="http://ionicons.com/">
                    <span class="ion-ionic" data-color="#3e50b4"></span>
                    <div class="mhn-ui-icon-title">Ionicons</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="credits">
                <div class="mhn-ui-icon" data-href="https://daneden.github.io/animate.css/">
                    <span class="ion-social-css3-outline" data-color="#785447"></span>
                    <div class="mhn-ui-icon-title">Animate</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="credits">
                <div class="mhn-ui-icon" data-href="http://unsplash.com/">
                    <span class="ion-android-camera" data-color="#000000"></span>
                    <div class="mhn-ui-icon-title">Unsplash</div>
                </div>
            </div>
            <div class="mhn-ui-col" data-filter="credits">
                <div class="mhn-ui-icon" data-href="https://github.com/s-yadav/patternLock">
                    <span class="ion-android-unlock" data-color="#4bae4f"></span>
                    <div class="mhn-ui-icon-title">patternLock</div>
                </div>
            </div>
        </div>
        <div class="mhn-ui-bottom-link-bar">
            <span class="mhn-ui-bottom-btn ion-ios-home"></span>
            <span class="mhn-ui-bottom-btn ion-ios-locked" onclick="mhnUI.page.show('page-lock')"></span>
        </div>
    </div>

    <div class="mhn-ui-page page-author">
        <div class="mhn-ui-app-time"></div>
        <div class="mhn-ui-app-title-head"><span class="ion-person"></span> Author</div>
        <div class="text-center"><img class="flipInX animated" src="http://s.gravatar.com/avatar/d20a97c43d5b71cae939da56a5cc8c59?s=128" alt="@khadkamhn"></div>
        <p class="text-center">Hi, It's me Mohan. I'm a web and graphics designer. Designing is my passion and I have been working on various designing projects.</p>
        <div class="mhn-ui-bottom-link-bar">
            <span class="mhn-ui-bottom-btn ion-ios-home" onclick="mhnUI.page.show('page-home')"></span>
            <span class="mhn-ui-bottom-btn ion-ios-locked" onclick="mhnUI.page.show('page-lock')"></span>
        </div>
    </div>

    <div class="mhn-ui-page page-contact">
        <div class="mhn-ui-app-time">&nbsp;</div>
        <div class="mhn-ui-app-title-head"><span class="ion-chatbox"></span> Contact</div>
        <p><a href="mailto:khadkamhn@gmail.com">khadkamhn@gmail.com</a></p>
        <p><a href="mailto:contact@mohankhadka.com.np">contact@mohankhadka.com.np</a></p>
        <p><a href="http://mohankhadka.com.np" target="_blank">http://mohankhadka.com.np</a></p>
        <div class="mhn-ui-bottom-link-bar">
            <span class="mhn-ui-bottom-btn ion-ios-home" onclick="mhnUI.page.show('page-home')"></span>
            <span class="mhn-ui-bottom-btn ion-ios-locked" onclick="mhnUI.page.show('page-lock')"></span>
        </div>
    </div>

    <div class="mhn-ui-page page-credits">
        <div class="mhn-ui-app-time">&nbsp;</div>
        <div class="mhn-ui-app-title-head"><span class="ion-information-circled"></span> Credits</div>
        <div class="mhn-ui-credit-list">
            <div class="mhn-ui-credit">
                <a href="https://jquery.com/" target="_blank">https://jquery.com/</a>
                <p>jQuery is a fast, small, and feature-rich JavaScript library.</p>
            </div>
            <div class="mhn-ui-credit">
                <a href="http://ionicons.com/" target="_blank">http://ionicons.com/</a>
                <p>The premium icon font for Ionic Framework.</p>
            </div>
            <div class="mhn-ui-credit">
                <a href="https://daneden.github.io/animate.css/" target="_blank">https://daneden.github.io/animate.css/</a>
                <p>Just-add-water CSS animations.</p>
            </div>
            <div class="mhn-ui-credit">
                <a href="http://unsplash.com/" target="_blank">http://unsplash.com/</a>
                <p>Free (do whatever you want) hi-res photos.</p>
            </div>
            <div class="mhn-ui-credit">
                <a href="https://github.com/s-yadav/patternLock" target="_blank">https://github.com/s-yadav/patternLock</a>
                <p>A light weight plugin to simulate android like pattern lock interface for your hybrid app or website.</p>
            </div>
        </div>
        <div class="mhn-ui-bottom-link-bar">
            <span class="mhn-ui-bottom-btn ion-ios-home" onclick="mhnUI.page.show('page-home')"></span>
            <span class="mhn-ui-bottom-btn ion-ios-locked" onclick="mhnUI.page.show('page-lock')"></span>
        </div>
    </div>
    <div class="mhn-ui-dialog-wrap">
        <div class="mhn-ui-dialog">
            <div class="mhn-ui-dialog-title">Are you sure?</div>
            <p>This application wants to open an external link. To confirm, please click on yes button.</p>
            <a data-action="confirm" class="mhn-ui-dialog-btn" target="_blank">Yes</a>
            <a data-action="cancel" class="mhn-ui-dialog-btn">No</a>
        </div>
    </div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/init/jquery-3.5.1.slim.min.js"></script>

@yield('FooterContent')
<script>
    var configEnv = {
        passcode:'123654'
    }
    $(function(){

        mhnUI.setup();
    });
    mhnUI = {
        passcode:configEnv.passcode,
        successProgress:function(mmm){
            window.location.href = '/chat';
        },
        pattern: "",
        setup: function() {
            this.lock(), this.filter(), this.colors(), this.links.setup(), this.dialog.setup(), setInterval("mhnUI.datetime()", 1e3)
        },
        lock: function() {
            mhnUI.page.hide(), pattern = new PatternLock(".mhn-lock", {
                margin: 15
            }), $(".mhn-lock-title").html($(".mhn-lock-title").data("title")), pattern.checkForPattern(mhnUI.passcode, function() {
                $(".mhn-lock-title").html('<span class="mhn-lock-success">Yes! you unlocked pattern</span>'), $(".patt-holder").addClass("patt-success"), setTimeout(function() {
                    pattern.reset(), mhnUI.message()
                }, 1e3)
                mhnUI.successProgress(12312);
                // mhnUI.page.show()
            }, function() {
                $(".mhn-lock-title").html('<span class="mhn-lock-failure">Opps! pattern is not correct</span>'), $(".patt-holder").removeClass("patt-success"), setTimeout(function() {
                    pattern.reset(), mhnUI.message()
                }, 2e3)
            })
        },
        message: function() {
            $(".mhn-lock-title span").fadeOut(), setTimeout(function() {
                $(".mhn-lock-title").html($(".mhn-lock-title").data("title")), $(".mhn-lock-title span").fadeIn()
            }, 500)
        },
        datetime: function() {
            var t = new Array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"),
                e = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"),
                n = new Date,
                i = n.getYear();
            1e3 > i && (i += 1900);
            var a = n.getDay(),
                o = n.getMonth(),
                s = n.getDate();
            10 > s && (s = "0" + s);
            var h = n.getHours(),
                c = n.getMinutes(),
                u = n.getSeconds(),
                l = "AM";
            h >= 12 && (l = "PM"), h > 12 && (h -= 12), 0 == h && (h = 12), 9 >= c && (c = "0" + c), 9 >= u && (u = "0" + u), $(".mhn-ui-date-time .mhn-ui-day").text(t[a]), $(".mhn-ui-date-time .mhn-ui-date").text(e[o] + " " + s + ", " + i), $(".mhn-ui-date-time .mhn-ui-time").text(h + ":" + c + " " + l), $(".mhn-ui-app-time").text(h + ":" + c + ":" + u + " " + l)
        },
        page: {
            show: function(t) {
                t = t ? t : "page-home", $(".mhn-ui-page").hide(), $(".mhn-ui-page." + t).show()
            },
            hide: function(t) {
                t = t ? t : "page-lock", $(".mhn-ui-page").hide(), $(".mhn-ui-page." + t).show()
            }
        },
        filter: function() {
            $(".mhn-ui-filter .mhn-ui-btn").click(function() {
                $(this).toggleClass("active"), $(".mhn-ui-filter-list").toggle(100)
            }), $(".mhn-ui-filter-list>div").click(function() {
                var t = $(this).data("filter");
                $(this).siblings().removeAttr("class"), $(this).addClass("active");
                var e = function(t) {
                    $(".mhn-ui-apps .mhn-ui-col").fadeOut(400), $('.mhn-ui-apps .mhn-ui-col[data-filter="' + t + '"]').fadeIn(400)
                };
                switch (t) {
                    case "all":
                        $(".mhn-ui-apps .mhn-ui-col").fadeIn(400);
                        break;
                    case "general":
                        e(t);
                        break;
                    case "social":
                        e(t);
                        break;
                    case "credits":
                        e(t)
                }
                $(".mhn-ui-filter-list").toggle(100), $(".mhn-ui-filter .mhn-ui-btn").removeClass("active"), $(".mhn-ui-page-title").text($(this).text())
            })
        },
        colors: function() {
            $(".mhn-ui-icon span").on("mouseover", function() {
                $(this).css("background", $(this).data("color"))
            }).on("mouseout", function() {
                $(this).removeAttr("style")
            })
        },
        links: {
            setup: function() {
                $(".mhn-ui-apps .mhn-ui-icon").click(function() {
                    var t = $(this).data("href"),
                        e = $(this).data("open");
                    t && mhnUI.links.href(t), e && mhnUI.page.show(e)
                })
            },
            href: function(t) {
                mhnUI.dialog.show(t)
            }
        },
        dialog: {
            setup: function() {
                $('.mhn-ui-dialog-wrap,.mhn-ui-dialog-wrap a[data-action="cancel"]').click(function() {
                    mhnUI.dialog.hide()
                }), $(".mhn-ui-dialog").click(function(t) {
                    t.stopPropagation()
                }), $('.mhn-ui-dialog a[data-action="confirm"]').click(function() {
                    setTimeout(function() {
                        mhnUI.dialog.hide()
                    }, 400)
                })
            },
            show: function(t) {
                $('.mhn-ui-dialog-wrap a[data-action="confirm"]').attr("href", t), $(".mhn-ui-dialog-wrap").show()
            },
            hide: function() {
                $('.mhn-ui-dialog-wrap a[data-action="confirm"]').removeAttr("href"), $(".mhn-ui-dialog-wrap").fadeOut(400)
            }
        }
    };

    /*
        patternLock.js v 0.5.0
        Author: Sudhanshu Yadav
        Copyright (c) 2015 Sudhanshu Yadav - ignitersworld.com , released under the MIT license.
        Demo on: ignitersworld.com/lab/patternLock.html
    */
    !function(t,e,n,a){"use strict";function r(t){for(var e=t.holder,n=t.option,a=n.matrix,r=n.margin,i=n.radius,o=['<ul class="patt-wrap" style="padding:'+r+'px">'],s=0,l=a[0]*a[1];l>s;s++)o.push('<li class="patt-circ" style="margin:'+r+"px; width : "+2*i+"px; height : "+2*i+"px; -webkit-border-radius: "+i+"px; -moz-border-radius: "+i+"px; border-radius: "+i+'px; "><div class="patt-dots"></div></li>');o.push("</ul>"),e.html(o.join("")).css({width:a[1]*(2*i+2*r)+2*r+"px",height:a[0]*(2*i+2*r)+2*r+"px"}),t.pattCircle=t.holder.find(".patt-circ")}function i(t,e,n,a){var r=e-t,i=a-n;return{length:Math.ceil(Math.sqrt(r*r+i*i)),angle:Math.round(180*Math.atan2(i,r)/Math.PI)}}function o(){}function s(e,n){var a=this,i=a.token=Math.random(),h=p[i]=new o,u=h.holder=t(e);if(0!=u.length){h.object=a,n=h.option=t.extend({},s.defaults,n),r(h),u.addClass("patt-holder"),"static"==u.css("position")&&u.css("position","relative"),u.on("touchstart mousedown",function(t){d.call(this,t,a)}),h.option.onDraw=n.onDraw||l;var c=n.mapper;h.mapperFunc="object"==typeof c?function(t){return c[t]}:"function"==typeof c?c:l,h.option.mapper=null}}var l=function(){},p={},d=function(e,a){e.preventDefault();var r=p[a.token];if(!r.disabled){r.option.patternVisible||r.holder.addClass("patt-hidden");var i="touchstart"==e.type?"touchmove":"mousemove",o="touchstart"==e.type?"touchend":"mouseup";t(this).on(i+".pattern-move",function(t){h.call(this,t,a)}),t(n).one(o,function(){u.call(this,e,a)});var s=r.holder.find(".patt-wrap"),l=s.offset();r.wrapTop=l.top,r.wrapLeft=l.left,a.reset()}},h=function(e,n){e.preventDefault();var a=e.pageX||e.originalEvent.touches[0].pageX,r=e.pageY||e.originalEvent.touches[0].pageY,o=p[n.token],s=o.pattCircle,l=o.patternAry,d=o.option.lineOnMove,h=o.getIdxFromPoint(a,r),u=h.idx,c=o.mapperFunc(u)||u;if(l.length>0){var f=i(o.lineX1,h.x,o.lineY1,h.y);o.line.css({width:f.length+10+"px",transform:"rotate("+f.angle+"deg)"})}if(u){if(-1==l.indexOf(c)){var v,m=t(s[u-1]);if(o.lastPosObj){for(var g=o.lastPosObj,x=g.i,w=g.j,b=Math.abs(h.i-x),j=Math.abs(h.j-w);(0==b&&j>1||0==j&&b>1||j==b&&j>1)&&(w!=h.j||x!=h.i);){x=b?Math.min(h.i,x)+1:x,w=j?Math.min(h.j,w)+1:w,b=Math.abs(h.i-x),j=Math.abs(h.j-w);var M=(w-1)*o.option.matrix[1]+x,y=o.mapperFunc(M)||M;-1==l.indexOf(y)&&(t(s[M-1]).addClass("hovered"),l.push(y))}v=[],h.j-g.j>0?v.push("s"):h.j-g.j<0?v.push("n"):0,h.i-g.i>0?v.push("e"):h.i-g.i<0?v.push("w"):0,v=v.join("-")}m.addClass("hovered"),l.push(c);var P=o.option.margin,k=o.option.radius,C=(h.i-1)*(2*P+2*k)+2*P+k,O=(h.j-1)*(2*P+2*k)+2*P+k;if(1!=l.length){var D=i(o.lineX1,C,o.lineY1,O);o.line.css({width:D.length+10+"px",transform:"rotate("+D.angle+"deg)"}),d||o.line.show()}v&&(o.lastElm.addClass(v+" dir"),o.line.addClass(v+" dir"));var E=t('<div class="patt-lines" style="top:'+(O-5)+"px; left:"+(C-5)+'px"></div>');o.line=E,o.lineX1=C,o.lineY1=O,o.holder.append(E),d||o.line.hide(),o.lastElm=m}o.lastPosObj=h}},u=function(t,e){t.preventDefault();var n=p[e.token],a=n.patternAry.join("");n.holder.off(".pattern-move").removeClass("patt-hidden"),a&&(n.option.onDraw(a),n.line.remove(),n.rightPattern&&(a==n.rightPattern?n.onSuccess():(n.onError(),e.error())))};o.prototype={constructor:o,getIdxFromPoint:function(t,e){var n=this.option,a=n.matrix,r=t-this.wrapLeft,i=e-this.wrapTop,o=null,s=n.margin,l=2*n.radius+2*s,p=Math.ceil(r/l),d=Math.ceil(i/l),h=r%l,u=i%l;return p<=a[1]&&d<=a[0]&&h>2*s&&u>2*s&&(o=(d-1)*a[1]+p),{idx:o,i:p,j:d,x:r,y:i}}},s.prototype={constructor:s,option:function(t,e){var n=p[this.token],i=n.option;return e===a?i[t]:(i[t]=e,void(("margin"==t||"matrix"==t||"radius"==t)&&r(n)))},getPattern:function(){return p[this.token].patternAry.join("")},setPattern:function(t){var e=p[this.token],n=e.option,a=n.matrix,r=n.margin,i=n.radius;if(n.enableSetPattern){this.reset(),e.wrapLeft=0,e.wrapTop=0;for(var o=0;o<t.length;o++){var s=t[o]-1,d=s%a[1],u=Math.floor(s/a[1]),c=d*(2*r+2*i)+2*r+i,f=u*(2*r+2*i)+2*r+i;h.call(null,{pageX:c,pageY:f,preventDefault:l,originalEvent:{touches:[{pageX:c,pageY:f}]}},this)}}},enable:function(){var t=p[this.token];t.disabled=!1},disable:function(){var t=p[this.token];t.disabled=!0},reset:function(){var t=p[this.token];t.pattCircle.removeClass("hovered dir s n w e s-w s-e n-w n-e"),t.holder.find(".patt-lines").remove(),t.patternAry=[],t.lastPosObj=null,t.holder.removeClass("patt-error patt-success")},error:function(){p[this.token].holder.addClass("patt-error")},checkForPattern:function(t,e,n){var a=p[this.token];a.rightPattern=t,a.onSuccess=e||l,a.onError=n||l}},s.defaults={matrix:[3,3],margin:20,radius:25,patternVisible:!0,lineOnMove:!0,enableSetPattern:!1},e.PatternLock=s}(jQuery,window,document);
</script>
<div class="loading-page"></div>
</body>
</html>
