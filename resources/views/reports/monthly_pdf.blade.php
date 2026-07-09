<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Mutasi Barang - {{ $monthName }} {{ $year }}</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            color: #333333;
            font-size: 11px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        
        .header {
            text-align: center;
            border-bottom: 2px solid #1e293b;
            padding-bottom: 12px;
            margin-bottom: 20px;
        }
        
        .header h1 {
            font-size: 18px;
            color: #0f172a;
            margin: 0;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .header p {
            font-size: 10px;
            color: #64748b;
            margin: 4px 0 0 0;
        }
        
        .title-block {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .title-block h2 {
            font-size: 13px;
            color: #0f172a;
            margin: 0;
            text-transform: uppercase;
        }
        
        .title-block p {
            font-size: 11px;
            color: #475569;
            margin: 3px 0 0 0;
            font-weight: bold;
        }

        .meta-table {
            width: 100%;
            margin-bottom: 15px;
            font-size: 10px;
        }

        .meta-table td {
            padding: 2px 0;
            vertical-align: top;
        }
        
        /* Summary Boxes */
        .summary-wrapper {
            margin-bottom: 25px;
            width: 100%;
        }
        
        .summary-box {
            width: 31%;
            float: left;
            border: 1px solid #cbd5e1;
            background-color: #f8fafc;
            border-radius: 6px;
            padding: 8px 10px;
            margin-right: 2%;
            box-sizing: border-box;
        }
        
        .summary-box.last {
            margin-right: 0;
        }
        
        .summary-title {
            font-size: 8px;
            text-transform: uppercase;
            color: #64748b;
            font-weight: bold;
            margin-bottom: 4px;
        }
        
        .summary-value {
            font-size: 13px;
            font-weight: bold;
            color: #0f172a;
        }
        
        .clear {
            clear: both;
        }
        
        /* Table Styling */
        table.data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            margin-bottom: 30px;
        }
        
        table.data-table th {
            background-color: #0f172a;
            color: #ffffff;
            font-size: 9px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: left;
            padding: 7px 8px;
            border: 1px solid #0f172a;
        }
        
        table.data-table td {
            padding: 6px 8px;
            border: 1px solid #e2e8f0;
            vertical-align: top;
        }
        
        table.data-table tr:nth-child(even) td {
            background-color: #f8fafc;
        }
        
        .badge {
            display: inline-block;
            padding: 2px 5px;
            border-radius: 3px;
            font-size: 8px;
            font-weight: bold;
            text-transform: uppercase;
            text-align: center;
        }
        
        .badge-in {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .badge-out {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .text-center {
            text-align: center;
        }
        
        .text-right {
            text-align: right;
        }
        
        .font-mono {
            font-family: Courier, monospace;
        }
        
        /* Signature Area */
        .signature-area {
            margin-top: 40px;
            width: 100%;
            font-size: 11px;
        }
        
        .signature-block {
            float: right;
            width: 200px;
            text-align: center;
        }
        
        .signature-space {
            height: 60px;
        }
        
        .signature-name {
            font-weight: bold;
            text-decoration: underline;
        }
        
        .signature-title {
            color: #64748b;
            font-size: 10px;
        }
    </style>
</head>
<body>

    <!-- Letterhead -->
    <div class="header">
        <h1>GudangSaaS</h1>
        <p>Sistem Informasi Manajemen Inventaris Gudang Terintegrasi • www.gudangsaas.com</p>
    </div>

    <!-- Title Block -->
    <div class="title-block">
        <h2>Laporan Bulanan Mutasi Barang</h2>
        <p>Periode: {{ $monthName }} {{ $year }}</p>
    </div>

    <!-- Meta Details -->
    <table class="meta-table">
        <tr>
            <td style="width: 15%;">Dicetak Oleh</td>
            <td style="width: 35%;">: {{ Auth::user()->name }}</td>
            <td style="width: 20%;">Tanggal Cetak</td>
            <td style="width: 30%;">: {{ now()->translatedFormat('d F Y, H:i') }} WIB</td>
        </tr>
        <tr>
            <td>Status Server</td>
            <td>: Operasional Normal (SaaS Cloud)</td>
            <td>Klasifikasi Dokumen</td>
            <td>: Dokumen Internal Perusahaan</td>
        </tr>
    </table>

    <!-- Summary Box Widgets -->
    <div class="summary-wrapper">
        <div class="summary-box">
            <div class="summary-title">Total Barang Masuk (Inbound)</div>
            <div class="summary-value">{{ number_format($summary['total_in']) }} Unit</div>
        </div>
        
        <div class="summary-box">
            <div class="summary-title">Total Barang Keluar (Outbound)</div>
            <div class="summary-value" style="color: #b91c1c;">{{ number_format($summary['total_out']) }} Unit</div>
        </div>
        
        <div class="summary-box last">
            <div class="summary-title font-bold">Frekuensi Transaksi</div>
            <div class="summary-value" style="color: #3b82f6;">{{ number_format($summary['count']) }} Kali</div>
        </div>
        <div class="clear"></div>
    </div>

    <!-- Transactions Data Table -->
    <table class="data-table">
        <thead>
            <tr>
                <th style="width: 5%;" class="text-center">No</th>
                <th style="width: 15%;">Waktu</th>
                <th style="width: 15%;">SKU</th>
                <th style="width: 25%;">Nama Barang</th>
                <th style="width: 10%;" class="text-center">Tipe</th>
                <th style="width: 8%;" class="text-center">Qty</th>
                <th style="width: 12%;">Operator</th>
                <th style="width: 15%;">Catatan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mutations as $index => $mut)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $mut->created_at->format('d-m-Y H:i') }}</td>
                    <td class="font-mono">{{ $mut->product->sku }}</td>
                    <td><strong>{{ $mut->product->name }}</strong><br><span style="font-size: 8px; color: #64748b;">Kategori: {{ $mut->product->category->name }}</span></td>
                    <td class="text-center">
                        @if($mut->type === 'in')
                            <span class="badge badge-in">Masuk</span>
                        @else
                            <span class="badge badge-out">Keluar</span>
                        @endif
                    </td>
                    <td class="text-center" style="font-weight: bold;">{{ number_format($mut->quantity) }}</td>
                    <td>{{ $mut->user->name }}</td>
                    <td style="font-size: 10px;">{{ $mut->notes ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center" style="padding: 30px;">
                        Tidak ada aktivitas mutasi yang tercatat selama periode ini.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Signature Block -->
    <div class="signature-area">
        <div class="signature-block">
            <p>Bandung, {{ now()->translatedFormat('d F Y') }}</p>
            <p>Mengetahui & Menyetujui,</p>
            <p class="signature-title">Owner GudangSaaS</p>
            <div class="signature-space"></div>
            <p class="signature-name">{{ Auth::user()->name }}</p>
            <p class="signature-title">ID Petugas: STF-{{ str_pad(Auth::id(), 3, '0', STR_PAD_LEFT) }}</p>
        </div>
        <div class="clear"></div>
    </div>

</body>
</html>
