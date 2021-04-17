<div class="brands-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="brand-wrapper">
                    <div class="brand-list">
                        @foreach($brands as $brand)
                        <img src="{{asset($brand->image)}}" alt="{{$brand->name}}">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End brands area -->
