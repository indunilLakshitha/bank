<form action="{{ '/form/data' }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    Book title:
    <br />
    <input type="text" name="title" />
    <br /><br />
    Logo:
    <br />
    <input type="file" name="logo" />
    <br /><br />
    <input type="submit" value=" Save " />
</form>
