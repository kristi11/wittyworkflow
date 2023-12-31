<x-mail::message>
# Appointment cancelled

The appointment was canceled by {{ $appointment->client_name }}. This appointment is no longer valid.

<x-mail::panel>
    Appointment name: {{ $appointment->name }}<br>
    Appointment date: {{ \Carbon\Carbon::parse($appointment->date)->format('D, d M Y') }}<br>
    Appointment time: {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}<br>
    Client name: {{ $appointment->client_name }}<br>
    Client email: {{ $appointment->client_email }}<br>
    Client phone: {{ $appointment->client_phone }}<br>
    @if($appointment->client_message)
        Client message: {{ $appointment->client_message }}<br>
    @endif
    @if($appointment->client_referer)
        Client referrer: {{ $appointment->client_referer }}<br>
    @endif
</x-mail::panel>

Please leave us a review on GOOGLE or YELP.
<x-mail::button :url="'https://maps.app.goo.gl/v683u4wSmHy1oxTB9'">
    GOOGLE reviews
</x-mail::button>

<x-mail::button :url="'https://www.yelp.com/biz/everything-hair-salon-middle-village'">
    YELP reviews
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
