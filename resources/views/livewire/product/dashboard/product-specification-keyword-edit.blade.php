<div>


  <div class="form-group">
    <input type="text" class="form-control" wire:model.defer="spec_heading">
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$emit('productSpecificationUpdateKeywordCancelled')">
      Cancel
    </button>
  </div>


</div>