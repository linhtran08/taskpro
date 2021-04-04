@switch($state)
    @case('finished')
        bg-success
    @break
    @case('in processing')
        bg-warning
    @break
    @case('open')
        bg-info
    @break
@endswitch
