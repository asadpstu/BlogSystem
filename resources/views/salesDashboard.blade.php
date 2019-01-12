@extends('layouts.app')

@section('content')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=94licg4jastcl3ih22do77fl3dtjzm299g4ogivj9qycu9as"></script>
  <script>tinymce.init({ selector:'textarea' });</script>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><strong>Create New Blog Post</strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div style="margin-bottom: 20px;"> 
                          <div class="form-group">
                            <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Blog Title">
                            <small id="emailHelp" class="form-text text-muted">please write blog title meaning full</small>
                          </div>
                            <form>
                              <textarea>Right your blog post ...</textarea>  
                              <div class="form-group" style="margin-top: 10px">
                              <button type="submit" class="btn btn-primary">Save and Publish</button>
                              </div>
                            </form>
                          
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
