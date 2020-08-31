<!-- Feedback -->
<section id="feedback">
    <div class="container">
        <div class="section-description pb-2 mb-5">
            <div class="section-description-name">Запишите Вашего ребенка на курс</div>
            <h2 class="section-description-title">Шановні батьки!</h2>
            <p>Курси англійської мови «Гаудеамус» проводять набір учнів 1-4 класів <strong>без вступних тестів або
                    співбесід.</strong></p>
            <p><strong>Для учнів 5-11 класів,</strong> які мають підсумкову оцінку за минулий навчальний рік не нижче
                7 балів, ми проводимо тестування з метою визначення курсу подальшого навчання.
                Таке тестування проводиться викладачем наших курсів у присутності батьків за індивідуальним запрошенням.
            </p>
            <p>Отримати якісний результат на наших курсах можливо за умови відвідування учнем усіх запланованих занять
                та виконання домашнього завдання у повному обсязі.</p>
        </div>
        <div class="row">
            <div class="col-12">

                <form action="{{ route('app.feedback.create') }}" id="form-feedback" method="post">
                    @csrf

                    <div class="form-group-item mb-2 mb-lg-4 row align-items-end">
                        <div class="form-group position-relative mb-3 col-12 col-md-6 col-lg-4">
                            <label for="school" class="label-placeholder">{{ __('schools.select.label') }}</label>
                            <select name="school" id="school" class="form-control" required>
                                <option value="" selected disabled>{{ __('schools.select.placeholder') }}</option>
                                @foreach(trans('schools.addresses') as $group => $items)
                                    <optgroup label="{{ $group }}">
                                        @foreach($items as $school => $address)
                                            <option value="{{ $school }}">{{ $school }}, {{ $address }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6 col-lg-4">
                            <label for="student_first_name" class="label-placeholder">{{ __('Прізвище учня') }}</label>
                            <input type="text" class="form-control position-relative" id="student_first_name"
                                   name="student_last_name" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6 col-lg-4">
                            <label for="student_last_name" class="label-placeholder">{{ __('Ім’я учня') }}</label>
                            <input type="text" class="form-control position-relative" id="student_last_name"
                                   name="student_first_name" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6 col-lg-4">
                            <label for="student_school" class="label-placeholder">{{ __('Школа') }}</label>
                            <input type="text" class="form-control position-relative" id="student_school"
                                   name="student_school" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6 col-lg-4">
                            <label for="student_class" class="label-placeholder">{{ __('Клас') }}</label>
                            <input type="text" class="form-control position-relative" id="student_class"
                                   name="student_class" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6 col-lg-4">
                            <label for="learning_ends" class="label-placeholder">
                                {{ __('Час закінчення занять у школі') }}
                            </label>
                            <input type="time" class="form-control position-relative" id="learning_ends"
                                   name="learning_ends" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6">
                            <label for="testing_needed" class="label-placeholder">
                                {{ __('Моїй дитині потрібне тестування тому, що вона') }}
                            </label>
                            <select class="form-control" id="testing_needed" name="testing_needed" required>
                                @foreach(trans('schools.testing_needed') as $item)
                                    <option value="{{ $item }}">{{ $item }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6">
                            <label for="student_rating" class="label-placeholder">
                                {{ __('Підсумкова оцінка з англійської за минулий навчальний рік') }}
                            </label>
                            <input type="number" class="form-control position-relative" id="student_rating"
                                   name="student_rating" min="1" max="12" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12">
                            <label class="label-placeholder">
                                {{ __('Розклад занять в інших гуртках, секціях') }}
                            </label>

                            @foreach(['Понеділок', 'Вівторок', 'Середа', 'Четвер', 'П’ятниця', 'Субота'] as $day)
                                <div class="row align-items-center mb-2">
                                    <div class="col-12 col-md-6 col-lg-4 text-right">
                                        {{ __($day) }}
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <input type="time" class="form-control position-relative" id="sections-{{ $loop->index }}-from"
                                               name="sections[{{ $day }}][]" min="07:00" max="22:00" placeholder="{{ __('з') }}">
                                    </div>
                                    <div class="col-12 col-md-6 col-lg-4">
                                        <input type="time" class="form-control position-relative" id="sections-{{ $loop->index }}-to"
                                               name="sections[{{ $day }}][]" min="07:00" max="22:00" placeholder="{{ __('до') }}">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-4">
                            <label for="contact-1-position" class="label-placeholder">{{ __('Контактна особа') }}</label>
                            <select name="contact[0][position]" id="contact-1-position" class="form-control" required>
                                @foreach(trans('schools.contact') as $contact)
                                    <option value="{{ $contact }}">{{ $contact }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-8">
                            <label for="contact-1-name" class="label-placeholder">{{ __('Прізвище, iм’я, по батькові') }}</label>
                            <input type="text" class="form-control position-relative" id="contact-1-name" name="contact[0][name]" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6">
                            <label for="contact-1-phone" class="label-placeholder">{{ __('Контактний телефон') }}</label>
                            <input type="tel" class="form-control position-relative" id="contact-1-phone" name="contact[0][phone]" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6">
                            <label for="contact-1-email" class="label-placeholder">{{ __('Контактний E-mail') }}</label>
                            <input type="email" class="form-control position-relative" id="contact-1-email" name="contact[0][email]" required>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-4">
                            <label for="contact-2-position" class="label-placeholder">{{ __('Інша контактна особа') }}</label>
                            <select name="contact[1][position]" id="contact-2-position" class="form-control">
                                @foreach(trans('schools.contact') as $contact)
                                    <option value="{{ $contact }}">{{ $contact }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-8">
                            <label for="contact-2-name" class="label-placeholder">{{ __('Прізвище, iм’я, по батькові') }}</label>
                            <input type="text" class="form-control position-relative" id="contact-2-name" name="contact[1][name]">
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6">
                            <label for="contact-2-phone" class="label-placeholder">{{ __('Контактний телефон') }}</label>
                            <input type="text" class="form-control position-relative" id="contact-2-phone" name="contact[1][phone]">
                        </div>

                        <div class="form-group position-relative mb-3 col-12 col-md-6">
                            <label for="contact-2-email" class="label-placeholder">{{ __('Контактний E-mail') }}</label>
                            <input type="text" class="form-control position-relative" id="contact-2-email" name="contact[1][email]">
                        </div>
                    </div>

                    <div class="custom-control custom-checkbox @error('confirm-1') is-invalid @enderror">
                        <input type="checkbox" class="custom-control-input" name="confirm_1" id="confirm-1" required>
                        <label class="custom-control-label" for="confirm-1">
                            {{ __('З умовами зарахування дитини на курси англійської мови «Гаудеамус» ознайомлений. Даю згоду на обробку та використання приватної інформації про мою дитину та членів моєї родини у межах Курсів англійської мови «Гаудеамус».') }}
                        </label>
                    </div>

                    <div class="custom-control custom-checkbox @error('confirm-1') is-invalid @enderror">
                        <input type="checkbox" class="custom-control-input" name="confirm_2" id="confirm-2" required>
                        <label class="custom-control-label" for="confirm-2">
                            {{ __('Даю згоду на придбання навчального посібника, який відповідає курсу / рівню навчання моєї дитини. Гарантую оплачувати заняття до 10 числа поточного місяця.') }}
                        </label>
                    </div>

                    <div class="mt-4">
                        <button id="feedback-btn" class="btn btn-dark text-white d-inline-flex">Записаться</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
