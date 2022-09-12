<div class="grid grid-flow-row-dense grid-cols-6 grid-rows-4">
    @foreach($cards as $class)
        @foreach($class as $card)
            <div class="rounded-lg m-1 relative"
                 style="width: 260px"
                 x-data="{photo: false}"
                 @mouseover="photo = true"
                 @mouseleave="photo = false">
                <img src="{{ $card['file'] }}" alt="{{ $card['filename'] }}" class="imgsmall border-2 border-gray-400 rounded-lg w-auto h-auto"/>

                <div x-show="photo" class="absolute top-0 left-0 rounded-lg shadow-xl z-50"
                     style="width: 600px">
                    <img src="{{ $card['file'] }}" alt="{{ $card['filename'] }}" class="rounded-lg w-auto h-auto"/>
                </div>
            </div>
        @endforeach
    @endforeach
</div>