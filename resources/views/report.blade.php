<style>
	.column{
		width: 50%;
		display: inline-block;
	}
	table, th, td {
	  border: 1px solid black;
	}
</style>

<h3><center>RIG ACCEPTANCE APP</center></h3>
<br><br>
<h5><center>REPORTE</center></h5>
<br><br>
<div class="column">
	<p>Empresa operadora:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
	<p>Responsable:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
	<p>Fecha:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
</div>
<div class="column">
	<p>Empresa equipo perforación:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
	<p>Responsable:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
	<p>Fecha:<u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</u></p>
</div>
<table>
	@foreach($data as $category)
		<tr>
			<th>{{ $category['name'] }}</th>
			<th>SÍ</th>
			<th>NO</th>
			<th>COMENTARIO</th>
		</tr>

		@foreach($category['items'] as $item)
		@php
			$record = $item['record'];
			$oc = $record['operating_conditions'][0];
			$val = $oc['value'];
		@endphp
		<tr>
			<td>{{ $item['name'] }}</td>
			<td><center>{{ $val == '1' ? 'X' : '' }}</center></td>
			<td><center>{{ $val == '0' ? 'X' : '' }}</center></td>
			<td><center>{{ $record['comment'] }}</center></td>
		</tr>

		@endforeach
	@endforeach
</table>
