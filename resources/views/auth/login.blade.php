{{-- https://www.tutsmake.com/laravel-6-custom-login-registration-example-tutorial/ --}}
<!DOCTYPE html>
<html>
<head>
    <title>SI-ASET</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/login.css">

</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                        <img src="{{ url('/storage'.'/'.\App\Models\Resources\Konfigurasi\Konfigurasi::first()->logo.'.png') }}"><br><br><br>
                            <h4 class="login-heading mb-4" style="text-align:center;">Login</h4>
                            <form action="{{route('login')}}" method="POST" id="logForm">

                                {{ csrf_field() }}

                                <div class="form-label-group">
                                    <input type="text" name="email" id="inputEmail" class="form-control @error('barang_id') is-invalid @enderror" placeholder="Email" >
                                    <label for="inputEmail">Email @error('email') <i>{{ $message }} @enderror</i></label>
                                </div>

                                <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                    <label for="inputPassword">Password @error('password') <i>{{ $message }} @enderror</i></label>
                                </div>

                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit" style="margin-top: 14px">Sign In</button>
                            </form>
                            <br>
                            <center>
                            <a href="{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->instagram }}" style="color: black" class="fa fa-instagram"></a>&emsp;
                            <a href="{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->facebook }}" style="color: black" class="fa fa-facebook"></a>&emsp;
                            <a href="{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->website }}" style="color: black" class="fa fa-globe"></a>&emsp;
                            <a href="mailto:{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->email }}" style="color: black" class="fa fa-envelope"></a>&emsp;
                            <br><br>
                            <h4 style="font-family:Arial">{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->deskripsi }}</h4>
                            </center>
                        </div>
                    </div><br><br><br><br>
                    <center>
                    <p>{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->alamat }} </p>
                    <b>{{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->telepon }} | {{ App\Models\Resources\Konfigurasi\Konfigurasi::first()->email }}</b>
                    </center>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
