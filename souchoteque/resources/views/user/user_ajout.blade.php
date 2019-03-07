@extends('layout')
@section('customCss')

@endsection

@section('body')
    <div class="container bg-light">
        <form class="m-3">
            <h4 class="display-4 mb-3">Ajout utilisateur</h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <h6 for="inputEmail4">Email <span class="text-muted font-italic font-weight-light">(Polymaris uniquement)</span></h6>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                </div>
                <div class="form-group col-md-4">
                    <h6 for="inputPassword4">Mot de passe</h6>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Mot de passe">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <h6 for="inputEmail4">Nom</h6>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Nom">
                </div>
                <div class="form-group col-md-3">
                    <h6 for="inputPassword4">Prénom</h6>
                    <input type="password" class="form-control" id="inputPassword4" placeholder="Prénom">
                </div>
            </div>

            <div class="mt-3 pt-3 row">
                <div class="form-group col-md-4 mt-2">
                    <h6 for="inputState">Accréditation</h6>
                    <select id="inputState" class="form-control">
                        <option selected>Administrateur</option>
                        <option>Laborantin</option>
                        <option>Technicien de production</option>
                        <option>Stagiaire</option>
                    </select>
                </div>
                <dl class="row col-md-8">
                    <dt class="col-sm-4 text-danger">Administrateur</dt>
                    <dd class="col-sm-8">A description list is perfect for defining terms.</dd>

                    <dt class="col-sm-4 text-info">Laborantin</dt>
                    <dd class="col-sm-8">Donec id elit non mi porta gravida at eget metus.</dd>

                    <dt class="col-sm-4 text-primary">Technicien de production</dt>
                    <dd class="col-sm-8">Etiam porta sem malesuada magna mollis euismod.</dd>

                    <dt class="col-sm-4 text-secondary text-truncate">Stagiaire</dt>
                    <dd class="col-sm-8">Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</dd>
                </dl>
            </div>

            <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
        </form>
    </div>
@endsection

@section('customJs')

@endsection