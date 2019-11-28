@extends('layouts.admin')
@section('content')

</br>


<div class="card-deck">
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Storybook</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
    </div>
    
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Total Readers</h5>
      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
    </div>
    
  </div>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title">Reviews</h5>
      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
    </div>
    
  </div>
</div>
</br>

</br>
<div class="card text-center">
  <div class="card-header">
    Welcome
  </div>
  <div class="card-body">
    <h5 class="card-title">Announcements</h5>
    <p class="card-text">This is the Library Management System for Admin and Reviewer. </p>
    <a href="#!" class="btn btn-primary">Go Admin</a>
    <a href="#!" class="btn btn-primary">Go Reviewer</a>
  </div>
  <div class="card-footer text-muted">
    2 days ago
  </div>
</div>


@endsection
@section('scripts')
@parent

@endsection