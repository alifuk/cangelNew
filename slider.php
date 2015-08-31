<?php
include 'part/translation.php';
?>



<!-- it works the same with all jquery version from 1.x to 2.x -->
<!-- use jssor.slider.mini.js (40KB) instead for release -->
<!-- jssor.slider.mini.js = (jssor.js + jssor.slider.js) -->
<!--<script type="text/javascript" src="./js/jssor.js"></script>
<script type="text/javascript" src="./js/jssor.slider.js"></script>-->
<script type="text/javascript" src="./js/jssor.slider.mini.js"></script>
<script>
    $(function ($) {

        var _CaptionTransitions = [];
        _CaptionTransitions["L"] = {$Duration: 900, x: 0.6, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
        _CaptionTransitions["R"] = {$Duration: 900, x: -0.6, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
        _CaptionTransitions["T"] = {$Duration: 900, y: 0.6, $Easing: {$Top: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
        _CaptionTransitions["B"] = {$Duration: 900, y: -0.6, $Easing: {$Top: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
        _CaptionTransitions["FADE"] = {$Duration: 900, $Opacity: 2};
        _CaptionTransitions["FADELEFT"] = {$Duration: 700, x: -0.05, $Easing: {$Left: $JssorEasing$.$EaseInOutSine}, $Opacity: 2};
        _CaptionTransitions["CLIPLEFT"] = {$Duration: 1200, $Clip: 1, $Move: true, $Opacity: 2, $During: {$Clip: [0.0, 2], $Opacity: [0, 1]}};
        _CaptionTransitions["ZMF|10"] = {$Duration: 900, $Zoom: 11, $Easing: {$Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear}, $Opacity: 2};
        _CaptionTransitions["RTT|10"] = {$Duration: 900, $Zoom: 11, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseOutQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInExpo}, $Opacity: 2, $Round: {$Rotate: 0.8}};
        _CaptionTransitions["RTT|2"] = {$Duration: 900, $Zoom: 3, $Rotate: 1, $Easing: {$Zoom: $JssorEasing$.$EaseInQuad, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInQuad}, $Opacity: 2, $Round: {$Rotate: 0.5}};
        _CaptionTransitions["RTTL|BR"] = {$Duration: 900, x: -0.6, y: -0.6, $Zoom: 11, $Rotate: 1, $Easing: {$Left: $JssorEasing$.$EaseInCubic, $Top: $JssorEasing$.$EaseInCubic, $Zoom: $JssorEasing$.$EaseInCubic, $Opacity: $JssorEasing$.$EaseLinear, $Rotate: $JssorEasing$.$EaseInCubic}, $Opacity: 2, $Round: {$Rotate: 0.8}};
        _CaptionTransitions["CLIP|LR"] = {$Duration: 900, $Clip: 15, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}, $Opacity: 2};
        _CaptionTransitions["MCLIP|L"] = {$Duration: 900, $Clip: 1, $Move: true, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}};
        _CaptionTransitions["MCLIP|R"] = {$Duration: 900, $Clip: 2, $Move: true, $Easing: {$Clip: $JssorEasing$.$EaseInOutCubic}};

        var options = {
            $FillMode: 2, //[Optional] The way to fill image in slide, 0 stretch, 1 contain (keep aspect ratio and put all inside slide), 2 cover (keep aspect ratio and cover whole slide), 4 actual size, 5 contain for large image, actual size for small image, default value is 0
            $AutoPlay: true, //[Optional] Whether to auto play, to enable slideshow, this option must be set to true, default value is false
            $AutoPlayInterval: 5000, //[Optional] Interval (in milliseconds) to go for next slide since the previous stopped if the slider is auto playing, default value is 3000
            $PauseOnHover: 0, //[Optional] Whether to pause when mouse over if a slider is auto playing, 0 no pause, 1 pause for desktop, 2 pause for touch device, 3 pause for desktop and touch device, 4 freeze for desktop, 8 freeze for touch device, 12 freeze for desktop and touch device, default value is 1

            $ArrowKeyNavigation: true, //[Optional] Allows keyboard (arrow key) navigation or not, default value is false
            $SlideEasing: $JssorEasing$.$EaseOutQuint, //[Optional] Specifies easing for right to left animation, default value is $JssorEasing$.$EaseOutQuad
            $SlideDuration: 800, //[Optional] Specifies default duration (swipe) for slide in milliseconds, default value is 500
            $MinDragOffsetToSlide: 20, //[Optional] Minimum drag offset to trigger slide , default value is 20
            $SlideWidth: Cangel.core.$container.width(), //[Optional] Width of every slide in pixels, default value is width of 'slides' container
            $SlideHeight: Cangel.core.$container.height(), //[Optional] Height of every slide in pixels, default value is height of 'slides' container
            $SlideSpacing: 0, //[Optional] Space between each slide in pixels, default value is 0
            $DisplayPieces: 1, //[Optional] Number of pieces to display (the slideshow would be disabled if the value is set to greater than 1), the default value is 1
            $ParkingPosition: 0, //[Optional] The offset position to park slide (this options applys only when slideshow disabled), default value is 0.
            $UISearchMode: 1, //[Optional] The way (0 parellel, 1 recursive, default value is 1) to search UI components (slides container, loading screen, navigator container, arrow navigator container, thumbnail navigator container etc).
            $PlayOrientation: 1, //[Optional] Orientation to play slide (for auto play, navigation), 1 horizental, 2 vertical, 5 horizental reverse, 6 vertical reverse, default value is 1
            $DragOrientation: 1, //[Optional] Orientation to drag slide, 0 no drag, 1 horizental, 2 vertical, 3 either, default value is 1 (Note that the $DragOrientation should be the same as $PlayOrientation when $DisplayPieces is greater than 1, or parking position is not 0)

            $CaptionSliderOptions: {//[Optional] Options which specifies how to animate caption
                $Class: $JssorCaptionSlider$, //[Required] Class to create instance to animate caption
                $CaptionTransitions: _CaptionTransitions, //[Required] An array of caption transitions to play caption, see caption transition section at jssor slideshow transition builder
                $PlayInMode: 1, //[Optional] 0 None (no play), 1 Chain (goes after main slide), 3 Chain Flatten (goes after main slide and flatten all caption animations), default value is 1
                $PlayOutMode: 3                                 //[Optional] 0 None (no play), 1 Chain (goes before main slide), 3 Chain Flatten (goes before main slide and flatten all caption animations), default value is 1
            },
            $BulletNavigatorOptions: {//[Optional] Options to specify and enable navigator or not
                $Class: $JssorBulletNavigator$, //[Required] Class to create navigator instance
                $ChanceToShow: 2, //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 1, //[Optional] Auto center navigator in parent container, 0 None, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1, //[Optional] Steps to go for each navigation request, default value is 1
                $Lanes: 1, //[Optional] Specify lanes to arrange items, default value is 1
                $SpacingX: 8, //[Optional] Horizontal space between each item in pixel, default value is 0
                $SpacingY: 8, //[Optional] Vertical space between each item in pixel, default value is 0
                $Orientation: 1                                 //[Optional] The orientation of the navigator, 1 horizontal, 2 vertical, default value is 1
            },
            $ArrowNavigatorOptions: {//[Optional] Options to specify and enable arrow navigator or not
                $Class: $JssorArrowNavigator$, //[Requried] Class to create arrow navigator instance
                $ChanceToShow: 1, //[Required] 0 Never, 1 Mouse Over, 2 Always
                $AutoCenter: 2, //[Optional] Auto center arrows in parent container, 0 No, 1 Horizontal, 2 Vertical, 3 Both, default value is 0
                $Steps: 1                                       //[Optional] Steps to go for each navigation request, default value is 1
            }
        };

        $("#slider1_container, #slides").height(Cangel.core.$container.height());
        $("#slider1_container, #slides").width(Cangel.core.$container.width());

        var jssor_slider1 = new $JssorSlider$("slider1_container", options);

        //alert(sliderPoprve);
        /*
         if (sliderPoprve) {
         
         jssor_slider1.$GoTo(1);
         jssor_slider1.$Pause();
         }
         */
        //responsive code begin
        //you can remove responsive code if you don't want the slider scales while window resizes
        function ScaleSlider() {
            var windowWidth = Cangel.core.$container.width();

            if (windowWidth) {
                var windowHeight = Cangel.core.$container.height();
                var originalWidth = jssor_slider1.$OriginalWidth();
                var originalHeight = jssor_slider1.$OriginalHeight();

                if (originalWidth / windowWidth > originalHeight / windowHeight) {
                    jssor_slider1.$ScaleHeight(windowHeight);
                }
                else {
                    jssor_slider1.$ScaleWidth(windowWidth);
                }

            }
            else
                window.setTimeout(ScaleSlider, 30);
        }

        ScaleSlider();

        $(window).bind("load", ScaleSlider);
        $(window).bind("resize", ScaleSlider);
        $(window).bind("orientationchange", ScaleSlider);


        /*
         if (sliderPoprve) {
         //alert("poprve");
         zobrazSlider();
         }*/


        function zobrazSlider() {
            //alert(sliderPoprve);
            /*
             if (sliderPoprve) {
             
             $("#hide").delay(2000).fadeOut(500);
             setTimeout(function () {
             // Do something after 5 seconds
             jssor_slider1.$GoTo(0);
             jssor_slider1.$Play();
             }, 2000);
             }
             */

            //jssor_slider1.$Play()

        }

        //responsive code end

        /*jssor_slider1.$On($JssorSlider$.$EVT_PARK, function (slideIndex, fromIndex)
         {
         //given a slide parked, the life cycle of current slide is as below,
         //progressBegin -- > idleBegin -- > idleEnd -- > progressEnd
         /*
         if (slideIndex == 0 && fromIndex == 1)
         {
         jssor_slider1.$Prev();
         }
         
         if (slideIndex == 0 && fromIndex == jssor_slider1.$SlidesCount()-1)
         {
         jssor_slider1.$Next();
         }
         }
         );*/

    });
</script>
<!-- Jssor Slider Begin -->
<!-- To move inline styles to css file/block, please specify a class name for each element. --> 
<div style="position: absolute; width: 100%; height: 100%; overflow: hidden;">
    <div style="position: relative; left: 50%; width: 5000px; text-align: center; margin-left: -2500px;">

        <div id="slider1_container" style="position: relative; margin: auto; top: 0px; right:0; bottom:0; width: 1800px; height: 900px">
            <!-- Loading Screen -->
            <div u="loading" style="position: absolute; top: 0px; left: 0px; ">
                <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block;
                     top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
                <div style="position: absolute; display: block; background: url(./img/loading.gif) no-repeat center center;
                     top: 0px; left: 0px; width: 100%; height: 100%;">
                </div>
            </div>



            <!-- Slides Container -->
            <div id="slides" u="slides" style="cursor: move; position: absolute; left: 0px; top: 0px; width: 1800px;
                 height: 900px; overflow: hidden; ">




                <div style="position:relative" class="here">
                    <img u="image" src="./img/sliderFoto/fm1.jpg" class="pulse"/>
                    <div u="caption" t="FADELEFT" du="800" t2="NO" class="slider-text"></div>
                    <div u="caption" t="FADE"  t2="NO" class="slider-text white" style="top: 35%; position: relative;"><span class="t2">Ruční výroba luxusního hranovaného skla<span>

                        <div u="caption" t="CLIPLEFT" du="500" t2="FADELEFT" class="slider-text white" style="width: 400px; height: 1px; margin: 0 auto 0px auto; background-color: #FFF;top:5px;"></div>
                        <div u="caption" t="FADELEFT" du="800" t2="FADELEFT" class="slider-text white" >
                            <span class="button-wide hvr-shutter-out-vertical hvr-shutter-out-vertical-white button-border border-white" onclick="Cangel.core.setPage('products')" style=""><?php echo $tr["more_info"];?></span>
                        </div>

                    </div>

                </div>

                <div style="position:relative" class="here">
                    <img u="image" src="./img/sliderFoto/fm2.JPG" class="pulse"/>
                    <div u="caption" t="FADELEFT" du="0" t2="NO" class="slider-text"></div>
                    <div u="caption" t="FADE"  t2="NO" class="slider-text white" style="top: 35%; position: relative;"><span class="t2">Zakázková výroba skla a jeho další zušlechťování<span>

                        <div u="caption" t="CLIPLEFT" du="500" t2="FADELEFT" class="slider-text white" style="width: 400px; height: 1px; margin: 0 auto 0px auto; background-color: #FFF;top:5px;"></div>
                        <div u="caption" t="FADELEFT" du="800" t2="FADELEFT" class="slider-text white" >
                            <span class="button-wide hvr-shutter-out-vertical hvr-shutter-out-vertical-white button-border border-white" onclick="Cangel.core.setPage('service','sanding')" style=""><?php echo $tr["more_info"];?></span>
                        </div>

                    </div>

                </div>
                
                
                <div style="position:relative" class="here">
                    <img u="image" src="./img/sliderFoto/fm3.jpg" class="pulse"/>
                    <div u="caption" t="FADELEFT" du="0" t2="NO" class="slider-text"></div>
                    <div u="caption" t="FADE"  t2="NO" class="slider-text white" style="top: 35%; position: relative;"><span class="t2">Máme radost když naše produkty dělají radost<span>

                        <div u="caption" t="CLIPLEFT" du="500" t2="FADELEFT" class="slider-text white" style="width: 400px; height: 1px; margin: 0 auto 0px auto; background-color: #FFF;top:5px;"></div>
                        <div u="caption" t="FADELEFT" du="800" t2="FADELEFT" class="slider-text white" >
                            <span class="button-wide hvr-shutter-out-vertical hvr-shutter-out-vertical-white button-border border-white" onclick="Cangel.core.setPage('references')" style=""><?php echo $tr["more_info"];?></span>
                        </div>

                    </div>

                </div>

                <!--
                <div>
                <div u="caption" t="fade" du="4000" style="position:absolute;top:135px;left:100px;width:150px;height:30px;color:#ffffff;font-size:26px;line-height:30px;text-align:center;">RTT|10</div>
                
                <img u="image" src="./img/1920/red.jpg" />
                <div u="caption" t="NO" t3="RTT|2" r3="137.5%" du3="3000" d3="500" style="position: absolute; width: 445px; height: 300px; top: 100px; left: 600px;">
                <img src="./img/new-site/c-phone.png" style="position: absolute; width: 445px; height: 300px; top: 0px; left: 0px;" />
                <img u="caption" t="CLIP|LR" du="4000" t2="NO" src="./img/new-site/c-jssor-slider.png" style="position: absolute; width: 102px; height: 78px; top: 70px; left: 130px;" />
                <img u="caption" t="ZMF|10" t2="NO" src="./img/new-site/c-text.png" style="position: absolute; width: 80px; height: 53px; top: 153px; left: 163px;" />
                <img u="caption" t="RTT|10" t2="NO" src="./img/new-site/c-fruit.png" style="position: absolute; width: 140px; height: 90px; top: 60px; left: 220px;" />
                <img u="caption" t="T" du="4000" t2="NO" src="./img/new-site/c-navigator.png" style="position: absolute; width: 200px; height: 155px; top: 57px; left: 121px;" />
                </div>
                <div u="caption" t="RTT|2" r="-75%" du="1600" d="2500" t2="NO" style="position: absolute; width: 470px; height: 220px; top: 120px; left: 650px;">
                <img src="./img/new-site/c-phone-horizontal.png" style="position: absolute; width: 470px; height: 220px; top: 0px; left: 0px;" />
                <img u="caption" t3="MCLIP|L" du3="2000" src="./img/new-site/c-slide-1.jpg" style="position: absolute; width: 379px; height: 213px; top: 4px; left: 45px;" />
                <img u="caption" t="MCLIP|R" du="2000" t2="NO" src="./img/new-site/c-slide-3.jpg" style="position: absolute; width: 379px; height: 213px; top: 4px; left: 45px;" />
                <img u="caption" t="RTTL|BR" x="500%" y="500%" du="1000" d="-3000" r="-30%" t3="L" x3="70%" du3="1600" src="./img/new-site/c-finger-pointing.png" style="position: absolute; width: 257px; height: 300px; top: 80px; left: 200px;" />
                <img src="./img/new-site/c-navigator-horizontal.png" style="position: absolute; width: 379px; height: 213px; top: 4px; left: 45px;" />
                </div>
                <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
                text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
                color: #FFFFFF;">Touch Swipe Slider
                </div>
                <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
                text-align: left; line-height: 36px; font-size: 30px;
                color: #FFFFFF;">
                Build your slider with anything, includes image, content, text, html, photo, picture
                </div>
                </div>
                <div>
                <img u="image" src="./img/1920/purple.jpg" />
                <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
                text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
                color: #FFFFFF;">Touch Swipe Slider
                </div>
                <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
                text-align: left; line-height: 36px; font-size: 30px;
                color: #FFFFFF;">
                Build your slider with anything, includes image, content, text, html, photo, picture
                </div>
                </div>
                <div>
                <img u="image" src="./img/1920/blue.jpg" />
                <div style="position: absolute; width: 480px; height: 120px; top: 30px; left: 30px; padding: 5px;
                text-align: left; line-height: 60px; text-transform: uppercase; font-size: 50px;
                color: #FFFFFF;">Touch Swipe Slider
                </div>
                <div style="position: absolute; width: 480px; height: 120px; top: 300px; left: 30px; padding: 5px;
                text-align: left; line-height: 36px; font-size: 30px;
                color: #FFFFFF;">
                Build your slider with anything, includes image, content, text, html, photo, picture
                </div>
                </div>
                </div>
                
                region Bullet Navigator Skin Begin     
                Help: http://www.jssor.com/development/slider-with-bullet-navigator-jquery.html -->

                <!-- bullet navigator container -->
                <div u="navigator" class="jssorb21" style="bottom: 26px; right: 6px;">
                    <!-- bullet navigator item prototype -->
                    <div u="prototype"></div>
                </div>
                <!--#endregion Bullet Navigator Skin End -->

                <!--#region Arrow Navigator Skin Begin -->
                <!-- Help: http://www.jssor.com/development/slider-with-arrow-navigator-jquery.html -->



                <!-- Arrow Left -->
                <span u="arrowleft" class="jssora21l" style="top: 123px; left: 8px; ">
                </span>
                <!-- Arrow Right -->
                <span u="arrowright" class="jssora21r" style="top: 123px; right: 8px;">
                </span>
                <!--#endregion Arrow Navigator Skin End -->
                <a style="display: none" href="http://www.jssor.com">js slider</a>
            </div>
            <!-- Jssor Slider End -->

        </div>
    </div>



    <!--
     Hide End-->
</div>