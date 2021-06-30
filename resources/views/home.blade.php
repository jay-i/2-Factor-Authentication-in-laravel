@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 bg-white mt-5 p-6 rounded-lg">
            <div class="box-content p-4">
                @if(! auth()->user()->two_factor_secret)
                    You have not enabled 2fa
                    <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-4/12">Enable</button>
                    </form>
                @else 
                    You have 2fa enabled 
                    <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-4/12">Disable</button>
                    </form>
                @endif

                {{-- <form action="{{ url('user/two-factor-authentication') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-4/12">Enabled</button>
                </form> --}}

                @if(session('status') == 'two-factor-authentication-enabled')
                    You have now enabled 2fa, please scan the following QR code into your phone's authenticator application.
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}

                    <p>Please store these recovery codes in a secure location. </p> 
                    @foreach(json_decode(decrypt(auth()->user()->two_factor_recovery_codes, true)) as $code)
                        {{ trim($code) }} <br> 
                    @endforeach
                @endif
              </div>
        </div>
    </div>
@endsection