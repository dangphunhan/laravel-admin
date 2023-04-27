{{-- @extends('layout-home')
@section('content') --}}
    <section class="blog-posts">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 style="color: black">{{$postDetail->title}}</h1>
                  <p>{!!$postDetail->content!!}</p>
                </div>
            </div>
        </div>
    </section>
{{-- @endsection --}}
