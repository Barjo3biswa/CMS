@extends('admin.layouts.master')
@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Notification</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Add </li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Add </h3>
                    </div>
                    <form action="{{route('admin.notification.update',Crypt::encrypt($record->id))}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Title</label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Title" value="{{$record->title??null}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Description</label>
                                <input type="text" class="form-control" name="description" placeholder="Enter Description" value="{{$record->description??null}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Date</label>
                                <input type="date" class="form-control" id="date" name="date" value="{{$record->date??null}}">
                            </div>

                            <div class="form-group">
                                <label for="">Select Section</label>
                                <div class="row">
                                    @foreach ($news_sections as $section )
                                        <div class="col-md-3">
                                            <input type="checkbox" id="type" name="news_section_id[]" value="{{$section->id}}" @if (in_array($section->id,[$record->news_type_id]))
                                                checked
                                            @endif> {{$section->name}}
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label for="">Choose</label>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" id="type" name="type" value="1" {{$record->news_type==1?'checked':""}}> Upload File
                                    </div>

                                    <div class="col-md-3">
                                        <input type="radio" id="type" name="type" value="2" {{$record->news_type==2?'checked':""}}> Enter Url
                                    </div>
                                    <div class="col-md-3">
                                        <input type="radio" id="type" name="type" value="3" {{$record->news_type==3?'checked':""}}> Add Details
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="file_div">
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">File</label>
                                    <input type="file" class="form-control" id="" name="file">
                                </div>
                            </div>
                            <div class="form-group" id="url_div">
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">Add URL</label>
                                    <input type="text" class="form-control" id="" name="url" value="{{$record->url}}">
                                </div>
                            </div>

                            <div class="form-group" id="details_div">
                                <div class="col-md-12">
                                    <label for="exampleInputPassword1">Details</label>
                                    <textarea name="details" id="" class="form-control">{{$record->details}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-xs">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script>
        $( document ).ready(function() {
            $("#file_div").hide();
            $("#url_div").hide();
            $("#details_div").hide();
            $('input[type="radio"]').click(function(){
                var inputValue = $(this).attr("value");
                // alert(inputValue);
                if (inputValue == 1) {
                    $("#file_div").show();
                    $("#url_div").hide();
                    $("#details_div").hide();
                }else if(inputValue == 2){
                    $("#file_div").hide();
                    $("#details_div").hide();
                    $("#url_div").show();
                }else{
                    $("#details_div").show();
                    $("#file_div").hide();
                    $("#url_div").hide();
                }
            });
        });
        $(document).ready(function() {
            var inputValue=$('input[type="radio"]:checked').val();
                if (inputValue == 1) {
                    $("#file_div").show();
                    $("#url_div").hide();
                    $("#details_div").hide();
                }else if(inputValue == 2){
                    $("#file_div").hide();
                    $("#details_div").hide();
                    $("#url_div").show();
                }else{
                    $("#details_div").show();
                    $("#file_div").hide();
                    $("#url_div").hide();
                }
        });
    </script>
@endsection
