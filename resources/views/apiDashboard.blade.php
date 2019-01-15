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
                <div class="card-header"><strong>(##) 7. As a developer, I need an API to retrieve the follower list based on a user.</strong></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       
                                 <p><strong><small>Possible Way to Get Result : </small></strong>
                                    <div><strong>(i).</strong> GET METHOD  <strong>(ii)</strong> POST METHOD</div></p>
                                 <small><strong>APi Url (<srong>Method Used:</srong> POST)</strong></small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/follower/') }}?api_token={{ Auth::user()->api_token }}</p>
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



        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">            
                <div class="card-header"><strong>(##) 8. As a developer, I need an API to retrieve the common follower list between two or more users.</strong></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       
                                 <p><strong><small>Possible Way to Get Result : </small></strong>
                                    <div><strong>(i).</strong> GET METHOD  <strong>(ii)</strong> POST METHOD</div></p>
                                 <small><strong>APi Url (<srong>Method Used:</srong> POST)</strong></small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/common-follower/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <p><small>Header : Accept => 'Application/json'</small></p>
                                 <p><small>Header : Content-Type => 'Application/json'</small></p>  
                                 <p><small>Body   :</small> </p>
                                                            <p>{
                                                              "users":
                                                                [
                                                                  "hmasad09@gmail.com",
                                                                  "rajesh@gmail.com"
                                                                ]
                                                            }</p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/commonfollower.gif') }}" style="height:350px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>        


        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">            
                <div class="card-header"><strong>(##) 9. As a developer, I need an API to block a follower from a user.</strong></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       
                                 <p><strong><small>Possible Way to Get Result : </small></strong>
                                    <div><strong>(i).</strong> GET METHOD  <strong>(ii)</strong> POST METHOD</div></p>
                                 <small><strong>APi Url (<srong>Method Used:</srong> POST)</strong></small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/author/block/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <p><small>Header : Accept => 'Application/json'</small></p>
                                 <p><small>Header : Content-Type => 'Application/json'</small></p>  
                                 <p><small>Body   :</small> </p>
                                                            <p>{
                                                                "user" : "kutub@gmail.com",
                                                                "author" : "hmasad09@gmail.com"
                                                              }</p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/3rd.gif') }}" style="height:350px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>  




        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">            
                <div class="card-header"><strong>(##) 10. As a developer, I need an API to retrieve all the unread blog post title of a user based on a follower.</strong></div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       
                                 <p><strong><small>Possible Way to Get Result : </small></strong>
                                    <div><strong>(i).</strong> GET METHOD  <strong>(ii)</strong> POST METHOD</div></p>
                                 <small><strong>APi Url (<srong>Method Used:</srong> POST)</strong></small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/author/unread/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <p><small>Header : Accept => 'Application/json'</small></p>
                                 <p><small>Header : Content-Type => 'Application/json'</small></p>  
                                 <p><small>Body   :</small> </p>
                                                            <p>{ "user": "kutub@gmail.com", "author": "hmasad09@gmail.com" }</p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/4th.gif') }}" style="height:350px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>  


    </div>
</div>


@endsection

