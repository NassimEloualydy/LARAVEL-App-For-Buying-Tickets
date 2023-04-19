@extends('base')
@section('content')
<section id="barNav" class="bg-dark text-light p-5 text-center">
    <div class="container border border-white pb-3 rounded-3">
        <div class="p-2">
            <h1>Location Form</h1>
        </div>
    </div>
</section>
<section class="p-5 text-center">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="breadcrumbHref" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="breadcrumbHref" href="/location">location Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Location</li>
            </ol>
        </nav>
</section>
<section class="m-3">
    <div class="container">
        <div class="row">
           <div class="card col-md-6 mx-auto">
            <div class="card-body">
                <div class="card-title">
                <h3>
                    Form 
                </h3>
                @if(isset($type))                
                <div class="alert @if($type=='error') alert-danger @else alert-success @endif alert-dismissible fade show" role="alert">
                    @if($type=='error')
                    <strong>Error</strong> 
                    @else
                    <strong>Success</strong> 
                    @endif 
                    {{$message}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div> 
                @endif 
                </div>
                <form action="{{route('submitLocation')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Image</label>
                        @if(isset($values) && isset($values['id']))
                        <input type="file" name="image" class="form-control">
                        @else
                        <input type="file" name="image"  required class="form-control">
                        @endif
                    </div>                    
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Name</label>
                        <input type="text" name="name" required value="@if(isset($values)) {{$values['name_location']}} @endif" class="form-control">
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Staduim</label>
                        <select name="stadium_id" id="TypeOfStudiumLocations" onchange="getTypeOfStudiumLocations()" required  class="form-control">
                         <option value="">Choose A Staduim</option>
                         @foreach($Staduims as $s)
                          <option @if(isset($values) && $s->id==$values['stadium_id']) selected @endif  value="{{$s->id}}">{{$s->name}}</option>
                         @endforeach
                        </select>
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Type</label>
                        <select name="type" id="type_of_location" required  class="form-control">
                         <option  value="">Choose A Type</option>
                        </select>
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Side Location</label>
                        <select name="side_location" required  class="form-control">
                         <option value="">Choose A Side</option>
                         <option @if(isset($values) && $values['side_location']=="left") selected @endif value="left">left</option>
                         <option @if(isset($values) && $values['side_location']=="right") selected @endif value="right">right</option>
                        </select>
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Maximum Places</label>
                        <input type="text" name="nbr_place_max" required value="@if(isset($values)) {{$values['nbr_place_max']}} @endif" class="form-control">
                    </div>

                    <div class="row col-md mt-2">
                        <button type="submit" class="btn btn-dark text-white">
                            @if(isset($values) && isset($values['id']))
                            Update
                            @else
                            Submit
                            @endif
                        </button>
                    </div>

                </form>
            </div>
           </div>
        </div>
    </div>
</section>
@endsection
