@extends('base')
@section('content')
<section id="barNav" class="bg-dark text-light p-5 text-center">
    <div class="container border border-white pb-3 rounded-3">
        <div class="p-2">
            <h1>Stadium Form</h1>
        </div>
    </div>
</section>
<section class="p-5 text-center">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a class="breadcrumbHref" href="/">Home</a></li>
                <li class="breadcrumb-item"><a class="breadcrumbHref" href="/Stadium">Stadium Management</a></li>
                <li class="breadcrumb-item active" aria-current="page">Add Stadium</li>
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
                <form action="{{route('addStaduim')}}" method="POST" enctype="multipart/form-data">
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
                        <label for="" class="form-label">Barcode</label>
                        <input type="text" name="barcode"  required value="@if(isset($values)) {{$values['barcode']}} @endif" class="form-control @error('barcode') border border-danger @enderror">
                    </div>

                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Name</label>
                        @if(isset($values) && isset($values['id']))
                        <input type="hidden" name="id" value="@if(isset($values)) {{$values['id']}} @endif"/>
                        @endif
                        <input type="text" name="name"value="@if(isset($values)) {{$values['name']}} @endif"  required value="" class="form-control">
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Contry</label>
                        <input type="text" name="contry" required value="@if(isset($values)) {{$values['contry']}} @endif" class="form-control">
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">City</label>
                        <input type="text" name="city" required value="@if(isset($values)) {{$values['city']}} @endif" class="form-control">
                    </div>
                    <div class="row col-md mt-2">
                        <label for="" class="form-label">Adresse</label>
                        <input type="text" name="adresse" required value="@if(isset($values)) {{$values['adresse']}} @endif" class="form-control">
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
