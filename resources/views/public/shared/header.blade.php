<nav class="bg-gray-100 border-b-2 shadow-lg w-full z-10">
      <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">

          <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">

            <div class="hidden sm:block sm:ml-6">
               <ul class="flex space-x-4">
                   <li class="bg-blue-500 text-white px-3 py-2 rounded-md text-sm font-medium">
                        <a href="/">Trang chủ</a>
                   </li>
                   @foreach ($categories as $category)
                      <li class="text-gray-800 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium z-10	 @if($category->children->isNotEmpty())  relative dropdown @endif">
                            <a href="{{route('product.index', ['category' => $category->slug])}}">{{$category->name}}</a>
                            @if($category->children->isNotEmpty())
                            <ul class="dropdown-menu absolute left-0 top-9 bg-gray-100 w-max rounded-md hidden text-gray-800">
                                @foreach($category->children as $subcategory)
                                    <li class="p-4 hover:bg-gray-700 hover:text-white"><a href="{{route('product.index', ['category' => $subcategory->slug])}}">{{$subcategory->name}}</a> </li>
                                @endforeach
                            </ul>
                            @endif
                        </li>

                   @endforeach
                   <li class="text-gray-800 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                       <a href="/contact">Liên hệ</a>
                   </li>
              </ul>
            </div>
          </div>
          <div>
              <div class="p-2 relative">
                <div class="border-2 border-gray-400 h-10 w-10 rounded-full ">
                  <div  class="flex justify-center mt-1">
                    <a href="/gio-hang">
                      <i class="fas fa-shopping-cart"></i>
                    </a>
                  </div>
                </div>
                  <div class="absolute top-0 right-0 cart_count">
                  {{Cart::getTotalQuantity()}}
                  </div>
              </div>

          </div>
        </div>
      </div>


    </nav>
