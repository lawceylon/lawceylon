@extends('main.app')
@section('title','Lawceylon homepage')
@section('content')
<div class="home-page">
    <div id="home-section" class="parallax-section carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active" style="background-image:url(images/backgrounds/page-header-1.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="slider-content">
                                <div class="card">
                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        <h2>You are logged in!</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- contaioner -->
            </div><!-- item -->
            <div class="item" style="background-image:url(images/backgrounds/bg-4.jpeg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="slider-content">
                                <h2 data-animation="animated lightSpeedIn">Legal Information</h2>
                                <p data-animation="animated lightSpeedIn">Our traget is to achieve the best platform which provides accurate legal information about sri lankan laws....</p>
                                <div class="ad-btn">
                                    <a href="#" class="btn btn-primary" data-animation="animated lightSpeedIn">Refer Now</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- contaioner -->
            </div><!-- item -->
            <div class="item" style="background-image:url(images/index/main-slider/bg-slide-2.jpg)">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="slider-content">
                                <h2 data-animation="animated lightSpeedIn">Excellent Service</h2>
                                <p data-animation="animated lightSpeedIn">Customer satisfaction is our main responsibility.....</p>
                                <div class="ad-btn" >
                                    <a href="#" class="btn btn-primary" data-animation="animated lightSpeedIn">View Ads</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- row -->
                </div><!-- contaioner -->
            </div><!-- item -->
        </div>
        <a class="left carousel-control" href="#home-section" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
            <a class="right carousel-control" href="#home-section" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div><!-- #home-section -->
    <br>
    <br>                
    <!-- avt-category -->
    <div id="avt-category" class="clearfix">
        <div class="container">
            <div class="ad-details">
                <div class="row">
                    <div class="col-md-8 col-sm-7">
                        <div class="item">
                            <div class="details-description">
                                <br>
                                <br>
                                <div class="item-info">
                                    <h4>Congragulations! Your Account has been Created.</h4>
                                </div><!-- item-info -->
                                <br>
                                <br>
                                <div class="item-info">
                                    <h4>Account Benefits</h4>
                                    <ul>
                                        <li>Save Time and Quickly contact with Lawyers</li>
                                        <li>Your Appointment History<p>we keep all the records of your appointments as it easy for you..</li>
                                        <li>This is test case </li>
                                    </ul>
                                </div><!-- item-info -->
                            </div>
                        </div><!-- item -->
                    </div>
                    <div class="col-sm-5 col-md-4">
                        <div class="side-bar">
                            <div class="item-author widget">
                                <h4>Rated Lawyers</h4>
                                    @foreach($lawyers as $lawyer)
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="seller-image">
                                                    <img class="img-responsive" src="{{  asset('images/lawyer/').'/'.$lawyer->image }}" alt="seller">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="seller-info">
                                                    <p><span>Name:</span> <a href="#">{{ $lawyer->firstName }}{{ $lawyer->lastName }}</a></p>
                                                    <address>
                                                        <span>Specialist Areas:</span>{{ $lawyer->Specialist_Area }}
                                                    </address>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                            </div>
                            <div class="contact-seller widget">
                                <h4>Contact Admin</h4>
                                <form id="contact-form" class="contact-form" name="contact-form" method="POST" action="/cmessage">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" required="required" placeholder="Name" name="name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="email" class="form-control" required="required" placeholder="Email" name="email">
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="message"  required="required" class="form-control" rows="7" placeholder="Message"></textarea>
                                            </div>             
                                        </div>     
                                    </div>
                                    <div class="row">       
                                        <div class="alert alert-success">
                                            <strong>
                                                @if(session()->has('message'))
                                                    {{ session()->get('message') }}
                                                @endif
                                            </strong> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-info">Submit Message</button>
                                        <button type="reset" class="btn btn-info">Cancel Message</button>
                                    </div>
                                </form>
                            </div>
                        </div><!-- side-bar -->
                    </div>
                </div>
            </div>	
        </div><!-- container -->
    </div><!-- category-avt -->
    <div id="call-to-act">
        <div class="container">
            <div class="call-to-act">
                <div class="footer-widget link-widget" style="padding-left:50px;">
                    <h2>Our Expertise Areas</h2>
                    <ul style="padding-left:150px;">
                        @foreach($categories as $category)
                            <li><h2><strong><a href="{{ route('categories',$category->slug) }}"> <i class="fa fa-angle-double-right"></i><i class="fa fa-angle-double-right"></i>{{ $category->name }}</a></strong></h2></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div><!-- #call-to-act -->
    <div class="section">
        <div class="container">
            <div class="section-title">
                <div class="title-content">
                    <h2>News on Lawceylon</h2>
                </div>
            </div>
            <div class="category-adds">
                <div id="category-tab">
                    <div class="tab-view">
                        <ul class="list-inline">
                            {{-- <li class="grid-view-tab"><i class="fa fa-th-large" aria-hidden="true"></i></li>
                            <li class="small-view-tab"><i class="fa fa-th" aria-hidden="true"></i></li> --}}
                            <li class="list-view-tab active"><i class="fa fa-th-list" aria-hidden="true"></i></li>
                        </ul>
                    </div>
                    <div class="category-tab">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#recent" aria-controls="recent" role="tab" data-toggle="tab">Recent</a></li>
                            <li role="presentation"><a href="#popular" aria-controls="popular" role="tab" data-toggle="tab">Popular</a></li>
                            {{-- <li role="presentation"><a href="#Random" aria-controls="Random" role="tab" data-toggle="tab">Random</a></li> --}}
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content list-view-tab">
                            <div role="tabpanel" class="tab-pane active" id="popular">
                                <ul>
                                    @foreach($newses as $news)
                                        <li class="item-wrap">
                                            <div class="item">
                                                <div class="item-image">
                                                    <a href="details.html"><img src="images/news/front/{{ $news->image2 }}" alt="" class="img-responsive"></a>
                                                </div>
                                                <div class="item-description">
                                                    <div class="item-meta">
                                                        <div class="item-post-date">
                                                            <span>{{ $news->created_at->diffForHumans() }}</span>
                                                        </div>
                                                        <ul class="list-inline product-social">
                                                            <li><a href="#"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="item-title">
                                                        <h3><a href="{{ route('news',$news->slug) }}"><b>{{ $news->title }}</b></a></h3>
                                                    </div>
                                                    <div class="item-info">
                                                        <p>{{ $news->subtitle }}</p>
                                                    </div>
                                                </div><!-- item-description -->
                                            </div><!-- item -->
                                        </li><!-- item-wrap -->
                                    @endforeach
                                </ul>
                                <div class="pager-section">
                                    <ul class="pagination">
                                        <li class="next">{{ $newses->links() }}<a href="#"></a></li>
                                    </ul>
                                </div><!-- pager-section -->
                            </div> <!--tab-pane-->
                            {{-- <div role="tabpanel" class="tab-pane" id="recent">
                                <ul>
                                    @foreach($newsrecents as $newsrecent)
                                        <li class="item-wrap">
                                            <div class="item">
                                                <div class="item-image">
                                                    <a href="details.html"><img src="images/news/front/{{ $news->image2 }}" alt="" class="img-responsive"></a>
                                                </div>
                                                <div class="item-description">
                                                    <div class="item-meta">
                                                        <div class="item-post-date">
                                                                <span>{{ $newsrecent->created_at->diffForHumans() }}</span>
                                                        </div>
                                                        <ul class="list-inline product-social">
                                                            <li><a href="#"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a></li>
                                                            <li><a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="item-title">
                                                        <h3><a href="{{ route('news',$newsrecent->slug) }}"><b>{{ $newsrecent->title }}</b></a></h3>
                                                    </div>
                                                    <div class="item-info">
                                                        <p>{{ $newsrecent->subtitle }}</p>
                                                    </div>
                                                </div><!-- item-description -->
                                            </div><!-- item -->
                                        </li><!-- item-wrap -->
                                    @endforeach
                                </ul>
                                <div class="pager-section">
                                    <ul class="pagination">
                                        <li class="next">{{ $newsrecents->links() }}<a href="#"></a></li>
                                    </ul>
                                </div><!-- pager-section -->
                            </div><!-- tab-pane -->		 --}}
                        </div>
                    </div>
                </div><!-- category-tab-->	
            </div>
        </div>
    </div><!-- category-tab-->
</div><!-- .home-page -->
<div class="container">
</div>
@endsection
