@extends('base')
@section('content')
<section id="barNav" class="bg-dark text-light p-5 text-center">
    <div class="container border border-white pb-3 rounded-3">
        <div class="p-2">
            <h1>Stadium Management</h1>
            <div class="container">
                <form action="{{route('searchStad')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row text-center">
                        <div class="col-md mt-2"><input type="text" placeholder="Barcode" name="barcode" value="@if(isset($values)) {{$values['barcode']}} @endif"  class="form-control"></div>
                        <div class="col-md mt-2"><input type="text" placeholder="Name" name="name" value="@if(isset($values)) {{$values['name']}} @endif"  class="form-control"></div>
                        <div class="col-md mt-2"><input type="text" placeholder="City" name="city" value="@if(isset($values)) {{$values['city']}} @endif" class="form-control"></div>
                    </div>
                    <div class="row text-center">
                        <div class="col-md mt-2"><input type="text" placeholder="Contry" name="contry" value="@if(isset($values)) {{$values['contry']}} @endif" class="form-control"></div>
                        <div class="col-md mt-2"><input type="text" placeholder="Adresse" name="adresse" value="@if(isset($values)) {{$values['adresse']}} @endif" class="form-control"></div>
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
                <li class="breadcrumb-item active" aria-current="page">Stadium Management</li>
            </ol>
        </nav>
</section>
<section>
    <div class="container">
        <a href="FormStaduim" class="btn btn-dark text-white">New Stadium</a>
        <div class="row text-center">
            <h3>List Of Staduims</h3>
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

            @foreach($Stadiums as $s)
            <div class="col-md-6 col-lg-4 mb-4">
        <div class="card">
            <img src="{{asset($s->image) }} " alt="" class="card-img-top img-main img-fluid">
            <div class="card-body">
                <h3>
                    {{$s->name}}

                </h3>
<hr>
<div class="card-text text-start d-flex">
    <div class="row py-2 p-3">
        <div class="fw-bolder">Barcode</div>
        <div class="fw-normal">{{$s->barcode}}</div>
    </div>
    <div class="row py-2 p-3">
        <div class="fw-bolder">City</div>
        <div class="fw-normal">{{$s->city}}</div>
    </div>

</div>
<div class="card-text text-start d-flex">
    <div class="row py-2 p-3">
        <div class="fw-bolder">Adresse</div>
        <div class="fw-normal">{{$s->adresse}}</div>
    </div>
    <div class="row py-2 p-3">
        <div class="fw-bolder">Contry</div>
        <div class="fw-normal">{{$s->contry}}</div>
    </div>

</div>
<div class="card-text text-start d-flex">

    <a onclick="javascript:return confirm('Are you sure that you that want to delete this staduim ?')" href="{{url('deleteStadium/'.$s->id)}}">
        <ion-icon  name="trash-outline" class="Icon Icon_delete m-2"></ion-icon>
    </a>
    <a  href="{{url('loadStadium/'.$s->id)}}">
    <ion-icon  name="pencil-outline" class="Icon Icon_update m-2"></ion-icon>
</a>
    
    <ion-icon  name="information-circle-outline" class="Icon Icon_details m-2"></ion-icon>
            </div>
        </div>
        </div>  

    </div>
        @endforeach
            {{-- <div class="mt-6 p-4">
                {{$Stadiums->links()}}
            </div> --}}
            <div class="mt-6 p-4">
                @if($Stadiums instanceof \Illuminate\Pagination\LengthAwarePaginator)
                {{ $Stadiums->links() }}
                @endif
           </div>
        </div>
    </div>
</section>
@endsection()
