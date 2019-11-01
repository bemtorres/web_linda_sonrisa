<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @php
        $regiones = App\Modelo\Region::get();
    @endphp
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <label for="">Region</label>
                <select name="id_region" id="id_region" onChange="CargarComuna()">
                @foreach ($regiones as $r)
                    <option value="{{ $r->id_region }}">{{ $r->nombre_region }}</option> 
                @endforeach                   
                </select>
            </div>
            <div class="col-md-12">
                <label for="">comuna</label>
                <select name="comuna" id="comuna"></select>
            </div>
        </div>
    </div>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script>
        CargarComuna();
        function CargarComuna() {
            var id_region = document.getElementById('id_region').value;

            web = "{{request()->getHttpHost()}}" ;
            url = 'http://' + web + '/comunas/' + id_region;
            fetch(url)
                .then(resp=>{
                    return resp.json();
                }).then(result =>{
                    var $select = $('#comuna');
                    $select.find('option').remove();
                    //alert(options);
                    $.each(result, function(key,value) {
                        // console.log(value.id_comuna + " " + value.nombre_comuna );
                        
                        $select.append('<option value=' + value.id_comuna + '>' + value.nombre_comuna + '</option>');
                    });
                    console.log($select);
                    
            });
        }
   
    </script>
    {{ request()->getHttpHost() }}
</body>
</html>