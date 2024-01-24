<!-- start of hero -->
<section class="hero-slider hero-style-1">
    <div class="swiper-container swiper-container-horizontal">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="slide-inner slide-bg-image tab " id="tab1" contenteditable onclick="makeWYSIWYG(this, 'tab_1')" style="background-image: url('<?php echo base_url(); ?>public/assets/images/frontend/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_1'))->row()->description;?>');" data-background="<?php echo base_url(); ?>public/frontend/assets/images/slider/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_1'))->row()->description;?>" data-text="<i class='fi flaticon-dog'></i>Family Law plan<h4>Family Law</h4>">
                    <?php echo $this->db->get_where('frontend',array('type'=>'tab_1'))->row()->description;?>
                </div>
                <div class="slide-inner slide-bg-image tab " id="tab2" contenteditable onclick="makeWYSIWYG(this, 'tab_2')" style="display:none; background-image: url('<?php echo base_url(); ?>public/assets/images/frontend/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_2'))->row()->description;?>');" data-background="<?php echo base_url(); ?>public/frontend/assets/images/slider/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_1'))->row()->description;?>" data-text="<i class='fi flaticon-dog'></i>Family Law plan<h4>Family Law</h4>">
                    <?php echo $this->db->get_where('frontend',array('type'=>'tab_2'))->row()->description;?>
                </div>
                <div class="slide-inner slide-bg-image tab " id="tab3" contenteditable onclick="makeWYSIWYG(this, 'tab_3')" style="display:none; background-image: url('<?php echo base_url(); ?>public/assets/images/frontend/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_3'))->row()->description;?>');" data-background="<?php echo base_url(); ?>public/frontend/assets/images/slider/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_1'))->row()->description;?>" data-text="<i class='fi flaticon-dog'></i>Family Law plan<h4>Family Law</h4>">
                    <?php echo $this->db->get_where('frontend',array('type'=>'tab_3'))->row()->description;?>
                </div>
                <div class="slide-inner slide-bg-image tab " id="tab4" contenteditable onclick="makeWYSIWYG(this, 'tab_4')" style="display:none; background-image: url('<?php echo base_url(); ?>public/assets/images/frontend/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_4'))->row()->description;?>');" data-background="<?php echo base_url(); ?>public/frontend/assets/images/slider/<?php echo $this->db->get_where('frontend',array('type'=>'image_tab_1'))->row()->description;?>" data-text="<i class='fi flaticon-dog'></i>Family Law plan<h4>Family Law</h4>">
                    <?php echo $this->db->get_where('frontend',array('type'=>'tab_4'))->row()->description;?>
                </div>
            </div>
        </div>
        <!-- end swiper-wrapper -->

        <!-- swipper controls -->
        <div class="swiper-cust-pagination swiper-pagination-clickable swiper-pagination-bullets" id="tab4" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
            <div class="swiper-pagination-bullet swiper-pagination-bullet-active nav-tab" onclick="openTab('tab1',this)"><i class="fi flaticon-dog"></i>Family Law plan<h4>Family Law</h4>
            </div>
            <div class="swiper-pagination-bullet nav-tab" onclick="openTab('tab2',this)"><i class="fi flaticon-wounded"></i>Personal injury plan<h4>Personal Injury</h4>
            </div>
            <div class="swiper-pagination-bullet nav-tab" onclick="openTab('tab3' ,this)"><i class="fi flaticon-thief"></i>Criminal plan<h4>Criminal Law</h4>
            </div>
            <div class="swiper-pagination-bullet nav-tab" onclick="openTab('tab4' ,this)"><i class="fi flaticon-save-money"></i>Business law plan<h4>Business Law</h4>
            </div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>
<!-- end of hero slider -->


