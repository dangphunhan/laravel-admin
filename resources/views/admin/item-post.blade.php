<tr>
    <td>
        <h5><a href="#">{{ $post->title }}</a></h5>
    </td>
    <td>{{ $post->status }}</td>
    <td><img src="../images/{{ $post->image }}" alt="" width="100" height="100">
    </td>
    <td>{{ substr($post->excerpt, 0, 30) }}...</td>
    <td>{{ substr($post->content, 0, 50) }}...</td>
    <td>{{ $post->posted_at }}</td>
    <td>
        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
            <a href="{{ route('post.edit', $post->id) }}" class="btn btn-info">Sửa</a>
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Xoá</button>
        </form>
    </td>
</tr>