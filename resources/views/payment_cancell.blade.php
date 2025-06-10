@extends('template.layout.app')
@section('css')
    <style>
        a.paymentbtngems {
            text-decoration: none;
            color: #FFF;
            font-size: 14px;
            font-weight: 600;
            background: #5f42a9;
            padding: 10px 40px;
            border-radius: 10px;
        }

        .canceldiv {
            padding-top: 60px;
        }

        .custom-center-box {
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }

        .alert.alert-cancel {
            background: #e97a7a;
            color: #FFF;
        }

        .lead {
            font-size: 17px;
            font-weight: 300;
        }
    </style>
@endsection
@section('content')
    <div class="canceldiv">
        <div class="container text-center mt-5">
            <div class="custom-center-box">
                <div class="alert alert-cancel">
                    <h3 class="mb-3"> ❌ Payment Cancelled</h2>
                        <p class="lead">Your payment was not completed. If this was a mistake, please try again.</p>
                </div>
                <a href="{{ route('associategems') }}" class="paymentbtngems mt-4">Back to Gems Page</a>
            </div>
        </div>
    </div>
@endsection
