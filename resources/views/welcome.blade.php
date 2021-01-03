@extends('layouts.app')
      
@section('content')
        @livewire('datatables', ["users" => []])
@endsection
