@extends('layouts.main')
@section('content')
<form action="{{url('store')}}" method="post">
    @csrf
  <div class="form-group">
    <label for="name">Name</label>
    <input type="model" name="name" class="form-control" id="name" placeholder="Name">
    
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="Email">
    
    <label for="message">Message</label>
    <textarea name="message" class="form-control" id="message" placeholder="Message"></textarea>
    
    <button type="submit" class="btn btn-primary">Put into database</button>
  </div>
</form>
  <div class = "first" margin-top = "200px">
  <table border = "1px">
    <tr>
      <th>Name</th>
      <th>Email</th>
      <th>Message</th>
      <th>Created at</th>
    </tr>

    @foreach($form as $form)

    <tr>
      <td>{{$form->name}}</td>
      <td>{{$form->email}}</td>
      <td>{{$form->message}}</td>
      <td>{{$form->created_at}}</td>
    </tr>
 
    @endforeach
  </table> 
  </div>
@endsection
