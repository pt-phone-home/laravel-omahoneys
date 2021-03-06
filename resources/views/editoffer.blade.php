@extends('adminmaster')

@section('title')

Edit Offer

@endsection

@section('content')



<div class="form-container">
<form action="/offer/{{$offer->id}}" method="POST" class="form my-l" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Offer Title:</label>
        <input type="text" name="title" value="{{$offer->title}}" placeholder="Offer Title" required>
        </div>

        <div class="form-group">
            <label for="valid">Valid Until:</label>
        <input type="text" name="valid" value="{{$offer->valid}}" placeholder="Offer Valid Until..." required>
        </div>

        <div class="form-group">
            <label for="detail">Offer Detail: (suggested max 100 characters)</label>
        <textarea name="detail" id="" cols="30" rows="10" placeholder="Information about offer" required>{{$offer->detail}}</textarea>
        </div>
        <div class="form-group">
            <label for="img">Upload Image (Optional):</label>
            <input type="file" name="img" id="img">
         </div>

         <div class="form-group">
             <button>Update</button>
         </div>

    </form>
</div>

@endsection

@section('scripts')
<script src="https://cdn.ckeditor.com/4.11.1/standard-all/ckeditor.js"></script>
<script>
        CKEDITOR.replace('detail', {
            toolbarGroups:[{
                'name': 'basicstyles', 
                'groups': ['basicstyles']
            },
            {
                'name': 'clipboard',
                'groups': ['clipboard', 'undo']
            },
            {
                'name': 'paragraph',
                'groups': ['list', 'indent', 'blocks']
            },
            {
                'name': 'styles',
                'groups': ['styles']
            }
            ]
        });
    </script>
@endsection