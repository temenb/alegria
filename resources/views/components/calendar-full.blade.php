<table>
    @for($i = 0; $i < 4; $i++)
    <tr>
        <td>{{ $i }}</td>
        @for($j = 0; $j < 6; $j++)
            <td>{{ $j }}</td>
        @endfor
    </tr>
    @endfor
</table>
