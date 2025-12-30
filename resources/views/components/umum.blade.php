@extends('components.main')

@section('pembuka')
<p>
    Yang bertanda tangan di bawah ini, Kepala Desa Bakipandeyan, Kecamatan Baki,
    Kabupaten Sukoharjo, dengan ini menerangkan bahwa:
</p>
@endsection

@section('data')
<table class="data" width="100%">
    @foreach( $surat->detail_map as $key => $value )
        <tr>
            <td width="30%">{{ ucwords(str_replace('_',' ',$key)) }}</td>
            <td>: {{ $value }}</td>
        </tr>
    @endforeach
</table>
@endsection

@section('isi')
<p class="isi">
    {{ $surat->jenis->isi }}
</p>
@endsection

@section('penutup')
<p>
    Demikian surat keterangan ini dibuat untuk dipergunakan sebagaimana mestinya.
</p>
@endsection
