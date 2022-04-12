@component('mail::message')
# Idea Status updated

The Idea {{ $idea->title }}

Has been updated to a status of:

{{$idea->status->name}}

@component('mail::button', ['url' => route('idea.show', $idea)])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
