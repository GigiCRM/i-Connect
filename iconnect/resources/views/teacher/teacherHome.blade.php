@extends('layouts.teacherNav')

@section('content')


<body>
     <!-- Carousel -->
     <div class="container">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                <div class="item active">
                    <img src="{{ asset('img/carousel-1.jpg') }}" alt="Los Angeles" style="width:100%; height: 800px;">
                </div>

                <div class="item">
                    <img src="{{ asset('img/carousel-2.jpg') }}" alt="Chicago" style="width:100%; height: 800px;">
                </div>
                
                <div class="item">
                    <img src="{{ asset('img/carousel-3.jpg') }}" alt="New york" style="width:100%;height: 800px;">
                </div>
                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        
        <!--Notice Board -->
        <div class="col-5" >
            <div class="notice" > 
                <h3>Notice board</h5>
                <p>For student who need to start your intern in semester B 2021,Please enroll the industrial training before 24 May 2021.</p>
            </div>   
        </div>

        <!--Small Col -->
        <div class="row">
            <div class="container">
                <div class="col-md-3">
                    <img src="{{ asset('img/partner.jpg') }}" alt="Partner" width="200px" height="250px">
                    <div class="content"><a href="{{ route('teacher.showCompanyList') }}">Company</a></div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/full-time.jpg') }}" alt="Full-time" width="200px" height="250px">
                    <div class="content"><a href="{{ route('teacher.showFullTime') }}"> Full-time</a></div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/part-time.jpg') }}" alt="Part-time" width="200px" height="250px">
                    <div class="content"><a href="{{ route('teacher.showPartTime') }}">Part-time</a> </div>
                </div>
                <div class="col-md-3">
                    <img src="{{ asset('img/suc.jpg') }}" alt="SUC" width="200px" height="250px">
                    <div class="content"><a href="https://www.southern.edu.my/home.html"> Southern Website</a></div>
                </div>
            </div>
        </div>
           
</body>


@endsection