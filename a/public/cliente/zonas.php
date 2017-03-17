<?php
    $id = $_GET['id'];
    /*session_start();
    if(!isset($_SESSION['correo'])){
        header("Location:../../index.php");
    }
    else {*/
        include("../../php/funciones.php");
        //$email = $_SESSION['correo'];
        $email = 'pavillanueva@ing.ucsc.cl';
        $perfil = datosPerfil($email);
        $empresas = empresas();
    //}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="../../recursos/bootstrap.min.css">
    <link rel="stylesheet" href="../../recursos/awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../recursos/animate/animate.css">
    <link rel="stylesheet" href="../../recursos/select2.css">
    <link rel="stylesheet" href="../../recursos/select2-bootstrap.css">
    <link rel="stylesheet" href="../../recursos/gh-pages.css">
    <link rel="stylesheet" href="../../css/base.css">
    <link rel="stylesheet" href="../../css/zonas.css">
</head>
<body>
		<header class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".bs-navbar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="index.html">select2-bootstrap-css</a>
	</div>

	<div class="collapse navbar-collapse bs-navbar-collapse">
		<ul class="nav navbar-nav">
			
				<li class="">
					<a href="3.3.2.html">3.3.2</a>
				</li>
			
				<li class="">
					<a href="3.4.1.html">3.4.1</a>
				</li>
			
				<li class="">
					<a href="3.4.2.html">3.4.2</a>
				</li>
			
				<li class="">
					<a href="3.4.3.html">3.4.3</a>
				</li>
			
				<li class="">
					<a href="3.4.4.html">3.4.4</a>
				</li>
			
				<li class="">
					<a href="3.4.5.html">3.4.5</a>
				</li>
			
				<li class="">
					<a href="3.5.1.html">3.5.1</a>
				</li>
			
				<li class="active">
					<a href="3.5.2.html">3.5.2</a>
				</li>
			
				<li class="">
					<a href="master.html">master</a>
				</li>
			
		</ul>
	</div>
