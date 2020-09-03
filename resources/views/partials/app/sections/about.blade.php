<!-- About -->
<section id="about">
    <div class="container">
        <div class="row">
            <div class="about-img about-img--left"
                 style="background-image: url('images/content/about/about-item-1.jpg');"></div>
            <div class="col-sm-6 ml-auto mr-0">
                <div class="quote-item position-relative">
                    <div class="quote-item__icon position-absolute">
                        <svg width="130" height="100">
                            <use xlink:href="#quote-icon"></use>
                        </svg>
                    </div>
                    <div class="quote-item__text position-relative">{{ $quote->quote }}</div>
                    <div class="quote-item__author text-right">{{ $quote->author }}</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-9">
                <div class="about-item position-relative">
                    <div class="section-description">
                        <div class="section-description-name">{{ $about->title }}</div>
                        <h2 class="section-description-title">{{ $about->description }}
                        </h2>
                    </div>
                    <p class="about-item-description mt-4">
                       {!! str_limit($about->body, $limit = 900, $end = '...') !!}
                    </p>
                    <a href="{{ route('app.about') }}" class="more-info">Подробнее о нас</a>
                </div>
            </div>
            <div class="about-img about-img--right position-absolute d-none d-lg-block" style="background-image: url('images/content/about/about-item-2.jpg');"></div>
        </div>
    </div>
</section>
