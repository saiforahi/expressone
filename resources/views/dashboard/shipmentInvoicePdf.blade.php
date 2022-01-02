{{ $title }}
<img src="data:image/png;base64,{{ DNS2D::getBarcodePNG(url('/',$paracelInv->tracking_code), 'QRCODE') }}" alt="qr" class="qr-image">
