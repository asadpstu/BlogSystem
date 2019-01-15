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
                <div class="card-header"><strong>Title : &nbsp;&nbsp;</strong> 7. As a developer, I need an API to retrieve the follower list based on a user.</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       
                                 
                                 <small>APi Url (Method Used:  POST )</small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/follower/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <div><small>Header : Accept => 'Application/json'</small></div>
                                 <div><small>Header : Content-Type => 'Application/json'</small></div>  
                                 <hr>
                                 <p><small>Body   :&nbsp;&nbsp;{
                                          "email" : "hmasad09@gmail.com" 
                                          }</small></p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/ezgif.com-video-to-gif.gif') }}" style="height:340px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>



        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">            
                <div class="card-header"><strong>Title : &nbsp;&nbsp;</strong>  8. As a developer, I need an API to retrieve the common follower list between two or more users.</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       

                                 <small>APi Url (Method Used:  POST )</small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/common-follower/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <div><small>Header : Accept => 'Application/json'</small></div>
                                 <div><small>Header : Content-Type => 'Application/json'</small></div>  
                                 <hr> 
                                 <p><small>Body   :&nbsp;&nbsp;{
                                                    "users":
                                                     [
                                                      "hmasad09@gmail.com",
                                                      "rajesh@gmail.com"
                                                    ]
                                                    }</small></p> 
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/commonfollower.gif') }}" style="height:340px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>        


        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">            
                <div class="card-header"><strong>Title : &nbsp;&nbsp;</strong>  9. As a developer, I need an API to block a follower from a user.</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       

                                 <small>APi Url (Method Used:  POST )</small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/author/block/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <div><small>Header : Accept => 'Application/json'</small></div>
                                 <div><small>Header : Content-Type => 'Application/json'</small></div>  
                                 <hr>
                                 <p><small>Body   :&nbsp;&nbsp;{ "user" : "kutub@gmail.com",
                                                      "author" : "hmasad09@gmail.com"
                                                    }</small></p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/3rd.gif') }}" style="height:340px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>  




        <div class="col-md-12" style="margin-top:10px;">
            <div class="card">            
                <div class="card-header"><strong>Title : &nbsp;&nbsp;</strong> 10. As a developer, I need an API to retrieve all the unread blog post title of a user based on a follower.</div>

                <div class="card-body">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-5">
                                <div >                       

                                 <small>APi Url (Method Used:  POST )</small>  
                                 <p style="font-size:10px;color:red">{{ url('/api/user/author/unread/') }}?api_token={{ Auth::user()->api_token }}</p>
                                 <div><small>Header : Accept => 'Application/json'</small></div>
                                 <div><small>Header : Content-Type => 'Application/json'</small></div>  
                                 <hr>
                                 <p><small>Body   :&nbsp;&nbsp;{ "user": "kutub@gmail.com", "author": "hmasad09@gmail.com" }</small></p>  
                                                            
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div><img src="{{ asset('images/4th.gif') }}" style="height:340px;"/></div> 
                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>
        </div>  


    </div>
</div>


@endsection

