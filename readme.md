## Tutoriel QGIS

Réécriture en RMarkdown !

### Images

Avec une légende et un texte alternatif :
```{r, echo = FALSE, out.width = "600px", fig.cap="ma légende", class = "fig"}
include_graphics(path = "path/to/image.png")
```

Avec un texte alternatif sans légende :
```{r, echo = FALSE, out.width = "600px", fig.alt="bla bla", class = "fig"}
include_graphics(path = "path/to/image.png")
```

Icône d'outil à placer au début d'un paragraphe :
```{r, echo = FALSE, out.width = "35px", class = "icone"}
include_graphics(path = "illustrations/tous/1_1_ouvrir_projet_icone.png")
```

Image qui apparaît quand on passe la souris sur un texte (avec le package tippy) :
Lancez le logiciel QGIS. Ouvrez un projet : <u id = 'menuprojet'>Menu Projet → Ouvrir</u>.
```{r, echo=FALSE}
tippy_this(elementId = "menuprojet",
           tooltip = '<img class="icone" src="illustrations/tous/1_1_ouvrir_projet.png" alt="menu ouvrir un projet">',
           theme = "light",
           placement = "bottom")
```

### Manipulation

Pour indiquer une manipulation à faire dans QGIS (crée une div HTML avec la classe **manip**) :

::: {.manip}

Hop

:::

### Question/réponse

Avec du HTML (attention, sans indentation, une ligne vide avant et après) :

<div class="question">
<input type="checkbox" id="faq-1">
<p><label for="faq-1">Pourquoi Jimi Hendrix connaît-il tous les symboles des cartes ?</label></p>
<p class="reponse">Parce-que c'est une légende !</p>
</div>

### Hyperliens

Liens externes au tutoriel : 
[http://www.qgis.org/](http://www.qgis.org/){.ext}

Liens internes :
[plan détaillé](plan_detaille.html)

