@extends('frontend.layout.master')

@push('meta-data')
    Home
@endpush

@push('add-css')

@endpush

@section('body-content')

    <!--============================
        BANNER START
    ==============================-->
    <section
      class="tf__banner pt_100 pl_60 pr_60 bg-fixed"
      style="background: url({{ asset('frontend/images/banner_bg.jpg') }})"
     >
      <div class="container-fluid h-100">
        <div class="row align-items-center h-100">
          <div class="col-xxl-6 col-xl-6">
            <div class="tf__banner_img">
              <img
                src="{{ asset('frontend/images/banner_img.png') }}"
                alt="portfolio img"
                class="img-fluid w-100"
              />
            </div>
          </div>
          <div class="col-xxl-5 col-xl-6 ms-auto">
            <div class="tf__banner_text">
              <h3 data-text-animation="rotate-in">Hello I'm Mezbah</h3>
              <h1 data-text-animation="rotate-in">
                CREATIVE DESIGNER BASED IN USA
              </h1>
              <p>
                As a passionate UI/UX Designer, I thrive on creating beautiful
                and intuitive digital experiences that delight users.
              </p>

              <ul class="d-flex flex-wrap">
                <li>
                  <a
                    href="#"
                    class="tf__common_btn d-flex align-items-center download_btn"
                    >Download Cv <i class='bx bx-download'></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--============================
        BANNER END
    ==============================-->


    <!--============================
        ABOUT START
    ==============================-->
    <section class="tf__about pt_150" id="about">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-lg-4">
              <div class="tf__common_heading tf__about_text">
                <h5>About Me</h5>
                <h2 data-text-animation="rotate-in" data-split="word">
                  Visual Journey through my Portfolio
                </h2>
                <p>
                  Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                  accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
                  quae ab illonge inventore veritatis et quasi architecto beatae
                  vitae dicta sunt explicabo. Nemo enim ipsam
                </p>
              </div>
            </div>
            <div class="col-xl-8 col-lg-8">
              <div class="tf__about_img">
                <img
                  src="{{ asset('frontend/images/about_img.jpg') }}"
                  alt="about img"
                  class="img-fluid w-100 parallax-image"
                />
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--============================
        ABOUT END
    ==============================-->


    <!--============================
        SERVICE START
    ==============================-->
    <section class="tf__service pt_145" id="service">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-9">
              <div class="tf__common_heading tf__common_heading2">
                <h5>My service</h5>
                <h2 data-text-animation="rotate-in" data-split="word">
                  Pushing Boundaries: My Portfolio of Limitless Ideas
                </h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-4 col-md-6">
              <div class="tf__single_service" data-animation="fade-left">
                <div class="tf__single_service_img">
                  <div data-animation="img-blur">
                    <img
                      src="{{ asset('frontend/images/service_1.jpg') }}"
                      alt="service"
                      class="img-fluid w-100"
                    />
                  </div>
                  <span><i class='bx bx-copy'></i></span>
                </div>
                <div class="tf__single_service_text">
                  <a href="#">Website Design</a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore incididunt ut
                    labore et dolore
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div
                class="tf__single_service"
                data-animation="fade-left"
                data-delay=".25"
              >
                <div class="tf__single_service_img">
                  <div data-animation="img-blur">
                    <img
                      src="{{ asset('frontend/images/service_2.jpg') }}"
                      alt="service"
                      class="img-fluid w-100"
                    />
                  </div>
                  <span><i class='bx bx-cog'></i></span>
                </div>
                <div class="tf__single_service_text">
                  <a href="#">Logo Design</a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore incididunt ut
                    labore et dolore
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-md-6">
              <div
                class="tf__single_service"
                data-animation="fade-left"
                data-delay=".5"
              >
                <div class="tf__single_service_img">
                  <div data-animation="img-blur">
                    <img
                      src="{{ asset('frontend/images/service_3.jpg') }}"
                      alt="service"
                      class="img-fluid w-100"
                    />
                  </div>
                  <span><i class='bx bx-screenshot'></i></span>
                </div>
                <div class="tf__single_service_text">
                  <a href="#">Apps Development</a>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed
                    do eiusmod tempor incididunt ut labore et dolore incididunt ut
                    labore et dolore
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--============================
        SERVICE END
    ==============================-->


    <!--============================
        SKILL START
    ==============================-->
    <section class="tf__skill_2 pt_150" id="portfolio">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div class="tf__common_heading tf__common_heading2 mb_120">
                <h5>MY Skills</h5>
                <h2 >
                  Capturing Crafting Stories My Photography Portfolio
                </h2>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-xl-6 col-lg-6">
              <div
                class="tf__single_skill_2 d-flex flex-wrap"
                data-animation="fade-bottom"
                data-offset="100"
              >
                <h2>01</h2>
                <span class="tf__skill_2_icon"
                  ><i class='bx bx-up-arrow-alt'></i></span>
                <div class="tf__single_skill_2_text">
                  <h4>Creative Agency</h4>
                  <h5>Framer Designer & Developer</h5>
                  <span>2020 - Present</span>
                  <p>
                    Nemo enim ipsam voluptatem quia desi vibe voluptas sit
                    aspernatur aut odit aut fugit sed designer here thisnquia
                    consequuntur magni dolores.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div
                class="tf__single_skill_2 d-flex flex-wrap"
                data-animation="fade-bottom"
                data-delay=".25"
                data-offset="100"
              >
                <h2>02</h2>
                <span class="tf__skill_2_icon"
                  ><i class='bx bx-up-arrow-alt'></i></span>
                <div class="tf__single_skill_2_text">
                  <h4>samsung tech</h4>
                  <h5>Framer Designer & Developer</h5>
                  <span>2015-2020</span>
                  <p>
                    Nemo enim ipsam voluptatem quia desi vibe voluptas sit
                    aspernatur aut odit aut fugit sed designer here thisnquia
                    consequuntur magni dolores.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div
                class="tf__single_skill_2 d-flex flex-wrap"
                data-animation="fade-bottom"
                data-offset="100"
              >
                <h2>03</h2>
                <span class="tf__skill_2_icon"
                  ><i class='bx bx-up-arrow-alt'></i></span>
                <div class="tf__single_skill_2_text">
                  <h4>apple tech</h4>
                  <h5>Framer Designer & Developer</h5>
                  <span>2012-2014</span>
                  <p>
                    Nemo enim ipsam voluptatem quia desi vibe voluptas sit
                    aspernatur aut odit aut fugit sed designer here thisnquia
                    consequuntur magni dolores.
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-6 col-lg-6">
              <div
                class="tf__single_skill_2 d-flex flex-wrap"
                data-animation="fade-bottom"
                data-delay=".25"
                data-offset="100"
              >
                <h2>04</h2>
                <span class="tf__skill_2_icon"
                  ><i class='bx bx-up-arrow-alt'></i></span>
                <div class="tf__single_skill_2_text">
                  <h4>metaverse</h4>
                  <h5>Framer Designer & Developer</h5>
                  <span>2012-2014</span>
                  <p>
                    Nemo enim ipsam voluptatem quia desi vibe voluptas sit
                    aspernatur aut odit aut fugit sed designer here thisnquia
                    consequuntur magni dolores.
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    <!--============================
        SKILL END
    ==============================-->

    <!--============================
        PORTFOLIO START
    ==============================-->
    <section class="tf__portfolio pt_150" id="projects">
      <div class="container">
        <div class="row">
          <div class="col-xl-8 order-xl-1 order-2">
            <div class="row portfolio_slider">
              <div class="col-xl-6">
                <div class="tf__portfolio_img">
                  <img
                    src="{{ asset('frontend/images/portfolio_1.jpg') }}"
                    alt="portfolio img"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-6">
                <div class="tf__portfolio_img">
                  <img
                    src="{{ asset('frontend/images/portfolio_2.jpg') }}"
                    alt="portfolio img"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-6">
                <div class="tf__portfolio_img">
                  <img
                    src="{{ asset('frontend/images/portfolio_1.jpg') }}"
                    alt="portfolio img"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-6">
                <div class="tf__portfolio_img">
                  <img
                    src="{{ asset('frontend/images/portfolio_2.jpg') }}"
                    alt="portfolio img"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-4 my-auto order-xl-2 order-1">
            <div class="tf__common_heading tf__portfolio_heading">
              <h5>gallery</h5>
              <h2 data-text-animation="rotate-in">Latests Portfolio</h2>
              <p>
                Sed ut perspiciatis unde omnis iste natus error sit voluptatem
                design accusantium doloremque laudantium Sed ut perspiciatis
                unde omnis iste natus error sit voluptatem design accusantium
                doloremque laudantium
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--============================
        PORTFOLIO END
    ==============================-->

    <!--============================
        TESTIMONIAL START
    ==============================-->
    <section class="tf__testimonial pt_145">
      <div class="container">
        <div class="row">
          <div class="col-xl-5">
            <div class="tf__common_heading tf__testimonial_heading">
              <h5>Testomonial</h5>
              <h2 >What our clients say?</h2>
            </div>
          </div>
        </div>

        <div class="tf__testimonial_slider">
          <div class="row ">
            <div class="owl-carousel owl-theme" id="testimonial">

                {{-- <div class="col-xl-6"> --}}
                  <div class="tf__single_testimonial">
                    <div class="tf__single_testimonial_img">
                      <img
                        src="{{ asset('frontend/images/testimonial_1.jpg') }}"
                        alt="testimonial"
                        class="img-fluid w-100"
                      />
                    </div>
                    <h4>Eleanor Pena</h4>
                    <span>Marketing Coordinator</span>
                    <p>
                      Financial planners help people to knowledge in about how to
                      invest and in save their moneye the most efficient way eve
                      plan ners help people tioniio know ledige in about how.
                    </p>
                  </div>
                {{-- </div> --}}
    
                {{-- <div class="col-xl-6"> --}}
                  <div class="tf__single_testimonial">
                    <div class="tf__single_testimonial_img">
                      <img
                        src="{{ asset('frontend/images/testimonial_2.jpg') }}"
                        alt="testimonial"
                        class="img-fluid w-100"
                      />
                    </div>
                    <h4>Eleanor Pena</h4>
                    <span>Marketing Coordinator</span>
                    <p>
                      Financial planners help people to knowledge in about how to
                      invest and in save their moneye the most efficient way eve
                      plan ners help people tioniio know ledige in about how.
                    </p>
                  </div>
                {{-- </div> --}}
    
                {{-- <div class="col-xl-6"> --}}
                  <div class="tf__single_testimonial">
                    <div class="tf__single_testimonial_img">
                      <img
                        src="{{ asset('frontend/images/testimonial_1.jpg') }}"
                        alt="testimonial"
                        class="img-fluid w-100"
                      />
                    </div>
                    <h4>Eleanor Pena</h4>
                    <span>Marketing Coordinator</span>
                    <p>
                      Financial planners help people to knowledge in about how to
                      invest and in save their moneye the most efficient way eve
                      plan ners help people tioniio know ledige in about how.
                    </p>
                  </div>
                {{-- </div> --}}

            </div>
          </div>
        </div>
      </div>
    </section>
    <!--============================
        TESTIMONIAL END
    ==============================-->

    <!--============================
        COUNTER START
    ==============================-->
    <section class="tf__counter tf__counter_2 pt_190" id="portfolio">
        <div class="container">
          <div class="row justify-content-between">
            <div class="col-xxl-4 col-md-6 col-xl-4">
              <div
                class="tf__single_counter tf__single_counter_2"
                data-animation="fade-left"
                data-offset="100"
              >
                <h4><span class="counter">200</span>+</h4>
                <p>Team member</p>
                <h5 class="tf__counter_icon tf__counter_icon_2">
                  <i class="fas fa-users"></i>
                </h5>
              </div>
            </div>


            <div class="col-xxl-4 col-md-6 col-xl-4">
              <div
                class="tf__single_counter tf__single_counter_2"
                data-animation="fade-left"
                data-offset="100"
                data-delay=".5"
              >
                <h4><span class="counter">10</span>k+</h4>
                <p>Complete project</p>
                <h5 class="tf__counter_icon tf__counter_icon_2">
                  <i class="fas fa-file-archive"></i>
                </h5>
              </div>
            </div>

            <div class="col-xxl-4 col-md-6 col-xl-4">
              <div
                class="tf__single_counter tf__single_counter_2"
                data-animation="fade-left"
                data-offset="100"
                data-delay=".75"
              >
                <h4><span class="counter">900</span>+</h4>
                <p>Client review</p>
                <h5 class="tf__counter_icon tf__counter_icon_2">
                  <i class="fas fa-user-friends"></i>
                </h5>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!--============================
        COUNTER END
    ==============================-->


    <!--============================
        EXPERIANCE START
    ==============================-->
    <section class="tf__experiance tf__experiance_hp2 pt_175">
        <div class="container-fluid">
          <div class="tf__brand pl_90 pr_100">
            <div
              class="row justify-content-xl-between justify-content-center"
            >
              <div class="col-xl-2 col-sm-6 col-md-4 col-lg-4 col-6">
                <div
                  class="tf__brand_img"
                >
                  <img
                    src="{{ asset('frontend/images/brand_6.png') }}"
                    alt="company logo"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-2 col-sm-6 col-md-4 col-lg-4 col-6">
                <div
                  class="tf__brand_img"
                >
                  <img
                    src="{{ asset('frontend/images/brand_7.png') }}"
                    alt="company logo"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-2 col-sm-6 col-md-4 col-lg-4 col-6">
                <div
                  class="tf__brand_img"
                >
                  <img
                    src="{{ asset('frontend/images/brand_8.png') }}"
                    alt="company logo"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-2 col-sm-6 col-md-4 col-lg-4 col-6">
                <div
                  class="tf__brand_img"
                >
                  <img
                    src="{{ asset('frontend/images/brand_9.png') }}"
                    alt="company logo"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
              <div class="col-xl-2 col-sm-6 col-md-4 col-lg-4 col-6">
                <div
                  class="tf__brand_img"
                >
                  <img
                    src="{{ asset('frontend/images/brand_10.png') }}"
                    alt="company logo"
                    class="img-fluid w-100"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!--============================
      EXPERIANCE END
  ==============================-->
  

    <!--============================
        BLOG START
    ==============================-->
    <section class="tf__blog pt_145 pb_120">
      <div class="container">
        <div class="row">
          <div class="row justify-content-center">
            <div class="col-xl-10">
              <div
                class="tf__common_heading tf__common_heading2 tf__blog_heading"
              >
                <h5>ALL Blogs</h5>
                <h2>
                  From Vision to Reality My Portfolio of Accomplishments
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-xl-4 col-md-6">
            <div
              class="tf__single_blog"
              data-animation="fade-left"
              data-offset="100"
            >
              <div class="tf__single_blog_img">
                <a
                  href="/blog-details.html"
                  data-cursor='<i class="fa-light fa-arrow-up-right"></i>'
                >
                  <img
                    src="{{ asset('frontend/images/blog_1.jpg') }}"
                    alt="blog img"
                    class="img-fluid w-100"
                /></a>
                <p>31 December, 2023</p>
              </div>
              <div class="tf__single_blog_text">
                <ul class="d-flex flex-wrap">
                  <li><i class="far fa-user"></i>By admin</li>
                  <li><i class="far fa-comments"></i>Comments (05)</li>
                </ul>
                <a href="/blog-details.html" class="tf__single_blog_heading"
                  >These cases are perfectly simple and easy</a
                >

                <a href="/blog-details.html" class="tf__common_btn tf__blog_btn"
                  >read more<i class='bx bx-right-arrow-alt'></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div
              class="tf__single_blog"
              data-animation="fade-left"
              data-delay=".25"
              data-offset="100"
            >
              <div class="tf__single_blog_img">
                <a
                  href="/blog-details.html"
                  data-cursor='<i class="fa-light fa-arrow-up-right"></i>'
                >
                  <img
                    src="{{ asset('frontend/images/blog_2.jpg') }}"
                    alt="blog img"
                    class="img-fluid w-100"
                /></a>
                <p>31 December, 2023</p>
              </div>
              <div class="tf__single_blog_text">
                <ul class="d-flex flex-wrap">
                  <li><i class="far fa-user"></i>By admin</li>
                  <li><i class="far fa-comments"></i>Comments (05)</li>
                </ul>
                <a href="/blog-details.html" class="tf__single_blog_heading"
                  >which is the same as saying through shrinking from toil
                </a>

                <a href="/blog-details.html" class="tf__common_btn tf__blog_btn"
                  >read more<i class='bx bx-right-arrow-alt'></i></a>
              </div>
            </div>
          </div>
          <div class="col-xl-4 col-md-6">
            <div
              class="tf__single_blog"
              data-animation="fade-left"
              data-delay=".5"
            >
              <div class="tf__single_blog_img">
                <a
                  href="/blog-details.html"
                  data-cursor='<i class="fa-light fa-arrow-up-right"></i>'
                >
                  <img
                    src="{{ asset('frontend/images/blog_3.jpg') }}"
                    alt="blog img"
                    class="img-fluid w-100"
                /></a>
                <p>31 December, 2023</p>
              </div>
              <div class="tf__single_blog_text">
                <ul class="d-flex flex-wrap">
                  <li><i class="far fa-user"></i>By admin</li>
                  <li><i class="far fa-comments"></i>Comments (05)</li>
                </ul>
                <a href="/blog-details.html" class="tf__single_blog_heading"
                  >when our power of choice is design untrammelled and when</a
                >

                <a href="/blog-details.html" class="tf__common_btn tf__blog_btn"
                  >read more<i class='bx bx-right-arrow-alt'></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--============================
        BLOG END
    ==============================-->

    <!--============================
        CONTACT START
    ==============================-->
    <section class="tf__contact pb_80">
      <div class="container">
        <div class="row">
          <div class="col-xl-6 col-md-12">
            <div class="tf__contact_area">
              <h4 data-text-animation="rotate-in">IF YOU WANT TO UPDATE ?</h4>
              <h4 data-text-animation="rotate-in" data-delay=".25">
                STAY CONECTED!
              </h4>
              <div class="tf__contact_mail">
                <input type="text" placeholder="Enter email address" />
                <a href="#" class="tf__subscribtion">SUBSCRIBE NOW</a>
              </div>
              <div class="row justify-content-between">
                <div class="col-xl-5 col-md-5">
                  <div class="tf__contact_address">
                    <h4>Contact Me</h4>
                    <div class="tf__single_address d-flex flex-wrap">
                      <span
                        ><i class='bx bxs-paper-plane'></i></span>
                      <div class="tf__address_area">
                        <p>Old city street,USA</p>
                        <p>1212 New york-3500</p>
                      </div>
                    </div>
                    <div class="tf__single_address d-flex flex-wrap">
                      <span><i class='bx bxs-phone-call' ></i></span>
                      <div class="tf__address_area">
                        <p>(+888) 123 456 765</p>
                        <p>(+888) 123 456 765</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-5 col-md-5">
                  <div class="tf__contact_address">
                    <h4>OUR SERVICES</h4>
                    <ul>
                      <li>
                        <a href="#"
                          ><i class='bx bx-chevrons-right'></i
                          ><span class="text_hover_animaiton"
                            >UI Design</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class='bx bx-chevrons-right'></i
                          ><span class="text_hover_animaiton"
                            >UX Design</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class='bx bx-chevrons-right'></i
                          ><span class="text_hover_animaiton"
                            >Digital Marketing</span
                          ></a
                        >
                      </li>
                      <li>
                        <a href="#"
                          ><i class='bx bx-chevrons-right'></i>
                          <span class="text_hover_animaiton"
                            >Video Editing</span
                          ></a
                        >
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-6">
            <form class="tf__form">
              <div class="row">
                <div class="col-xl-6">
                  <div class="tf__single_form">
                    <input type="text" placeholder="Name*" />
                  </div>
                </div>
                <div class="col-xl-6">
                  <div class="tf__single_form">
                    <input type="email" placeholder="E-mail" />
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="tf__single_form">
                    <input type="text" placeholder="Phone Number" />
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="tf__single_form">
                    <textarea rows="6" placeholder="Comment"></textarea>
                  </div>
                </div>
                <div class="col-xl-12">
                  <div class="tf__single_form">
                    <button type="submit" class="tf__common_btn">
                      Submit<i class='bx bx-right-arrow-alt'></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!--============================
        CONTACT END
    ==============================-->

@endsection


@push('add-js')

<script>
      $('#testimonial').owlCarousel({
        loop:true,
        margin:10,
        nav: true,
        dots: true,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        navText: ['<i class="bx bx-chevron-left"></i>' , '<i class="bx bx-chevron-right"></i>'],
        responsive:{
            0:{
                nav: false,
                dots: true,
                items: 1
            },
            577:{
                nav: true,
                dots: false,
                items: 1
            },
            768:{
                nav: true,
                dots: false,
                items: 1
            },
            992:{
                nav: true,
                dots: false,
                items: 2
            },
        }
    })

   
</script>

@endpush
