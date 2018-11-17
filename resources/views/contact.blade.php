@extends('layouts.app')

@section('title', '| Nous contacter')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    	<div class="col-md-6">
    		<div class="my-3 p-3 bg-primary text-white rounded shadow">
    			<h3>Nous-contacter</h3>
    			<p class="text-white">N'hésitez pas à me contacter à travers le formulaire ci-dessous pour tous vos besoins et projets, je vous garantis un retour rapide à vos demandes.</p>
    			<p>Un premier contact par téléphone ou email permet souvent de voir si je suis la bonne personne pour votre projet. Envoyez nous par email à digital.mind@gmail.com, je vous répondrai dans les plus brefs délais.</p>
    		</div>

            <div class="my-3 p-3 bg-white rounded shadow">
		        <form action="" method="">
		        	@csrf
		        	<div class="form-row">
		                <div class="form-group col-md-6">
		                    <label for="nom">Nom:</label>
		                    <input name="nom" type="text" class="form-control input-sm" placeholder="Nom">
		                </div>
		    
		                <div class="form-group col-md-6">
		                    <label for="prenom">Prénom:</label>
		                    <input name="prenom" type="text" class="form-control input-sm" placeholder="Prénom">
		                 </div>
		            </div>

		            <div class="form-group">
	                    <label for="email">E-mail</label>
	                    <input class="form-control input-sm" type="email" placeholder="email">       
                	</div>

                	<div class="form-group">
                        <label for="message">Message:</label>
                        <textarea rows="7" name="message" class="form-control"></textarea>
                    </div>

                    <div class="form-group pull-right">
                        <button type="submit" class="btn btn-primary optbtn">Envoyer</button>
                     </div>
		        </form>
		    </div>
		</div>
    </div>
</div>
@endsection