<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bukti Pendaftaran - {{ $registration->registration_number }}</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            font-size: 13px; 
            line-height: 1.5; 
            color: #333;
        }
        .header { 
            text-align: center; 
            border-bottom: 3px solid #0284c7; 
            padding-bottom: 10px; 
            margin-bottom: 20px; 
        }
        .header h1 { 
            margin: 0; 
            padding: 0; 
            font-size: 20px; 
            color: #1e293b;
        }
        .header h2 { 
            margin: 5px 0 0 0; 
            padding: 0; 
            font-size: 16px; 
            color: #64748b;
        }
        .header p { 
            margin: 5px 0 0 0; 
            padding: 0; 
            font-size: 12px;
        }
        h3 {
            text-align: center;
            font-size: 16px;
            text-decoration: underline;
            margin-bottom: 20px;
        }
        h4 {
            margin-top: 20px;
            margin-bottom: 5px;
            font-size: 14px;
            background-color: #f8fafc;
            padding: 5px;
            border-left: 4px solid #0284c7;
        }
        table { 
            width: 100%; 
            border-collapse: collapse; 
            margin-bottom: 15px; 
        }
        table th, table td { 
            padding: 6px; 
            border: 1px solid #ccc;
            vertical-align: top; 
        }
        .title-td { 
            background-color: #f1f5f9; 
            font-weight: bold; 
            width: 35%;
        }
        .status-badge {
            background-color: #059669;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: bold;
        }
        .footer { 
            margin-top: 50px; 
            width: 100%;
        }
        .signature-box {
            float: right;
            width: 250px;
            text-align: center;
        }
        .signature-box p {
            margin: 0;
        }
    </style>
</head>
<body>

    <div class="header">
        <h1>PANITIA PENERIMAAN PESERTA DIDIK BARU (PPDB)</h1>
        <h2>Tahun Ajaran {{ date('Y') }} / {{ date('Y') + 1 }}</h2>
        <p>Email: info@ppdb.test | Telepon: (021) 1234-5678</p>
    </div>

    <h3>BUKTI PENDAFTARAN SISWA BARU</h3>

    <table border="1">
        <tr>
            <td class="title-td">Nomor Pendaftaran</td>
            <td style="font-size: 16px;"><b>{{ $registration->registration_number }}</b></td>
        </tr>
        <tr>
            <td class="title-td">Tanggal Mendaftar</td>
            <td>{{ $registration->created_at->format('d/m/Y H:i') }}</td>
        </tr>
        <tr>
            <td class="title-td">Status Pendaftaran</td>
            <td>
                <span class="status-badge">{{ strtoupper($registration->status) }}</span>
            </td>
        </tr>
    </table>

    <h4>A. DATA PRIBADI</h4>
    <table border="1">
        <tr>
            <td class="title-td">Nama Lengkap</td>
            <td>{{ strtoupper($user->name) }}</td>
        </tr>
        <tr>
            <td class="title-td">NISN / NIK</td>
            <td>{{ $studentDetail->nisn }} / {{ $studentDetail->nik }}</td>
        </tr>
        <tr>
            <td class="title-td">Tempat, Tanggal Lahir</td>
            <td>{{ $studentDetail->place_of_birth }}, {{ \Carbon\Carbon::parse($studentDetail->date_of_birth)->format('d/m/Y') }}</td>
        </tr>
        <tr>
            <td class="title-td">Jenis Kelamin</td>
            <td>{{ $studentDetail->gender === 'male' ? 'LAKI-LAKI' : 'PEREMPUAN' }}</td>
        </tr>
        <tr>
            <td class="title-td">No. Telepon / HP</td>
            <td>{{ $studentDetail->phone_number }}</td>
        </tr>
        <tr>
            <td class="title-td">Alamat Lengkap</td>
            <td>{{ $studentDetail->address }}</td>
        </tr>
    </table>

    <h4>B. DATA ORANG TUA / WALI</h4>
    <table border="1">
        <tr>
            <td class="title-td">Nama Ayah / Ibu</td>
            <td>{{ $parentDetail->father_name }} / {{ $parentDetail->mother_name }}</td>
        </tr>
        <tr>
            <td class="title-td">Telepon Orang Tua / Wali</td>
            <td>{{ $parentDetail->guardian_phone }}</td>
        </tr>
        <tr>
            <td class="title-td">Pekerjaan Ayah / Ibu</td>
            <td>{{ $parentDetail->father_occupation }} / {{ $parentDetail->mother_occupation }}</td>
        </tr>
    </table>

    <h4>C. SEKOLAH ASAL</h4>
    <table border="1">
        <tr>
            <td class="title-td">Nama Sekolah</td>
            <td>{{ strtoupper($schoolOrigin->school_name) }}</td>
        </tr>
        <tr>
            <td class="title-td">NPSN</td>
            <td>{{ $schoolOrigin->npsn }}</td>
        </tr>
        <tr>
            <td class="title-td">Tahun Lulus</td>
            <td>{{ $schoolOrigin->graduation_year }}</td>
        </tr>
    </table>

    <div style="margin-top: 20px; font-size: 11px;">
        <i>* Dokumen ini adalah bukti pendaftaran sah yang dicetak secara otomatis oleh sistem komputer. Seluruh data yang diisi adalah benar dan dapat dipertanggungjawabkan oleh pendaftar.</i>
    </div>

    <div class="footer">
        <div class="signature-box">
            <p>Dicetak Pada, {{ now()->format('d/m/Y') }}</p>
            <p>Panitia PPDB,</p>
            <br><br><br><br>
            <p>_______________________</p>
            <p style="font-size: 10px;">(Tanda Tangan & Stempel Resmi)</p>
        </div>
    </div>

</body>
</html>