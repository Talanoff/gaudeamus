@if ($errors->any() || session()->has('success'))
    <div class="notifications">
        @if ($errors->any())
            <div class="d-none d-flex align-items-start bg-danger text-white px-3 py-2 rounded my-2">
                <ul class="flex-1 pr-3 mb-0 list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

                <button type="button" class="btn p-0 text-white"
                        onclick="this.parentElement.classList.toggle('d-flex')">&times;
                </button>
            </div>
        @endif

        @if(session()->has('success'))
            <div class="d-none d-flex align-items-start bg-success text-white px-3 py-2 rounded my-2">
                <div class="flex-1 pr-3">
                    {{ session('success') }}
                </div>

                <button type="button" class="btn p-0 text-white"
                        onclick="this.parentElement.classList.toggle('d-flex')">&times;
                </button>
            </div>
        @endif
    </div>
@endif
