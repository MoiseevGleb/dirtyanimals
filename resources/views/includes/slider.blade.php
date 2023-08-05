@if($images)
    <div class="slider">
        <div class="swiper">
            <div class="swiper-wrapper">
                @foreach($images as $image)
                    <div class="swiper-slide" style="background-image: url({{ asset('storage/images/slider/' . $image) }})"></div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
@endif
