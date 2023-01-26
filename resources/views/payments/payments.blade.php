@extends('layouts.app')

<div class="d-flex h-100 p-5 flex-column align-items-center">
    <h1 >Totally not fake payments, trust me i'll be engineer...</h1>

    <form action="{{route("establishPayment")}}" method="post">
        @csrf
        <button class="btn btn-success my-5">elo</button>
    </form>

</div>
