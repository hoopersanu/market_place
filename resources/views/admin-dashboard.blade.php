@extends('admin-master')

@section('content')

<div class="container pt-5">
    <div class="row">
        <div class="col-xl-6">
            @if(Session::has("success"))
                <div class='alert alert-success'>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{Session::get("success")}}
                </div>
            @elseif(Session::has("failed"))
            <div class='alert alert-danger'>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{Session::get("failed")}}
            </div>

            @endif
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <th> Offer Id </th>
            <th> Name </th>
            <th> Description </th>
            <th> Image </th>
            <th> Action </th>
        </thead>

        <tbody>
            @foreach($offers as $offer)

            @php $status = $offer->status; @endphp
            <tr>
                <td> {{$offer->id }} </td>
                <td> {{$offer->title }} </td>
                <td> {{$offer->description}}  </td>
                <td> <img src="{{url('uploads').'/'. $offer->photo}}" </td>
                <td>  @if($status == 1)
                    <a href="{{url('offer-action',[$offer->id,0])}}" class="btn btn-danger btn-sm"> Disable </a>

                    @elseif($status == 0 )
                        <a href="{{url('offer-action',[$offer->id,1])}}" class="btn btn-success btn-sm"> Enable </a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection


