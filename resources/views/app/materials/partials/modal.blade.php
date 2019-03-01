<!-- Modal -->
<div class="container position-relative">
    <div class="show-materials-modal">
        <div id="close-modal-materials" class="closs-modal position-absolute">
            <div class="line line--left"></div>
            <div class="line line--right"></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="show-materials-modal-img"
                     style="background-image: url({{ $material->getFirstMediaUrl('material') }});"></div>
            </div>
            <div class="col-sm-6">
                <div class="show-materials-modal-item">
                    <h2 class="show-materials-modal-item__title">{{ $material->title  }}</h2>
                    <p class="show-materials-modal-item__text">
                        {{ $material->description }}
                    </p>
                    <p class="show-materials-modal-item__text">
                        {!! $material->body !!}
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-10 mx-auto">
                <div class="show-materials-modal-item">
                    <div class="text-right">
                        <a href="#" id="close-text-show-modal-materials" class="more-info">Другие учебные
                            материалы</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>