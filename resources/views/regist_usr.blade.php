<!DOCTYPE html>
<html>
<head>
	<title>Regist user</title>
</head>
<body>
 <div class="main">

 	<ul class="ul">
    <li class="li-side">
    	<div class="side">
 	<ul class="main-ul">
 		<form method="POST" action="upload">
 			{{csrf_field()}}
 	      <li class="liste">
 		   	<input type="text" name="username" placeholder="user" required="">
 		  </li>

 	      <li class="liste">
 		   	<input type="text" name="emer_mb" placeholder="Emer Mbiemer" required="">
 		  </li>
           <li class="liste">
 		   
 		    <select name="gjinia">
 		   	  <option value="mashkull">Mashkull</option>
 		   	  <option value="femer">Femer</option>
 		    </select>
 		   
 		   </li>

 		   <li class="liste">
 		   	<input type="text" name="qyteti" placeholder="qyteti" required="">
 		  </li>
 		   <li class="liste">
 		   	<input type="text" name="adres" placeholder="adresa" required="">
 		  </li>
 		   	<li class="liste">
 		   	<input type="number" name="cel" placeholder="cel" required="">
 		  </li>
 		   <li class="liste">
 		   	<input type="number" name="tel" placeholder="tel" required="">
 		  </li>
 		   <li class="liste">
 		   	<input type="Email" name="email" placeholder="email" required="">
 		  </li>
           <li class="liste">
 		   	<input type="password" name="pass" placeholder="Password" required="">
 		  </li>
 		    <li class="liste">
 		   	<input type="password" name="re-pass" placeholder="re - Password" required="">
 		  </li>
          <li class="liste" id="button">
          	<button class="button" name="regist"> Regist</button>
          </li>
 		</form>
 	</ul>
 </div>
</li>
<li class="li-side">
	<div class="error"></div>
</li>
</ul>
 </div>
</body>
</html>