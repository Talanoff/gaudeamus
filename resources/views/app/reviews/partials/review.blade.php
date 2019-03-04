<!-- Modal -->
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="modal-feedback {{ $errors->count() ? 'is-active' : '' }}">
                <div class="modal-feedback-container">
                    <div id="close-modal-feedback" class="closs-modal position-absolute">
                        <div class="line line--left"></div>
                        <div class="line line--right"></div>
                    </div>

                    <h2 class="modal-feedback__title">Оставить отзыв</h2>

                    <form action="{{ route('app.reviews.create') }}" id="form-modal-feedback" method="post"
                          enctype="multipart/form-data">
                        @csrf

                        @guest
                            <div class="form-group-header d-flex flex-column flex-sm-row justify-content-between align-items-center">
                                <div class="form-group form-group--textarea position-relative">
                                    <label for="user-name--modal-feedback" class="label-placeholder">Введите
                                        имя</label>
                                    <input type="text" class="form-control position-relative" name="name"
                                           id="user-name--modal-feedback"
                                           placeholder="Ваше имя" required>
                                </div>
                            </div>
                        @endguest

                        <div class="form-group-body">
                            <div class="form-group form-group--textarea position-relative">
                                <label for="user-message--modal-feedback" class="label-placeholder">Ваш
                                    отзыв</label>
                                <textarea class="form-control position-relative"
                                          id="user-message--modal-feedback"
                                          name="message" placeholder="Введите сообщение"></textarea>
                            </div>

                        </div>

                        <div class="form-group-footer d-flex flex-column flex-lg-row justify-content-between align-items-center">
                            <div class="form-group-footer-item">
                                <div class="form-group">
                                    <label for="file--modal-feedback" class="form-control-label">Загрузить
                                        <span class="label-placeholder__link">файл</span>
                                        с видеоотзывом (mp4, avi)</label>
                                    <input type="file" name="video" accept="video/*" class="form-control-file d-none"
                                           id="file--modal-feedback">
                                </div>

                                <div class="form-group form-check">
                                    <input type="checkbox" name="confirm"
                                           class="form-check-input d-none"
                                           id="agree--modal-feedback" required>
                                    <label class="label-placeholder form-check-label"
                                           for="agree--modal-feedback">
                                        Я соглашаюсь с <a href="{{ route('app.rules') }}" class="label-placeholder__link">правилами
                                            пользования</a>
                                        сайтом.
                                    </label>

                                    @if ($errors->has('confirm'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('confirm') }}
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group-footer-item">
                                <button class="btn btn-outline-light text-primary">Оставить отзыв</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>