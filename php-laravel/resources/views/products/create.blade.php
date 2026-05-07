@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        Register Produtc
                        {{-- <a href="" class="btn btn-success  float-end">Create</a>
                        <a href="{{ route('product.list') }}" class="btn btn-outline-success float-end me-4">Back</a> --}}

                    </div>
                    <div class="card-body">
                        <form action="{{ route('product.store') }}" method="POST">
                            @csrf
                                <label for="formControlInput" class="form-label">Description</label>
                                <input type="text" name="description" class="form-control" id="formControlInput"
                                    placeholder="PC">
                                <label for="formControlInput" class="form-label">Price</label>
                                <input type="number" name="price" class="form-control" id="formControlInput"
                                    placeholder="10">
                                <br>
                                <button type="submit" class="btn btn-primary">save</button>
                                <a href="{{ route('product.list') }}" class="btn btn-outline-success    ms-4">Cancel</a>
                            {{-- @endcsrf --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
