<main>
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    @if($Status==="OK")
                        <h2>با تشکر از خرید شما </h2>
                        <h2 class="text-success">پرداخت شما موفقیت آمیز بود </h2>
                    @else
                        <h2>مشکلی پیش آمد!</h2>
                        <h3 class="text-danger">پرداخت شما ناموفق بود</h3>
                    @endif
                        <!-- info -->
                        <h4 class="mb-4">شماره پیگیری شما {{$order->order_code}} می باشد</h4>
                        <a href="{{route('home')}}" class="btn btn-primary mb-0">برگشت به صفحه اصلی</a>
                </div>
            </div>
        </div>
    </section>
</main>