<!-- start about-section -->
<section class="about-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-md-4" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="left-col">
                    <div class="section-title">
                        <div class="icon">
                            <i class="fi flaticon-home-3"></i>
                        </div>
                        <span>About juristic</span>
                        <h2>We are the most populer law firm with various law services!</h2>
                        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum</p>
                        <a href="#" class="more-about">Read More About us <i class="fi flaticon-next-1"></i></a>
                    </div>
                </div>
            </div>

            <div class="col col-md-4">
                <div class="mid-col">
                    <img class="imgEdit" src="<?php echo base_url(); ?>public/assets/images/frontend/<?php echo $this->db->get_where('frontend',array('type'=>'img1'))->row()->description;?>" alt="" data-img="img1">
                </div>
            </div>
            <div class="col col-md-4" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="right-col">
                    <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien libero</p>

                    <div class="quoter">
                        <h4>Michel Jhon</h4>
                        <span>- CEO of the company</span>
                    </div>
                    <div class="signature">
                        <img src="http://mayansource.com/mx/public/frontend/assets/images/signature.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end about-section -->


<!-- start feature-section -->
<section class="feature-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-3 col-sm-6">
                <div class="info-col" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                    <h4>Some few stpes that you need to get the best services from juristic</h4>
                    <a href="#" class="theme-btn-s2">Contact with us</a>
                </div>
            </div>
            <div class="col col-lg-3 col-sm-6" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="feature-grid">
                    <i class="fi flaticon-standard"></i>
                    <h3>Skilled Attorneys</h3>
                    <p>Muff that covered the whole of her lower arm towards the viewer gregor then turned to look out the window at the dull</p>
                </div>
            </div>
            <div class="col col-lg-3 col-sm-6" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="feature-grid">
                    <i class="fi flaticon-balance"></i>
                    <h3>Legal Defence</h3>
                    <p>Muff that covered the whole of her lower arm towards the viewer gregor then turned to look out the window at the dull</p>
                </div>
            </div>
            <div class="col col-lg-3 col-sm-6" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="feature-grid">
                    <i class="fi flaticon-mace"></i>
                    <h3>99% case win</h3>
                    <p>Muff that covered the whole of her lower arm towards the viewer gregor then turned to look out the window at the dull</p>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end feature-section -->


<!-- start service-section -->
<section class="service-section">
    <div class="content-area clearfix">
        <div class="left-col" style="height: 747px;" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
            <div class="inner-content">
                <blockquote>“ It showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered the whole of her lower arm towards”</blockquote>

                <h4>Jhon Dow</h4>
                <span>CEO of the company</span>
            </div>
        </div>
        <div class="right-col">
            <div class="section-title-s2" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="icon">
                    <i class="fi flaticon-balance"></i>
                </div>
                <span>What we are expert at</span>
                <h2>Legal Practice Areas</h2>
                <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc</p>
            </div>
            <div class="service-grids clearfix" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
                <div class="grid">
                    <i class="fi flaticon-parents"></i>
                    <h3><a href="#">Family Law</a></h3>
                    <p>Samsa was a travelling salesman and above it there</p>
                </div>
                <div class="grid">
                    <i class="fi flaticon-wounded"></i>
                    <h3><a href="#">Personal Injury</a></h3>
                    <p>Samsa was a travelling salesman and above it there</p>
                </div>
                <div class="grid">
                    <i class="fi flaticon-thief"></i>
                    <h3><a href="#">Criminal Law</a></h3>
                    <p>Samsa was a travelling salesman and above it there</p>
                </div>
                <div class="grid">
                    <i class="fi flaticon-mortarboard"></i>
                    <h3><a href="#">Education Law</a></h3>
                    <p>Samsa was a travelling salesman and above it there</p>
                </div>
                <div class="grid">
                    <i class="fi flaticon-architecture-and-city"></i>
                    <h3><a href="#">Real Estate Law</a></h3>
                    <p>Samsa was a travelling salesman and above it there</p>
                </div>
                <div class="grid">
                    <i class="fi flaticon-save-money"></i>
                    <h3><a href="#">Business Law</a></h3>
                    <p>Samsa was a travelling salesman and above it there</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end service-section -->

