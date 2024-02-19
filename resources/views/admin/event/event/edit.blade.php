@extends('admin.layout')

@section('content')
  <div class="page-header">
    <h4 class="page-title">Edit Event</h4>
    <ul class="breadcrumbs">
      <li class="nav-home">
        <a href="{{route('admin.dashboard')}}">
          <i class="flaticon-home"></i>
        </a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Event Page</a>
      </li>
      <li class="separator">
        <i class="flaticon-right-arrow"></i>
      </li>
      <li class="nav-item">
        <a href="#">Edit Event</a>
      </li>
    </ul>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <div class="card-title d-inline-block">Edit Event</div>
          <a class="btn btn-info btn-sm float-right d-inline-block" href="{{route('admin.event.index')}}">
            <span class="btn-label">
              <i class="fas fa-backward" style="font-size: 12px;"></i>
            </span>
            Back
          </a>
        </div>
        <div class="card-body pt-5 pb-5">
          <div class="row">
            <div class="col-lg-6 offset-lg-3">
                {{-- Slider images upload start --}}
                {{-- <div class="px-2">
                    <label for="" class="mb-2"><strong>Slider Images **</strong></label>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-striped" id="imgtable">
                                @if (!is_null($event->image))
                                    @foreach(json_decode($event->image) as $key => $img)
                                        <tr class="trdb" id="trdb{{$key}}">
                                            <td>
                                                <div class="thumbnail">
                                                    <img style="width:150px;" src="{{asset('assets/frontend/images/events/sliders/'.$img)}}" alt="Ad Image">
                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger pull-right rmvbtndb" onclick="rmvdbimg({{$key}},{{$event->id}})">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </table>
                        </div>
                    </div>
                    <form action="" id="my-dropzone" enctype="multipart/formdata" class="dropzone create">
                        @csrf
                        <div class="fallback">
                        </div>
                    </form>
                    <p class="em text-danger mb-0" id="errimage"></p>
                </div> --}}
                {{-- Slider images upload end --}}
                {{-- <form class="mb-3 dm-uploader modal-form" enctype="multipart/form-data" action="{{route('admin.event.upload')}}" method="POST" id="video-frm">
                    <div class="form-row px-2">
                        <div class="col-12 mb-2">
                            <label for=""><strong>Video</strong></label>
                        </div>
                        <div class="col-sm-12">
                            <div class="from-group mb-2">
                               @if(!is_null($event->video))
                                    <video width="320" height="240" controls id="video_src">
                                        <source src="{{ asset("assets/frontend/images/events/videos/".$event->video)}}" type="video/mp4">
                                    </video>
                                @else
                                   No video uploaded yet
                                @endif
                            </div>
                            <div class="mt-4">
                                <div role="button" class="btn btn-primary mr-2">
                                    <i class="fa fa-folder-o fa-fw"></i> Browse Files
                                    <input type="file" title='Click to add Files' id="upload-video" name="upload-video" />
                                </div>
                                <small class="status text-muted">Select a file or drag it over this area..</small>
                                <p class="em text-danger mb-0" id="errblog"></p>
                            </div>
                        </div>
                    </div>
                </form> --}}
              <form id="ajaxForm" class="" action="{{route('admin.event.update')}}" method="post">
                @csrf
                <input type="hidden" name="event_id" value="{{$event->id}}">                
                {{-- START: slider Part --}}

                {{-- START: slider Part --}}
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="">Slider Images ** </label>
                            <br>
                            <div class="slider-thumbs" id="sliderThumbs2">

                            </div>

                            <input id="fileInput2" type="hidden" name="slider" value="" />
                            <button id="chooseImage2" class="choose-image btn btn-primary" type="button" data-multiple="true" data-toggle="modal" data-target="#lfmModal2">Choose Images</button>


                            <p class="text-warning mb-0">JPG, PNG, JPEG images are allowed</p>
                            <p id="errslider" class="mb-0 text-danger em"></p>

                            <!-- slider LFM Modal -->
                            <div class="modal fade lfm-modal" id="lfmModal2" tabindex="-1" role="dialog" aria-labelledby="lfmModalTitle" aria-hidden="true">
                                <i class="fas fa-times-circle"></i>
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body p-0">
                                            <iframe id="lfmIframe2" src="{{url('laravel-filemanager')}}?serial=2&event={{$event->id}}" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- END: slider Part --}}

                <div class="form-group">
                  <label for="">Title **</label>
                  <input type="text" class="form-control" name="title" value="{{$event->title}}" placeholder="Enter title">
                  <p id="errtitle" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label for="">Category **</label>
                  <select class="form-control" name="cat_id">
                    <option value="" selected disabled>Select a category</option>
                    @foreach ($event_categories as $key => $event_category)
                      <option value="{{$event_category->id}}" {{$event_category->id == $event->eventCategories->id ? 'selected' : ''}}>{{$event_category->name}}</option>
                    @endforeach
                  </select>
                  <p id="errcat_id" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label for="">Content **</label>
                  <textarea class="form-control summernote" name="content" data-height="300" placeholder="Enter content">{{$event->content}}</textarea>
                  <p id="errcontent" class="mb-0 text-danger em"></p>
                </div>
                  <div class="form-group">
                      <label for="">Date</label>
                      <input type="date" class="form-control ltr" name="date" value="{{$event->date}}" placeholder="Enter Event Date">
                      <p id="errdate" class="mb-0 text-danger em"></p>
                  </div>
                  <div class="form-group">
                      <label for="">Time</label>
                      <input type="time" class="form-control ltr" name="time" value="{{\Carbon\Carbon::parse($event->time)->format('H:i:s')}}" placeholder="Enter Event Time">
                      <p id="errtime" class="mb-0 text-danger em"></p>
                  </div>
                  <div class="form-group">
                      <label for="">Cost **</label>
                      <input type="number" class="form-control ltr" name="cost" value="{{$event->cost}}" placeholder="Enter Ticket Cost">
                      <p id="errcost" class="mb-0 text-danger em"></p>
                  </div>
                <div class="form-group">
                  <label for="">Available Tickets **</label>
                  <input type="number" class="form-control ltr" name="available_tickets" value="{{$event->available_tickets}}" placeholder="Enter Number of available tickets">
                  <p id="erravailable_tickets" class="mb-0 text-danger em"></p>
                </div>
                  <div class="form-group">
                      <label for="">Venue</label>
                      <input type="text" class="form-control ltr" name="venue" value="{{$event->venue}}" placeholder="Enter Venue">
                      <p id="errvenue" class="mb-0 text-danger em"></p>
                  </div>
                  <div class="form-group">
                      <label for="">Venue Location</label>
                      <input type="text" class="form-control ltr" name="venue_location" value="{{$event->venue_location}}" placeholder="Venue Location">
                      <p id="errvenue_location" class="mb-0 text-danger em"></p>
                  </div>
                  <div class="form-group">
                      <label for="">Venue Phone</label>
                      <input type="text" class="form-control ltr" name="venue_phone" value="{{$event->venue_phone}}" placeholder="Venue Phone">
                      <p id="errvenue_phone" class="mb-0 text-danger em"></p>
                  </div>
                <div class="form-group">
                  <label for="">Meta Keywords</label>
                  <input type="text" class="form-control" name="meta_tags" value="{{$event->meta_tags}}" data-role="tagsinput">
                  <p id="errmeta_keywords" class="mb-0 text-danger em"></p>
                </div>
                <div class="form-group">
                  <label for="">Meta Description</label>
                  <textarea type="text" class="form-control" name="meta_description" rows="5">{{$event->meta_description}}</textarea>
                  <p id="errmeta_description" class="mb-0 text-danger em"></p>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <div class="form">
            <div class="form-group from-show-notify row">
              <div class="col-12 text-center">
                <button type="submit" id="submitBtn" class="btn btn-success">Update</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $("select[name='lang_id']").on('change', function() {
                $("#bcategory").removeAttr('disabled');
                let langid = $(this).val();
                let url = "{{url('/')}}/admin/event/" + langid + "/get-categories";
                $.get(url, function(data) {
                    console.log(data);
                    let options = `<option value="" disabled selected>Select a category</option>`;
                    for (let i = 0; i < data.length; i++) {
                        options += `<option value="${data[i].id}">${data[i].name}</option>`;
                    }
                    $("#bcategory").html(options);

                });
            });
            

            // translatable portfolios will be available if the selected language is not 'Default'
            $("#language").on('change', function() {
                let language = $(this).val();
                if (language == 0) {
                    $("#translatable").attr('disabled', true);
                } else {
                    $("#translatable").removeAttr('disabled');
                }
            });

            $("#upload-video").on('change',function (event){
                let formData = new FormData($('#video-frm')[0]);
                let file = $('input[type=file]')[0].files[0];
                // formData.append('upload_video', file, file.name);
                formData.append('upload_video', file);
                $.ajax({
                    url: '{{route('admin.event.upload')}}',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    type: 'POST',
                    contentType: false,
                    processData: false,
                    cache: false,
                    data: formData,
                    success: function(data) {
                        console.log(data.filename,"edit");
                        $("#my_video").val(data.filename);
                        var url = '{{ asset("assets/frontend/images/events/videos/filename") }}';
                        url = url.replace('filename', data.filename);
                        $("#video_src").attr('src',url);
                    },
                    error: function(data) {
                        console.log(data);
                    }
                })
            })
        });
    </script>
@endsection
