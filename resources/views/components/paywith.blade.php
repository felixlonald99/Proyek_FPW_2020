<title>HotelInn</title>
@extends('home')
@section('content')

<div class="tm-top-bar-bg"></div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="/cekpromocode" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <h2>You will be charged Rp
                                @foreach ($datas as $item)
                                    {{$item->total_price}}
                                @endforeach
                            </h2>
                        </div>

                        <div class="col-md-2"></div>
                        @if($use_promo == 0)
                            <div class="col-md-4">
                                <div class="row">
                                    <p>Enter Promo Code Here :</p>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" placeholder="Enter Promo Code..." name="promocode">
                                    </div>
                                    <div class="col-md-3">
                                            <input type="hidden" value="{{$number}}" name="booknum">
                                            <button class="btn btn-secondary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        @endisset()
                    </div>
                </form>

                Choose payment method :
                <br>


                <form action="/paycash" method="post">
                    @csrf
                    <input type="hidden" value="{{$number}}" name="booknum">
                    <button class="btn btn-secondary" style="width:50%">Payment Via Cash</button>
                </form>

                <form action="/checkout/{{$number}}" method="get">
                    <button class="btn btn-secondary" style="width:50%">Payment via MidTrans</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
