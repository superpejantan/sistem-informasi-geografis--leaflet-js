@extends('frontend.layouts.app')
@section('content')
@include('frontend.layouts.navigation')
<section id="inner-headline">
      <div class="container">
        <div class="row">
          <div class="span12">
            <div class="inner-heading">
              <ul class="breadcrumb">
                <li><a href="index.html">Home</a> <i class="icon-angle-right"></i></li>
                <li><a href="#">Pages</a> <i class="icon-angle-right"></i></li>
                <li class="active">Team</li>
              </ul>
              <h2>Our Team</h2>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="content">
      <div class="container">
        <div class="row">
          <div class="span12">
            <ul class="team-categ filter">
              <li class="all active"><a href="#">All Divisions</a></li>
              <li class="design"><a href="#" title="">Design</a></li>
              <li class="marketing"><a href="#" title="">Marketing</a></li>
              <li class="dev"><a href="#" title="">Development</a></li>
            </ul>

            <div class="clearfix"></div>
            <div class="row">
              <section id="team">
                <ul id="thumbs" class="team">

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="design">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/1.jpg" alt="" />
                      <div class="caption">
                        <h5>Stephen Long</h5>
                        <p>
                          Web designer
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 dev" data-id="id-1" data-type="dev">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/2.jpg" alt="" />
                      <div class="caption">
                        <h5>David Clark</h5>
                        <p>
                          Web programmer
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 marketing" data-id="id-2" data-type="marketing">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/3.jpg" alt="" />
                      <div class="caption">
                        <h5>Sarah Hughes</h5>
                        <p>
                          Marketing Head
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="design">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/4.jpg" alt="" />
                      <div class="caption">
                        <h5>Maria Renata</h5>
                        <p>
                          Web designer
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 dev" data-id="id-4" data-type="dev">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/5.jpg" alt="" />
                      <div class="caption">
                        <h5>Tim Dochovic</h5>
                        <p>
                          Senior developer
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-5" data-type="design">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/6.jpg" alt="" />
                      <div class="caption">
                        <h5>Evan Zurog</h5>
                        <p>
                          Web designer
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <li class="item-thumbs span3 marketing" data-id="id-0" data-type="marketing">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/7.jpg" alt="" />
                      <div class="caption">
                        <h5>Vanessa Millan</h5>
                        <p>
                          Marketing development
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                  <!-- Item Project and Filter Name -->
                  <li class="item-thumbs span3 design" data-id="id-0" data-type="design">
                    <div class="team-box thumbnail">
                      <img src="img/dummies/team/8.jpg" alt="" />
                      <div class="caption">
                        <h5>Patricia Knobb</h5>
                        <p>
                          Web designer
                        </p>
                        <ul class="social-network">
                          <li><a href="#" title="Twitter"><i class="icon-circled icon-bgdark icon-twitter"></i></a></li>
                          <li><a href="#" title="Google +"><i class="icon-circled icon-bgdark icon-google-plus"></i></a></li>
                          <li><a href="#" title="Dribbble"><i class="icon-circled icon-bgdark icon-dribbble"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </li>
                  <!-- End Item Project -->

                </ul>
              </section>

            </div>
          </div>
        </div>
      </div>
    </section>
@endsection