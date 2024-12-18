<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Surat Mutasi</title>
    <style>
        @page {
            size: A4;
            margin: 0;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            padding: 2cm;
            box-sizing: border-box;
        }

        .logo {
            margin-right: 10px;
            float: left;
        }

        .header {
            float: left;
            text-align: center;
        }

        .header .text-2xl {
            font-size: 1.3rem;
        }

        .header .text-xl {
            font-size: 1.1rem;
        }

        .header .text-md {
            font-size: 1rem;
        }

        .header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        hr {
            border: none;
            border-top: 1px solid #333;
            margin-top: 15px;
            margin-bottom: 15px;
            width: 100%; /* Menentukan lebar garis */                    
        }

        .content {
            clear: both;
            margin-top: 15px;
            text-indent: 25px;
            font-size: 0.9rem;
        }

        .footer {
            clear: both;
            text-align: center; /* Mengatur teks menjadi rata tengah */
            font-size: 0.9rem;
            margin-left: 10px; /* Menghapus margin kiri */
            padding-left: 5%; /* Menghapus padding kiri */
        }

        ol {
            margin-top: 5px;
            padding-left: 30px;
            font-size: 0.8rem;
        }

        ol li {
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header-wrapper">
            <div class="logo">
                <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/logo.png')))}}" alt="Nama Gambar" width="180" height="135">
            </div>
            <div class="header">
                <div class="text-md font-bold">KEMENTERIAN AGAMA REPUBLIK INDONESIA</div>
                <div class="text-md font-bold">UNIVERSITAS ISLAM NEGERI AR-RANIRY BANDA ACEH</div>
                <div class="text-sm">Jln. Syeikh Abdur Rauf Kopelma Darussalam Banda Aceh</div>
                <div class="text-xs">Telp : (0651) 7552921, 7551857 Fax. 0651-7552922</div>
                <div class="text-xs">Situs: <a href="http://www.ar-raniry.ac.id">www.ar-raniry.ac.id</a></div>
            </div>
        </div>

        <hr>


        <div class="content">
            
            <div>Nomor : {{$nomor}}/Un.08/B.II.1/PP.00.9/{{$bulan}}/{{$tahun}}</div>
            <div>Sifat : Biasa</div>
            <div>Lamp : 1 berkas</div>
            <div>Hal : Persetujuan pindah Kuliah {{ $mahasiswa->nama }}</div>
            <br>

            <div>Yth.</div>
            <div>Rektor Universitas Terbuka</div>
            <div>di -</div>
            <p>
                Tempat
            </p>
            <div>Assalamu’alaikum Wr. Wb.</div>
            <p>
                Berdasarkan Surat Dekan Fakultas Syariah dan Hukum UIN Ar-Raniry Banda Aceh<br>
                Nomor: B-4196/Un.08/FSH/PP.00.9/10/2023 perihal pindah kuliah atas nama:
            </p>
            <div style="margin-top: 20px;">
                <div>Nama         : @if($mahasiswa) {{ $mahasiswa->nama }} @else Data Belum Tersedia! @endif</div>
                <div>Nim             : @if($mahasiswa) {{ $mahasiswa->nim }} @else Data Belum Tersedia! @endif</div>
                <div>Prodi          : @if($mahasiswa) {{$mahasiswa->prodi->nama_prodi}} @else Data Belum Tersedia! @endif</div>
            </div>
            
            <p>                                
                Maka dengan ini kami menyetujui kepada yang tersebut namanya di atas untuk pindah <br> kuliah ke <strong>Universitas Terbuka</strong>, sesuai dengan ketentuan yang berlaku (kelengkapan data <br>terlampir). Dengan dikeluarkan surat izin ini, maka yang bersangkutan tidak lagi berstatus <br>sebagai mahasiswa UIN Ar-Raniry Banda Aceh. 
            </p>
        </div>
        <div class="footer">
            <p>
                Demikian, untuk dapat dipergunakan seperlunya.
            </p>
            <p>a.n. Rektor</p>
            <p>Plh. Kepala Biro Administrasi Akademik<br>Kemahasiswaan dan Kerjasama</p><br>
            <p><strong>Fadhli</strong></p>
        </div>

        <div>
            Tembusan :
            <ol>
                <li>Rektor UIN Ar-Raniry Banda Aceh;</li>
                <li>Dekan Dekan Fakultas Syariah dan Hukum UIN Ar- Raniry Banda Aceh;</li>
                <li>Kepala Bagian Akademik UIN Ar-Raniry Banda Aceh;</li>
                <li>Kepala Pusat Teknologi Informasi dan Pangkalan Data UIN Ar-Raniry Banda Aceh;</li>
                <li>Ketua Prodi Hukum Tata Negara (HTN) pada Fakultas Syariah dan Hukum UIN Ar-Raniry Banda Aceh.</li>
            </ol>
        </div>
    </div>
    
</body>

</html>
