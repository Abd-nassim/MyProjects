<div class="content">
	

<nav>
    <ul>
        <li <?php if(isset($_GET['content'])&&$_GET['content']=="etudiant") echo "id='selected'"; ?> >
        	<a href="index.php?content=etudiant">Etudiant</a>
		</li>
		<li <?php if(isset($_GET['content'])&&$_GET['content']=="enseignant") echo "id='selected'"; ?> >
        	<a href="index.php?content=enseignant">Enseignant</a>
		</li>
		<li <?php if(isset($_GET['content'])&&$_GET['content']=="departement") echo "id='selected'"; ?> >
        	<a href="index.php?content=departement">Departement</a>
		</li>
		<li <?php if(isset($_GET['content'])&&$_GET['content']=="about") echo "id='selected'"; ?> >
        	<a href="index.php?content=about">About</a>
		</li>
    </ul>
</nav>


<section id="content">
    <?php 
    	echo "<center>";
	    if(isset($_GET['content']))
			include($_GET["content"].".php");
		else 
			include("etudiant.php");
		echo "</center>"
    ?>
<section>

</div>