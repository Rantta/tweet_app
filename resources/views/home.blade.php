@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
            <timeline-component></timeline-component>
    </div>
   <div class="anime" id="anime">
         <div class="spinner">
            <i class="fab fa-twitter double-bounce1"></i>
            <i class="fab fa-twitter double-bounce2"></i>
    </div>
</div>
</div>
<script type="application/javascript">
    window.onload = function(){
        myDiv = document.getElementById('anime');
        setTimeout(() => {
            myDiv.setAttribute('style', 'display:none;');
        }, 2000);
    }
</script>
@endsection
