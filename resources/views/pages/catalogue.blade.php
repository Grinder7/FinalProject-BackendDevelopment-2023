@extends('layouts.app')
@section('title', 'Catalogue - IndoJuni')
@section('content')
    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Katalog</h1>
                <p class="lead text-body-secondary">Temukan berbagai produk berkualitas dengan harga terjangkau di toko kami.
                    Kami berkomitmen untuk memberikan nilai tambah kepada pelanggan dengan penawaran spesial dan diskon
                    menarik setiap minggunya.
                </p>

            </div>
        </div>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card shadow-sm">
                            @if ($product->img)
                                <img src="{{ asset($product->img) }}" alt="cover" height="225"
                                    style="object-fit: contain">
                            @else
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="225"
                                    xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail"
                                    preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%"
                                        fill="#eceeef" dy=".3em">Image</text>
                                </svg>
                            @endif
                            <div class="card-body">
                                <p class="card-text">{{ $product->name }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-body-secondary">Rp
                                        {{ number_format($product->price, 2, ',', '.') }}</small>
                                    <form action="{{ route('cart.store') }}" method="post">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-outline-secondary"
                                            value="{{ $product->id }}" name="product_id"><i
                                                class="fa-solid fa-plus"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row p-3">
                <div class="col">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>

    </main>
@endsection
@section('scripts')
@endsection
