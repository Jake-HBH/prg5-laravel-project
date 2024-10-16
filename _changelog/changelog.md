# changelog

Ik heb vandaag **09/10/2024** het programmeren 5 laravel project

[naam van de link](www.google.com)

![alt text](./)

Ik heb vandaag **11/10/2024**:

- een Homecontroller bestand gemaakt
- een index functie in Homecontroller.php gemaakt
- een route voor Home in web.php gemaakt
- gewerkt met compact() functie en variables
- gewerkt aan de view

![screenshot home pagina](images/Screenshot 2024-10-11 230740.png)


Ik heb vandaag **12/10/2024**:

- Route parameters toegevoegd zodat ik meer specifieke URL's kan invoeren (http://127.0.0.1:8000/home/Jake bijvoorbeeld geeft je de pagina om mijn info te zien)
- ProductController.php (Resource) bestand gemaakt.
- index.blade.php en show.blade.php bestand gemaakt
- Route met parameter toegevoegd voor products url in web.php

Ik heb vandaag **13/10/2024**:

- Een idee voor mijn applicatie gekregen
- Een beschrijving geschreven voor mijn applicatie
- User Stories gemaakt

Mijn idee voor mijn applicatie:

**Een huisdieren adoptatie applicatie.**

De applicatie is een plek voor het adopteren van huisdieren waar **normale gebruikers/bezoekers** huisdieren kunnen bekijken en misschien een knop kunnen drukken om te "adopteren". 

**Ingelogde gebruikers** kunnen dieren toevoegen, bewerken en verwijderen. 

**De admin** krijgt een dashboard te zien met..

De applicatie laat een detailpagina voor elk dier zien met informatie zoals tekst en afbeelding en een zoek- en filterfunctie, dit kan dus bijvoorbeeld zijn: Honden, Katten, Knaagdieren, Vogels etc.


**User Stories**
Gebruikers (De mensen die willen/gaan adopteren):
- Als gebruiker wil ik me kunnen registreren en inloggen, zodat ik toegang heb tot functies die alleen voor ingelogde gebruikers zijn.

- Als gebruiker wil ik een lijst kunnen zien van beschikbare dieren, zodat ik kan kijken welke dieren er voor adoptie zijn.

- Als gebruiker wil ik meer informatie over een dier kunnen bekijken, zodat ik een goed beeld krijg van het dier dat ik overweeg te adopteren.

- Als gebruiker wil ik kunnen zoeken naar dieren en filteren op diersoort, zodat ik snel kan vinden wat ik zoek.

- Als ingelogde gebruiker wil ik dieren kunnen toevoegen, bewerken en verwijderen, zodat ik kan helpen bij het aanbod van adoptiedieren.


**ERD**

- users tabel
- animals tabel
- adoption requests tabel voor wanneer users op adoptie drukken bij een huisdier

![screenshot erd](images/laravel_erd.png)


Ik heb vandaag **14/10/2024**:

- De route voor home veranderd
- Layouts gebruikt
- About pagina met tekst aangemaakt met ChatGPT, zie foto
- Naam bedacht voor website, Pawfect Match

Ik heb vandaag **15/10/2024**:

- De tekst op de home en about pagina naar het Engels vertaald, vanaf nu word de taal naar het Engels gezet
- Tekst van home en about licht aangepast

Update **16102024.1**:

- index aangemaakt waar je alle huisdieren kan bekijken in een list
- create pagina aangemaakt en werkend gekregen
- je kan nu foto's toevoegen van je huisdier, d.m.v image address toe te voegen aan het "Image URL" veld
- meerdere bestanden aangemaakt voor de animal index view pagina en backend
