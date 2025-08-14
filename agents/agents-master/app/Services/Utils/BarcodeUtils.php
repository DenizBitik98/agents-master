<?php


namespace App\Services\Utils;


class BarcodeUtils
{
    /**
     * @param string $text
     *
     * @return mixed
     */
    function generate1D( string $text ) {
        $barcode_obj = new \TCPDFBarcode( $text, 'C128B' );

        return "data:image/png;base64," . base64_encode( $barcode_obj->getBarcodePngData() );
    }

    /**
     * @param string $text
     *
     * @return mixed
     */
    function generate2D( string $text ) {


        $barcode_obj = new \TCPDF2DBarcode( $text, 'PDF417,2,0' );

        return "data:image/png;base64," . base64_encode( $barcode_obj->getBarcodePngData() );
    }

    /**
     * @param string $text
     *
     * @return mixed
     */
    function generateQrCode( string $text ) {

        $barcode_obj = new \TCPDF2DBarcode( $text, 'QRCODE' );

        return "data:image/png;base64," . base64_encode( $barcode_obj->getBarcodePngData() );
    }
}
