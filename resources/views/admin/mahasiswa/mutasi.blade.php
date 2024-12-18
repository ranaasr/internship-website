@extends('layouts.app', ['title' => 'mutasi- Admin'])

@section('content')
<main class="flex-1 overflow-x-hidden  overflow-y-auto bg-white">
    <div class="container mx-auto p-4  flex justify-center items-center h-screen/2"> <!-- Updated with bg-white -->
        <div>
            <button class="text-white focus:outline-none bg-gray-600 px-4 py-2 shadow-sm rounded-md">
                <a href="
                {{ url('/surat/'.$mahasiswa->nim) }}
                ">Cetak Slip</a> 
            </button>
            <div class="flex flex-wrap -mx-4">
                <table class="border-collapse w-full">
                    <tr>
                        <td class="p-4">
                            <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/logo.png')))}}" alt="Nama Gambar" width="150" height="150">
                        </td>
                        <td class="p-2 " style="text-align: center;">
                            <div>
                                <div class="text-2xl font-bold">KEMENTERIAN AGAMA REPUBLIK INDONESIA</div>
                                <div class="text-2xl font-bold">UNIVERSITAS ISLAM NEGERI AR-RANIRY BANDA ACEH</div>
                                <div class="text-xl">Jln. Syeikh Abdur Rauf Kopelma Darussalam Banda Aceh</div>
                                <div class="text-md">Telp : (0651) 7552921, 7551857  Fax. 0651-7552922</div>
                                <div class="text-md">Situs: <a href="http://www.ar-raniry.ac.id">www.ar-raniry.ac.id</a></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2"><hr class="my-4 border-t-2 border-gray-500"></td>
                    </tr>                 

                    <tr>
                        <td colspan="2">
                            <div>Nomor : {{$nomor}}/Un.08/B.II.1/PP.00.9/{{$bulan}}/{{$tahun}}</div>

                            <div>Sifat : Biasa</div>
                            <div>Lamp  : 1 berkas</div>
                            <div>Hal   : Persetujuan pindah Kuliah {{ $mahasiswa->nama }}</div>
                            <br>

                            <div>Yth.</div>
                            <div>Rektor Universitas Terbuka</div>
                            <div>di -</div><br>

                            <p style="text-indent: 30px;"> 
                                Tempat                               
                            </p><br>

                            <div>Assalamu’alaikum Wr. Wb.</div><br>

                            <p style="text-indent: 30px;">                                
                                Berdasarkan Surat Dekan Fakultas Syariah dan Hukum UIN Ar-Raniry Banda Aceh<br>
                                Nomor: B-4196/Un.08/FSH/PP.00.9/10/2023 perihal pindah kuliah atas nama:
                            </p><br>                                                       
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
                                    </td>
                                    <td>
                                        :<br />
                                        :<br />
                                        :<br />
                                    </td>
                                    @if($mahasiswa)
                                    <td>
                                        {{ $mahasiswa->nama }}<br />
                                        {{ $mahasiswa->nim }}<br />
                                        {{$mahasiswa->prodi->nama_prodi}}<br />
    
                                    </td>
                                    @else
    
                                        <td>Data Belum Tersedia!<br />
                                            Data Belum Tersedia!<br />
                                            Data Belum Tersedia!<br />
                                        </td>
    
                                @endif
                                </tr>
                            </table>
                        </td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><br>
                            <p style="text-align: justify; text-indent: 30px;">                                
                                Maka dengan ini kami menyetujui kepada yang tersebut namanya di atas untuk pindah <br> kuliah ke <strong>Universitas Terbuka</strong>, sesuai dengan ketentuan yang berlaku (kelengkapan data <br>terlampir). Dengan dikeluarkan surat izin ini, maka yang bersangkutan tidak lagi berstatus <br>sebagai mahasiswa UIN Ar-Raniry Banda Aceh. 
                            </p><br>
                            
                            <p style="text-indent: 30px;"> 
                                Demikian, untuk dapat dipergunakan seperlunya.                               
                            </p><br>

                            <div style="text-align: right;">
                                <p style="margin-bottom: 10px;">a.n. Rektor</p>
                                <p style="margin-bottom: 10px;">Plh. Kepala Biro Administrasi Akademik<br>Kemahasiswaan dan Kerjasama</p><br><br>
                                <p><strong>Fadhli</strong></p>
                            </div><br>

                            <div>
                                Tembusan :
                                1.	Rektor UIN Ar-Raniry Banda Aceh;<br>
                                2.	Dekan Dekan Fakultas Syariah dan Hukum UIN Ar- Raniry Banda Aceh;<br>
                                3.	Kepala Bagian Akademik UIN Ar-Raniry Banda Aceh;<br>
                                4.	Kepala Pusat Teknologi Informasi dan Pangkalan Data UIN Ar-Raniry Banda Aceh;<br>
                                5.	Ketua Prodi Hukum Tata Negara (HTN) pada Fakultas Syariah dan Hukum UIN Ar-Raniry Banda Aceh.
                            </div>
                            
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>
@endsection