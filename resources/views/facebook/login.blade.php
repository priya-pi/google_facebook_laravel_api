@include('layouts.header')


<div class="container h-100 design">

    <section>
        <div class="d-flex">

            <div class="row">

                <div class="col-md-6">

                </div>

                <div class="col-md-6">

                    <div class="form-login">

                        @if (session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        <form action="" method="post" id="Login_form">
                            @csrf

                            <h2 class="text-center mt-2">Sign In</h2>
                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="email">User name</label>
                                        <span class="error">*</span>
                                        <input type="email" name="email" id="email" class="form-control"
                                            value="{{ old('email') }}" />
                                        @error('email')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 p-2">
                                    <div class="form-outline">
                                        <label class="form-label" for="password">password</label>
                                        <span class="error">*</span>
                                        <input type="password" name="password" id="password" class="form-control"
                                            value="{{ old('password') }}" />
                                        @error('password')
                                            <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="pt-4 pb-4 d-flex justify-content-center">
                                <button class="btn btn-lg btn-dark" name="login" type="submit">Login</button>
                            </div>

                            <div class="pt-3 d-flex justify-content-center">
                                <a href="{{ route('facebookRedirect') }}" class="btn btn-lg btn-primary"><i
                                        class="fa-brands fa-facebook"></i>Continue with Facebook</a>
                            </div>

                            <div class="pt-3 d-flex justify-content-center">
                                <a href="{{ route('googleRedirect') }}" class="btn btn-lg btn-light"><i
                                    class="fab fa-google"></i>continue with Google</a>
                            </div>

                            </div>
                            <p class="text-center text-muted" style="margin-top:100px;">Don't have an account? <a
                                    href="" class="fw-bold text-body"><u>Register here</u></a></p>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
</div>
