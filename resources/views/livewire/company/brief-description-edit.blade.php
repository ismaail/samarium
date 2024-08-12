<div>


  <div class="p-3-rm">

    <h1 class="text-white-rm" style="font-size: 1.3rem;">
      Edit brief description
    </h1>

    <div class="form-group">
      <label for="">Brief description</label>
      <textarea
          rows="5"
          class="form-control"
          wire:model="brief_description"
          style="font-size: 1.3rem;">
      </textarea>
      @error ('brief_description') <span class="text-danger">{{ $message }}</span> @enderror
    </div>


    <div class="py-3 m-0">

      @include ('partials.button-update')
      @include ('partials.button-cancel', ['clickEmitEventName' => 'briefDescriptionEditCancelled',])

      <button wire:loading class="btn">
        <span class="spinner-border text-info mr-3" role="status">
        </span>
      </button>
    </div>
  </div>


</div>
