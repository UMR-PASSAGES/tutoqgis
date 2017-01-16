#!/bin/bash

##############################################
# pour exporter les pages du tuto QGIS en PDF
# 1 PDF par partie
##############################################

##############################################
# A FAIRE AVANT DE LANCER
# Dans head.inc.php, remplacer
# href="tutoqgis.css" media="screen"
# par :
# href="tutoqgis_print.css" media="screen"
##############################################

##############################################
# DESCRIPTION OPTIONS
##############################################

# -R 0 -L 0
# Pas de marges gauche et droite. Par défaut, 10mm
# Ne fonctionne pas avec version wkhtmltopdf fournie dans les paquets (au 08/07/2014)
#
# -T 2cm -B 2cm
# Marges haut et bas de 2 cm
#
# --header-html $entete --footer-html $piedpage
# Utilise le haut et pied de page header.html et footer.html
#
# --footer-spacing 3 --header-spacing 3
# Espace en mm entre la page et le pied de page, ou entre la page et l'en-tête
#
# cover $pagedegarde
# couverture du PDF
#
# toc
# Génère table des matières
#
# --xsl-style-sheet tutoqgis_02.xsl
# Feuille de style utilisée pour la table des matières
#

##############################################
# VARIABLES
##############################################

pagedegarde='http://et.ades.cnrs.fr/TutoQGIS/pdf_cover.html'
entete='header.html'
piedpage='footer.html'
html10='http://et.ades.cnrs.fr/TutoQGIS/01_00_prise_en_main.php'
html11='http://et.ades.cnrs.fr/TutoQGIS/01_01_SIG.php'
html12='http://et.ades.cnrs.fr/TutoQGIS/01_02_info_geo.php'
html13='http://et.ades.cnrs.fr/TutoQGIS/01_03_formats.php'
html14='http://et.ades.cnrs.fr/TutoQGIS/01_04_projets.php'
sortie1='tuto01.pdf'
html20='http://et.ades.cnrs.fr/TutoQGIS/02_00_geodesie.php'
html21='http://et.ades.cnrs.fr/TutoQGIS/02_01_intro.php'
html22='http://et.ades.cnrs.fr/TutoQGIS/02_02_coord.php'
html23='http://et.ades.cnrs.fr/TutoQGIS/02_03_couches_projets.php'
html24='http://et.ades.cnrs.fr/TutoQGIS/02_04_changer_systeme.php'
sortie2='tuto02.pdf'
html30='http://et.ades.cnrs.fr/TutoQGIS/03_00_recherche_ajout.php'
html31='http://et.ades.cnrs.fr/TutoQGIS/03_01_donnees_internet.php'
html32='http://et.ades.cnrs.fr/TutoQGIS/03_02_donnees_flux.php'
html33='http://et.ades.cnrs.fr/TutoQGIS/03_03_donnees_XY.php'
sortie3='tuto03.pdf'
html40='http://et.ades.cnrs.fr/TutoQGIS/04_00_georeferencement.php'
html41='http://et.ades.cnrs.fr/TutoQGIS/04_01_principe.php'
html42='http://et.ades.cnrs.fr/TutoQGIS/04_02_preliminaires.php'
html43='http://et.ades.cnrs.fr/TutoQGIS/04_03_calage_carroyage.php'
html44='http://et.ades.cnrs.fr/TutoQGIS/04_04_parametrage.php'
html45='http://et.ades.cnrs.fr/TutoQGIS/04_05_lancement.php'
html46='http://et.ades.cnrs.fr/TutoQGIS/04_06_calage_autre_couche.php'
sortie4='tuto04.pdf'
html50='http://et.ades.cnrs.fr/TutoQGIS/05_00_numerisation.php'
html51='http://et.ades.cnrs.fr/TutoQGIS/05_01_creation_couche.php'
html52='http://et.ades.cnrs.fr/TutoQGIS/05_02_points.php'
html53='http://et.ades.cnrs.fr/TutoQGIS/05_03_donnees_attrib.php'
html54='http://et.ades.cnrs.fr/TutoQGIS/05_04_lignes.php'
html55='http://et.ades.cnrs.fr/TutoQGIS/05_05_polygones.php'
html56='http://et.ades.cnrs.fr/TutoQGIS/05_06_topologie.php'
sortie5='tuto05.pdf'
html60='http://et.ades.cnrs.fr/TutoQGIS/06_00_requetes.php'
html61='http://et.ades.cnrs.fr/TutoQGIS/06_01_req_attrib.php'
html62='http://et.ades.cnrs.fr/TutoQGIS/06_02_req_spatiales.php'
html63='http://et.ades.cnrs.fr/TutoQGIS/06_03_req_combinees.php'
sortie6='tuto06.pdf'
html70='http://et.ades.cnrs.fr/TutoQGIS/07_00_champs.php'
html71='http://et.ades.cnrs.fr/TutoQGIS/07_01_creation_suppression.php'
html72='http://et.ades.cnrs.fr/TutoQGIS/07_02_gestionnaire_table.php'
html73='http://et.ades.cnrs.fr/TutoQGIS/07_03_calculer.php'
sortie7='tuto07.pdf'
html80='http://et.ades.cnrs.fr/TutoQGIS/08_00_jointures.php'
html81='http://et.ades.cnrs.fr/TutoQGIS/08_01_jointure_attrib.php'
html82='http://et.ades.cnrs.fr/TutoQGIS/08_02_jointure_spatiale.php'
sortie8='tuto08.pdf'
html90='http://et.ades.cnrs.fr/TutoQGIS/09_00_analyse_spatiale.php'
html91='http://et.ades.cnrs.fr/TutoQGIS/09_01_vecteur.php'
html92='http://et.ades.cnrs.fr/TutoQGIS/09_02_raster.php'
html93='http://et.ades.cnrs.fr/TutoQGIS/09_03_vecteur_raster.php'
sortie9='tuto09.pdf'
html100='http://et.ades.cnrs.fr/TutoQGIS/10_00_carto.php'
html101='http://et.ades.cnrs.fr/TutoQGIS/10_01_representation.php'
html102='http://et.ades.cnrs.fr/TutoQGIS/10_02_mise_en_page.php'
sortie10='tuto10.pdf'
html110='http://et.ades.cnrs.fr/TutoQGIS/11_00_automatisation.php'
html111='http://et.ades.cnrs.fr/TutoQGIS/11_01_traitement_de_base.php'
html112='http://et.ades.cnrs.fr/TutoQGIS/11_02_par_lot.php'
html113='http://et.ades.cnrs.fr/TutoQGIS/11_03_modeleur.php'
html114='http://et.ades.cnrs.fr/TutoQGIS/11_04_python.php'
sortie11='tuto11.pdf'
sortietout='tutoqgis.pdf'

##############################################
# COMMANDE
##############################################

# TOUT
wkhtmltopdf -R 0 -L 0 -T 2cm -B 2cm --enable-javascript --javascript-delay 10000 --header-html $entete --header-spacing 3 --footer-html $piedpage --footer-spacing 3 cover $pagedegarde toc --xsl-style-sheet toc_tutoqgis_02.xsl $html10 $html11 $html12 $html13 $html14 $html20 $html21 $html22 $html23 $html24 $html30 $html31 $html32 $html33 $html40 $html41 $html42 $html43 $html44 $html45 $html46 $html50 $html51 $html52 $html53 $html54 $html55 $html56 $html60 $html61 $html62 $html63 $html70 $html71 $html72 $html73 $html80 $html81 $html82 $html90 $html91 $html92 $html93 $html100 $html101 $html102 $html110 $html111 $html112 $html113 $html114 $sortietout


