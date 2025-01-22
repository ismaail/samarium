<div>


  {{--
  |
  | Toolbar.
  |
  --}}

  <x-toolbar-component>
    <x-slot name="toolbarInfo">
      Contact message
      <i class="fas fa-angle-right mx-2"></i>
      {{ $contactMessage->contact_message_id }}
    </x-slot>
    <x-slot name="toolbarButtons">
      <x-toolbar-button-component btnBsClass="btn-light" btnClickMethod="$refresh">
        <i class="fas fa-refresh"></i>
      </x-toolbar-button-component>
      <x-toolbar-button-component btnBsClass="btn-danger" btnClickMethod="$dispatch('exitContactMessageDisplay')">
        <i class="fas fa-times"></i>
        Close
      </x-toolbar-button-component>
    </x-slot>
  </x-toolbar-component>

  <div class="row-rm">
    <div class="col-md-12-rm">
      <div class="bg-white p-3-rm border">
        <div class="row-rm">
          <div class="col-md-12-rm d-flex flex-column justify-content-center">
            <div class="table-responsive">
              <table class="table border-bottom mb-0">
                <tbody>
                  <tr class="border-0">
                    <th class="border-0 o-heading">
                      Sender Name
                    </th>
                    <td class="border-0">
                      {{ $contactMessage->sender_name }}
                    </td>
                  </tr>
                  <tr>
                    <th class="o-heading">
                      Sender Phone
                    </th>
                    <td>
                      {{ $contactMessage->sender_phone }}
                    </td>
                  </tr>
                  <tr>
                    <th class="o-heading">
                      Sender Email
                    </th>
                    <td>
                      {{ $contactMessage->sender_email }}
                    </td>
                  </tr>
                  <tr>
                    <th class="o-heading">
                      Message
                    </th>
                    <td>
                      {{ $contactMessage->message }}
                    </td>
                  </tr>
                  <tr wire:key="{{ rand() }}">
                    <th class="o-heading">
                      Status
                    </th>
                    <td>
                      <div>
                        @if ($modes['updateStatus'])
                          <select class="custom-control w-75" wire:model="contact_message_status">
                            <option value="new">New</option>
                            <option value="progress">Progress</option>
                            <option value="done">Done</option>
                          </select>
                          <div class="my-3">
                            <button class="btn btn-sm btn-success ml-2" wire:click="changeStatus">
                              Save
                            </button>
                            <button class="btn btn-sm btn-danger ml-2" wire:click="exitMode('updateStatus')">
                              Cancel
                            </button>
                          </div>
                        @else
                          <div role="button" wire:click="enterMode('updateStatus')">
                            @if ($contactMessage->status == 'new')
                              <span class="badge badge-danger badge-pill">
                                New
                              </span>
                            @elseif ($contactMessage->status == 'progress')
                              <span class="badge badge-warning badge-pill">
                                Progress
                              </span>
                            @elseif ($contactMessage->status == 'done')
                              <span class="badge badge-success badge-pill">
                                Done
                              </span>
                            @else
                              {{ $contactMessage->status }}
                            @endif
                          </div>
                        @endif
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-white border">
        <div class="table-responsive">
          <table class="table border-bottom mb-0">
            <tbody>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>


</div>
