@include('website.includes.header')

<section style="margin-top: 20px">
    <div class="container">
        <div class="row justify-content-sm-center">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                <div class="card shadow-lg">
                    <div class="card-body p-5">
                        <h1 class="fs-4 card-title fw-bold mb-4">Register</h1>

                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="name">Name</label>
                                <input id="name" type="text" class="form-control"
                                    name="name"value="{{ old('name') }}" required autofocus autocomplete="name">
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="email">E-Mail</label>
                                <input id="email" type="email" class="form-control" name="email" required
                                    value="{{ old('email') }}" autocomplete="email">
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password">Password</label>
                                <input id="password" type="password" class="form-control"
                                    @error('password') is-invalid @enderror name="password" required
                                    autocomplete="password">
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="password_confirmation">Confirm Password</label>
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="password_confirmation">
                            </div>

                            <div class="mb-3">
                                <label class="mb-2 text-muted" for="image">Image </label>
                                <input type="file" id="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    name="image"value="{{ old('image') }}"required autocomplete="image">
                            </div>

                            <div class="align-items-center d-flex">
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Register
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer py-3 border-0">
                        <div class="text-center">
                            Already have an account? <a href="{{ route('login') }}" class="text-dark">Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
