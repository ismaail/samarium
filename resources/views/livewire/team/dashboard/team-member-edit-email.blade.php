<div>
  <div class="form-group">
    <input type="text" class="form-control" wire:model="email">
  </div>

  <div>
    <button class="btn btn-success mr-2" wire:click="store">
      Save
    </button>
    <button class="btn btn-danger mr-2" wire:click="$dispatch('teamMemberUpdateEmailCancelled')">
      Cancel
    </button>
  </div>
</div>
