@extends('layouts.app')

@section('content')
@php
    $i = 0
@endphp
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=94licg4jastcl3ih22do77fl3dtjzm299g4ogivj9qycu9as"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">            
                <div class="card-header"><strong>List of Api</strong></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       
                                 <small>(##) 7. As a developer, I need an API to retrieve the follower list based on a user.</small><hr> 
                                 <p><strong><small>Possible Way to Get Result : </small></strong>
                                    <div><strong>(i).</strong> GET METHOD  <strong>(ii)</strong> POST METHOD</div></p>
                                 <strong>APi Url (<srong>Method Used:</srong> POST)</strong>  
                                 <p style="font-size:10px;">{{ url('/api/user/follower/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <p><small>Header : Accept => 'Application/json'</small></p>
                                 <p><small>Header : Content-Type => 'Application/json'</small></p>  
                                 <p><small>Body   :</small> {
                                          "email" : "hmasad09@gmail.com" 
                                          }</p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/ezgif.com-video-to-gif.gif') }}" style="height:350px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>

    </div>
</div>


@endsection

