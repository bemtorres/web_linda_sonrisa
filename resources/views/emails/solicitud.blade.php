<table style='width:700px;border-collapse:collapse' align='center'>
        <tbody>
            <tr>
                <td style='padding:10px 30px; background-color:#104f92;'></td>
            </tr>
            <tr>
                <td style='padding:10px 30px; background-color:#4d7cfe;'>
                    <table style='width:100%'>
                        <tbody>
                            <tr>
                                <td><span style='background-color:#f3f3f3;font-size:30px'>&nbsp;</span>
                                    <span
                                        style='padding:0px 10px;font-size:30px;font-family:sans-serif; background: #207dff;'>
                                        <u><strong style='color : #f3f3f3;'>Linda<em>Sonrisa</em></strong></span></u>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr>
                <td style='padding:15px 30px; background-color: #f3f3f3; font-family:Gotham,Helvetica,Arial,sans-serif;font-size:16px;color:#54575d'>
                    <span>
                        <h2>Estimado Proveedor {{ $nombre }}</h2>
                        <p>Se ha solicitado un nuevo pedido <br><strong>Código Solicitud: {{ $codigo }}</strong></p>
                    </span>
                    <span>
                        <center>
                            <table border=1 class='table'>
                                <tbody>
                                    <tr>
                                        <td>Producto</td>
                                        <td>Cantidad Solicitada</td>
                                    </tr>
                                    @foreach ($arreglo as $p)
                                    <tr>
                                        <td><strong>{{ $p['nombre'] }} </strong></td>
                                        <td>{{ $p['cantidad'] }}</td>
                                    </tr>
                                    @endforeach                             
                                </tbody>
                            </table>
                        </center>      
                        <br> 
                        
                        <span>Atentamente LindaSonrisa.</span>
                    </span>
                </td>
            </tr>
            <tr>
                <td style='padding:0px'>
                    <table style='border-collapse:collapse;width:100%'>
                        <tbody>
    
                            <tr style='padding:0px 40px;width:528px;background-color:#007bff;color:#fff'>
                                <td><span style='font-family:sans-serif'>&nbsp;</span></td>
                            </tr>
                            <tr style='padding:0px 40px;width:528px;background-color:#104f92;color:#fff'>
                                <td><span style='font-family:sans-serif; padding:0px 40px;'><strong>&nbsp;</strong></span>
                                </td>
                            </tr>
                            <tr style='padding:1px 10px;width:5px;background-color:#323232;color:#fff'>
                                <td><span style='font-family:sans-serif'>&nbsp;</span></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>