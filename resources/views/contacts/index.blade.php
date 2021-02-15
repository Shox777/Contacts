<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Contacts</title>
    </head>
    <body>
        <div class="limiter">
                <div class="nav">
                    <div class="wrapIt">
                    <ul>
                        <li>
                            <a href="{{route('con.index')}}">Contacts</a>
                        </li>
                        <li>
                            <a href="{{route('con.create')}}">Create Contact</a>
                        </li>
                    </ul>
                    </div>
                </div>
            <div class="container-table100">
                <div class="wrap-table100">
                    <div class="table100">
                        <div>
                            <form style="display: flex" action="{{route('con.index')}}" method="GET">
                                <input style="width: 200px" type="text" name="name" id="name" placeholder="Search for user">
                                <input style="width: 80px; margin: 0 0 10px 10px; height:40px" type="submit" value="Search" class="btn">
                            </form>
                        </div>
                        <table>
                            <thead>
                                <tr class="table100-head">
                                    <th class="column1">Date</th>
                                    <th class="column1">Name</th>
                                    <th class="column1">Address</th>
                                    <th class="column1">Email</th>
                                    <th class="column1">Phone</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td class="column1">{{$contact->created_at}}</td>
                                        <td class="column1">{{$contact->name}}</td>
                                        <td class="column1">{{$contact->address}}</td>
                                        <td class="column1"> @foreach ($contact->emails as $email)
                                            <ul>
                                                <li>{{$email->email}}</li>
                                            </ul>
                                        @endforeach </td>
                                        <td class="column1"> @foreach ($contact->phones as $phone)
                                            <ul>
                                                <li>{{$phone->phone}}</li>
                                            </ul>
                                        @endforeach  
                                            <div class="delIcon">
                                                <a href="/contacts/{{$contact['id']}}/edit"> <i class="fa fa-edit"></i> </a>&nbsp;&nbsp;
                                                <form action="{{route('con.del', $contact['id'])}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"><i class="fa fa-trash"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                        </tr>
                                @endforeach                                  
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
