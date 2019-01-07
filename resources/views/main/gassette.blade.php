@extends('main.app')
@section('title','Lawceylon gassette download page')
@section('headSection')
@endsection
@section('content')

    <div class="home-page">
        <div id="avt-category" class="clearfix">
            <div class="row">
                @foreach ($gassettes as $gassette)
                    <div class="col-sm-6 col-md-3">
                        <div class="category-avt">
                            <div class="category-icon">
                                <a href="#"><img src="images/icon/7.png" alt="images" class="img-responsive"><span class="glyphicon glyphicon-download-alt">Download Here</span></a>
                            </div>
                            {{-- <embed src="/gassettes/GazetteS19-01-04.pdf" width="250px" height="250px" /> --}}
                            {{-- <h5><a href="/gassettes/GazetteS19-01-04.pdf" download></a></h5> --}}
                            <ul>
                                <li>{{ $gassette->name }}</li>
                                <li>{{ $gassette->subject }}</li>
                                <li><a class="btn btn-info" href="{{ route('gassetteView',$gassette->id) }}">View Here</a></li>
                            </ul>
                        </div><!-- category-avt -->	
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection