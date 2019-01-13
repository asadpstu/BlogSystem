@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Customer Home</div>

                <main role="main" class="container">
                    @if(!empty($blogList))
                    @foreach ($blogList as $single)
                        <div style="margin: 10px;"> 
                          <span ><strong>{{$single->title}}</strong></span>
                          <span style="float:right">
                            <small>Posted by -</small> <small>{{ $single->getBlogPosterName() }}</small> 
                            <small style="margin-left: 10px;">Date: </small>
                            <small>
                             {{ \Carbon\Carbon::parse($single->updated_at)->format('d D, Y')}}
                            </small>
                          </span>
                          <div >
                            
                                <?php 
                                $id = $single->id;
                                $bloggerId = $single->bloggerId;
                                $short = implode('. ', array_slice(explode('.', $single->blogDescription), 0, 2)) . '.';
                                ?>
                                {!! $short !!}
                           
                             <a href='/blog/details/{{$id}}/{{$bloggerId}}'> Read More </a> 
                          </div>
                        </div>
                        <hr>
                    @endforeach
                    {{ $blogList->links() }}
                    @else
                    <div style="margin: 10px">
                    No Post Yet by any Sales Person !
                    </div>
                    @endif
                </main>
            </div>
        </div>
    </div>
</div>
@endsection
