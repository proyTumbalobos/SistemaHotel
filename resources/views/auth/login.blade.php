    <!-- Session Status -->
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario</title>
        <!-- Enlace de Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body {
                background-color: #000; /* Fondo negro */
                height: 100vh; /* Aseguramos que el fondo cubra toda la pantalla */
            }
    
            .form-container {
                width: 600px; /* Ancho máximo del formulario */
                margin: auto; /* Centra el formulario en la pantalla */
                padding: 30px; /* Espaciado interno */
                background-color: white; /* Fondo blanco del formulario */
                border-radius: 8px; /* Bordes redondeados */
            }
    
            .form-check-label {
                color: #000;
            }
    
            .form-label, .form-check-label {
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <div class="d-flex justify-content-center align-items-center h-100">
            <form method="POST" action="{{ route('login') }}" class="form-container">
                @csrf
                <x-guest-layout>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Correo') }}</label>
                    <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Contraseña') }}</label>
                    <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
    
                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                    <label for="remember_me" class="form-check-label">{{ __('Recordar') }}</label>
                </div>
    
                <div class="d-flex justify-content-between mt-3">
                    @if (Route::has('password.request'))
                        <a class="text-decoration-none" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                        </a>
                    @endif
    
                    <button type="submit" class="btn btn-primary">{{ __('Ingresar') }}</button>
                </div>
            </form>
        </div>
    
        <!-- Enlaces de Bootstrap JS y Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
    </body>
    </html>
    
</x-guest-layout>
{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootswatch/5.3.3/zephyr/bootstrap.min.css" integrity="sha512-CWXb9sx63+REyEBV/cte+dE1hSsYpJifb57KkqAXjsN3gZQt6phZt7e5RhgZrUbaNfCdtdpcqDZtuTEB+D3q2Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div>
        <div>

        </div>
        <div>
            <form method="POST" action="{{ route('login') }}" >
                @csrf
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email"  name="email" placeholder="name@example.com">
                    <label for="floatingInput">Correo</label>
                  </div>
                  <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" autocomplete="off" 
                    id="password" class="block mt-1 w-full"
                            type="password"
                            name="password">
                    <label for="floatingPassword">Contraseña</label>
                  </div>
                  <button type="submit" class="btn btn-primary">Primary</button>
            </form>
        </div>
    </div>
</body>
</html> --}}