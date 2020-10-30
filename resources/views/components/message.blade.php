@if(session()->has('msg'))
<h2 style="background-color: rgb(59, 231, 59);color:white;width:40%;">{{session()->get('msg')}}</h2>
@endif