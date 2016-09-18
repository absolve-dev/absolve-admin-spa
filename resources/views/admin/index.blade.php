@extends("layouts.master")

@section("content")
  Absolve Admin Index
  <div ng-app="absolve">
    <div admin-navbar></div>
    <div ng-view></div>
  </div>
@endsection