</header>


		<div class="form-group">
			<label for="default" class="control-label">Default textbox</label>
			<input id="default" type="text" class="form-control" placeholder="Placeholder text">
		</div>

		<div class="form-group">
			<label for="single" class="control-label">Select2 single select</label>
			<select id="single" class="form-control select2">
				<option></option>
				<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

			</select>
		</div>

		<div class="form-group">
			<label for="multiple" class="control-label">Select2 multi select</label>
			<select id="multiple" class="form-control select2-multiple" multiple>
				<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

			</select>
		</div>

		<div class="page-header">
			<h3>Input Groups <small><a href="http://getbootstrap.com/components/#input-groups" ><span class="glyphicon glyphicon-link"></span></a></small></h3>
		</div>

		<p>To let the Select2-widget know if any elements are directly being appended, prepended or both in the context of a Bootstrap input group, add <code>.select2-bootstrap-prepend</code> and/or <code>.select2-bootstrap-append</code> to the <code>.input-group</code> wrapper element to address the corresponding border-radii.</p>

		<div class="form-group">
			<label for="select2-single-append" class="control-label">Select2 append Checkbox</label>
			<div class="input-group select2-bootstrap-prepend">
				<span class="input-group-addon">
					<input type="checkbox" checked>
				</span>
				<select id="select2-single-append" class="form-control select2-allow-clear">
					<option></option>
					<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="single-append-radio" class="control-label">Select2 multi append Radiobutton</label>
			<div class="input-group select2-bootstrap-prepend">
				<span class="input-group-addon">
					<input type="radio">
				</span>
				<select id="single-append-radio" class="form-control select2-allow-clear" multiple>
					<option></option>
					<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="single-append-text" class="control-label">Select2 append</label>
			<div class="input-group select2-bootstrap-append">
				<select id="single-append-text" class="form-control select2-allow-clear">
					<option></option>
					<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

				</select>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" data-select2-open="single-append-text">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="single-prepend-text" class="control-label">Select2 prepend</label>
			<div class="input-group select2-bootstrap-prepend">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" data-select2-open="single-prepend-text">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
				<select id="single-prepend-text" class="form-control select2">
					<option></option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label for="multi-append" class="control-label">Select2 multi append</label>
			<div class="input-group select2-bootstrap-append">
				<select id="multi-append" class="form-control select2" multiple>
					<option></option>
					<option value="A">A</option>
					<option value="B">B</option>
					<option value="C">C</option>
				</select>
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" data-select2-open="multi-append">
						<span class="glyphicon glyphicon-search"></span>
					</button>
				</span>
			</div>
		</div>

		<div class="form-group">
			<label for="multi-prepend" class="control-label">Select2 multi prepend</label>
			<div class="input-group select2-bootstrap-prepend">
				<span class="input-group-btn">
					<button class="btn btn-default" type="button" data-select2-open="multi-prepend">
						State
					</button>
				</span>
				<select id="multi-prepend" class="form-control select2" multiple>
					<option></option>
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

				</select>
			</div>
		</div>

		<div class="container">

			<div class="page-header">
				<h3>
					Control sizing <small><a href="http://getbootstrap.com/css/#forms-control-sizes"><span class="glyphicon glyphicon-link"></span></a></small>
				</h3>
			</div>

			<div class="row">
				<div class="col-md-4">
					<label for="select2-multiple-input-sm" class="control-label">col-md-4</label>
					<select id="select2-multiple-input-sm" class="form-control input-sm select2-multiple" multiple>
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

					</select>
				</div>
				<div class="col-md-3">
					<label for="select2-single-input-sm" class="control-label">col-md-3</label>
					<select id="select2-single-input-sm" class="form-control input-sm select2-multiple">
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

					</select>
				</div>
				<div class="col-md-2">
					<label for="bootstrap-input-sm" class="control-label">Bootstrap input</label>
					<input id="bootstrap-input-sm" class="form-control input-sm" placeholder=".input-sm">
				</div>
				<div class="col-md-3">
					<div class="form-group has-success">
						<label for="select2-single-input-group-sm" class="control-label">col-md-3</label>
						<div class="input-group input-group-sm select2-bootstrap-prepend">
							<span class="input-group-addon">
								<input type="radio">
							</span>
							<select id="select2-single-input-group-sm" class="form-control select2">
								<option></option>
								<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

							</select>
						</div>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-4 has-warning">
					<label for="select2-multiple" class="control-label">col-md-4</label>
					<select id="select2-multiple" class="form-control select2-multiple" multiple>
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

					</select>
					<p class="help-block">Example block-level help text here.</p>
				</div>
				<div class="col-md-3">
					<label for="span_small" class="control-label">col-md-3</label>
					<select id="span_small" class="form-control select2">
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

					</select>
				</div>
				<div class="col-md-2">
					<label for="span-medium">Bootstrap input</label>
					<input id="span-medium" class="form-control" placeholder=".col-md-2">
				</div>
				<div class="col-md-3">
					<div class="form-group">
						<label for="span_large" class="control-label">col-md-3</label>
						<div class="input-group select2-bootstrap-prepend">
							<span class="input-group-addon">
								<input type="checkbox" checked>
							</span>
							<select id="span_large" class="form-control select2">
								<option></option>
								<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

							</select>
						</div>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-4">
					<label for="select2-multiple-input-lg" class="control-label">col-md-4</label>
					<select id="select2-multiple-input-lg" class="form-control input-lg select2-multiple" multiple>
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

					</select>
				</div>
				<div class="col-md-3">
					<label for="span-small" class="control-label">col-md-3</label>
					<select id="span-small" class="form-control input-lg select2-multiple">
						<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

					</select>
				</div>
				<div class="col-md-2">
					<label for="bootstrap-input-lg" class="control-label">Bootstrap input</label>
					<input id="bootstrap-input-lg" class="form-control input-lg" placeholder=".input-lg">
				</div>
				<div class="col-md-3">
					<div class="form-group has-error">
						<label for="select2-multiple-input-group-lg" class="control-label">col-md-3</label>
						<div class="input-group input-group-lg select2-bootstrap-prepend">
							<span class="input-group-addon">
								<input type="radio">
							</span>
							<select id="select2-multiple-input-group-lg" class="form-control select2">
								<option></option>
								<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

							</select>
						</div>
					</div>
				</div>
			</div>

			<div class="page-header">
				<h3>
					Button Addons <small><a href="http://getbootstrap.com/components/#input-groups-buttons"><span class="glyphicon glyphicon-link"></span></a></small>
				</h3>
			</div>

			<div class="row">
				<div class="col-md-7">
					<label for="select2-button-addons-single-input-group-sm" class="control-label">Select2 custom data load</label>
					<div class="input-group input-group-sm select2-bootstrap-prepend">
						<div class="input-group-btn">
							<button class="btn btn-default" type="button" data-select2-open="select2-button-addons-single-input-group-sm">
								State
							</button>
						</div>
						<input id="select2-button-addons-single-input-group-sm" type="hidden" class="form-control select2-remote">
					</div>
				</div>
				<div class="col-md-5">
					<label for="select2-button-addons-multiple-input-group-sm" class="control-label">col-md-5</label>
					<div class="input-group input-group-sm select2-bootstrap-prepend">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" data-select2-open="select2-button-addons-multiple-input-group-sm">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
						<select id="select2-button-addons-multiple-input-group-sm" class="form-control select2-multiple" multiple>
							<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

						</select>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-7">
					<label for="select2-button-addons-single-input-group" class="control-label">Select2 custom data load</label>
					<div class="input-group select2-bootstrap-prepend">
						<div class="input-group-btn">
							<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
								Action <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a href="#">Action</a></li>
								<li><a href="#">Another action</a></li>
								<li><a href="#">Something else here</a></li>
								<li class="divider"></li>
								<li><a href="#">Separated link</a></li>
							</ul>
						</div>
						<input id="select2-button-addons-single-input-group" type="hidden" class="form-control select2-remote">
					</div>
				</div>
				<div class="col-md-5">
					<label for="select2-input-group-append" class="control-label">col-md-5</label>
					<div class="input-group has-warning select2-bootstrap-prepend">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" data-select2-open="select2-input-group-append">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
						<select id="select2-input-group-append" class="form-control select2-multiple" multiple>
							<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

						</select>
					</div>
				</div>
			</div>

			<hr>

			<div class="row">
				<div class="col-md-7">
					<label for="select2-button-addons-single-input-group-lg" class="control-label">Select2 custom data load</label>
					<div class="input-group input-group-lg select2-bootstrap-append">
						<input id="select2-button-addons-single-input-group-lg" type="hidden" class="form-control select2-remote" value="1296269">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" data-select2-open="select2-button-addons-single-input-group-lg">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
					</div>
				</div>
				<div class="col-md-5">
					<label for="select2-button-addons-multi-input-group-lg" class="control-label">col-md-5</label>
					<div class="input-group input-group-lg select2-bootstrap-prepend">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button" data-select2-open="select2-button-addons-multi-input-group-lg">
								<span class="glyphicon glyphicon-search"></span>
							</button>
						</span>
						<select id="select2-button-addons-multi-input-group-lg" class="form-control select2-multiple" multiple>
							<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

						</select>
					</div>
				</div>
			</div>

			<div class="page-header">
				<h3>Disabled inputs <small><a href="http://getbootstrap.com/css/#forms-control-states"><span class="glyphicon glyphicon-link"></span></a></small></h3>
			</div>

			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="select2-disabled-inputs-single" class="control-label">col-md-3</label>
						<div class="input-group select2-bootstrap-prepend">
							<span class="input-group-addon">
								<input type="checkbox">
							</span>
							<select id="select2-disabled-inputs-single" class="form-control select2" disabled>
								<option></option>
								<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

							</select>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="select2-disabled-inputs-multiple" class="control-label">col-md-3</label>
						<div class="input-group select2-bootstrap-prepend">
							<span class="input-group-addon">
								<input type="checkbox" checked>
							</span>
							<select id="select2-disabled-inputs-multiple" class="form-control select2-multiple" multiple>
								<option></option>
								<optgroup label="Alaskan/Hawaiian Time Zone">
	<option value="AK">Alaska</option>
	<option value="HI">Hawaii</option>
