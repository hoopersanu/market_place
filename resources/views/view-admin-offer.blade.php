<html>
    <head>
	<title> Dashboard </title>
    @include("header")
    @include("dashboard")
    </head>
<body>
{{-- ------------------ --}}
<div class="container">
    <div class="card-group">
        <div class="row">
            @foreach ($offers as $offer)
            <div class="card col-md-4">
                <img class="card-img-top" src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190710102234/download3.png">
                <div class="card-body">
                    <h3 class="card-title">{{$offer->title}}</h3>
                    <p class="card-text">{{$offer->description}}</p>
                    @if ($offer->is_active == 1)
                    <a href="{{url('change-staus', $offer->id)}}" class="btn btn-success">Enable</a>
                    @else
                    <a href="{{url('change-staus', $offer->id)}}" class="btn btn-warning">Disable</a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
</body>
