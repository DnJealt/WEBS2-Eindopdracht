@include('head')
<body>
@include('header')

<div class="block">
    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-8">

                {{ FORM::open(array('url' => 'login')) }}
                <h1>Login</h1>
                    {{--show errors--}}
                <p>
                    {{ $errors->first('email') }}
                    {{ $errors->first('password') }}
                </p>
                <p>
                    {{ FORM::label('email', 'Email Address') }}
                    {{ FORM::text('email', Input::old('email'), array('placeholder' => 'email@email.com')) }}
                </p>
                <p>
                    {{ FORM::label('password', 'Pasword') }}
                    {{ FORM::password('password') }}
                </p>
                <p>
                    {{ FORM::submit('Submit') }}
                </p>
                    {{ FORM::close() }}
            </div>
        </div>
    </div>
</div>

@include('footer')

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="/WEBS2-Eindopdracht/public/js/vendor/jquery-1.11.2.min.js"><\/script>')</script>
<script src="/WEBS2-Eindopdracht/public/js/vendor/bootstrap.min.js"></script>
<script src="/WEBS2-Eindopdracht/public/js/main.js"></script>
</body>
</html>