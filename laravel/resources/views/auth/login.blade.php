<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('log/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('template/css/bootstrap.css')}}" />
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh">
        <div class="  row content ">
        <div class="col-md-12">
            <h3 class="signin-text mb-3"> Sign In</h3>
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control">
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-secondary hover:text-success" href="/register">
                    {{ ('Register') }}
                </a><br>
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-secondary hover:text-success" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="row">
                <button class="btn btn-class w-100 mt-3">Login</button>
            </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>