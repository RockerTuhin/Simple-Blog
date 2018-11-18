<h3>You have a new Contact via the contact form</h3>
<div>
	{{ $bodyMessage }}
</div>
{{-- <p>Sent via {{ $from }}</p> --}}
<p>Sent to {{ $to }}</p>
<img src="{{ URL::to($attach_file) }}">