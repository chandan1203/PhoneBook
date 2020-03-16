@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header"><a href="{{ route('create') }}">Add Contact</a>

                <div class="float-right">

                     <form method="GET" action="{{ route('search') }}" class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="query">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                  
                </div>
                </div>

                <div class="card-body">
                 {{--    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
 --}}
                <table class="table table-striped">
                          <thead>
                            <tr>
                              <th scope="col">ID</th>
                              <th scope="col">Name</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Email</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $i=0 ?>
                            @foreach ($contacts as $contact)
                            <?php $i++; ?>
                            <tr>
                              <th scope="row"><?php echo $i ;?></th>
                              <td>{{ $contact->name }}</td>
                              <td>{{ $contact->phone }}</td>
                              <td>{{ $contact->email }}</td>
                              <td><a class="btn btn-info btn-sm" href="{{ route('edit',$contact->id) }}"><i class="fa fa-edit"></i></a>
                                <form id="delete-{{$contact->id}}" action="{{ route('delete',$contact->id) }}" method="post" style="display: none">
                                  @csrf
                                </form>

                              <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('Are you sure to delete this?'))
                              {
                                event.preventDefault();
                                document.getElementById('delete-{{$contact->id}}').submit();
                              }else{
                                event.preventDefault();
                              }"><i class="fa fa-trash"></i></button>
                              <a class="btn btn-secondary btn-sm" href="{{ route('MakePdf',$contact->id) }}">PDF</a>
                            </tr>
                            @endforeach
                          </tbody>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
