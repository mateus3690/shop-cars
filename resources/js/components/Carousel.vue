<template>

    <div id="carouselExampleCaptions" class="carousel slide my-2 " data-bs-ride="carousel">

        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>

        <div class="carousel-inner">

            <div class="carousel-item active">

                <img src="../../img/carousel1.jpg" class="d-block w-100 rounded " height="350" alt="..."/>

                <div class="carousel-caption d-none d-md-block bg-dark rounded opacit-img">
                    <h5><a target="_black" href="https://pt.wikipedia.org/wiki/Nissan" class="text-white">NISSAN</a></h5>
                    <p>É um fabricante automotivo japonês com sede na Toyota, província de Aichi, no Japão. Em março de 2014, a corporação multinacional era composta por 338 875 funcionários em todo o mundo.</p>
                </div>

            </div>

                <div class="carousel-item">
                    <img src="../../img/carousel2.jpg" class="d-block w-100 rounded " height="350" alt="..."/>

                    <div class="carousel-caption d-none d-md-block bg-dark rounded opacit-img">
                        <h5><a target="_black" href="https://pt.wikipedia.org/wiki/FIAT" class="text-white">FIAT</a></h5>
                        <p>É uma das marcas da Stellantis, um dos maiores fabricantes de automóveis do mundo, com sede mundial na cidade de Turim, norte da Itália.</p>
                    </div>

                </div>

                <div class="carousel-item">

                    <img src="../../img/carousel3.jpg" class="d-block w-100 rounded " height="350" alt="..."/>

                    <div class="carousel-caption d-none d-md-block bg-dark rounded opacit-img">
                        <h5><a target="_black" href="https://pt.wikipedia.org/wiki/Toyota_(Aichi)" class="text-white">TOYOTA</a></h5>
                        <p>É uma fabricante japonesa de automóveis resultante de uma fusão entre Datsun e Prince. A Nissan está listada no Nikkei 225 e é a terceira maior fabricante japonesa de automóveis depois da Toyota e Honda em capitalização de mercado.</p>
                    </div>

                </div>

        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>

</template>

<script>
export default {

}
</script>

<style>
    .opacit-img {
        opacity: 0.6;
    }
    .opacit-img:hover {
        opacity: 0.9;
    }

</style>
