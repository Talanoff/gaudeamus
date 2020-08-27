<div class="col-auto align-self-center">
    <form action="{{ route('admin.reorder', $model) }}" method="post">
        @csrf
        @method('patch')

        <input type="hidden" name="model" value="{{ $className }}">

        <div class="mb-1">
            <button name="direction" value="moveOrderUp" class="btn btn-link text-dark p-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path
                        d="M13 7.828V20h-2V7.828l-5.364 5.364-1.414-1.414L12 4l7.778 7.778-1.414 1.414L13 7.828z"/>
                </svg>
            </button>
            <button name="direction" value="moveOrderDown" class="btn btn-link text-dark p-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                    <path fill="none" d="M0 0h24v24H0z"/>
                    <path
                        d="M13 16.172l5.364-5.364 1.414 1.414L12 20l-7.778-7.778 1.414-1.414L11 16.172V4h2v12.172z"/>
                </svg>
            </button>
        </div>
        <div>
            <button name="direction" value="moveToStart" class="btn btn-link text-dark p-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                    <path fill="none" d="M0 0H24V24H0z"/>
                    <path
                        d="M19 3l4 5h-3v12h-2V8h-3l4-5zm-5 15v2H3v-2h11zm0-7v2H3v-2h11zm-2-7v2H3V4h9z"/>
                </svg>
            </button>
            <button name="direction" value="moveToEnd" class="btn btn-link text-dark p-0">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18">
                    <path fill="none" d="M0 0H24V24H0z"/>
                    <path
                        d="M20 4v12h3l-4 5-4-5h3V4h2zm-8 14v2H3v-2h9zm2-7v2H3v-2h11zm0-7v2H3V4h11z"/>
                </svg>
            </button>
        </div>
    </form>
</div>
