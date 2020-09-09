<div class="jobs-page-respond" id="vacancy-form">
    <div class="row">
        <div class="col-sm-6">
            <div class="jobs-page-respond-content">
                <div class="section-description pb-2 mb-5">
                    <div class="section-description-name">Заполните форму</div>
                    <h2 class="section-description-title">Откликнуться на вакансию</h2>
                </div>

                <form action="{{ route('app.vacancies.store') }}" id="form-respond" method="post"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group-item d-flex flex-column justify-content-lg-start align-items-center">
                        <div class="form-group w-100 position-relative mb-3">
                            <label for="user-name--respond" class="label-placeholder">Введите имя</label>
                            <input type="text" class="form-control position-relative py-4" id="user-name--respond"
                                   name="name" placeholder="Ваше имя" required>
                        </div>

                        <div class="form-group w-100 position-relative mb-3">
                            <label for="user-email--respond" class="label-placeholder">Ваш почтовый
                                ящик</label>
                            <input type="email" class="form-control position-relative py-4" id="user-email--respond"
                                   name="email" placeholder="Введите Email" required>
                        </div>

                        <div class="form-group w-100 position-relativemb-3">
                            <label for="user-phone--respond" class="label-placeholder">Ваш номер
                                телефона</label>
                            <input type="text" class="form-control position-relative py-4" id="user-phone--respond"
                                   name="phone" placeholder="Введите номер" required>
                        </div>
                        <input type="hidden" name="vacancy_id" value="{{ $vacancy->id }}">

                        <div class="form-group w-100">
                            <label for="file" class="form-control-label text-primary">Прикрепить
                                <span class="label-placeholder__link text-primary">файл</span>
                                с резюме (doc, txt)</label>
                            <input type="file" class="form-control-file d-none"
                                   id="file" name="resume" accept=".doc, .docx, .txt, .pdf">
                        </div>
                        <div class="text-right w-100">
                            <button id="respond-btn" class="btn btn-dark text-white">Отправить</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="jobs-page-respond-img"
                 style="background-image: url({{ $bannerRespond->getFirstMediaUrl('banner') }});"></div>
        </div>

    </div>
</div>
