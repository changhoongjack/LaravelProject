@extends('layouts.admin')
@section('content')


         


<div class="card text-center">
  <div class="card-header">
    Welcome, {{ $id }}
  </div>
  <div class="card-body">
    <h5 class="card-text">This is the Library Management System for Admin and Reviewer. </h5>
  
  </div>

</div>

@foreach ($contentcounts as $count)
<div class="card-deck">

  <div class="card text-white bg-primary mb-3">
  
    <div class="card-body">
    
      <h5 class="card-title"> Total Storybook  </h5>
      
      
      <h1 class="card-text">{{ $count['number'] }}</h1>
      
    </div>
    
    @endforeach
  </div>

 

  <div class="card text-white bg-primary mb-3 style="max-width: 25rem;">
    <div class="card-body">
      <h5 class="card-title">Total Readers</h5>
      <h1 class="card-text">{{ $readercount }}</h1>
    </div>
    
  </div>


  <div class="card text-white bg-primary mb-3">
    <div class="card-body">
      <h5 class="card-title"> Total Downloads</h5>
      <h1 class="card-text">{{ $downloadcount }}</h1>
    </div>
    
  </div>
</div>

</br>
	</br>

        </br>

<div style ="width:70%">
        {!! $chart->container() !!}
        </div>



    <div>
      
	</br>
	</br>

        </br>

        <div style ="width:50% " >
        {!! $chart1->container() !!}
        </div>

    </div>

</br>

</br>





@endsection
@section('scripts')
@parent

@endsection