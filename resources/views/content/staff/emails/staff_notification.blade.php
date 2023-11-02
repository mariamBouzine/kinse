@component('mail::message')
# Staff Status Update Notification

Hello Coach,

The status of staff {{ $staff->First_Name }} {{ $staff->Last_Name }} has been updated to {{ $staff->Status }}.

Thank you,<br>
Your Application
@endcomponent