<div class="card card-unit flex" data-cardid="{{ Str::lower($card['set'] . $card['number'] . '-' . $card['version'] . '-' . $lang) }}" data-number="{{ $card['number'] }}">
    <div class="template justify-center">

        <div class="unit unit-{{ $card['class'] }}"></div>
        <div class="cost cost-{{ $card['class'] }}">{{ $card['cost'] }}</div>

        <div class="skill-type-vanguard skill-{{ $card['class'] }}-{{ $card['vanguard']['type'] }}">{{ Str::upper($card['vanguard']['type']) }}</div>
        <div class="skill-type-rearguard skill-{{ $card['class'] }}-{{ $card['rearguard']['type'] }}">{{ Str::upper($card['rearguard']['type']) }}</div>
        <div class="skill-type-ultimate skill-{{ $card['class'] }}-{{ $card['ultimate']['type'] }}">{{ Str::upper($card['ultimate']['type']) }}</div>

        <div class="skill-vanguard skill-{{ $card['vanguard']['type'] }}">{{ $card['vanguard']['cost'] }}</div>
        <div class="skill-rearguard skill-{{ $card['rearguard']['type'] }}">{{ $card['rearguard']['cost'] }}</div>
        <div class="skill-ultimate skill-{{ $card['ultimate']['type'] }}">{{ $card['ultimate']['cost'] }}</div>

        <div class="skill-text skill-text-vanguard"><div><div>{{ $card['vanguard']['desc'][$lang] }}</div></div></div>
        <div class="skill-text skill-text-rearguard"><div><div>{{ $card['rearguard']['desc'][$lang] }}</div></div></div>
        <div class="skill-text skill-text-ultimate"><div><div>{{ $card['ultimate']['desc'][$lang] }}</div></div></div>

        <div class="art" style="background-image: url('./assets/art/{{ $card['set'] }}/{{ $card['set'] . $card['number'] }}.png');"></div>

        <div class="stats stats-{{ $card['class'] }}"></div>
        <div class="attack">{{ $card['atk'] }}</div>
        <div class="defense">{{ $card['def'] }}</div>

        <div class="title">{{ $card['name'][$lang] }}</div>

        <div class="skills-traits skills">
            @foreach ($card['skill'] as $skill)
                {{ '{' . $skill . '}' }}
            @endforeach
        </div>

        <div class="skills-traits traits">
            @foreach ($card['trait'] as $trait)
                {{ '[' . $trait . ']' }}
            @endforeach
        </div>

        <div class="credits"></div>
        <div class="cardnumber">{{ Str::upper($card['set'] . $card['number'] . '-' . $card['version'] . '-' . $lang . '-' . $card['rarity'][0]) }}</div>

    </div>
</div>