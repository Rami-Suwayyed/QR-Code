@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex">
                        {{ __('QR Builder') }}
                        <div class="ml-auto">
{{--                            <a href="{{ route('index') }}">QR Index</a> ---}}
                            <a href="{{ route('qr_builder') }}">QR Advanced</a> -
                            <a href="{{ route('qr_simple') }}">QR Simple</a> -
                            <a href="{{ route('qr_phone') }}">Phone</a> -
                            <a href="{{ route('qr_email') }}">Email</a> -
                            <a href="{{ route('qr_geo') }}">GEO</a> -
                            <a href="{{ route('qr_sms') }}">SMS</a>
                        </div>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="text-center">

                            {!! QrCode::SMS('962781860702') !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
