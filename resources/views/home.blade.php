@extends('layout/app')
@section('title', 'Admin Panel')
@section('content')
<div class="nk-block-head" id="users">
                                        <div class="nk-block-head-content pt-2">
                                            <h5 class="nk-block-title">List of Users</h5>
                                            <div class="m-2">
                                                <button class="btn btn-primary"><a href="{{route('register')}}">Add User</a></button>
                                            </div>
                                            <div class="nk-block-des">
                                                <table class="table table-responsive">
                                                <thead>
                                                    <tr>
                                                        <td>ID</td>
                                                        <td>Name</td>
                                                        <td>Role</td>
                                                        <td>Moderator</td>
                                                        <td>Officer</td>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                @php
                                                    $users = \App\User::all();
                                                @endphp
                                                @foreach($users as $user)
                                                    <tr>
                                                        <td>{{$user->id}}</td>
                                                        <td>{{$user->name}}</td>
                                                        <td>
                                                        @if($user->role == 1)
                                                        Admin
                                                        @elseif($user->role == 2)
                                                        Moderator
                                                        @elseif($user->role == 3)
                                                        Officer
                                                        @elseif($user->role == 4)
                                                        User
                                                        @endif
                                                        </td>
                                                        <td>{{$user->moderator}}</td>
                                                        <td>{{$user->officer}}</td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
@endsection