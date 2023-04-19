@extends('base')
@section('content')
<section id="barNav" class="bg-dark text-light p-5 text-center">
    <div class="container border border-white pb-3 rounded-3">
        <div class="p-2">
            <h1>Type Location Management</h1>
            <div class="container">
                <form action="{{route('searchTypeLocation')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-center">
                        <div class="col-md mt-2"><input type="text" placeholder="Stadium" name="stadium" value="@if(isset($values)) {{$values['contry']}} @endif" class="form-control"></div>
                        <div class="col-md mt-2"><input type="text" placeholder="Description" name="description" value="@if(isset($values)) {{$values['adresse']}} @endif" class="form-control"></div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md mt-2"><button type="submit" class="btn bt-dark text-white bg-dark border border-white w-100">Search</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="p-5 text-center">
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a class="breadcrumbHref" href="/">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Type Location Management</li>
        </ol>
    </nav>
</section>
<section>
    <div class="container">
        <a href="FormLocationType" class="btn btn-dark text-white">New Type</a>
        <div class="row text-center">
            <h3>List Of Type Locations</h3>
            @if(session('type'))
                
            <div class="alert @if(session('type')=='error') alert-danger @else alert-success @endif alert-dismissible fade show" role="alert">
                @if(session('type')=='error')
                <strong>Error</strong> 
                @else
                <strong>Success</strong> 
                @endif 
                {{session('message')}}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> 
            @endif 

        </div>
    </div>
</section>
<section class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                                        <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Stadium</th>
                                <th scope="col">Type Location</th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody id="listPays">
                            @foreach($types as $t)
                            <tr>
                                <td></td>
                                <td>{{$t->name}}</td>
                                <td>{{$t->description}}</td>
                                <td>    
                                    <a onclick="javascript:return confirm('Are You Sure that you want to delete this type ?')" href="{{url('deleteTypeLocation/'.$t->id)}}">
                                        <ion-icon  name="trash-outline" class="Icon Icon_delete"></ion-icon>
                                    </a>
                                    <a href="{{url('loadeTypeLocation/'.$t->id)}}">
                                        <ion-icon  name="pencil-outline" class="Icon Icon_update"></ion-icon>
                                    </a>
                                </td>
                            </tr> 

                            @endforeach
                            {{-- 
                            --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>


@endsection
