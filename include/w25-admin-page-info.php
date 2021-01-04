<?php
/**
 * Manual for developers.
 *
 * @package    25wat
 */

?>
<div class="admin-info">
    <span class="admin-title">Instrukcja</span> (backend) <br>
    <br>
    <span class="admin-subtitle"> Global/Header/Footer </span>
    Parametry globalne są definiowane na podstronie <b>Ustawienia</b>. <br>
    <br>
    <span class="admin-subtitle"> Strony </span>
    Strony (i ich elementy do edycji) zbudowane są w oparciu o pliki szablonów (np. template-home.php dla strony głównej) 
    i tym samym do każdej strony musi być przyporządkowany odpowiedni szablon wg którego są definiowane 
    <b>pola dodatkowe (plugin ACF)</b>. <br>
    Moduły (np. produkty, baza wiedzy) obsługiwane są jako wpisy własne <b>(custom post type, CPT)</b>. 
    Dla niech również są definiowane pola dodatkowe <b>(ACF)</b> w oparciu o typ wpisu (news, product, job, ...). <br>
</div>
