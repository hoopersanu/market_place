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

        <!--bootstrap card with 3 horizontal images-->
        <div class="row">
            @foreach ($offers as $offer)
            <div class="card col-md-4">
                <img class="card-img-top" src="https://media.geeksforgeeks.org/wp-content/cdn-uploads/20190710102234/download3.png">

                <div class="card-body">
                    <h3 class="card-title">{{$offer->title}}</h3>
                    <p class="card-text">{{$offer->description}}</p>


                </div>
            </div>
            @endforeach
        </div>
    </div>

</div>
</body>
