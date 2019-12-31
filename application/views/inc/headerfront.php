<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="<?=base_url("front")?>">Vividi.id</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item" id="home"><a href="<?=base_url("front")?>" class="nav-link">Home</a></li>
                <li class="nav-item" id="about"><a href="<?=base_url("front/about")?>" class="nav-link">About</a></li>
                <li class="nav-item" id="tour"><a href="<?=base_url("index/tour")?>" class="nav-link">Tour</a></li>
                <li class="nav-item" id="hotels"><a href="<?=base_url("front/hotel")?>" class="nav-link">Hotels</a></li>
                <li class="nav-item" id=""><a href="<?=base_url("front/blog")?>" class="nav-link">Blog</a></li>
                <li class="nav-item" id="contact"><a href="<?=base_url("front/contact")?>" class="nav-link">Contact</a></li>
                <?php if($this->session->userdata('login')==TRUE){?>
                <li class="nav-item cta cta-button"><a href="<?=base_url("login")?>" class="nav-link"><span>Akun Anda</span></a></li>
                <?php }else{?>
                <li class="nav-item cta cta-button"><a href="<?=base_url("login")?>" class="nav-link"><span>Login</span></a></li>
                <?php }?>
            </ul>
        </div>
        <script>
            $(".navbar-nav li").removeClass("active"); 
            $(".navbar-nav li#<?=$active_menu?>").addClass("active");
        </script>
    </div>
</nav>