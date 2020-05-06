@extends('layouts.app')

@section('content')
<film-component :film="{{json_encode($data)}}"></film-component>
@endsection
