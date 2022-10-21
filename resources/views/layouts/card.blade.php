<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="https://img.freepik.com/free-psd/premium-mobile-phone-screen-mockup-template_53876-81688.jpg?w=2000" alt="iPhone X 64GB">
        <div class="caption">
            <h3>{{ $product->name }}</h3>
            <p>{{ $product->price }} руб.</p>
            <p>
                <form action="{{ route('basket-add', $product) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary" role="button">В корзину</button>
                    <a href="{{ route('product', [$product->category->code, $product->code]) }}" class="btn btn-default"
                    role="button">Подробнее</a>
                </form>
            </p>
        </div>
    </div>
</div>
