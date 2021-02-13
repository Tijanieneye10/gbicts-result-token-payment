@component('mail::message')
# Dear {{ auth()->user()->full_name }}
You just purchased {{ $result->count() }} token(s)

@foreach($result as $value)
<li>{{ $value->card_no }}</li>
@endforeach

Thanks,<br>
{{ config('app.name') }}
@endcomponent
