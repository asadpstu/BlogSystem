@extends('layouts.app')

@section('content')
@php
    $i = 0
@endphp
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=94licg4jastcl3ih22do77fl3dtjzm299g4ogivj9qycu9as"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                        <?php
                         $check = NULL; 
                         if($follow == "TRUE")
                         {
                           $followCss = "none";
                           $unfollowCss = "";
                         }
                         else
                         {
                           $followCss = "";
                           $unfollowCss = "none";
                         }
                        ?>              
                <div class="card-header"><strong>Blog Details</strong></div>

                <div class="card-body">

                    <div style="margin-bottom: 20px;">                       
                        <form action="{{ url('/') }}<?php echo $check == NULL ? '/blog/post' : '/blog/post/update'; ?>" method="post" name="form1" id="form1">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                          <input type="hidden" name="bloggerId" id="bloggerId" value="{{ Auth::user()->id }}"> 
                          <input type="hidden" name="bloggId" id="bloggId" value="@if(!empty($blogDetails)){{ $blogDetails->id }} @endif"> 
                          <div class="form-group">
                            @if(!empty($blogDetails))
                            <strong>{!! $blogDetails->title !!} </strong> 
                            @endif 
                            <span style="float: right;"><i class="fa fa-eye" style="font-size:20px;color:blue;"></i><span>&nbsp;{{ $blogDetails->like + 1 }}</span></span>                           
                          </div>
                            
                               
                          <div class="form-group" style="margin-top: 10px">
                                @if(!empty($blogDetails))
                                {!! $blogDetails->blogDescription !!}  
                                @endif       
                          </div>


                        </form>
                          
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                  <h6>All Blog's by - </h6>
                  @if(!empty($blogDetails))
                    <strong>  {!! $blogDetails->getBlogPosterName() !!} </strong>  
                  @endif 
                  

                  <span id="follow" align="center" style="float: right;height:23px;width:70px;border: 1px solid blue;color:WHITE;background-color: blue;cursor: pointer;display:{{$followCss}}" onclick="follow({{ Auth::user()->id }},{{ $blogDetails->bloggerId }})">Follow</span>
                  
                  <span id="following" align="center" style="float: right;height:23px;width:70px;border: 1px solid orange;color:WHITE;background-color: orange;cursor: pointer;display:{{$unfollowCss}}" onclick="unfollow({{ Auth::user()->id }},{{ $blogDetails->bloggerId }})">Following</span>
                  
                </div>
                  @if(!empty($blogList))

                      @foreach($blogList as $single)

                          <div style="margin-left:15px;margin-top: 5px;">
                              <a href="/blog/details/{{ $single->id }}/{{ $single->bloggerId }}"> {{++$i .". ". $single->title }} </a>
                          </div> 
                           
                      @endforeach  
                  @else
                      No Data
                  @endif
            </div>
        </div>
    </div>
</div>


@endsection


