
@extends('dashboard')
@section("content")


    <div class="container ">

  <h1 class="text-center">Add New Offers</h1>

  <div class="row">
    <div class="col-xl-6 col-lg-6">
        @if(Session::has('success'))
            <div class='alert alert-success alert-dismissible'>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get("success")}}
            </div>

        @elseif(Session::has('failed'))
            <div class='alert alert-danger alert-dismissible'>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get("failed")}}
            </div>

        @endif
    </div>
</div>

    <form class="form-horizontal  action" action="{{url('save-offer')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
  <label class="control-label col-sm-2" for="category">Category:</label>

    <div class="col-sm-6">
        <select class="form-control input-color" name="category" id="category">
            <option value="select">Select Fruit</option>
            <option value="apple">Apple</option>
            <option value="mango">Mango</option>
            <option value="papaya">Papaya</option>
            <option value="orange">Orange</option>
        </select>
    </div>

    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="title">Title:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control input-color" id="title" placeholder="Enter Title" name="title">
        {!! $errors->first('title', '<small class="text-white">:message</small>')!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="description">Description:</label>
      <div class="col-sm-6">
        <input type="text" class="form-control input-color" id="description" placeholder="Describe your product" name="description">
        {!! $errors->first('description', '<small class="text-white">:message</small>')!!}
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="photo">Photo:</label>
      <div class="col-sm-6">
        <input type="file" class="form-control input-color" id="photo" placeholder="Choose image" name="photo">
        {!! $errors->first('photo', '<small class="text-white">:message</small>')!!}
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-primary">Publish Offer</button>
      </div>
    </div>

  </form>
</div>


@endsection
