@extends('template.layout.app')
@section('css')
    <style>
        a.paymentbtn {
            text-decoration: none;
            color: #FFF;
            font-size: 14px;
            font-weight: 600;
            background: #5f42a9;
            padding: 10px 40px;
            border-radius: 10px;
        }

        .succeesdiv {
            padding-top: 60px;
        }

        .custom-center-box {
            max-width: 900px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
@endsection
@section('content')
    <div class="succeesdiv">
        <div class="container text-center mt-5">
            <div class="custom-center-box">
                <div class="alert alert-success">
                    <h2 class="mb-3">🎉 Payment Successful!</h2>
                    <p class="lead">Thank you! Your payment was processed successfully.</p>
                    <p>Your gems will be added to your account shortly.</p>
                </div>
                <a href="{{ route('associategems') }}" class="paymentbtn mt-4">Go to Dashboard</a>
            </div>
        </div>
    </div>
@endsection
