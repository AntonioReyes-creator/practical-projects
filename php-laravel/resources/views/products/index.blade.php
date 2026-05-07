@extends('layouts.app')

@section('title', 'Product')

@section('content')
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header ">
                        List Produtc
                        <a href="{{ route('product.name') }}" class="btn btn-success  float-end">New</a>

                    </div>
                    <div class="card-body">
                        @if (session('info'))
                            <div class="alert alert-success">{{ session('info') }}</div>
                        @endif
                        <table class="table  ">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">price</th>
                                    <th scope="col">Create_at</th>
                                    <th scope="col">Update_at</th>
                                    <th scope="col">#</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ $product->created_at }}</td>
                                        <td>{{ $product->updated_at }}</td>
                                        <td class="d-flex gap-2">
                                            <a href="{{ route('product.edit', $product->id) }}" class="btn btn-warning">
                                                Edit
                                            </a>
                                            <form action="{{ route('product.destroy', $product->id) }}" method="POST"
                                                onsubmit="return confirm('¿Seguro que deseas eliminar este producto?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </td>
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
