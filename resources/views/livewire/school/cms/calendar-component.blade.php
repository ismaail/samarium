<div class="container py-3">
  @if (false)
  <div class="border p-3 mb-4">
    <button class="btn btn-light badge-pill border mr-4" wire:click="enterMode('eventCreate')">Add event</button>
    <button class="btn btn-light badge-pill border mr-4" wire:click="">Select month</button>
  </div>
  @endif

  @if (false)
  @else
  <div class="border-rm bg-white mb-4">
    <div class="d-flex">
      <div class="dropdown mr-4" style="position: relative; z-index: 10000;">
        <button class="btn btn-primary dropdown-toggle" type="button" id="monthDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Month
        </button>
        <div class="dropdown-menu" aria-labelledby="monthDropdownMenu">
          <button class="dropdown-item" type="button" wire:click="selectMonth('Baisakh')">Baisakh</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Jestha')">Jestha</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Asadh')">Asadh</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Shrawan')">Shrawan</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Bhadra')">Bhadra</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Ashwin')">Ashwin</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Kartik')">Kartik</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Mangsir')">Mangsir</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Poush')">Poush</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Magh')">Magh</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Falgun')">Falgun</button>
          <button class="dropdown-item" type="button" wire:click="selectMonth('Chaitra')">Chaitra</button>
        </div>
      </div>
      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>

  <div class="border bg-white p-0">
    @if ($displayMonthName)
      <h3 class="h5 mr-4 text-center my-4">
        <span class="mr-2">
          2079
        </span>
        {{ $displayMonthName }}
      </h3>
      <div class="table-responsive border">
        <table class="table table-sm table-bordered w-auto-rm mb-0">
          <thead>
            <tr>
              <th class="w-25">Date</th>
              @if (false)
              <th class="w-25">Day</th>
              @endif
              <th>Details</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($monthBook as $day)
              <tr
                  class="
                      @if ($day['day']->format('l') == 'Saturday') table-danger @endif
                      @if ($day['is_holiday']) table-danger @endif
                  "
              >
                <td>
                  <div>
                    <span class="mr-3">
                      {{ $displayMonthName }}
                      {{ $loop->iteration }}
                    </span>
                    <span class="text-secondary-rm mr-3" style="font-size: 0.5rem;">
                      @if (false)
                      {{ $day['day']->format('Y F d') }}
                      @endif
                      {{ $day['day']->format('F d') }}
                    </span>
                    <span class="text-secondary-rm mr-3" style="font-size: 0.5rem;">
                      {{ $day['day']->format('l') }}
                    </span>
                  </div>
                  <div>
                  </div>
                </td>
                @if (false)
                <td>
                  {{ $day['day']->format('l') }}
                </td>
                @endif
                <td>
                  @if ($day['day']->format('l') == 'Saturday')
                    <span class="">
                      Holiday
                    </span>
                    <br />
                  @endif
                  @foreach ($day['events'] as $event)
                    <span class="">
                      {{ $event->title }}
                    </span>
                    <br />
                  @endforeach
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @else
      Select a month
    @endif
  </div>
  @endif

</div>