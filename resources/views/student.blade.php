@extends('layout')
@section('style')
@endsection
@section('content')

    @if (session('success'))
        <script>
           Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {
    Swal.fire({
      title: "Deleted!",
      text: "Your file has been deleted.",
      icon: "success"
    });
  }
});
        </script>
    @endif
    <div class="flex flex-col w-3/4 mx-auto">
        <div class="text-center mb-8">
            <h2 class="text-7xl text-black font-bold uppercase mb-4">Training laravel</h2>
            <h3 class="text-3xl text-black font-bold uppercase italic mb-5">Simple crud</h3>
        </div>
    </div>
    <div class="w-1/2 shadow-2xl bg-white rounded-xl mx-auto py-8 pb-5">
        <div class="px-8 justify-center items-center">
            <div class="overflow-hidden w-full mx-auto rounded-xl">
                <table class="text-left text-sm font-light min-w-full">
                    <thead class="border-b bg-slate-500 font-medium">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-white text-center" style="width:20%;">#</th>
                            <th scope="col" class="px-6 py-4 text-white text-center" style="width:80;">Name</th>
                            <th scope="col" class="px-6 py-4 text-white text-center" style="width:80;">Address</th>
                            <th scope="col" class="px-6 py-4 text-white text-center" style="width:80;">Phone</th>
                            <th scope="col" class="px-6 py-4 text-white text-center" style="width:20%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($students == null)
                            <tr class="border-b bg-neutral-100">
                                <td scope="col" colspan="3" class="text-center px-6 py-4 font-bold">Belum ada data
                                </td>
                            </tr>
                        @else
                            @php
                                $value = 1;
                            @endphp
                            @foreach ($students as $p)
                                <tr class="border-b bg-neutral-100">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-center">{{ $value++ }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{ $p['name'] }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{ $p['address'] }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">{{ $p['phone'] }}</td>
                                    <td class="whitespace-nowrap text-center">
                                        <form method="post" action="{{ route('student.destroy', $p['id']) }}">
                                            @csrf

                                            <button type="submit"
                                                class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                                <svg class="w-3.5 h-3.5 fill-[#ff5252]" viewBox="0 0 448 512"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                                    <path
                                                        d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="overflow-hidden w-full mx-auto rounded-xl">
                <form id="studentForm" action="{{ route('student.store') }}" method="post" class="pt-4"
                    autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="relative mb-3" data-twe-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                            id="name" name="name" placeholder="Nama" />
                        <label for="name"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Nama
                        </label>
                    </div>
                    <div class="relative mb-3" data-twe-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                            id="address" name="address" placeholder="Alamat" />
                        <label for="address"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">Alamat
                        </label>
                    </div>
                    <div class="relative mb-3" data-twe-input-wrapper-init>
                        <input type="text"
                            class="peer block min-h-[auto] w-full rounded border-0 bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary data-[twe-input-state-active]:placeholder:opacity-100 motion-reduce:transition-none [&:not([data-twe-input-placeholder-active])]:placeholder:opacity-0"
                            id="phone" name="phone" placeholder="No Telp" />
                        <label for="phone"
                            class="pointer-events-none absolute left-3 top-0 mb-0 max-w-[90%] origin-[0_0] truncate pt-[0.37rem] leading-[1.6] text-neutral-500 transition-all duration-200 ease-out peer-focus:-translate-y-[0.9rem] peer-focus:scale-[0.8] peer-focus:text-primary peer-data-[twe-input-state-active]:-translate-y-[0.9rem] peer-data-[twe-input-state-active]:scale-[0.8] motion-reduce:transition-none dark:text-neutral-400 dark:peer-focus:text-primary">No
                            Telp
                        </label>
                    </div>
                    <div class="mb-8">
                        <div>
                            <button type="submit" data-te-ripple-init data-te-ripple-color="light" id="add"
                                class="h-full w-full rounded bg-primary-600 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"
                                style="background-color: rgb(48,97,175) !important">
                                Add
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $("#studentForm").on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var formData = new FormData(form[0]);
            var method = form.attr('method');
            var url = form.attr('action');

            Swal.fire({
                title: 'Processing...',
                text: 'Please wait while we process your submission.',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                },
            });
            $.ajax({
                type: method,
                url: url,
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: async function(response) {
                    if (response.success == true) {
                        await Swal.fire({
                            title: "Success!",
                            text: response.message,
                            icon: "success",
                            confirmButtonColor: "#3085d6",
                            confirmButtonText: "OK"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href =
                                    "{{ route('student.index') }}";
                            }
                            setTimeout(() => {
                                window.location.href =
                                    "{{ route('student.index') }}";
                            }, 1500);

                        });
                    } else {
                        await Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: response.message,
                            confirmButtonColor: "#3085d6",
                        });
                    }
                },
                error: async function(xhr, textStatus, errorThrown) {
                    await Swal.fire({
                        title: 'Oops!',
                        text: 'Something went wrong: ' + textStatus + '-' +
                            errorThrown,
                        icon: 'error',
                        confirmButtonText: 'OK',
                        confirmButtonColor: "#3085d6",
                    });
                }
            })
        })
    </script>
@endsection
