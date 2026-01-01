@extends('components.main')

@section('pembuka')
<p>
    Yang bertanda tangan di bawah ini, Kepala Desa Bakipandeyan, Kecamatan Baki,
    Kabupaten Sukoharjo, dengan ini menerangkan bahwa:
</p>
@endsection

@section('data')
<table class="data" width="100%">
    @foreach( $surat->detail_pemilik_usaha as $key => $value )
        <tr>
            <td width="30%">{{ ucwords(str_replace('_',' ',$key)) }}</td>
            <td>: {{ $value }}</td>
        </tr>
    @endforeach

    <tr></tr>
        <td colspan="2" style="padding-top:10px;">
            <p>Sesuai keterangan yang bersangkutan benar nama tersebut diatas mempunyai usaha sebagai berikut:</p>
        </td>
    </tr>

    @foreach( $surat->detail_usaha as $key => $value )
        <tr>
            <td width="30%">{{ ucwords(str_replace('_',' ',$key)) }}</td>
            <td>: {{ $value }}</td>
        </tr>
    @endforeach
</table>
@endsection

@section('penutup')
<p>
    Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
</p>
@endsection