</optgroup>
<optgroup label="Pacific Time Zone">
	<option value="CA">California</option>
	<option value="NV">Nevada</option>
	<option value="OR">Oregon</option>
	<option value="WA">Washington</option>
</optgroup>
<optgroup label="Mountain Time Zone">
	<option value="AZ">Arizona</option>
	<option value="CO">Colorado</option>
	<option value="ID">Idaho</option>
	<option value="MT">Montana</option><option value="NE">Nebraska</option>
	<option value="NM">New Mexico</option>
	<option value="ND">North Dakota</option>
	<option value="UT">Utah</option>
	<option value="WY">Wyoming</option>
</optgroup>
<optgroup label="Central Time Zone">
	<option value="AL">Alabama</option>
	<option value="AR">Arkansas</option>
	<option value="IL">Illinois</option>
	<option value="IA">Iowa</option>
	<option value="KS">Kansas</option>
	<option value="KY">Kentucky</option>
	<option value="LA">Louisiana</option>
	<option value="MN">Minnesota</option>
	<option value="MS">Mississippi</option>
	<option value="MO">Missouri</option>
	<option value="OK">Oklahoma</option>
	<option value="SD">South Dakota</option>
	<option value="TX">Texas</option>
	<option value="TN">Tennessee</option>
	<option value="WI">Wisconsin</option>
