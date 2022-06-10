<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pictures') }}
        </h2>
    </x-slot>
  
    <div class="contenedor-masonry py-12">
        <div class="container py-5">
            
            <div class="row" data-masonry='{percentPosition": true } style="position: relative; height: 1723px;"'>
                @foreach ($pictures as $picture)
                <div class="col-12 col-md-4 col-lg-3">
                    <div class="card sm:rounded-lg my-2">
                        <img  src="/images/{{$picture->image}}" width="100% "> 
                        <div class="card-body">
                            <h2 class="card-title font-weight-bold">{{$picture->title}}</h2>
                            <p class="card-text mb-2">{{$picture->description}}</p>
                            <span> <i class="fa-solid fa-heart"></i> 24</span>
                           
                        </div>
                    </div>
                </div>   
                @endforeach               
            </div>
            
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    {!! $pictures->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
<script>
    var elem = document.querySelector('.grid');
        var msnry = new Masonry( elem, {
        // options
        itemSelector: '.grid-item',
        columnWidth: 200
        });

        // element argument can be a selector string
        //   for an individual element
        var msnry = new Masonry( '.grid', {
        // options
        });
</script>