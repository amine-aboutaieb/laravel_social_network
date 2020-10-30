<div>
    @foreach ($errors->all() as $error)
        <p style="background-color:rgb(194, 22, 22);color:white;width:40%;"> {{$error}} </p>
    @endforeach
</div>