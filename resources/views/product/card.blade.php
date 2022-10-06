@extends('layouts.app')
@section('content')
    <div class="row">
        @foreach ($viewData['products'] as $product)
            <div class="col-md-4 col-lg-3 mb-2">
                <div class="card">
                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}">
                        <img src="{{ asset('/img/products/' . $product->getImage()) }}" class="card-img-top img-card">
                    </a>
                    <div class="card-body text-center">
                        <a href="{{ route('product.show', ['id' => $product->getId()]) }}"><strong>{{ $product->getName() }}</strong>
                        </a>
                        <p></p>
                        <a>
                            @if ($product->getPrice() == 0)
                                <span><strong class="text-danger">Gratis</strong></span>
                            @elseif ($product->getDiscountedprice() > 0)
                                <strong class="text-danger text-decoration-line-through">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                                <strong class="text-danger">
                                    <x-money class="text-decoration-line-through"
                                        amount="{{ $product->getPrice() - $product->getDiscountedprice() }}" currency="MXN"
                                        convert />
                                </strong>
                            @else
                                <strong class="text-danger">
                                    <x-money class="text-decoration-line-through" amount="{{ $product->getPrice() }}"
                                        currency="MXN" convert />
                                </strong>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



@endsection
