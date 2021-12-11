@if ($status == 'active')
    <span class="badge badge-success">
        {{ $status }}
    </span>
@elseif ($status == 'suspended')
    <span class="badge badge-warning">
        {{ $status }}
    </span>
@else
    <span class="badge">
        {{ $status }}
    </span>
@endif
