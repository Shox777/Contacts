<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="/css/main.css">
        <title>Contacts</title>
    </head>
    <body>
        <div class="limiter">
                <div class="nav">
                    <div class="wrapIt">
                        <ul>
                            <li>
                                <a href="{{ route('con.index') }}">Contacts</a>
                            </li>
                            <li>
                                <a href="{{route('con.create')}}">Create Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-75">
                      <div class="container">
                        <form method="POST" action="/contacts/ {{$contact['id']}}">
                            @csrf
                            @method('PUT')
                          <div class="row">
                            <div class="col-50">
                              <h3 style="text-align: center">Update Contact</h3>
                              <label for="fname"> Full Name</label>
                              @if ($errors->has('name'))
                              <p style="color: red; font-size:12px;">{{ $errors->first('name') }}</p>
                              @endif
                              <input type="text" id="fname" name="name" value="{{$contact['name']}}">

                              <label for="address"> Address</label>
                              @if ($errors->has('address'))
                              <p style="color: red; font-size:12px;">{{ $errors->first('address') }}</p>
                              @endif
                              <input type="text" id="address" name="address" value="{{$contact['address']}}">
                              <label for="email"> Email</label>                                                            
                              @error('email')
                              <p style="color: red; font-size:12px;">{{ $errors->first('email') }}</p>
                              @enderror
                              @foreach ($contact->emails as $email)
                              <input type="text" value="{{$email->email}}" name="email">
                              @endforeach
                              <label for="phone"> Phone</label>
                              @error('phone')
                              <p style="color: red; font-size:12px;">{{ $errors->first('phone') }}</p>
                              @enderror
                              @foreach ($contact->phones as $phone)
                              <input type="text" id="phone" value="{{$phone->phone}}" name="phone">
                              @endforeach
                            </div>
                          </div>
                          <input type="submit" value="Submit" class="btn">
                        </form>
                      </div>
                    </div>
                    <div class="col-25">
                </div>
        </div>
    </body>
</html>
