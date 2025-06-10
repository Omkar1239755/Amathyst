@extends('webtemplate.layouts.layout')
@section('css')
    <style>
     section.faq-index {
            padding-top: 50px;
        }

        .faqcardd {
            height: 150px;
            margin-bottom: 20px;
            overflow: hidden;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 1px 7px rgba(0, 0, 0, 0.1);
            display: flex;
            flex-direction: column;
        }

        .titlefaq {
            height: 100%;
            overflow-y: auto;
            padding: 15px 10px;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
        }


        .titlefaq::-webkit-scrollbar {
            width: 6px;
        }

        .titlefaq::-webkit-scrollbar-thumb {
            background-color: #ccc;
            border-radius: 4px;
        }

        .faqheading h3 {
            font-size: 30px;
            font-weight: 600;
            font-family: 'Poppins';
            padding-bottom: 20px;
            color: #5e35bb;
        }

        .titlefaq h5 {
            font-size: 21px;
            font-weight: 500;
            font-family: 'Poppins';
            color: #5e35bb;
        }

        .titlefaq p {
            font-size: 14px;
            font-family: 'Poppins';
            font-weight: 300;
            text-align: justify;
            color: #221e2c;
        }
    </style>
@endsection
@section('content')
    <section class="faq-index">
        <div class="text-center faqheading">
            <h3>Frequently Asked Questions</h3>
        </div>
        <div class="container">
            <div class="row same-height-faq">
                @foreach($faqs as $faq)
                <div class="col-md-6 ">
                       <div class="faqcardd">
                        <div class="titlefaq">
                            <h5>{{$faq->title}}</h5>
                            <p>{{$faq->description}}</p>
                        </div>

                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
