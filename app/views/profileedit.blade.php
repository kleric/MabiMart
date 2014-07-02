@extends('layouts.master')
@section('page-title')
Edit your profile
@stop
@section('content')
<div class="page-header">
  <h2>Edit your profile</h2>
</div>
<div class="col-md-4">
  <div class="panel panel-info">
    <div class="panel-heading">
      Profile Pictures
    </div>
    <div class="panel-body">
      Currently we're just using profile images from gravatar. I'm working on switching it so you can upload profile images here.
    </div>
  </div>
  <div class="panel panel-warning">
    <div class="panel-heading">
        Contact Guidelines
    </div>
    <div class="panel-body">
        Please specify a consistent way to contact you about trades. You don't necessarily have to provide an e-mail address, but maybe describe the characters you play, when you're on generally and whether to add or note you. 
        <br/><br/>
        If you do not provide a good way to contact you, and people give you negative feedback for it, you may be banned.
    </div>
  </div>
</div>
<div class="col-md-8">
  @if ($errors->count() > 0)
    <div class="alert alert-danger">
        @foreach ($errors->all(':message<br/>') as $err)
        @if ($err == "<li>The confirmpassword and password must match.</li>")
          <li>Password Confirmation does not match.</li>
        @else 
          {{ $err }}
        @endif
        @endforeach
    </div>
    @endif
  <form action="{{ URL::route('profile-edit-post') }}" method="post">
    <div class="panel panel-success">
      <div class="panel-heading">
        Reaching You
      </div>
      <div class="panel-body">
        <i><small>This section is <strong>required</strong>! Please add a way to reach you in game so that trades can be performed. They're the heart of this site. (Max 1000 characters)</small></i>
        <br/>
        <textarea name="contact_details" class="form-control" rows="8" maxlength="1000">{{{ $contact }}}</textarea>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        About You
      </div>
      <div class="panel-body">
        <i><small>This section is optional, but feel free to add a little bit about yourself</small></i>
        <br/>
        <textarea name="about_you" class="form-control" rows="5" maxlength="1000">{{{ $about }}}</textarea>
      </div>
    </div>
    <div class="form-group pull-right">
      <button type="submit" class="btn btn-success">Save</button>
    </div>
    {{ Form::token() }}
  </form>
</div>
@stop