</optgroup>
<optgroup label="Eastern Time Zone">
	<option value="CT">Connecticut</option>
	<option value="DE">Delaware</option>
	<option value="FL">Florida</option>
	<option value="GA">Georgia</option>
	<option value="IN">Indiana</option>
	<option value="ME">Maine</option>
	<option value="MD">Maryland</option>
	<option value="MA">Massachusetts</option>
	<option value="MI">Michigan</option>
	<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
	<option value="NY">New York</option>
	<option value="NC">North Carolina</option>
	<option value="OH">Ohio</option>
	<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
	<option value="VT">Vermont</option><option value="VA">Virginia</option>
	<option value="WV">West Virginia</option>
</optgroup>

							</select>
						</div>
					</div>
				</div>
			</div>

		</div>

		<div class="footer">
	<div class="container">
		<ul class="footer-links">
	<li class="version"><span class="hidden-xs">Currently</span> v1.4.6</li>
	<li>&middot;</li>
	<li><a href="https://github.com/t0m/select2-bootstrap-css/tree/bootstrap3">GitHub</a></li>
	<li>&middot;</li>
	<li><a href="https://github.com/t0m/select2-bootstrap-css/tree/bootstrap3#readme">Readme</a></li>
	<li>&middot;</li>
	<li><a href="https://github.com/t0m/select2-bootstrap-css">Bootstrap 2 version</a></li>
</ul>


		<small>
			<a href="http://getbootstrap.com">Bootstrap</a> is a front-end framework for fast, sleek, and mobile-first web development.<br>
			<a href="http://select2.com">Select2</a> is a jQuery based replacement for select boxes.
		</small>
	</div>
