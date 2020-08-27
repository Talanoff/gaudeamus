<!-- Header-banner -->
<section id="header-banner">
    <div class="header-banner-slider">
        @foreach ($slides as $slide)
            <div class="header-banner-slider-item bg-gradient" style="background-image: url('{{ $slide->banner }}');">
                <div class="container h-100 d-flex align-items-center">
                    <div class="col-xl-10 mx-auto">
                        <div class="header-banner-item text-white">
                            <h1 class="header-banner-item-title text-uppercase pb-3">
                                <span class="header-banner-item-title__text-big">{{ $slide->title }}</span><br>
                                {{ $slide->description }}
                            </h1>
                            <div class="header-banner-item-description pt-3">
                                {{ $slide->body }}
                            </div>
                            <div class="text-right mt-4">
                                <a href="#feedback" class="btn btn-dark">Записаться</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="scroll-down position-absolute d-flex justify-content-center align-items-center">
        <div class="scroll-down__text text-white mr-4">листай вниз</div>
        <div class="scroll-down-icon mb-2 position-relative">
            <div class="scroll-down-icon__line position-absolute"></div>
        </div>
    </div>
    <div class="header-banner-slider-nav position-absolute d-flex align-items-center pl-5">
        <div class="header-banner-slider-nav-arrow d-flex justify-content-between align-items-center">
            <div class="header-banner-slider-nav-arrow-prev"></div>
            <div class="header-banner-slider-nav-arrow-next"></div>
        </div>
        <div class="header-banner-slider-nav-decoration ml-5"></div>
        <div class="header-banner-slider-nav-num-dots d-flex ml-5">
            <div class="header-banner-slider-nav-num-dots-item header-banner-slider-nav-num-dots__index"></div>
            <div class="header-banner-slider-nav-num-dots-item header-banner-slider-nav-num-dots__last"></div>
        </div>
    </div>
</section>