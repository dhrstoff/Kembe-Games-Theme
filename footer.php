<div class="row homepage-footer-balk">
        <div class="col-md-6 banner-1">
                <h2>Come and train with<br/>Andy Souwer</h2>
                <button class="btn btn-red">Train with Andy Souwer</button>
        </div>
        <div class="col-md-6 banner-2">
                <div class="sponsor">
                    <h3>Sponsored BY</h3>
                    <img src="<?php bloginfo('template_directory'); ?>/assets/img/white-as-logo.png"/>
                </div>
                <button class="btn btn-red">Get your fightgear now</button>
        </div>
</div>


<div class="row homepage-nieuwsbrief-balk">
    <div class="container">
        <div class="col-md-6 andysouwer"><img src="<?php bloginfo('template_directory'); ?>/assets/img/home-andySouwer2.png"/></div>
        <div class="col-md-6 nieuwsbrief">
            <h2>Fan club</h2>
            <h4>Sign up for the fan club</h4>
            <p>Being a member gives you the opportunity to hear the latest news and get the best offers as first.</p>

            <ul>
                <li>Exclusive Seminars in the Netherlands and abroad</li>
                <li>Exclusive Seminars in the Netherlands and abroad</li>
                <li>Exclusive Seminars in the Netherlands and abroad</li>
                <li>Exclusive Seminars in the Netherlands and abroad</li>
            </ul>
            <div class="add-nieuwsbrief">
                <?php echo the_field('footer_newspaper_form', 7); ?>
            </div>

            <div class="clearfix"></div>
        </div>
    </div>
</div>


<div class="row home-footer-logo">
    <div class="container">
        <div class="col-md-3"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-ReAT.png"/></div>
        <div class="col-md-3"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-AS-sportswear_black.png"/></div>
        <div class="col-md-3"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-GoFast.png"/></div>
        <div class="col-md-3"><img src="<?php bloginfo('template_directory'); ?>/assets/img/logo-TeamSouwer.png"/></div>
    </div>
</div>

<div class="row home-footer-bottom">
    <div class="container">
        <div class="col-md-9">
            <?php wp_nav_menu (array('theme_location' => ''));?>
            <ul class="social">
                <li class="facebook"><a href="#">Volg ons op Facebook</a></li>
                <li class="twitter"><a href="#">Volg ons op Twitter</a></li>
            </ul>
        </div>
        <div class="col-md-3">
            <span>Copyright Andy Souwer 2015</span>
        </div>
     </div>
</div>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php bloginfo('template_directory'); ?>/assets/js/bootstrap.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/mmenu/jquery.mmenu.min.all.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/assets/js/mmenu/jquery.mmenu.fixedelements.min.js"></script>

<script src="<?php bloginfo('template_directory'); ?>/assets/js/main.js"></script>

<?php wp_footer(); ?>
</div>
</body>
</html>