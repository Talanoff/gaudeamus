<!-- Feedback -->
<section id="feedback">
    <div class="container">
        <div class="col-sm-7">
            <div class="section-description pb-2 mb-5">
                <div class="section-description-name">Запишите Вашего ребенка на курс</div>
                <h2 class="section-description-title">Записаться на курс английского языка</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">

                <form action="{{ route('app.feedback.create') }}" id="form-feedback" method="post">
                    @csrf

                    <div class="form-group-item mb-2 mb-lg-4 d-flex flex-column flex-lg-row justify-content-lg-start align-items-center">
                        <div class="form-group position-relative mb-3 mb-lg-0 mr-lg-5">
                            <label for="user-name--feedback" class="label-placeholder">Введите имя</label>
                            <input type="text" class="form-control position-relative" id="user-name--feedback"
                                   name="name" placeholder="Ваше имя" required>
                        </div>
                        <div class="form-group position-relative mb-3 mb-lg-0">
                            <label for="user-email--feedback" class="label-placeholder">Ваш почтовый ящик</label>
                            <input type="email" class="form-control position-relative" id="user-email--feedback"
                                   name="email" placeholder="Введите Email" required>
                        </div>
                    </div>

                    <div class="form-group-item d-flex flex-column flex-lg-row justify-content-between align-items-center align-items-lg-end">
                        <div class="form-group position-relativemb-3 mb-lg-0 mr-lg-4">
                            <label for="user-phone--feedback" class="label-placeholder">Ваш номер телефона</label>
                            <input type="text" class="form-control position-relative" id="user-phone--feedback"
                                   name="phone" placeholder="Введите номер" required>
                        </div>

                        <div class="form-group position-relative mb-5 mb-lg-0 mr-lg-4">
                            <label class="label-placeholder">Выберите курс</label>
                            <select class="form-control position-relative" name="course_id" id="course_id" required>
                                <option value="" disabled selected style='display:none;'>Курс английского языка</option>
                                @foreach($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->title }}</option>
                                @endforeach
                            </select>
                        </div>


                        <button id="feedback-btn" class="btn btn-dark text-white">Записаться</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>