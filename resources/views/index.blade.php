@extends('base')
@section('content')

        <section id="barNav" class="bg-dark text-light p-5 text-center">
            <div class="container border border-white pb-3 rounded-3">
                <div class="p-2">
                    <h1>Latest Event</h1>
                    <container>
                        <form>
                            <div class="row text-center">
                                <div class="col-md mt-2"><input type="text" placeholder="Telephone" name="tel" class="form-control"></div>
                            </div>        
                            <button type="submit" class="mt-2 w-100 btn btn-dark text-light border-white">Chercher</button>
                        </form>
                    </container>
                </div>
            </div>
        </section>
        <section>
            <div class="container">
                <div class="row p-5">
                @if(isset($msgLogOut))
                        
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success</strong> 
                            {{$msgLogOut}}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                          </div> 
                        @endif                      
                </div>
            </div>
        </section>

        @endsection()
