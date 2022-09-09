<div class="card card-base flex" data-cardid="{{ $card['set'] }}{{ $card['number'] }}{{ $lang }}" data-number="{{ $card['number'] }}">
    <div class="template justify-center">

        <div class="base base-{{ $card['class'] }}"></div>
        <div class="special-text special-text-{{ $card['class'] }}">
            <div>
                <div>
                    @nl2br($card['special']['desc'][$lang])
                </div>
            </div>
        </div>
        <div class="art" style="background-image: url('./art/{{ $card['set'] }}/{{ $card['set'] }}{{ $card['number'] }}.png');"></div>
        <div class="title">{{ $card['name'][$lang] }}</div>

        <div class="credits"></div>
        <div class="cardnumber">{{ Str::upper($card['set'] . $card['number'] . '-' . $card['version'] . '-' . $lang . '-' . $card['rarity'][0]) }}</div>

    </div>
</div>