@extends('layouts.app')

@section('content')
@php
    $i = 0
@endphp
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=94licg4jastcl3ih22do77fl3dtjzm299g4ogivj9qycu9as"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                        <?php
                         $check = NULL; 
                         if(!empty($blogDetails))
                          {
                            $check = $blogDetails->id ;
                          } 
                        ?>              
                <div class="card-header"><strong><?php echo $check == NULL ? "Create New Blog Post" : "Edit This Blog <a href='/blog'><span style='float:right;'>Create New Blog Post</span></a>"; ?></strong></div>

                <div class="card-body">
                    <span style="float: right;color: green;" >
                        <strong>
                            
                            @if(Session::has('alert'))
                                
                                {{ Session::get('alert') }}
                                
                            @endif   
                            
                        </strong>
                    </span>

                    <div style="margin-bottom: 20px;">                       
                        <form action="{{ url('/') }}<?php echo $check == NULL ? '/blog/post' : '/blog/post/update'; ?>" method="post" name="form1" id="form1">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                          <input type="hidden" name="bloggerId" id="bloggerId" value="{{ Auth::user()->id }}"> 
                          <input type="hidden" name="bloggId" id="bloggId" value="@if(!empty($blogDetails)){{ $blogDetails->id }} @endif"> 
                          <div class="form-group">
                            <input type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title" id="title" aria-describedby="blogTitleHelp" placeholder="Blog Title" value="@if(!empty($blogDetails)){{ $blogDetails->title }} @endif" >
                            @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                            @endif
                            <small class="form-text text-muted">(Please write blog title meaning full)</small>
                          </div>
                            
                               
                          <div class="form-group" style="margin-top: 10px">
                              <textarea name="blogContent" class="form-control{{ $errors->has('blogContent') ? ' is-invalid' : '' }}">
                                @if(!empty($blogDetails)){{ $blogDetails->blogDescription }} 
                                @else
                                Right your blog post ...
                                @endif
                              </textarea> 
                            @if ($errors->has('blogContent'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('blogContent') }}</strong>
                                    </span>
                            @endif
                          </div>

                          <div class="form-group" style="margin-top: 10px">
                              
                              <button type="submit" class="btn btn-primary">Save and Publish</button>
                          </div>

                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header"><strong>Your blog list</strong></div>
                  @if(!empty($blogList))
                      @foreach($blogList as $single)
                      @if(Session::has('alert') && ++$i == '1')
                          <div style="margin-left:15px;margin-top: 5px;font-weight: bolder;!important;">
                              <a href="/blog/post/{{ $single->id }}" > {{$i .". ". $single->title }} </a>
                          </div>
                      @else
                          <div style="margin-left:15px;margin-top: 5px;">
                              <a href="/blog/post/{{ $single->id }}"> {{++$i .". ". $single->title }} </a>
                          </div> 
                      @endif                             
                      @endforeach  
                  @else
                      No Data
                  @endif
            </div>


            <div class="card" style="margin-top: 15px; ">
                <div class="card-header"><strong>People are following you</strong></div>
                  @if(!empty($follower))
                      @foreach($follower as $singleUser)
                      
                          @if($singleUser->hasRestriction == 1)
                          <div  id="restrict_{{$singleUser->id }}" class="btn btn-danger" style="margin: 3px;" onclick="block({{$singleUser->id }},{{$singleUser->hasRestriction }})">
                               {{$singleUser->name }} [Blocked]
                          </div> 
                          @else
                          <div  id="restrict_{{$singleUser->id }}" class="btn btn-warning" style="margin: 3px;" onclick="block({{$singleUser->id }},{{$singleUser->hasRestriction }})">
                               {{$singleUser->name }} 
                          </div> 
                          @endif                          
                                                
                      @endforeach  
                  @else
                      No Data
                  @endif
            </div>            
        </div>
    </div>
</div>


@endsection

<script type="text/javascript">
  function block(id,hasRestriction){

      $.ajax({   
                   type:'POST',  
                   url:"/customer/unfollow",
                   crossDomain: true,
                   data:
                      {
                        id:id,
                        hasRestriction:hasRestriction,
                        _token: $('meta[name="csrf-token"]').attr('content'),
                      },
                   dataType:"json",
                     success :function(response) {
                      console.log(response);

                      },
                      error: function(e) {
                        console.log(e.responseText);
                      } 
      });
      window.location.reload();
  }
</script>