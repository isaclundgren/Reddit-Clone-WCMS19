@extends('layouts.app')

@section('content')

<div class="container">
    {{-- <form action="{{ route('update', $post->id) }}" method="POST"> --}}
        <form action="{{action('PostController@update', $id)}}" method="POST">
        @csrf
        @method('PUT')
        <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input value="{{ $post->title }}" name="title" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Title">
        </div>
        
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Content</label>
        <textarea value="{{ $post->content }}" name="content" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$post->content}}</textarea>
        </div>

        <button type="submit" class="btn btn-dark">Submit</button>
    </form>
</div>
    
@endsection

{{-- @extends('layouts.app')

@section('content')
    <div class="row" style="margin-bottom: 20px;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h3>Edit Product</h3>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.update',$product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" value="{{ $product->price }}" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Detail:</strong>
                    <textarea class="form-control" style="height:150px" name="detail">{{ $product->detail }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </div>

    </form>
@endsection --}}