<x-app-web-layout>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('uploads/Banner3.jpg')  }}" style="height: 600px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style=" background-color: rgba(0,0,0,0.2);">
                    <h2>REBUILD THE WORLD</h2>
                    <p>Let rebuild the world with us !</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/Banner2.webp') }}" style="height: 600px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style=" background-color: rgba(0,0,0,0.2);">
                    <h2>Huge Lego collection</h2>
                    <p>We have the best Lego sets in the world!</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('uploads/Banner.jpg')}}" style="height: 600px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block" style=" background-color: rgba(0,0,0, 0.2);">
                    <h2>Let Go !</h2>
                    <p>Join us to explore the world of LEGO!</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    </div>
    </div>

    @include('components.partials.footer')
</x-app-web-layout>
