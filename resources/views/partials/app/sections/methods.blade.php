<!-- Methods -->
<section id="methods">
    @include('partials.app.parallax')
    <div class="container">
        <div class="col-sm-7 ml-auto mr-0">
            <div class="methods-item text-white position-relative">
                <div class="section-description">
                    <div class="section-description-name">{{ $methods->title }}</div>
                    <h2 class="section-description-title">
                        {{ $methods->description }}
                    </h2>
                </div>
                <p class="about-item-description mt-4">
                   {!! $methods->body !!}
                </p>
                <a href="{{ route('app.programs') }}" class="btn btn-outline-white">Программа обучения</a>
            </div>
        </div>
    </div>
</section>