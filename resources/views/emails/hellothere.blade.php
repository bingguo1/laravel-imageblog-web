@component('mail::message')
# Greetings!

Welcome to We Like Games.  We have fun talking about games.

- Add Games
- Add Reviews
- Browse the Best Games

@component('mail::button', ['url' => 'http://localhost:8000/'])
Browse Some Blogs!
@endcomponent


@component('mail::panel')
Write a Blog!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
