@switch ($person->state)
    @case(\App\Enums\PersonState::Waiting)
        <div class="badge shade-dark {{ $class ?? '' }}">
            {{ __('control.persons.states.waiting') }}
        </div>
        @break

    @case(\App\Enums\PersonState::Accepted)
        <div class="badge shade-green {{ $class ?? '' }}">
            {{ __('control.persons.states.accepted') }}
        </div>
        @break

    @case(\App\Enums\PersonState::Rejected)
        <div class="badge shade-red {{ $class ?? '' }}">
            {{ __('control.persons.states.rejected') }}
        </div>
        @break
@endswitch
