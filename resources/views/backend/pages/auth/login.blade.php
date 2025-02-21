@include('backend.layout.inc.style')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-4 col-md-7">
            <div class="card border-0 mb-0">
                <div class="card-header bg-transparent">
                    <h5 class="text-dark text-center mt-2 mb-3">Admin</h5>
                    <div class="btn-wrapper text-center">
                        <a href="javascript:;" class="btn btn-neutral btn-icon btn-sm mb-0">
                            <img class="w-30" src="{{ asset('assets/backend') }}/img/logos/github.svg">
                            Github
                        </a>
                        <a href="javascript:;" class="btn btn-neutral btn-icon btn-sm mb-0">
                            <img class="w-30" src="{{ asset('assets/backend') }}/img/logos/google.svg">
                            Google
                        </a>
                    </div>
                </div>
                <div class="card-body px-lg-5 pt-0">
                    <div class="text-center text-muted mb-4">
                        <small>Or sign in with credentials</small>
                    </div>
                    <form role="form" action="{{ route('admin.login') }}" method="POST" class="text-start">
                        @csrf
                        <div class="mb-3">
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email">
                        </div>
                        <div class="mb-3">
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary w-100 my-4 mb-2">Sign in</button>
                        </div>
                        <div class="mb-2 position-relative text-center">
                            <p
                                class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                or
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
