<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>@yield('title', 'AGROVALLE Honduras')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/agrovalle.css') }}" rel="stylesheet" />
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

</head>

<body class="login-bg">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card login-card mt-5">
                                <div class="card-header bg-white text-center py-4 border-0">
                                    <img src="{{ asset('assets/img/logo_agro_valle.png') }}" alt="AGROVALLE Honduras"
                                        class="logo-marco mb-3">
                                    <h3 class="fw-light my-2">Login AgroValle Honduras</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login.post') }}">
                                        @csrf

                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror" id="email"
                                                name="email" type="email" value="{{ old('email') }}"
                                                placeholder="correo@agrovalle.hn" required autofocus />
                                            <label for="email">Correo institucional (@agrovalle.hn)</label>
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror"
                                                id="password" name="password" type="password" placeholder="Contraseña"
                                                required />
                                            <label for="password">Contraseña</label>
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="remember" name="remember"
                                                type="checkbox" value="1" />
                                            <label class="form-check-label" for="remember">Recordar mi sesión</label>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="submit" class="btn btn-success">Iniciar sesión</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <div id="layoutAuthentication_footer">
            <footer class="py-3 mt-auto footer-login">
                <div class="container-fluid px-4">
                    <div class="text-center small text-white">
                        &copy; {{ date('Y') }} Distribuidora Agropecuaria del Valle S. de R.L. (AGROVALLE Honduras)
                        <br>
                        Comayagua · San Pedro Sula, Honduras
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>

</html>