<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.2.19/dist/tailwind.min.css" />
    <!--Replace with your tailwind.css once created-->
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet"> <!--Totally optional :) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"
        integrity="sha256-xKeoJ50pzbUGkpQxDYHD7o7hxe0LaOGeguUidbq6vis=" crossorigin="anonymous"></script>
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 50px; /* Menambah jarak antara "BUKTI PEMBAYARAN BIAYA KULIAH" dan "MAHASISWA UIN AR-RANIRY" */
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body class="bg-gray-800 font-sans leading-normal tracking-normal mt-12">

    <header>
        <!--Nav-->
        <nav aria-label="menu nav"
            class="bg-gray-800 pt-2 md:pt-1 pb-1 px-1 mt-0 h-auto fixed w-full z-20 top-0">
            <div class="flex flex-wrap items-center">
                <div class="relative inline-block">
                    <button onclick="toggleDD('myDropdown')"
                        class="drop-button text-white py-2 px-2">
                        <span class="pr-2"><i class="fas fa-user"></i></span> Hi <?php echo $mahasiswa->nama; ?>
                        <svg class="h-3 fill-current inline"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                        </svg>
                    </button>
                    <div id="myDropdown"
                        class="dropdownlist absolute bg-gray-800 text-white right-0 mt-3 p-3 overflow-auto z-30 invisible">
                        <input type="text" class="drop-search p-2 text-gray-600" placeholder="Search.."
                            id="myInput" onkeyup="filterDD('myDropdown','myInput')">
                        <a href="#"
                            class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                class="fa fa-user fa-fw"></i> Profile</a>
                        <a href="#"
                            class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                class="fa fa-cog fa-fw"></i> Settings</a>
                        <div class="border border-gray-800"></div>
                        <a href="/"
                            class="p-2 hover:bg-gray-800 text-white text-sm no-underline hover:no-underline block"><i
                                class="fas fa-sign-out-alt fa-fw"></i> Log Out</a>
                    </div>
                </div>
                <div class="flex w-full pt-2 content-center justify-between md:w-1/3 md:justify-end">
                    <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                        <li class="flex-1 md:flex-none md:mr-3">
                            <a class="inline-block text-gray-400 no-underline hover:text-gray-200 hover:text-underline py-2 px-4"
                                href="#">
                                {{-- <?php $mahasiswa->email ?> --}}
                            </a>
                        </li>
                        <li class="flex-1 md:flex-none md:mr-3">
                            
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>
        <div class="flex flex-col md:flex-row">
            <nav aria-label="alternative nav">
                <div class="bg-gray-800 shadow-xl h-20 fixed bottom-0 mt-12 md:relative md:h-screen z-10 w-full md:w-48 content-center">
                    <div class="md:mt-12 md:w-48 md:fixed md:left-0 md:top-0 content-center md:content-start text-left justify-between">
                        <ul class="list-reset flex flex-row md:flex-col pt-3 md:py-3 px-1 md:px-2 text-center md:text-left">
                            <form id="submit-form" action="{{ route('show.data.link') }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <input type="hidden" name="nim" value="{{ $mahasiswa->nim }}">
                                <input type="hidden" name="email" value="{{ $mahasiswa->email }}">
                                <button type="submit">
                                    <li class="mr-3 flex-1">
                                        <a href="" id=""
                                            class="flex items-center py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                                            <i class="far fa-envelope pr-1"></i> <!-- Ikon envelop di sebelah kiri -->
                                            <span
                                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">SLIP PEMBAYARAN</span>
                                        </a>
                                    </li>
                                </button>
                            </form>

                            <form id="submit-form" action="{{ route('show.data.mutasi') }}" method="POST"
                                style="display: inline;">
                                @csrf
                                <input type="hidden" name="nim" value="{{ $mahasiswa->nim }}">
                                <input type="hidden" name="email" value="{{ $mahasiswa->email }}">
                                <button type="submit">
                                    <li class="mr-3 flex-1">
                                        <a href="" id=""
                                            class="flex items-center py-1 md:py-3 pl-1 align-middle text-white no-underline hover:text-white border-b-2 border-blue-600">
                                            <i class="far fa-envelope pr-1"></i> <!-- Ikon envelop di sebelah kiri -->
                                            <span
                                                class="pb-1 md:pb-0 text-xs md:text-base text-white md:text-white block md:inline-block">SURAT MUTASI</span>
                                        </a>
                                    </li>
                                </button>
                            </form>
                        </ul>
                    </div>
                    
                </div>
            </nav>
            @yield('content')
        </div>
    </main>

    <script>
        @if (session() -> has('success'))
        Swal.fire({
            icon: 'success',
            title: 'BERHASIL!',
            wtext: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        })

        @elseif(session() -> has('error'))
        Swal.fire({
            icon: 'error',
            text: 'GAGAL!',
            title: '{{ session('error') }}',
            showConfirmButton: false,
            timer: 3000
        })
        @endif

        /Toggle dropdown list/
        function toggleDD(myDropMenu) {
            document.getElementById(myDropMenu).classList.toggle("invisible");
        }
        /Filter dropdown options/
        function filterDD(myDropMenu, myDropMenuSearch) {
            var input, filter, ul, li, a, i;
            input = document.getElementById(myDropMenuSearch);
            filter = input.value.toUpperCase();
            div = document.getElementById(myDropMenu);
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
                if (a[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        // Close the dropdown menu if the user clicks outside of it
        window.onclick = function (event) {
            if (!event.target.matches('.drop-button') && !event.target.matches('.drop-search')) {
                var dropdowns = document.getElementsByClassName("dropdownlist");
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (!openDropdown.classList.contains('invisible')) {
                        openDropdown.classList.add('invisible');
                    }
                }
            }
        }
    </script>

</body>

</html>