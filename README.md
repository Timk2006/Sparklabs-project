# 🚀 SparkLabs

## 📌 Introductie

**SparkLabs** is een dynamische evenementenwebsite waar gebruikers tech- en gaming events kunnen ontdekken en tickets kunnen kopen.

De website is gekoppeld aan een database, waardoor alle content automatisch wordt geladen en beheerd.

### 🔧 Functionaliteiten

* 🎫 Evenementen bekijken
* 🛒 Tickets kopen
* 📰 Nieuws lezen
* 👥 Informatie over de oprichters bekijken

Dit project is opgezet om te laten zien hoe je binnen een team een webapplicatie ontwikkelt met behulp van de **Scrum-methodiek**.

### 🎯 Leerdoelen

* Werken met PHP
* Werken met MySQL databases
* Bouwen van dynamische websites

---
 
## 🏁 Installatie

### 1. Project downloaden

Plaats de projectmap in je lokale serveromgeving (bijvoorbeeld XAMPP):

```bash
htdocs/sparklabs
```

### 2. Server starten

Start de volgende services in XAMPP:

* Apache
* MySQL

---

## 🗄️ Database instellen

### 1. Open phpMyAdmin

Ga naar phpMyAdmin via je browser of XAMPP control panel.

### 2. Database aanmaken

Maak een database aan met de naam:

```sql
sparklabs
```

### 3. Database importeren

Importeer het bestand:

```bash
import.sql
```

### 4. Databaseverbinding instellen

Gebruik deze configuratie in je PHP-bestand:

<?php

$host = "localhost";
$dbname = "sparklabs";
$username = "bit_academy";
$password = "bit_academy";

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

?>
```

### 📊 Tabellen in de database

* `events` — evenementen
* `users` — gebruikers
* `tickets` — gekochte tickets
* `news` — nieuwsberichten
* `meetgroups` — groepen
* `planning` — taken

---

## ▶️ Project starten

Open de website in je browser:

```bash
http://localhost/sparklabs/
```

---

## 🧪 Testen

Je kunt de website testen door:

* Evenementen te bekijken
* Tickets te kopen
* Nieuwsartikelen te lezen
* De informatiepagina te bekijken

---

## 👥 Team

Dit project is ontwikkeld door drie oprichters.
Meer informatie is te vinden op de **info-pagina** van de website.

---

## 📄 Doel van het project

Dit project is gemaakt voor educatieve doeleinden en laat zien:

* Hoe je werkt met PHP
* Hoe je een database koppelt en gebruikt
* Hoe een dynamische website functioneert
* Hoe Scrum wordt toegepast binnen een teamproject
