<html>
    <head></head>
    <body>
        <img src="/images/logo.png" height="50px" width="150px">
        <p>Welcome to</p>
        <p>Dear {{ $name }} complete your registration by verifing your email</p>
        <p>follow link below to verify your email </p>

        @if(isset($link))
            <p> Click <a href="{{ $link }}">here</a> if the above link is not working</p>
        @endif
        <p>or copy and paste this link {{ $link }} to your browser</p>
    </body>
</html>
