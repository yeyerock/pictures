<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pictures') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <table class="table-fixed w-full">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Title</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Picture</th>
                            <th class="border px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pictures as $picture)
                            <tr>
                                <td class="border px-4 py-2">{{$picture->id}}</td>
                                <td class="border px-4 py-2">{{$picture->title}}</td>
                                <td class="border px-4 py-2">{{$picture->description}}</td>
                                <td class="border px-4 py-2">
                                    <img  src="/images/{{$picture->image}}" width="60% " alt=""> 
                                </td>
                                <td class="border px-4 py-2">
                                    <div class="flex flex-wrap justify-center rounded-lg text-lg">
                                        <a href="{{ route('pictures.edit', $picture->id)}}" class="bg-sky-600 px-4 py-2 m-2 rounded text-gray-200 ">Edit</a>
                                        <form action="{{ route('pictures.destroy', $picture->id)}}" method="POST" class="formDelete ">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-rose-600 px-4 py-2 m-2 rounded text-gray-200 ">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="p-2">
                    {!! $pictures->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    (function(){

        var forms = document.querySelectorAll('.formDelete')
        Array.prototype.slice.call(forms)
        .forEach(function (form){
            form.addEventListener('submit', function(event){
                event.preventDefault();
                event.stopPropagation();
                Swal.fire({
                    title: 'Are you sure, that you want to delete the item?',
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: "#20c997",
                    cancelButtonColor:"#6c757d",
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if(result.isConfirmed){
                        this.submit();
                        Swal.fire('¡Deleted!', 'The picture was deleted successfuly', 'success');
                    }
                })
            }, false)    
        })
    })()
</script>