</div>
    <!--<div id="bar"><a id="clickMenu"><i class="fa fa-bars"></i></a><p>Machine Monitors</p></div>
    <nav class="unDisplayNav">
        <ul>
            <li id="profile"><i class="fa fa-cogs fa-4x" id="iconProfile"></i><br><span id="titleProfile"><?php  echo $perfil['empresa'] ?></span><br><span id="nameProfile"><?php echo $perfil['correo']; ?></span></li>
            <li><a class="selected"><i class="fa fa-tachometer icons"></i>Dashboard</a></li>
            <li><a><i class="fa fa-industry icons"></i>Empresas</a></li>
            <li><a><i class="fa fa-bar-chart icons"></i>Históricos</a></li>
            <li><a><i class="fa fa-send icons"></i>Contácto</a></li>
            <li><a><i class="fa fa-unlock icons"></i>Contraseña</a></li>
            <li><a><i class="fa fa-sign-out icons"></i>Cerrar</a></li>
        </ul>
    </nav>
    <div id="content" class="animated fadeInUp unLeftContent">
        <div class="col-xs-12 col-sm-6 card">
            <div class="col-xs-12 shadow cardContent">
                <div class="col-xs-12 titleCard"> 
                    <i class="fa fa-globe fa-2x pull-left cA"></i>
                    <div class="dropdown pull-right">
                        <div class="btn dropdown-toogle" style="background-color: white;" data-toggle="dropdown"><i class="fa fa-ellipsis-v"></i></div>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><a id="'.$value['idEmpresa'].'" class="editarEmpresa"><i class="fa fa-pencil"></i>editar</a></li>
                            <li><a id="'.$value['idEmpresa'].'" class="eliminarEmpresa"><i class="fa fa-remove"></i>remover</a></li>
                        </ul>
                    </div>
                    <p class="agregarZona">LOS ACACIOS</p>
                </div>
                <div class="col-xs-12 cardContent">
                    <?php echo '<input type="text" id="hola" value="'.$id.'">'; ?>
                    <table class="responsiva montserrat">
                        <thead>
                            <tr>        
                                <th class="text-center">ID</th>
                                <th class="text-center">Fecha de Registro</th>
                                <th class="text-center">Tara [kg]</th>
                                <th class="text-center">Carga Máxima [kg]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center tSticky">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                            </tr>
                            <tr>
                                <td class="text-center tSticky">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                                <td class="text-center">100</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="stickyButton agregarSupervisor"><i class="fa fa-plus"></i></div>
