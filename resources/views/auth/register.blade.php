@include('Admin.includes.header')


<main>
    <div class="container">

        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <div class="card mb-3">

                            <div class="card-body">

                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
                                </div>

                                <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="col-12">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" name="name" class="form-control" id="name"
                                            required>
                                        <div class="invalid-feedback">Please, enter your name!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" id="email"
                                            required>
                                        <div class="invalid-feedback">Please enter a valid Email adddress!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="password"
                                            required>
                                        <div class="invalid-feedback">Please enter your password!</div>
                                    </div>

                                    <div class="col-12">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <div class="input-group has-validation">
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password_confirmation" required>
                                            <div class="invalid-feedback">Password does not match.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="image" class="form-label">Image</label>
                                        <div class="input-group has-validation">
                                            <input type="file" name="image" class="form-control" id="image"
                                                required>
                                            <div class="invalid-feedback">Please chose your image. </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Create Account</button>
                                    </div>
                                    <div class="col-12">
                                        <p class="small mb-0">Already have an account? <a href="{{ route('login') }}">
                                                Login</a></p>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits">
                            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                        </div>

                    </div>
                </div>
            </div>

        </section>

    </div>
</main>
