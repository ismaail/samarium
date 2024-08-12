<div>

  <div class="d-flex justify-content-between bg-dark-rm text-white-rm py-0 border-rm">
    {{-- Breadcrumb --}}
    <div class="my-2 py-2">
      Insitution

      <i class="fas fa-angle-right mx-2"></i>
      {{ $educInstitution->name }}
    </div>

    {{-- Top tool bar --}}
    <div>
      <div>
        <div class="mt-0 p-2 d-flex justify-content-between border-rm"
            style="{{-- background-color: #dadada; --}}">

          <div>
            <button class="btn btn-light" wire:click="$refresh">
              <i class="fas fa-refresh"></i>
            </button>

            <button class="btn btn-outline-danger" wire:click="$dispatch('exitInstitutionDisplayMode')">
              <i class="fas fa-times"></i>
              Close
            </button>
          </div>

        </div>
      </div>
    </div>
  </div>

  <div class="row" style="margin: auto;">
    <div class="col-md-4">

      <div class="bg-white border mb-3">
        <div class="table-responsive">
          <table class="table">
            <tbody>
              <tr>
                <th>Name</th>
                <td>{{ $educInstitution->name }}</td>
              </tr>
              <tr>
                <th>Country</th>
                <td>{{ $educInstitution->country }}</td>
              </tr>
              <tr>
                <th>Insitution type</th>
                <td>{{ $educInstitution->institution_type }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>

      <div class="bg-white border p-3 mb-3">
        <div class="d-flex justify-content-between mb-3">
          <h2 class="h6 font-weight-bold text-secondary">
            Programs
          </h2>
          <button class="btn btn-primary" wire:click="enterMode('createEducInstitutionProgramMode')">
            <i class="fas fa-plus-circle"></i>
            Add a program
          </button>
        </div>

        @if ($modes['createEducInstitutionProgramMode'])
          <div class="p-3">
            @livewire ('educ.institution.dashboard.institution-program-create', ['educInstitution' => $educInstitution,])
          </div>
        @else
        <div class="table-responsive">
          <table class="table">
              @foreach ($educInstitution->educInstitutionPrograms as $educInstitutionProgram)
                <tr>
                  <td>
                    {{ $educInstitutionProgram->name }}
                  </td>
                  <td>
                    <span class="badge badge-success p-2">
                      {{ $educInstitutionProgram->program_type }}
                    </span>
                  </td>
                  <td>
                    <button class="btn-light border">
                      <i class="fas fa-eye"></i>
                    </button>
                  </td>
                </tr>
              @endforeach
          </table>
        </div>
        @endif

      </div>

    </div>

    <div class="col-md-8">
      <div class="bg-white border">

        <h2 class="h5 font-weight-bold text-primary px-3 pt-3">
          Applications
        </h2>

        <div class="px-3 mb-3">
          <button class="btn btn-outline-primary">
            Applications
          </button>
        </div>


        <div class="table-responsive">
          <table class="table">
              <tr>
                <td>
                  {{ $educInstitution->name }}
                </td>
                <td>
                  <span class="badge badge-success p-2">
                    Approved
                  </span>
                </td>
                <td>
                  <button class="btn-light border">
                    <i class="fas fa-eye"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>
                  {{ $educInstitution->name }}
                </td>
                <td>
                  <span class="badge badge-success p-2">
                    Approved
                  </span>
                </td>
                <td>
                  <button class="btn-light border">
                    <i class="fas fa-eye"></i>
                  </button>
                </td>
              </tr>
              <tr>
                <td>
                  {{ $educInstitution->name }}
                </td>
                <td>
                  <span class="badge badge-success p-2">
                    Approved
                  </span>
                </td>
                <td>
                  <button class="btn-light border">
                    <i class="fas fa-eye"></i>
                  </button>
                </td>
              </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

</div>
