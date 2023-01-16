@extends('layouts.app')
@section('content')

  <section class="text-gray-600 body-font">
    @if ($message = Session::get('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ $message }}</span>
      </div> 
     @endif

    <div class="container px-5 py-10 w-5/6 mx-auto">
          <div class="flex flex-wrap -m-4">
            @foreach ($funds as $fund)
            <div class="p-4 md:w-1/3">
              <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
                <img class="lg:h-48 md:h-36 w-full object-cover object-center" src="{{ asset('storage/images/'.$fund->file_path)}}" alt="blog">

                <div class="p-6">
                  <h2 class="tracking-widest text-xs title-font font-medium text-gray-400 mb-1">Goal:${{ $fund->goal }}</h2>
                  <h1 class="title-font text-lg font-medium text-gray-900 mb-3">{{ $fund->title }}</h1>
                  <p class="leading-relaxed mb-3">{{ $fund->description }}</p>
                  <div class="flex items-center flex-wrap ">
                    <form action="{{ route('funds.destroy',$fund->id) }}" method="POST">
                        <div class="flex flex-wrap">
                          <a href="{{ route('funds.show',$fund->id) }}" class="inline-flex text-white bg-green-500 border-0 px-4 py-2 mx-1 focus:outline-none hover:bg-green-600 rounded text-lg">Show</a>
                        <a  href="{{ route('funds.edit',$fund->id) }}" class="inline-flex text-white bg-yellow-500 border-0 px-4 py-2 mx-1 focus:outline-none hover:bg-yellow-600 rounded text-lg">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button class="inline-flex text-white bg-red-500 border-0 px-4 py-2 mx-1 focus:outline-none hover:bg-red-600 rounded text-lg">Delete</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <div class="my-3">
            {{ $funds->links() }}
          </div>
        </div>
      </section> 
@endsection