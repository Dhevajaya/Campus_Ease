@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('storage/'.web_settings('web', 'website_logo_dark'))}}" class="logo" alt="Laravel Logo" style="width: 200px;height:100px;">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
