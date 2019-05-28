@extends('layouts.app')

@section('content')
<div class="container">
    <form action="/p" method="post" enctype="multipart/form-data">
        @csrf
            <div class="row">
                    <div class="col-8 offset-2">
                        <div class="row">
                            <h1 > Add Post  </h1>
                        </div>
                            <div class="form-group row">
                                    <label for="caption" class="col-md-4 col-form-label">Post Caption</label>

                                        <input 
                                                    id="caption" 
                                                    type="text" 
                                                    name="caption"
                                                    class="form-control @error('caption') is-invalid @enderror" 
                                                    value="{{ old('caption') }}" 
                                                    required autocomplete="caption" 
                                                    autofocus
                                        >
            
                                        @error('caption')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                   
                            </div>

                            <div class="row">
                               
                                    <label for="image" class="col-md-4 col-form-label">Image Caption</label>
                                    <input type="file" class="form-control-file" id="image" name="image">
                
                            
                                    @if ($errors->has('image'))
                                        <strong> {{ $errors->first('image') }} </strong>
                                    @endif
                            </div>
                
                
                            <div class="row pt-4">
                             
                                    <button class="btn btn-primary">Add New Post</button>
                            
                            </div>
                    </div>
            </div>
    </form>
</div>
@endsection