<!-- VENTANAS MODALES -->
    <!-- MODAL AGREGAR ZONA
    <div class="modalAgregarZona modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <i class="fa fa-industry"></i>
                    Agregar Empresa
                </div>
                <div class="modal-body">
                    <form id="formularioAgregarZona">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nueva Zona" class="form-control" name="nombre" id="nombreAgregarZona">
                        </div>
                        <div class="form-group">
                            <label>ID EMPRESA</label>
                            <input type="text" class="form-control" name="id" id="idEmpresaAgregarZona">
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right montserrat" id="btnAñadirZona"><i class="cargar fa fa-plus"></i>Agregar</button>
                        <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODAL AGREGAR SUPERVISOR    
    <div class="modalAgregarSupervisor modal fade" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><i class="fa fa-industry"></i>Agregar Supervisor</div>
                <div class="modal-body">
                    <form id="formularioAgregarSupervisor">
                        <div class="form-group">
                            <label>Nombre</label>
                            <input type="text" placeholder="Nuevo Supervisor" class="form-control" name="nombre" id="nombreAgregarSupervisor">
                        </div>
                        <div class="form-group">
                            <label>Correo</label>
                            <input type="text" placeholder=". . . . . . . . @ . . . . . . . ." class="form-control" name="correo" id="correoAgregarSupervisor">
                        </div>
                        <div class="form-group">
                            <label>Zonas Asociadas</label>
                            <select class="hola" multiple="multiple" style="width: 100%;">
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>        
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>
                                <option value="AL">Alabama</option>
                                <option value="WY">Wyoming</option>    
                            </select>
                        </div>
                    </form>
                    <div class="clearfix">
                        <button type="submit" class="btn btn-primary pull-right montserrat" id="btnAñadirSupervisor"><i class="cargar fa fa-plus"></i>Agregar</button>
                        <button type="button" class="btn btn-inverse pull-right montserrat cancelar" data-dismiss="modal"><i class="fa fa-times"></i>Cerrar</button>
                    </div>
                    <div class="message" style="margin: 15px 0px 0px 0px"></div>
                </div>
            </div>
        </div>
    </div>-->
    <script src="../../recursos/jquery/jquery-3.2.0.min.js"></script>
    <script src="../../recursos/bootstrap.min.js"></script>
    <script src="../../recursos/select2.js"></script>
    <script src="../../recursos/rut/jquery.rut.chileno.js"></script>
    <script src="../../cliente/js/modalAgregarZona.js"></script>
    <script src="../../cliente/js/modalAgregarSupervisor.js"></script>
    <script src="../../js/funciones.js"></script>
    <script src="../../js/compruebaInputs.js"></script>
    <script src="../../js/mensajes.js"></script>
    <script>
        $(document).ready(function(){
            /*function explode(){
              $('#loader').css('display','none');
              $('#content').fadeIn().css('display','block');
            }
            setTimeout(explode, 5000);*/
                $(".hola").select2({
                    placeholder: "Seleccionar Zona",
                    minimumResultsForSearch: Infinity,
                    theme: "bootstrap"
                });
            main();
            $('.cancelar').click(function(){$('.alert').remove();});
            $('.modal').on('hidden.bs.modal', function(){
                $(this).find('form')[0].reset();
            });
        });
    </script>
		<script>
			var placeholder = "Select a State";

			$( ".select2, .select2-multiple" ).select2( { placeholder: placeholder } );
			$( ".select2-allow-clear" ).select2( { allowClear: true, placeholder: placeholder } );

			// @see https://github.com/ivaynberg/select2/commit/6661e3
			function repoFormatResult( repo ) {
				var markup = "<div class='select2-result-repository clearfix'>" +
					"<div class='select2-result-repository__avatar'><img src='" + repo.owner.avatar_url + "' /></div>" +
					"<div class='select2-result-repository__meta'>" +
						"<div class='select2-result-repository__title'>" + repo.full_name + "</div>";

				if ( repo.description ) {
					markup += "<div class='select2-result-repository__description'>" + repo.description + "</div>";
				}

				markup += "<div class='select2-result-repository__statistics'>" + 
							"<div class='select2-result-repository__forks'><span class='glyphicon glyphicon-flash'></span> " + repo.forks_count + " Forks</div>" +
							"<div class='select2-result-repository__stargazers'><span class='glyphicon glyphicon-star'></span> " + repo.stargazers_count + " Stars</div>" +
							"<div class='select2-result-repository__watchers'><span class='glyphicon glyphicon-eye-open'></span> " + repo.watchers_count + " Watchers</div>" +
						"</div>" +
					"</div></div>";

				return markup;
			}

			function repoFormatSelection( repo ) {
				return repo.full_name;
			}

			$( ".select2-remote" ).select2({
				placeholder: "Search for a GitHub Repository",
				minimumInputLength: 1,
				// instead of writing the function to execute the request we use Select2's convenient helper
				ajax: {
					url: "https://api.github.com/search/repositories",
					dataType: "json",
					quietMillis: 250,
					data: function( term, page ) {
						return {
							// search term
							q: term
						};
					},
					results: function( data, page ) {
							// parse the results into the format expected by Select2.
							// since we are using custom formatting functions we do not need to alter the remote JSON data
							return { results: data.items };
					},
					cache: true
				},
				initSelection: function( element, callback ) {
					// the input tag has a value attribute preloaded that points to a preselected repository's id
					// this function resolves that id attribute to an object that select2 can render
					// using its formatResult renderer - that way the repository name is shown preselected
					var id = $( element ).val();

					if ( id !== "" ) {
						$.ajax( "https://api.github.com/repositories/" + id, {
							dataType: "json"
						}).done( function( data ) {
							callback( data );
						});
					}
				},
				formatResult: repoFormatResult,
				formatSelection: repoFormatSelection,
				// apply css that makes the dropdown taller
				dropdownCssClass: "bigdrop",
				// we do not want to escape markup since we are displaying html in results
				escapeMarkup: function( m ) {
					return m;
				}
			});

			$( "button[data-select2-open]" ).click( function() {
				$( "#" + $( this ).data( "select2-open" ) ).select2( "open" );
			});

			
				var select2OpenEventName = "select2-open";

				$( ":checkbox" ).on( "click", function() {
					$( this ).parent().nextAll( "select" ).select2( "enable", this.checked );
				});
			

			$( ".select2, .select2-multiple, .select2-allow-clear, .select2-remote" ).on( select2OpenEventName, function() {
				if ( $( this ).parents( "[class*='has-']" ).length ) {
					var classNames = $( this ).parents( "[class*='has-']" )[ 0 ].className.split( /\s+/ );

					for ( var i = 0; i < classNames.length; ++i ) {
						if ( classNames[ i ].match( "has-" ) ) {
							$( "#select2-drop" ).addClass( classNames[ i ] );
						}
					}
				}
			});

		</script>
</body>
</html>