show:
{{$event->title}}

<style>
    td, tr {
        border: 1px solid black;
    }
</style>
<table>
    <tr>
        <td>
            name
        </td>
        <td>phone</td>
    </tr>
    @foreach($event->guests as $guest)
        <tr>
            <td>{{$guest->title.'. '.$guest->name}}</td>
            <td>{{$guest->phone}}</td>
        </tr>
    @endforeach
</table>
