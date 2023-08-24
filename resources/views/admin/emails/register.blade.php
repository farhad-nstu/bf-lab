<!doctype html>
<html lang="en">
<body class="text-center">
    <main class="form-signin">
        Dear {{ $data->name }},
        <pre></pre>
        You are registerd for this demo project. 
        <pre></pre>
        You can login from 
        <a style="color: green;" href="{{ route('login.perform') }}">here</a> with username/email: {{ $data->username }} and password: password.
        <pre></pre>
        <pre></pre>
        {!! 'Regards <br> Mohammad Farhad <br> <b>Demo project</b>.' !!}
    </main>
</body>
</html>
