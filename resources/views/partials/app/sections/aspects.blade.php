<!-- Luck -->
<section id="luck">
    <div class="container">
        <div class="row">
            <div class="col-sm-7">
                <div class="section-description">
                    <div class="section-description-name">Аспекты успеха</div>
                    <h2 class="section-description-title">
                        Выучить английский язык легко,
                        только необходимо...
                    </h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 p-0">
                <ul class="stage clearfix">
                    @foreach($aspects as $aspect)
                    <li class="scene">
                        <div class="movie active" onclick="return true">
                            <div class="poster" style="background-image: url({{ $aspect->getFirstMediaUrl('aspects_header') }});">
                                <h5 class="poster-title position-absolute">{{ $aspect->title }}</h5>
                            </div>
                            <div class="info">
                                <header style="background-image: url({{ $aspect->getFirstMediaUrl('aspects_body') }});">
                                    <h1>{{ $aspect->title }}</h1>
                                </header>
                                <p>
                                    {{ $aspect->description }}
                                </p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
