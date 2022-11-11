@extends('layouts.app')
@section('content')
  <div class="container">
        <div class="row">
            <div class="col-5">
                <form action="{{route('profile.update')}}" enctype="multipart/form-data"  method="POST" >
                    @csrf
                    @method('PATCH')
                                            <div class="row">
                                                <h1>Edit Profile</h1>
                                            </div>

                                        <div class="row mb-3">
                                            <label for="title" class="col-md-4 col-form-label ">Title</label>
                                             <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror"
                                             title="title" value="{{ old('title') ?? (isset($user->profile->title) ? $user->profile->title : '') }}"  autocomplete="title" autofocus>

                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                            </div>
                                            <div class="row mb-3">

                                                 <input id="user_id" type="hidden" name="user_id" class="form-control @error('user_id') is-invalid @enderror"
                                                 user_id="user_id" value="{{ old('user_id') ?? auth()->user()->id }}"  autocomplete="user_id" autofocus>

                                                        @error('user_id')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>

                                            <div class="row mb-3">
                                                <label for="description" class="col-md-4 col-form-label "> description</label>
                                                 <input id="description" type="text" name="description" class="form-control @error('description') is-invalid @enderror"
                                                 description="description" value="{{ old('description') ??  (isset($user->profile->description) ? $user->profile->description : '') }}"  autocomplete="description" autofocus>

                                                        @error('description')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                </div>
                                                <div class="row mb-3">
                                                    <label for="url" class="col-md-4 col-form-label "> url</label>
                                                     <input id="url" type="text" name="url" class="form-control @error('url') is-invalid @enderror"
                                                     url="url" value="{{ old('url') ??  (isset($user->profile->url) ? $user->profile->url : '') }}"  autocomplete="url" autofocus>

                                                            @error('url')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                    </div>
                                            <div class="row" class="">

                                                <div class="col-6">

                                                <input type="file"
                                                class="filepond"
                                                id="filepond"
                                                name="profile_image"

                                                data-allow-reorder="true"
                                                data-max-file-size="3MB"
                                                data-max-files="3">

                                                </div>

                                                @error('profile_image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <div class="row pt-4 ">
                                                <input type="submit" class="btn btn-success " value="Update profile">
                                            </div>

                                        </div>
                                        </div>

                                    </form>
            </div>
        </div>
  </div>

   <!-- Load FilePond library -->
   <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
   <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js"></script>
   <script src="https://unpkg.com/filepond-plugin-image-validate-size/dist/filepond-plugin-image-validate-size.js"></script>
   <script src="https://unpkg.com/filepond-plugin-image-edit/dist/filepond-plugin-image-edit.js"></script>
   <script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.js"></script>
   <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
    <script>
  FilePond.registerPlugin(
  FilePondPluginImagePreview,
  FilePondPluginImageExifOrientation,
  FilePondPluginFileValidateSize,
  FilePondPluginImageEdit
);

FilePond.setOptions({
                    server: {
                        url:'/temp-upload',
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    }
                });
// Select the file input and use
// create() to turn it into a pond
FilePond.create(
  document.querySelector('input[id="filepond"]'),
  {
    labelIdle: `Drag & Drop your picture or <span class="filepond--label-action">Browse</span>`,
    imagePreviewHeight: 170,
    imageCropAspectRatio: '1:1',
    imageResizeTargetWidth: 100,
    imageResizeTargetHeight: 100,
    stylePanelLayout: 'compact circle',
    styleLoadIndicatorPosition: 'center bottom',
    styleProgressIndicatorPosition: 'right bottom',
    styleButtonRemoveItemPosition: 'left bottom',
    styleButtonProcessItemPosition: 'right bottom',
  }
);
  </script>

@endsection
