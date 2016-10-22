@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Products
                    <div class="pull-right">
                        <a href="{{ url('products/create') }}" class="btn btn-primary btn-xs">Create</a>
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse ($products as $key => $product)
                        <tr>
                            <th>{{ $key + 1 }}</th>
                            <th>{{ $product->name }}</th>
                            <th>{{ $product->price }}</th>
                            <th>{{ $product->quantity }}</th>
                            <th>
                                <form id="delete-product" action="{{ url('products/' . $product->id) }}" method="POST" class="form-inline">
                                    <input type="hidden" name="_method" value="delete">
                                    {{ csrf_field() }}
                                    <input type="submit" value="Delete" class="btn btn-danger btn-xs pull-right btn-delete">
                                </form>
                                <a href="{{ url('products/' . $product->id . '/edit') }}" class="btn btn-primary btn-xs pull-right">Edit</a>
                            </th>
                        </tr>
                    @empty
                        @include('partials.table-blank-slate', ['colspan' => 4])
                    @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection