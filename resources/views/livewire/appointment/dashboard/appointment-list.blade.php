<div>

  <!-- Flash message div -->
  @if (session()->has('message'))
    @include ('partials.flash-message', [
        'flashMessage' => session('message'),
    ])
  @endif

  <button wire:loading class="btn btn-danger-rm" style="font-size: 1.5rem;">
    <div class="spinner-border text-info mr-3" role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </button>

  {{-- Top flash cards --}}
  @if (true)
  <div class="row">
    <div class="col-md-6">
      <div class="mb-4">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-edit',
            'btnTextPrimary' => 'Appointments',
            'btnTextSecondary' => $appointmentCount,
        ])
      </div>
    </div>

    <div class="col-md-6">
      <div class="mb-4">
        @include ('partials.misc.glance-card', [
            'bsBgClass' => 'bg-white',
            'btnRoute' => '',
            'iconFaClass' => 'fas fa-calendar',
            'btnTextPrimary' => 'Today',
            'btnTextSecondary' => $appointmentTodayCount,
        ])
      </div>
    </div>
  </div>
  @endif


  {{-- Show in bigger screens --}}
  <div class="table-responsive d-none d-md-block">
    @if ($appointments && count($appointments) > 0)
      <table class="table table-sm-rm table-bordered-rm table-hover shadow-sm border">
        <thead>
          <tr class="{{ env('OC_ASCENT_BG_COLOR', 'bg-success') }}
              {{ env('OC_ASCENT_TEXT_COLOR', 'text-white') }}
              p-4" style="font-size: 1rem;">
            <th>
              ID
            </th>
            <th>
              Staff name
            </th>
            <th>
              Applicant name
            </th>
            <th class="d-none d-md-table-cell">
              Applicant phone
            </th>
            <th>
              Description
            </th>
            <th class="d-none d-md-table-cell">
              Date
            </th>
            <th>
              Time
            </th>
            <th>
              Status
            </th>
          </tr>
        </thead>

        <tbody class="bg-white">
          @foreach ($appointments as $appointment)
            <tr>
              <td>
                {{ $appointment->appointment_id }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ $appointment->teamMember->name }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ $appointment->applicant_name }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ $appointment->applicant_phone }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ $appointment->applicant_description }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ \Carbon\Carbon::create($appointment->appointment_date_time)->toDateString() }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                {{ \Carbon\Carbon::create($appointment->appointment_date_time)->toTimeString() }}
              </td>
              <td class="h5 font-weight-bold d-none d-md-table-cell">
                <span class="badge badge-primary">Open</span>
              </td>
              @if (false)
              <td>
                @if (false)
                <div class="dropdown">
                  <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-cog text-secondary"></i>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-file text-primary mr-2"></i>
                      View
                    </button>
                    <button class="dropdown-item" wire:click="">
                      <i class="fas fa-trash text-danger mr-2"></i>
                      Delete
                    </button>
                  </div>
                </div>
                @endif
                <div>
                  <button class="btn" wire:click="deleteContactMessage({{ $contactMessage }})">
                    <i class="fas fa-trash text-danger mr-1"></i>
                    Delete
                  </button>
                  @if ($modes['deleteContactMessageMode'])
                    @if ($deletingContactMessage->contact_message_id == $contactMessage->contact_message_id)
                      <span class="btn btn-danger mx-3" wire:click="confirmDeleteContactMessage">
                        Confirm delete
                      </span>
                      <span class="btn btn-light mr-3" wire:click="deleteContactMessageCancel">
                        Cancel
                      </span>
                    @endif
                  @endif
                </div>

              </td>
              @endif
            </tr>
          @endforeach
        </tbody>
      </table>
    @else
      <div class="p-3 text-secondary">
        No contact messages.
      </div>
    @endif

  </div>

  @if (false)
  @if ($modes['confirmDeleteMode'])
    @livewire ('todo-list-confirm-delete', ['todo' => $deletingTodo,])
  @endif
  @endif
</div>