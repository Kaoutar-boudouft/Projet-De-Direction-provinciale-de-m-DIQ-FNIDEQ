@extends('master.layout')
@section('title')
ajouter un Utilisateur
@endsection
@section('jury')active @endsection
@section('content')
<div class="content" style="margin-left:20% ;">
    <div class="sidetwo" style=" background-color: whitesmoke;height: 100%;">

        <div class="container">
            <div class="row g-3 align-items-center">
                <div class="col-auto">
                    <h2 style="text-decoration-line: underline;text-decoration-color: #0d6efd; text-align: left; ">
                        Ajouter un utilisateur</h2>
                </div>

            </div>
        </div>


<form    action="/ajout_user" method = "post">


    @csrf
        <div class="container" style=" width: 90%;height: 60%;margin-top: 3%;">
            <div class="cardo">
                <div class="rows">
                    <div class="row">
                        <div class="col">
                            <label for="fname" class="control-label" id="lab-nom">Nom d'utilisateur</label>
                            <input type="text" class="form-control" id="inp-nom" placeholder="Nom" name="nom" value="{{ old('nom')}}">
<span style='color:red;'> @error('nom'){{ $message}}@enderror</span>
                        </div>

                        <div class="col">
                            <label for="fname" class="control-label" id="lab-prenomnom">E-mail  d'utilisateur</label>
                            <input type="text" class="form-control" id="inp-prenom" placeholder="email" name="email" value="{{ old('email')}}">
                            <span style='color:red;'> @error('email'){{ $message}}@enderror</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="fname" class="control-label" id="lab-nom">Le Mot de Passe</label>


                            <input type="text" class="form-control" id="inp-nom" placeholder="password" name="password" value="{{ old('profession')}}">
                            <span style='color:red;'> @error('password'){{ $message}}@enderror</span>
                        </div>
                    </div>
                    

                    <input type="submit" class="btn btn-primary" id="ajouter-avis" style="width: 18%;margin-left:78% ;margin-top : 1.5%;border-radius: 12px" value="Ajouter">

                </div>
            </div>
        </div>
    </form>
    </div>
</div>
@endsection
