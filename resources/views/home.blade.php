@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ( auth()->user()->is_admin == true)
                     <p>Welcome Admin - {{auth()->user()->name}}</p>
                     @else
                     <p>Welcome User - {{auth()->user()->name}}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