<!-- start cta-section -->
<section class="cta-section" style="margin:10px;" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="cta-conetnt">
                    <div class="cta-logo">
                        <img src="http://mayansource.com/mx/public/frontend/assets/images/cta-logo.png" alt="">
                    </div>
                    <h5>Call us 24/7</h5>
                    <h2>545-75797-897</h2>
                    <a href="#" class="theme-btn-s3">Make An Appointment</a>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end cta-section -->


<!-- start team-section -->
<section class="team-section section-padding" style="margin:10px;">
    <div class="container">
        <div class="row">
            <div class="col col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1">
                <div class="section-title-s3">
                    <div class="icon">
                        <i class="fi flaticon-suitcase"></i>
                    </div>
                    <span>Qualified Attorneys</span>
                    <h2>Meet Our Experts</h2>
                    <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero sit amet adipiscing</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-xs-12">
                <div class="team-grids ">
                    <div class="owl-stage-outer">
                        <div class="owl-stage " style="display:flex;min-width: 100px;overflow-y: auto;">
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                            <div class="owl-item " style="width: 285px; margin-right: 0px;min-width: 285px;max-width: 285px;">
                                <div class="grid">
                                    <div class="img-holder">
                                        <img src="http://mayansource.com/mx/public/frontend/assets/images/team/img-2.jpg" alt="">
                                    </div>
                                    <div class="details">
                                        <div class="social">
                                            <ul>
                                                <li><a href="#"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#"><i class="ti-linkedin"></i></a></li>
                                                <li><a href="#"><i class="ti-pinterest"></i></a></li>
                                            </ul>
                                        </div>
                                        <h3><a href="#">Jonathon Danial</a></h3>
                                        <p>Business Lawyer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end team-section -->


<!-- start contact-section -->
<section class="contact-section" style="margin:10px;" contenteditable onclick="makeWYSIWYG(this, 'tab_controllers')">
    <div class="content-area clearfix">
        <div class="contact-info-col">
            <div class="contact-info">
                <ul>
                    <li>
                        <i class="fi flaticon-home-3" onclick="iconSpan(this)"></i>
                        <h4>Head Office</h4>
                        <p>54, Dahs udin sorok, Melborn Austria</p>
                    </li>
                    <li>
                        <i class="fi flaticon-email"></i>
                        <h4>Email Address</h4>
                        <p>demo@example.com</p>
                    </li>
                    <li>
                        <i class="fi flaticon-support"></i>
                        <h4>Telephone</h4>
                        <p>654756175+5474</p>
                    </li>
                    <li>
                        <i class="fi flaticon-clock"></i>
                        <h4>Office Hour</h4>
                        <p>Mon-Sun: 10am – 7pm</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contact-form-col">
            <div class="section-title-s2">
                <div class="icon">
                    <i class="fi flaticon-balance"></i>
                </div>
                <span>Contact form</span>
                <h2>Need Consultancy, <br>Request A Free Quote</h2>
                <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nuncIt showed a lady fitted out with a fur hat and fur boa who sat upright, raising a heavy</p>
            </div>

            <div class="contact-form">
                <form method="post" class="contact-validation-active" id="contact-form-main" novalidate="novalidate">
                    <div>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Name*">
                    </div>
                    <div>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email*">
                    </div>
                    <div>
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone*">
                    </div>
                    <div>
                        <select name="subject" class="form-control">
                            <option disabled="disabled" selected="">Contact subject</option>
                            <option>Subject 1</option>
                            <option>Subject 2</option>
                            <option>Subject 3</option>
                        </select>
                    </div>
                    <div class="fullwidth">
                        <textarea class="form-control" name="note" id="note" placeholder="Case Description..."></textarea>
                    </div>
                    <div class="submit-area">
                        <button type="submit" class="theme-btn-s3">Submit It Now</button>
                        <div id="loader">
                            <i class="ti-reload"></i>
                        </div>
                    </div>
                    <div class="clearfix error-handling-messages">
                        <div id="success">Thank you</div>
                        <div id="error"> Error occurred while sending email. Please try again later. </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end content-area -->
</section>
<!-- end contact-section -->