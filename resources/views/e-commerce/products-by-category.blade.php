@extends('layout.e-commerce')

@section('title','Product by category')
@section('content')
<div class="accordion" id="categoryAccordion">
    @foreach ($categories as $index => $c)
    <div class="card">
        <div class="card-header" id="heading{{ $index }}">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                    {{ $c->name }}
                </button>
            </h2>
        </div>

        <div id="collapse{{ $index }}" class="collapse" aria-labelledby="heading{{ $index }}" data-parent="#categoryAccordion">
            <div class="card-body">
                <div class="row justify-content-center">
                    @foreach ($c->products as $p)
                    <div class="col-md-4">
                        <div class="product">
                            <h3>{{ $p->name }}</h3>
                            <p>Precio: ${{ $p->original_price }}</p>
                            <img src="{{ asset('img') }}/{{ $p->image }}" alt="{{ $p->name }}" class="img-fluid">
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

@endsection