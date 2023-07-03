@include('layouts.header')

@auth
    <h4>welcome : <span> {{ Auth::user()->name }} </span></h4>

    <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>


@endauth

<script>

    $(window).on('load', function(e) {
        if (window.location.hash == '#_=_') {
            window.location.hash = ''; // for older browsers, leaves a # behind
            history.pushState('', document.title, window.location.pathname); // nice and clean
            e.preventDefault(); // no page reload
        }
    })

    FB.init({
        appId: '{your-app-id}',
        cookie: true,
        xfbml: true,
        version: 'v2.12'
    });

    function logoutFromFacebookAndRedirect(redirectUrl) {

        FB.getLoginStatus(function (response) {
            if (response.status == 'connected')
                FB.logout(function (response) {
                    window.location.href = redirectUrl;
                });
            else
                window.location.href = redirectUrl;
        });
    }
</script>
