<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostal</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="../css/inicio.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav>
            <a href="#inicio">INICIO</a>
            <a href="#encuentranos">ENCUENTRANOS</a>
            <a href="#habitacion">HABITACIONES</a>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}">PANEL DE CONTROL</a>
                @else
                    <a href="{{ route('login') }}">INGRESAR</a>
                @endauth
            @endif
            <!-- Mantén la autenticación si es necesario -->
        </nav>
        <img src="https://cdn-icons-png.flaticon.com/512/1668/1668966.png" alt="Logo de la Empresa">
    </header>

    <!-- Sección de INICIO -->
    <div id="inicio" class="section">
        <div class="carousel">
            <div class="carousel-images">
                <img src="../img/habitacion.png" class="carousel-image" alt="Imagen 1">
                <img src="../img/habitacion.png" class="carousel-image" alt="Imagen 2">
                <img src="../img/habitacion.png" class="carousel-image" alt="Imagen 3">
                <img src="../img/habitacion.png" class="carousel-image" alt="Imagen 4">
                <img src="../img/habitacion.png" class="carousel-image" alt="Imagen 5">
            </div>
            <button class="carousel-button prev" onclick="showPrevImage()">&#10094;</button>
            <button class="carousel-button next" onclick="showNextImage()">&#10095;</button>
        </div>
    </div>

    <!-- Sección de ENCUENTRANOS -->
    <div id="encuentranos" class="section" style="padding: 92px 0;">
        <div class="gallery">
            <div class="gallery-item">
                <img src="https://www.elmueble.com/medio/2024/09/06/dormitorio-juvenil-con-cama-nido-y-muebles-blancos-00535989_00000000_00535989_240906113256_900x900.jpg"
                    alt="Imagen 1">
            </div>
            <div class="gallery-item2">
                <div class="text-container">
                    <h2>BIENVENIDOS AL HOSTAL X-XX-XX</h2>
                    <p>Este es el texto del párrafo relacionado con la imagen 2.</p>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d4016517.238322963!2d-76.60849569999996!3d-10.54939854128601!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1ses-419!2spe!4v1732852564234!5m2!1ses-419!2spe" width="400" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <!-- Contenido de la sección ENCUENTRANOS -->
    </div>

    <!-- Sección de HABITACIONES -->
    <div id="habitacion" class="section" style="padding: 20px 0;">
        <div class="rooms">
            <span class="rooms-icon">🛏️ </span>
            <h2>HABITACIONES</h2>
        </div>
        <div class="gallery">
            <div class="rooms-card" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
                <img src="https://www.elmueble.com/medio/2024/09/06/dormitorio-juvenil-con-cama-nido-y-muebles-blancos-00535989_00000000_00535989_240906113256_900x900.jpg"
                    alt="Habitación 1">
                <div class="detail">
                    <h1>SIMPLE</h1>
                    <p>Este es el texto del párrafo relacionado con la imagen 2.</p>
                </div>
            </div>
            <div class="rooms-card" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
                <img src="https://acortar.link/GAw3kK"
                    alt="Habitación 2">
                <div class="detail">
                    <h1>DOBLE</h1>
                    <p>Este es el texto del párrafo relacionado con la imagen 2.</p>
                </div>
            </div>
            <div class="rooms-card" onmouseover="showDetail(this)" onmouseout="hideDetail(this)">
                <img src="https://www.innboutiqueleon.com/wp-content/uploads/2021/11/habitacion_doble_Alojamiento-con-encanto-Inn-Boutique-Leon_8.jpg"
                    alt="Habitación 3">
                <div class="detail">
                    <h1>MATRIMONIAL</h1>
                    <p>Este es el texto del párrafo relacionado con la imagen 2.</p>
                </div>
            </div>
        </div>
        <!-- Contenido de la sección HABITACIONES -->
    </div>
<script>
    let currentIndex = 0;
    const images = document.querySelectorAll('.carousel-image');
    const totalImages = images.length;

    function showNextImage() {
        currentIndex = (currentIndex + 1) % totalImages;
        updateCarousel();
    }

    function showPrevImage() {
        currentIndex = (currentIndex - 1 + totalImages) % totalImages; // Asegura que no vaya a un índice negativo
        updateCarousel();
    }

    function updateCarousel() {
        const offset = -currentIndex * 100; // Calcula el desplazamiento
        document.querySelector('.carousel-images').style.transform = `translateX(${offset}%)`;
    }

    setInterval(showNextImage, 8000); // Cambia cada 8 segundos
</script>
</body>


</html>
