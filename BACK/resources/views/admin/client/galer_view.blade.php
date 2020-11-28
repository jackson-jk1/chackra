
<div id="Section_image">
    <div class="card-deck">
        @foreach($galleries as $gallery)
            <div class=" card_img card ">
                <img class="card-img-top small_img" src="{{asset('storage/'.$gallery->path)}}" >
            </div>
        @endforeach
    </div>
</div>


