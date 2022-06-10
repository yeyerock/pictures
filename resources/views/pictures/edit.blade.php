<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Picture') }}
        </h2>
    </x-slot>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="flex items-center justify-center p-12">
                    <!-- Author: FormBold Team -->
                    <!-- Learn More: https://formbold.com -->
                    <div class="mx-auto w-full max-w-[550px]">
                      <form action="{{ route('pictures.update', $picture->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-5">
                          <label for="title" class="mb-3 block text-base font-medium text-[#07074D]">
                            Title
                          </label>
                          <input type="text" name="title" id="title" value="{{ $picture->title}}" placeholder="Title" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div>

                        <div class="mb-5">
                          <label for="description"   class="mb-3 block text-base font-medium text-[#07074D]" >
                            Description
                          </label>
                          <input  type="text" name="description" id="description" value="{{ $picture->description}}" placeholder="Description" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                        </div>
                        
                        <div class="mb-5">
                            <img id="selectedPicture" src="" style="max-height: 300px;">
                        </div>  
                        {{-- <div class="mb-5">
                          <label for="image" class="mb-3 block text-base font-medium text-[#07074D]">
                            Image
                          </label>
                          <input type="file" name="image" value="value="{{ $picture->image}}"" id="image" class="w-full  rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
                        </div> --}}
                       
                        <div>
                            <a href="{{ route('pictures.index')}}" class="hover:shadow-form rounded-md bg-[#c00] py-3 px-8 text-base font-semibold text-white outline-none">Cancel</a>
                          <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none">
                            Submit
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
    </div>
</x-app-layout>


<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function (e){
        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#selectedPicture').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>