<form wire:submit.prevent='save'>
    <div class="field" wire:ignore>
        <input type="number" autofocus wire:model.defer="qte_retour" style="width: 5rem;">
        <button type="submit" class="btn btn-success" wire:click="save()">
            <i class="fa fa-check"></i>
        </button>
    </div>
    @error('qte_retour')
    <span class="text-danger" style="margin-top: -0.25rem;display: block; font-size:80%" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</form>
