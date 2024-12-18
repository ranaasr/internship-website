@extends('layouts.app', ['title' => 'Slip Pembayaran'])

@section('content')
<main class="flex-1 overflow-x-hidden overflow-y-auto bg-white">
    <div class="container mx-auto px-6 py-8">
        <div class="flex items-center">
            <button class="text-white focus:outline-none bg-gray-600 px-4 py-2 shadow-sm rounded-md">
                <a href="
                {{ url('/slip-pembayaran/'.$mahasiswa->nim) }}
                ">Cetak Slip</a>
            </button>
            {{-- <div class="relative mx-4">
                <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                    <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                        <path d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </span>
                
            </div> --}}
            
        </div>

                <div class="invoice-box">
                    <table cellpadding="0" cellspacing="0">
                        <tr class="top">
                            <td colspan="2">
                                <table style="width: 100%;">
                                    <tr>
                                        <td class="p-4">
                                            <img src="{{ asset('storage/Logo.png') }}" alt="Nama Gambar" width="150" height="150">
                                        </td>
                                        <td class="p-2 " style="text-align: center;">
                                            <div>
                                                <div class="text-lg font-bold">KEMENTERIAN AGAMA REPUBLIK INDONESIA</div>
                                                <div class="text-lg font-bold">UNIVERSITAS ISLAM NEGERI AR-RANIRY BANDA ACEH</div>
                                                <div class="text-sm">Jln. Syeikh Abdur Rauf Kopelma Darussalam Banda Aceh</div>
                                                <div class="text-xs">Telp : (0651) 7552921, 7551857  Fax. 0651-7552922</div>
                                                <div class="text-xs">Situs: <a href="http://www.ar-raniry.ac.id">www.ar-raniry.ac.id</a></div>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><hr class="my-4 border-t-2 border-gray-500"></td>
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
        
                        <tr class="information">
                            <td colspan="2">
                                <table>
                                    <tr>
                                        <td>
                                            Nama <br />
                                            Nim  <br />
                                            Prodi <br />
                                            Bank  <br />
                                            No Invoice <br />
                                            Nominal UKT <br />
                                            Tgl Bayar  <br />
                                            Keterangan <br />
                                        </td>
                                        <td>
                                            :<br />
                                            :<br />
                                            :<br />
                                            :<br />
                                            :<br />
                                            :<br />
                                            :<br />
                                            :<br />
                                        </td>
                                        @if($mahasiswa)
                                        <td>
                                            <td>
                                                {{$mahasiswa->nama }}<br />
                                                {{$mahasiswa->nim }}<br />
                                                {{$mahasiswa->prodi->nama_prodi}}<br />
                                                {{$join->nama_bank}}<br />
                                                {{$mahasiswa->no_invoice}}<br />
                                                {{$mahasiswa->nominal_spp}}<br />
                                                {{$join->tgl_update}}<br />
                                                {{$join->deskripsiPanjang}}<br />
                                            </td>
                                            @else
            
                                                <td>
                                                    -<br />
                                                    -<br />
                                                    -<br />
                                                    -<br />
                                                    -<br />
                                                    -<br />
                                                    -<br />
                                                    -<br />
                                                </td>

                                        </td>
                                    @endif
                                    </tr>
                                </table>
                            </td>
                        </tr>
        
                
                    </table>
                </div>                             
         
    </div>
</main>
    @endsection