<div>
    <form wire:submit.prevent="searchProduct">
        <input type="text" wire:model="search" class="form-control">
    </form>

    <ul class="list-group">
        @if($prodact && $prodact->count() > 0)
        @foreach ($prodact as $items )
        <li class="list-group-item">{{$items->name}}</li>
        @endforeach
            @else
        <li class="list-group-item">Dapibus ac facilisis in</li>
        @endif
    </ul>
    
</div>
