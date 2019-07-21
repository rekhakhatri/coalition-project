@extends('layouts.app')
@section('content')
       @if(count($errors) > 0)
          <ul class="list-group">
               @foreach($errors->all() as $error)
                  <li class="list-group-item text-danger">
                     {{ $error }}
                  </li>
               @endforeach
           </ul>   
       @endif
     <div class="panel panel-default">
         <div class="panel-heading text-info">
             <h4>Heading</h4>
         </div>
         <div class="panel-body">
            <form action="" method="post" enctype="multipart/form-data">
                  {{ csrf_field() }}

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title" id="title">
                </div>
                <div class="form-group">
                    <label for="featured">Featured</label>
                    <input type="file" name="featured" id="featured">
                </div>   
                <div class="form-group">
                        <div class="text-center">
                             <button class="btn btn-success" type="submit">
                                  Store Post
                             </button>
                        </div>
                   </div>
               
            </form>
         </div>
     </div>
@endsection

@section('styles')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
@endsection

@section('scripts')
 <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
 <script>
     $(document).ready(function() {
        $('#content').summernote();
     });
 </script>
@endsection