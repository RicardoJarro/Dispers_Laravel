
<table >
	<tbody>
		<tr>
			<td>FACTURA </td>
		</tr>
	</tbody>
</table>

<table >
	<tbody>
		<tr>
			<td> <i class="fas fa-globe"></i> Dispers, Inc.</td>
			<td> </td>
			<td> </td>
			<td>Fecha: {{$fecha}} </td>
		</tr>
	</tbody>
</table>

<table >
	<tbody>
		<tr>
			<td>From </td>
			<td>To </td>
        <td> Factura #{{$pedido->id}}j23</td>
		</tr>
		<tr>
			<td><strong>Admin, Inc.</strong> </td>
			<td>  <strong>{{$pedido->nombre_completo}}</strong></td>
			<td> </td>
		</tr>
		<tr>
			<td> 638 Gonzales Suarez Ave, Roma 109</td>
			<td> {{$pedido->direccion}} , {{$pedido->detalle}} </td>
			<td> 4F3{{$pedido->id}}</td>
		</tr>
		<tr>
			<td> Cuenca, AZ 010107</td>
			<td>{{$pedido->ciudad}}, {{$pedido->provincia}} {{$pedido->codigo_zip}}</td>
			<td>4F3{{$pedido->id}} </td>
		</tr>
		<tr>
			<td> Telf: (+593) 0989969542</td>
			<td>Telf: {{$pedido->telefono}} </td>
			<td>{{$pedido->user->id}} </td>
		</tr>
		<tr>
			<td> Email: dispers.store@gmail.com</td>
			<td> Email: {{$pedido->user->email}}</td>
			<td> </td>
		</tr>
	</tbody>
</table>



<table >
    <thead>
        <th>Payment Methods:</th>
        <th>Caintidad a pagar</th>
    </thead>
	<tbody>
		<tr>
			<td><img src="{{URL::asset('images/credit/visa.png')}}">
                <img src="{{URL::asset('images/credit/mastercard.png')}}">
                <img src="{{URL::asset('images/credit/american-express.png')}}">
                <img src="{{URL::asset('images/credit/paypal2.png')}}"> </td>
			<td> 

                <table >
                    <tbody>
                        <tr>
                            <td> Subtotal:</td>
                            <td> ${{$pedido->subtotal}}</td>
                        </tr>
                        <tr>
                            <td>Iva (12%) </td>
                            <td>${{$pedido->iva}} </td>
                        </tr>
                        <tr>
                            <td>Envio: </td>
                            <td>$5.00 </td>
                        </tr>
                        <tr>
                            <td>Total: </td>
                            <td> ${{$pedido->total}}</td>
                        </tr>
                    </tbody>
                </table>


            </td>
		</tr>
	</tbody>
</table>








<table >
    <thead>
        <tr>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($pedido->order_details as $item)
        <tr>
            <td>{{$item->cantidad}}</td>
            <td>{{$item->nombre_producto}}</td>
            <td>983f{{$item->id}}-90</td>
            <td>{{$item->product->descripcion}}</td>
            <td>${{$item->subtotal}}</td>
        </tr>
        @endforeach
    </tbody>
</table>