<b>{{ __('Posted On') }}</b>
<p>
    {{ $diaryEntry->created_at->format('F j, Y, g:i a') }}
</p>

<b>Mood</b>
<p>
    {{ ucfirst($diaryEntry->getHumanMood()) }}
</p>

<b>Sleep</b>
<p>
    {{ $diaryEntry->getHumanSleep() }}
</p>

<b>Exercise</b>
<p>
    {{ $diaryEntry->getHumanExercise() }}
</p>

<b>Meditation</b>
<p>
    {{ $diaryEntry->getHumanMeditation() }}
</p>

<b>Alcohol</b>
<p>
    {{ $diaryEntry->getHumanAlcohol() }}
</p>

<b>Energy</b>
<p>
    {{ $diaryEntry->getHumanEnergy() }}
</p>