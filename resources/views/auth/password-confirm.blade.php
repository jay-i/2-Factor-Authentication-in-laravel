@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-4/12 mt-5 bg-white p-6 rounded-lg">
            <h1 class="mb-4">Confirm your password</h1>
            <form action="{{ url('user/confirm-password') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name">Password</label>
                    <input type="password" name="password" id="" placeholder="Your password" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('password') border-red-500 @enderror" value="">
                
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-3 rounded font-medium w-full">Confirm</button>
                </div>
            </form>
        </div>
    </div>
@endsection