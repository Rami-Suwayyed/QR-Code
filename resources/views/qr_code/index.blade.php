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

                        <div class="row">
                            <div class="col-12">

                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered text-center" id="sampleTable">
                                        <thead>
                                        <tr>
                                            <th>{{__("ID")}}</th>
                                            <th>{{__("Name")}}</th>
                                            <th>{{__("Type")}}</th>
                                            <th>{{__("Image")}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($QrCodes as $QrCode)
                                            <tr>
                                                <td>{{$QrCode->id}}</td>
                                                <td>{{$QrCode->name}}</td>
                                                <td>{{$QrCode->type}}</td>
                                                <td>
                                                    <img src="{{ asset($QrCode->path . $QrCode->qr_name) }}" alt="{{ session('code') }}" style="width: 100px;"  class="img-fluid">
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
