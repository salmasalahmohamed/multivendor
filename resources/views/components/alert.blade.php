    @if(\Illuminate\Support\Facades\Session::has('success'))
        <span>{{\Illuminate\Support\Facades\Session::get('success')}}</span>
    @endif
