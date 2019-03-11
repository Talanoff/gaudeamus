<!-- Reviews -->
<section id="reviews">
    <div class="container position-relative">
        <div class="col-sm-6">
            <div class="section-description pb-2 mb-5">
                <div class="section-description-name">Отзывы</div>
                <h2 class="section-description-title">
                    Мнения людей о нас
                </h2>
            </div>
        </div>
        <div class="reviews-slider">
              @foreach($reviews as $review)
                  @if(($loop->index %4) == 0)
                      <div class="reviews-slider-item">
                          @endif
                          @if(($loop->index %2) == 0)
                              <div class="row">
                                  @endif
                                  <div class="col-sm-6">
                                      <div class="reviews-slider-item-content">
                                          @if ($review->author)
                                              <div class="reviews-slider-item-content__img rounded-circle"
                                                   style="background-image: url({{$review->author->avatar}});"></div>
                                          @else
                                              <div class="reviews-slider-item-content__img rounded-circle"
                                                   style="background-image: url({{asset('images/no-avatar.png')}});"></div>
                                          @endif
                                          <div class="reviews-slider-item-content-main">
                                              <div class="reviews-slider-item-content-main-info">
                                                  <h3 class="reviews-slider-item-content-main-info__name">
                                                      {{ $review->author_name}}
                                                  </h3>
                                                  <div class="reviews-slider-item-content-main-info__data">
                                                      {{ $review->created_at->formatLocalized('%d %B %Y') }}
                                                  </div>
                                              </div>
                                              <div class="reviews-slider-item-content-main-description">
                                                  <p class="reviews-slider-item-content-main-description__text">
                                                      {{ $review->message }}
                                                  </p>
                                              </div>
                                              @if($review->video_id )
                                                  <div class="reviews-slider-item-content-main-description">
                                                      <a href="https://www.youtube.com/embed/{{ $review->video_id }}"
                                                         class="btn btn-outline-secondary text-primary">Видео отзыв</a>
                                                  </div>
                                              @endif
                                          </div>
                                      </div>
                                  </div>
                                  @if(($loop->index %2) !== 0 || $loop->last)
                              </div>
                          @endif
                          @if(($loop->iteration %4) == 0 || $loop->last)
                      </div>
                  @endif
              @endforeach
        </div>

        <div class="row">
            <div class="col-sm-6 mx-auto">
                <div class="header-banner-slider-nav header-banner-slider-nav--reviews d-flex align-items-center pl-5">
                    <div class="header-banner-slider-nav-arrow mx-auto d-flex justify-content-between align-items-center">
                        <div class="header-banner-slider-nav-arrow-prev header-banner-slider-nav-arrow-prev--reviews"></div>
                        <div class="header-banner-slider-nav-arrow-next header-banner-slider-nav-arrow-next--reviews"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-7 mx-auto d-flex flex-column flex-lg-row justify-content-between">
                <a href="#" id="add-reviews-btn" class="btn btn-outline-light text-primary mb-4 mb-lg-0">Оставить отзыв</a>
                <a href="#feedback" class="btn btn-dark">Записаться</a>
            </div>
        </div>
        @include('app.reviews.partials.review')
    </div>
</section>