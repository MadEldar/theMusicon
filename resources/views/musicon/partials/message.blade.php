@php
use Illuminate\Support\Facades\Session;
@endphp
<div id="alert-container">
    @if(Session::has('message'))
        <div class="alert alert-{{ Session::get('message')['type'] }} alert-dismissible fade show flash-message" role="alert">
            {{ Session::get('message')['content'] }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show flash-message" role="alert">
                    {{ $error }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    @endif
</div>
