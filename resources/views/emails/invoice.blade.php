<x-mail::message>
# Introduction

- **User Name:** {{ $mailData['data']['user_name'] }}
- **User Email:** {{ $mailData['data']['user_email'] }}
- **Pricing Name:** {{ $mailData['data']['plan_name'] }}
- **Pricing Price:** $ {{ $mailData['data']['plan_price'] }}
- **Pricing Duration:** {{ $mailData['data']['plan_duration'] }} Days
- **Pricing Expired Date:** {{ date('d M y', strtotime($mailData['data']['expired_date'])) }}



@component('mail::button', ['url' => $mailData['data']['details']])
For more details, you can view the invoice here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
