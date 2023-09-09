@extends('layout.app')
@section('content')
    <div class="container-fluid page-header py-5 mb-0 wow fadeIn" data-wow-delay="0.1s"
        style="visibility: visible; animation-delay: 0.1s; animation-name: fadeIn;">
        <div class="container position-relative text-center py-4" style="padding-top:7rem!important">
            <div style="position: absolute; bottom: 0; left: 12px; text-align: left;">
                <h4 class="display-6 text-white slideInDown mb-2">{{$content->menu->name??null}}</h4>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb justify-content-start mb-0">
                        <li class="breadcrumb-item">
                            <a class="text-white" href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">
                            {{$content->menu->name??null}}
                        </li>
                        <li class="breadcrumb-item text-primary active" aria-current="page">
                            {{$content->sub_category->name??null}}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="h-100">
                        <div class="title-heading-icon ps-0 mb-5">
                            <span><img src="{{asset('icons/history.png')}}" alt="" width="40"></span>
                            <div>
                                <h6 class="text-body text-uppercase mb-1">{{$content->menu->name??null}}</h6>
                                <h1 class="display-6 mb-0">
                                    Army Public School, Narangi
                                </h1>
                            </div>
                            {{-- <br/> --}}
                        </div>
                        @if ($content != null)
                            <p style="text-align:justify;">
                                {!!$content->content!!}
                            </p>

                        @else
                            <p class="mb-4" style="text-align:justify;">
                                PAGE UNDER CONSTRUCTION </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
