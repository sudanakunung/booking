@section('title')
Home
@endsection

@section('user')
{{ $user->full_name }}
@endsection

@section('css')

@endsection

        @extends('adm.index')
        @section('content')
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Home</h3><br>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              @if(Session::has('error'))
                {!! session('error') !!}
              @endif

              <div class="jumbotron">
                <h1>Dashboard!</h1>
              </div>
            </div>
          </div>
        </div>
        @endsection

@section('js')

@endsection