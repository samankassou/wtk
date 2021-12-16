@if ($status == 'approved')
    <span class="badge badge-success">
        {{ $status }}
    </span>
@elseif ($status == 'pending')
    <span class="badge badge-warning">
        {{ $status }}
    </span>
@elseif ($status == 'rejected')
    <span class="badge badge-danger">
        {{ $status }}
    </span>
@else
    <span class="badge">
        {{ $status }}
    </span>
@endif
