<!DOCTYPE html>
<html>
    <head>
        <title>Crispino</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="_token" content="{{ app('Illuminate\Encryption\Encrypter')->encrypt(csrf_token()) }}" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script type="text/javascript">
            $(function () {
                $.ajaxSetup({
                    headers: {
                        'X-XSRF-Token': $('meta[name="_token"]').attr('content')
                    }
                });
            });
        </script>
        <!-- Bootstrap -->
        <link href="{{asset('assets/site/css/bootstrap.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/css/fileinput.min.css')}}" rel="stylesheet">
        <link href="{{asset('assets/site/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,800,300' rel='stylesheet' type='text/css'>
        @yield('styles')
        <link href="{{asset('assets/site/css/style.css')}}" rel="stylesheet">
    </head>
    <body>
        @include('templates/partials/nav')
        <div class="container">
            @include('templates/partials/notification')
            @yield('content')
        </div>
        @section('scripts')
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        
        
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/0.3.2/marked.min.js"></script>-->    
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('assets/site/js/fileinput.min.js')}}"></script>        

        @show
    </body>
</html>
