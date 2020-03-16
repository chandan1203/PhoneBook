@extends('layouts.app')

@section('content')
<div class="container">
  @if ($errors->any())
    <div class="row">
      <div class="col-md-6">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        </div>
    </div>
@endif
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Contact</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('update',$contact->id) }}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control" id="name" aria-describedby="name" value="{{ $contact->name}}" name="name">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="text" class="form-control" id="phone_number" value="{{ $contact->phone}}" name="phone">
                      </div>

                      <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="email" value="{{ $contact->email}}" name="email">
                      </div>
                      <button type="submit" class="btn btn-primary">Update</button>
                      <a href="{{url()->previous()}}" class="btn btn-danger">Cancel</a>
                      {{-- <button type="reset" formaction="{{ route('home') }}" class="btn btn-danger btn-close">Cancel</button> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
