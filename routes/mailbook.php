<?php

use App\Mail\MailbookMail;
use Xammie\Mailbook\Facades\Mailbook;

Mailbook::add(MailbookMail::class);

Mailbook::add(\App\Mail\NewAppointmentMailable::class);
Mailbook::add(\App\Mail\AppointmentStatusChangedMailable::class);
Mailbook::add(\App\Mail\UserAppointmentChangeMailable::class);
