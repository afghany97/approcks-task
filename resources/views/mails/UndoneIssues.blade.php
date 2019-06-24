@component('mail::message')
    # You Have un-done issues

    @foreach($issues as $issue)

        {{$issue->title}} Should done before {{$issue->deadline}}

    @endforeach

    Thanks,<br>
    {{ config('app.name') }}
@endcomponent
