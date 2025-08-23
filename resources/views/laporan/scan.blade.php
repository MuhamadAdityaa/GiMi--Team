@extends('layouts.app')
@section('title','Scan QR')
@section('page-title','Scan QR')


@section('content')
<div class="card p-3">
<h5>Scan QR Member</h5>
<!-- Integrasi scanner pakai JS library (mis. instascan, html5-qrcode) -->
<div id="reader" style="width:300px;"></div>
</div>
<script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
<script>
const qrScanner = new Html5Qrcode("reader");
qrScanner.start({ facingMode: "environment" }, { fps: 10, qrbox: 250 },
(decodedText)=>{
window.location.href = "/laporan/create?member="+decodedText;
});
</script>
@endsection