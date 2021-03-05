@extends('user::layouts.master')

@section('content')
    <div id="app" >
        <navmenu></navmenu>
        <users :users="{{json_encode($arrUsers)}}"></users>
        <foot></footer>
    </div>
    <script src="{{asset('js/app.js')}}" >  </script>
@endsection
