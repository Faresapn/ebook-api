<tbody>
    <?php $i = 1; ?>
        @foreach($books as $book)
        <tr>
    
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->publisher}}</td>
            <td class="text-center">{{$book->date_of_issue}}</td>
            <td>
                <a href="{{url('/edit')}" class="btn btn-xs btn-primary">Edit</a> |
                <a href="#" class="btn btn-xs btn-danger" onclick="return confirm('yakin?');">Delete</a>
            </td>
        </tr>
        @endforeach
</tbody>
