<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>QUOTATION - #QUO-{{ $id_quotation }}</title>
    <style>
        :root {
            --terracotta: #d35400;
            --peach-bg: #fff5ee;
            --text-dark: #2c3e50;
            --text-muted: #7f8c8d;
            --border-color: #e9ecef;
        }
        
        * { box-sizing: border-box; }
        body { 
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; 
            color: var(--text-dark); 
            line-height: 1.6; 
            margin: 0; 
            padding: 40px;
            background-color: #fff;
        }
        
        .quotation-box {
            max-width: 900px;
            margin: 0 auto;
        }

        .header-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 40px;
            border-bottom: 2px solid var(--text-dark);
            padding-bottom: 20px;
        }
        .header-table td { 
            vertical-align: top; 
            border: none; 
            padding: 0; 
        }
        
        .brand-section { width: 45%; }
        .doc-title-section { width: 55%; text-align: right; }
        
        .doc-type {
            font-size: 32px;
            font-weight: 800;
            letter-spacing: 3px;
            color: var(--text-dark);
            margin: 0 0 5px 0;
            line-height: 1;
        }

        .company-info {
            font-size: 12px;
            color: var(--text-muted);
            line-height: 1.5;
        }
        .company-website {
            font-weight: bold;
            color: var(--text-dark);
            text-decoration: none;
            display: inline-block;
            margin-top: 5px;
        }

        .meta-section {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .meta-section td { vertical-align: top; border: none; padding: 0; }
        .client-info h4 { margin: 0 0 5px 0; color: var(--text-muted); font-size: 12px; text-transform: uppercase; letter-spacing: 1px; }
        .client-info div { font-size: 15px; font-weight: 700; color: var(--text-dark); }
        
        .doc-meta table { float: right; border-collapse: collapse; }
        .doc-meta td { padding: 3px 5px; text-align: left; font-size: 13px; }
        .doc-meta td.label { color: var(--text-muted); padding-right: 15px; }

        .greeting {
            font-size: 14px;
            margin-bottom: 25px;
            color: #34495e;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        .items-table th {
            background-color: var(--peach-bg);
            color: var(--terracotta);
            text-transform: uppercase;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 12px 10px;
            border-top: 1px solid var(--border-color);
            border-bottom: 2px solid var(--terracotta);
        }
        .items-table td {
            padding: 14px 10px;
            border-bottom: 1px solid var(--border-color);
            font-size: 13.5px;
            vertical-align: top;
        }
        
        .item-desc strong {
            display: block;
            font-size: 14.5px;
            color: var(--text-dark);
            margin-bottom: 4px;
        }

        .text-right { text-align: right; }
        .text-center { text-align: center; }
        .fw-bold { font-weight: bold; }

        .total-box {
            background-color: var(--peach-bg);
            color: var(--terracotta);
            font-size: 18px;
            font-weight: 700;
            padding: 10px 15px;
            border-radius: 4px;
            display: inline-block;
            min-width: 180px;
            text-align: right;
        }

        .footer-section {
            width: 100%;
            border-collapse: collapse;
            margin-top: 60px;
            page-break-inside: avoid;
        }
        .footer-section td {
            width: 50%;
            vertical-align: top;
            font-size: 14px;
            border: none;
        }
        .signature-space { height: 85px; }
        .signature-line { width: 200px; border-bottom: 1px solid var(--text-dark); margin-bottom: 5px; }

        .no-print {
            background: #f8f9fa;
            padding: 15px;
            border-bottom: 1px solid #e9ecef;
            text-align: right;
            margin-bottom: 30px;
            border-radius: 6px;
        }
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 13px;
            margin-left: 10px;
        }
        .btn-print { background: #d35400; color: white; }
        .btn-close { background: #7f8c8d; color: white; }

        @media print {
            .no-print { display: none; }
            body { padding: 0; }
        }
    </style>
</head>
<body>

    <div class="no-print">
        <button onclick="window.print();" class="btn btn-print">Cetak Dokumen / Simpan PDF</button>
        <button onclick="window.close();" class="btn btn-close">Tutup</button>
    </div>

    <div class="quotation-box">
        
        <table class="header-table">
            <tr>
                <td class="brand-section">
                    <a href="#" style="text-decoration: none;">
                        <img alt="Logo Ruang Elegan" src="{{ asset('assets/demo/logo-expand.png') }}" style="width: 200px; height: auto; display: block; margin-bottom: 5px;">
                    </a>
                    <a href="http://www.ruangelegan.com" class="company-website">www.ruangelegan.com</a>
                </td>
                <td class="doc-title-section">
                    <div class="doc-type">QUOTATION</div>
                    <div class="company-info">
                        Mebel & Desain Interior Premium<br>
                        Jl. Elegan Raya No. 12, Jakarta<br>
                        Telp: (021) 8888-9999 | Email: info@ruangelegan.com
                    </div>
                </td>
            </tr>
        </table>

        <table class="meta-section">
            <tr>
                <td>
                    <div class="client-info">
                        <h4>Disiapkan Untuk (Customer):</h4>
                        <div>{{ $quot['nama_customer'] }}</div>
                        <div style="font-weight: normal; font-size: 13px; color: var(--text-muted); margin-top: 5px;">
                            {!! nl2br(e($quot['alamat_customer'] ?? 'Alamat belum diatur')) !!}<br>
                            Telp: {{ $quot['telp_customer'] ?? '-' }}
                        </div>
                    </div>
                </td>
                <td class="doc-meta">
                    <table>
                        <tr>
                            <td class="label">No. Penawaran</td>
                            <td>: #QUO-{{ $id_quotation }}</td>
                        </tr>
                        <tr>
                            <td class="label">Tanggal</td>
                            <td>: {{ date('d F Y', strtotime($quot['tgl_dibuat'])) }}</td>
                        </tr>
                        
                        
                    </table>
                </td>
            </tr>
        </table>

        <div class="greeting">
            Dengan hormat,<br>
            Berikut kami sampaikan rincian penawaran harga pengerjaan interior & furniture berdasarkan kriteria spesifikasi produk yang telah disepakati bersama:
        </div>

        <table class="items-table">
            <thead>
                <tr>
                    <th style="width: 5%;" class="text-center">No</th>
                    <th style="width: 50%; text-align: left;">Deskripsi Item / Bentuk Produk</th>
                    <th style="width: 15%;" class="text-center">Jumlah (Qty)</th>
                    <th style="width: 30%;" class="text-right">Harga Satuan</th>
                    <th style="width: 30%;" class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @if (empty($items) || count($items) == 0)
                    <tr>
                        <td colspan="5" class="text-center" style="color: var(--text-muted); font-style: italic; padding: 30px;">
                            Belum ada item produk dalam quotation ini.
                        </td>
                    </tr>
                @else
                    @php $no = 1; @endphp
                    @foreach ($items as $item)
                    <tr>
                        <td class="text-center" style="vertical-align: middle;">{{ $no++ }}</td>
                        <td>{{ $item['nama_bentuk'] ?? 'Produk Custom / Telah Dihapus' }}</td>
                        <td class="text-center" style="vertical-align: middle; font-weight: 600;">
                            {{ floatval($item['qty']) }}
                        </td>
                        <td class="text-right" style="vertical-align: middle;">
                            {{ floatval($item['harga_satuan']) }}
                        </td>
                        <td class="text-right fw-bold" style="vertical-align: middle; color: var(--text-dark);">
                            {{ floatval($item['subtotal']) }}
                        </td>
                    </tr>
                    @endforeach
                @endif

                <tr>
                    <td colspan="3" style="border: none;"></td>
                    <td class="text-right fw-bold" style="vertical-align: middle; border: none; font-size: 12px; color: var(--text-dark);">TOTAL PENAWARAN:</td>
                    <td class="text-right" style="border: none;">
                        <div class="total-box">{{ floatval($quot['total_harga']) }}</div>
                    </td>
                </tr>
            </tbody>
        </table>

        <table class="footer-section">
            <tr>
                <td>
                    <div>Disetujui Oleh,</div>
                    <div class="signature-space"></div>
                    <div class="signature-line"></div>
                    <div class="fw-bold">{{ $quot['nama_customer'] }}</div>
                    <div style="font-size: 11px; color: var(--text-muted);">Client / Customer</div>
                </td>
                <td style="text-align: right;">
                    <div style="display: inline-block; text-align: left;">
                        <div>Hormat Kami,</div>
                        <div class="signature-space"></div>
                        <div class="signature-line"></div>
                        <div class="fw-bold">Staff Ruang Elegan</div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {
            setTimeout(() => {
                window.print();
            }, 600);
        });
    </script>
</body>
</html>