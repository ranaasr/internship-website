<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Bukti Pembayaran SPP Mahasiswa</title>

        <style>
            .invoice-box {
                max-width: 800px;
                margin: auto;
                padding: 30px;
                border: 1px solid #ffffff;
                box-shadow: 0 0 10px #ffffff;
                font-size: 16px;
                line-height: 24px;
                font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
                color: #555;
            }
            .text-2xl {
            font-size: 1.1rem; /* Anda bisa mengubah nilai ini sesuai kebutuhan Anda */
            }

            .text-xl {
                font-size: 0.8rem; /* Anda bisa mengubah nilai ini sesuai kebutuhan Anda */
            }

            .text-md {
                font-size: 0.8rem; /* Anda bisa mengubah nilai ini sesuai kebutuhan Anda */
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

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table style="width: 100%;">
							<tr>
                                <td class="p-4">
                                    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('/storage/logo.png')))}}" alt="Nama Gambar" width="200" height="150">
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
                                    

							@endif
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</div>
	</body>
</html>       