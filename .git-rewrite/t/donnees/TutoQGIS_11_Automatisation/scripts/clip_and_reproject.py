#!/usr/bin/python
# encoding: utf-8

#################################
# Pour decouper par une meme couche et
# reprojeter en WGS84 tous les shapefiles
# situes dans un meme dossier
#################################

# importe la boite a outils traitements, pour pouvoir utiliser ses algorithmes
import processing
# import des autres modules Python necessaires
import os

# parametres en entree
input_folder = '/mnt/Travail/temp/a_decouper/'
mask_layer = '/mnt/Travail/temp/masque_decoupe/SAINTE_RADEGONDE.shp'

# parametres en sortie
output_folder = '/mnt/Travail/temp/resultats/'

# recupere la liste de tous les shapefiles presents dans input_folder
list_shp = [file for file in os.listdir(input_folder) if file.endswith('.shp')]
print ('list_shp : ' + str(list_shp))

#################################
# decoupe chacun de ces shapefiles par mask layer
# le resultat est cree dans output_folder
#################################

# pour chacun des elements de list_shp
for shp in list_shp:
    # recupere le chemin et le nom de chaque couche en entree
    input_layer = input_folder + shp
    # recupere l emplacement et le nom des couches qui seront creees
    output_name = output_folder + shp[:-4] + '_clip.shp'
    # lance l'algorithme clip pour chacune des couches
    # (cf. onglet help de cet algorithme pour savoir comment l'appeler)
    processing.runalg('qgis:clip', input_layer, mask_layer, output_name)
print ('decoupage ok')

#################################
# reprojette chacune des couches crees par decoupage en WGS84
# le resultat est cree dans output_folder
#################################

# recupere la liste des couches à reprojeter
list_shp_clip = [shp[:-4] + '_clip.shp' for shp in list_shp]
print ('list_shp_clip : ' + str(list_shp_clip))
# pour chacun des elements de list_shp_clip
for shp in list_shp_clip:
    # recupere le chemin et le nom de chaque couche en entree
    input_layer = output_folder + shp
    # recupere l emplacement et le nom des couches qui seront creees
    output_name = output_folder + shp[:-4] + '_wgs84.shp'
    # lance l'algorithme reproject pour chacune des couches
    processing.runalg('qgis:reprojectlayer', input_layer, 'EPSG:4326', output_name)
print ('reproject ok')

# C'est fini !
print ("Fin de l'execution")
