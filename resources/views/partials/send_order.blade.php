<div>
    <form action="{{route('Clients.sendOrder')}}" method="POST">
        {{ csrf_field() }}
        <strong>Name</strong><input type="text" name="coustomer_name" value=""><br>
        <strong>Contact details</strong> <input type="text" name="email" value=""><br>
        <strong>Comments</strong><input type="text" name="comments" value=""><br>
        <input type="submit" name="submit" value="Check Out!">
    </form>
</div>