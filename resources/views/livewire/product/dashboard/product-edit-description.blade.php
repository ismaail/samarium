<div>
  <div class="form-group">
    <input type="text" class="form-control" wire:model="description">
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="update">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$dispatch('productUpdateDescriptionCancelled')">
      Cancel
    </button>
  </div>
</div>
