@extends('public.layout.app')
@section('css')



@endsection
@section('content')
<main>
<section class="text-gray-600 body-font relative">
  <div class="max-w-screen-lg px-5 py-24 mx-auto flex sm:flex-nowrap flex-wrap">
    <div class="lg:w-2/3 md:w-1/2 bg-gray-300 rounded-lg overflow-hidden sm:mr-10 p-10 flex items-end justify-start relative">
      <iframe width="100%" height="100%" class="absolute inset-0" frameborder="0" title="map" marginheight="0" marginwidth="0" scrolling="no" src="https://maps.google.com/maps?width=100%&height=600&hl=en&q=cần thơ &ie=UTF8&t=&z=14&iwloc=B&output=embed" style="filter: grayscale(1) contrast(1.2) opacity(0.4);"></iframe>
      <div class="bg-white relative flex flex-wrap py-6 rounded shadow-md">
        <div class="lg:w-1/2 px-6">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">Địa Chỉ</h2>
          <p class="mt-1">Nguyễn việt Hồng <br> Ninh Kiều <br>Cần Thơ</p>
        </div>
        <div class="lg:w-1/2 px-6 mt-4 lg:mt-0">
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs">EMAIL</h2>
          <a class="text-indigo-500 leading-relaxed">kiet051000@gmail.com</a>
          <h2 class="title-font font-semibold text-gray-900 tracking-widest text-xs mt-4">PHONE</h2>
          <p class="leading-relaxed">0888964449</p>
        </div>
      </div>
    </div>
    <div class="lg:w-1/3 md:w-1/2 bg-white flex flex-col md:ml-auto w-full md:py-8 mt-8 md:mt-0">
      <h2 class="text-gray-900 text-lg mb-1 font-medium title-font">Liên hệ</h2>
      <p class="leading-relaxed mb-5 text-gray-600">Bạn có thắc mắc thì cứ liên hệ với chúng tôi.</p>
      <div class="relative mb-4">
        <label for="name" class="leading-7 text-sm text-gray-600">Họ và tên</label>
        <input required type="text" id="contact_form_name" name="name" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Email</label>
        <input required type="email" id="contact_form_email" name="email" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="email" class="leading-7 text-sm text-gray-600">Số điện thoại</label>
        <input required type="text" id="contact_form_phone" name="phone" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
      </div>
      <div class="relative mb-4">
        <label for="message" class="leading-7 text-sm text-gray-600">Nội dung</label>
        <textarea id="contact_form_message" name="message" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 h-32 text-base outline-none text-gray-700 py-1 px-3 resize-none leading-6 transition-colors duration-200 ease-in-out"></textarea>
      </div>
      <button  type="submit" id="contact_submit" class="text-white bg-blue-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg">Gửi</button>
    </div>
  </div>
</section>
</main>
@endsection
@push('js')

    <script>
        $('#contact_submit').click(function () {
            let name = $('#contact_form_name').val();
            let phone = $('#contact_form_phone').val();
            let email = $('#contact_form_email').val();
            let content = $('#contact_form_message').val();
            $.post('/contact',{
                name: name,
                phone: phone,
                email: email,
                content: content
            })
            .done(function(data){
                Swal.fire(
                    'Thành công!',
                    'Chúng tôi sẽ sớm liên hệ lại với bạn!',
                    'success'
                )
                $("input").val("");
                $('#contact_form_message').val('');
            })
        })
    </script>
@endpush
