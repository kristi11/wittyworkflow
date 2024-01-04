<x-mail::message>
# Appointment status changed

@if($appointment->appointment_status == 'confirmed')
The appointment has been confirmed. See you soon!
@elseif($appointment->appointment_status == 'pending')
The appointment is currently {{ ucwords($appointment->appointment_status)}}.
@elseif($appointment->appointment_status == 'rescheduled')
The appointment has been {{ $appointment->appointment_status }}. The new appointment date is {{ \Carbon\Carbon::parse($appointment->rescheduled_date)->format('D, d M Y') }} at {{ \Carbon\Carbon::parse($appointment->rescheduled_time)->format('g:i A') }}. Any dates and time below are no longer valid.
@elseif($appointment->appointment_status == 'cancelled')
The appointment was {{ ucwords($appointment->appointment_status) }}.
@elseif($appointment->appointment_status == 'no_show')
The appointment is a {{ ucwords(str_replace('_', ' ', $appointment->appointment_status)) }}.
@else
The appointment is {!! ucwords($appointment->appointment_status). '. If you have a minute we would love it if you would leave us a review.'.' Thank you for your business and we hope to see you soon.'  !!}.
@endif

<x-mail::panel>
    Appointment name: {{ $appointment->name }}<br>
    Appointment date: {{ \Carbon\Carbon::parse($appointment->date)->format('D, d M Y') }}<br>
    Appointment time: {{ \Carbon\Carbon::parse($appointment->appointment_time)->format('g:i A') }}<br>
    Appointment status: {{ ucwords($appointment->appointment_status) }}<br>
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
<x-mail::button :url="''">
    GOOGLE reviews
</x-mail::button>

<x-mail::button :url="''">
    YELP reviews
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
