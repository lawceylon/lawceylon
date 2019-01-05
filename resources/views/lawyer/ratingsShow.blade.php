@extends('main.app')
@section('headSection')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">          
                <div class="panel-body">
                    <form action="{{ route('ratings.rate') }}" method="POST">
                    {{ csrf_field() }}
                        <div class="container-fliud">
                            <div class=" row">
                                <div class="col-md-6">
                                    <h3> Lawyer Rating</h3>
                                    <div class="rating">
                                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $lawyer->userAverageRating }}" data-size="xs">
                                        <input type="hidden" name="id" required="" value="{{ $lawyer->id }}">
                                        <span class="review-no">{{$ratings}} Rates</span>
                                        <br>
                                        <button class="btn btn-success">Submit Rate</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
