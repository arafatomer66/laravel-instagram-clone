@extends('layouts.app')

@section('content')
<form action="/profile/{{$user->id}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
        <div class="row">
                <div class="col-8 offset-2">
                    <div class="row">
                        <h1 > Edit Post  </h1>
                    </div>
                        <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label">Title</label>

                                    <input 
                                                id="title" 
                                                type="text" 
                                                name="title"
                                                class="form-control @error('title') is-invalid @enderror" 
                                                value="{{ old('title')  ?? $user->profile->title  }}" 
                                                required autocomplete="title" 
                                                autofocus
                                    >
        
                                    @error('title')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                               
                        </div>


                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label">Description</label>

                                <input 
                                            id="description" 
                                            type="text" 
                                            name="description"
                                            class="form-control @error('description') is-invalid @enderror" 
                                            value="{{ old('description') ?? $user->profile->description }}" 
                                            required autocomplete="description" 
                                            autofocus
                                >
    
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>

                        
                        <div class="form-group row">
                            <label for="url" class="col-md-4 col-form-label">URL</label>

                                <input 
                                            id="url" 
                                            type="text" 
                                            name="url"
                                            class="form-control @error('url') is-invalid @enderror" 
                                            value="{{ old('url') ?? $user->profile->url }}" 
                                            required autocomplete="url" 
                                            autofocus
                                >
    
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                           
                        </div>




                        <div class="row">
                           
                                <label for="image" class="col-md-4 col-form-label">Profile Picture</label>
                                <input type="file" class="form-control-file" id="image" name="image">
            
                        
                                @if ($errors->has('image'))
                                    <strong> {{ $errors->first('image') }} </strong>
                                @endif
                        </div>
            
            
                        <div class="row pt-4">
                         
                                <button class="btn btn-primary">Save Profile</button>
                        
                        </div>
                </div>
        </div>
</form>
@endsection
